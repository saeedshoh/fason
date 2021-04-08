<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacts(Request $request)
    {
        $image = null;

        if($request->ajax()) {

            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'city_id' => 'required'
            ]);

            $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
            if(!File::isDirectory($month)){
                File::makeDirectory($month, 0777, true);
            }
            if($request->file('profile_photo_path')) {
                $image = $request->file('profile_photo_path')->store(now()->year . '/' . sprintf("%02d", now()->month));
            }

            $user = User::updateOrCreate(
                ['phone' => str_replace(' ', '', $request->phone)],
                [
                    'name' =>  $request->name,
                    'address' =>  $request->address,
                    'city_id' =>  $request->city_id,
                    'profile_photo_path' =>  $image ? $image : null,
                    'registered_at' => Carbon::now()
                ]
            );
            
            Auth::loginUsingId($user->id);
            return $request;
            
        }
    }

    public function index()
    {
        $users = User::where('status', 1)->latest()->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    public function clients()
    {
        $users = User::where('status', 2)->latest()->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' =>  str_replace(array( '(', ')', ' ', '-' ), '', $request->phone),
            'profile_photo_path' => $request->profile_photo_path,
            'password' => Hash::make($request->password),
            'status' =>  1,
            'registered_at' => Carbon::now()
        ]);
        $user->attachRole($request->role);

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Пользователи',
            'description' => 'Имя: ' . $request->name . ',    Эл. почта: ' . $request->email . ', Телефон: ' . str_replace(' ', '', $request->phone)
        ]);

        // $previous = url()->previous();
        // if(str_contains($previous, 'users')){

        // }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $cities = City::get();
        return view('dashboard.users.edit', compact('user', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'phone' => 'required'
        ]);
        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month, 0777, true);
        }
        if($request->file('profile_photo_path')) {
            $request->validate([
                'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
            ]);
            $image = $request->file('profile_photo_path')->store(now()->year . '/' . sprintf("%02d", now()->month));
        }
        $user->update($validated + ['profile_photo_path' => $request->file('profile_photo_path') ? $image : $user->profile_photo_path]);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if($user->status == 2) {
            return redirect(route('clients.index'))->with('success', 'Клиент успешно удален!');
        }
        return redirect(route('users.index'))->with('success', 'Сотрудник успешно удален!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function ft_show()
    {
        if (Auth::user()){
            $cities = City::get();
            $user = User::find(Auth::user()->id);
            return view('profile.index', compact('user', 'cities'));
        }
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function ft_update(UserRequest $request)
    {
        if (Auth::user()){
            $user = User::find(Auth::user()->id);
            $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
            if(!File::isDirectory($month)){
                File::makeDirectory($month, 0777, true);
            }
            if($request->file('profile_photo_path')) {
                $request->validate([
                    'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
                ]);
                $image = $request->file('profile_photo_path')->store(now()->year . '/' . sprintf("%02d", now()->month));
            }
            $user->update($request->validated() + ['profile_photo_path' => $request->file('profile_photo_path') ? $image : $user->profile_photo_path]);
            return redirect()->route('profile');
        }

        return redirect()->route('profile');
    }
}
