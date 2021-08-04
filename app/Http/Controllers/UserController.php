<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\StoreEdit;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Traits\ImageInvTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    use ImageInvTrait;

    public function __construct()
    {
        $this->middleware('permission:create-employee', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-employee', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-employee', ['only' => ['destroy']]);
        $this->middleware('permission:read-employee', ['only' => ['index', 'show']]);
    }

    public function contacts(Request $request)
    {
        $image = null;
        if ($request->ajax()) {

            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'city_id' => 'required'
            ]);
            $main_image_json = $request->profile_photo_path;
            $year_month = now()->year . '/' . sprintf("%02d", now()->month);

            $main_image = $year_month . '/' . uniqid() . '.jpg';

            $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
            if (!File::isDirectory($month)) {
                File::makeDirectory($month, 0777, true);
            }

            if ($request->profile_photo_path) {
                if (preg_match('/^data:image\/(\w+);base64,/', $main_image_json)) {
                    $data = substr($main_image_json, strpos($main_image_json, ',') + 1);
                    $data = base64_decode($data);
                    Storage::disk('public')->put($main_image, $data);

                    $image = $this->saveImage($main_image);
                };
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

    public function index(Request $request)
    {
        $users = User::where('status', 1)
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('store', function ($store) use ($request) {
                        $store->where('name',  'like', '%' . $request->search . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.users',
                    compact('users')
                )->render()
            );
        }
        return view('dashboard.users.index', compact('users'));
    }

    public function clients(Request $request)
    {
        $users = User::with('city')->where('status', 2)
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('store', function ($store) use ($request) {
                        $store->where('name',  'like', '%' . $request->search . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.users',
                    compact('users')
                )->render()
            );
        }
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
        $cities = City::get();
        return view('dashboard.users.create', compact('roles', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
        if (!File::isDirectory($month)) {
            File::makeDirectory($month, 0777, true);
        }
        if($request->has('phone')){
            $request->merge(['phone' => preg_replace('/[^0-9]/', '', $request->phone)]);
        }
        $request->validate([
            'profile_photo_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
            'name' => 'required',
            'phone' => 'required|digits:9',
            'email' =>  'required|email',
            'city_id' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);
        if($request->profile_photo_path) {
            $image = $request->file('profile_photo_path')->store(now()->year . '/' . sprintf("%02d", now()->month));
        }
        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'address' => $request->address,
            'phone' =>  str_replace(array('(', ')', ' ', '-'), '', $request->phone),
            'profile_photo_path' => $image ?? '',
            'password' => $request->password,
            'status' =>  1,
            'registered_at' => Carbon::now()
        ]);
        $user->attachRole($request->role);

        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => 'Пользователи',
            'description' => 'Имя: ' . $request->name . ',    Эл. почта: ' . $request->email . ', Телефон: ' . str_replace(' ', '', $request->phone)
        ]);
        return redirect(route('users.index'))->with(['class' => 'success', 'message' => 'Сотрудник   «'.$user->name.'»  успешно добавлен!']);

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
        session(['previous_user' => url()->previous()]);
        $cities = City::get();
        $roles = Role::get();
        return view('dashboard.users.edit', compact('user', 'cities', 'roles'));
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
        $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
        if (!File::isDirectory($month)) {
            File::makeDirectory($month, 0777, true);
        }
        if ($request->file('profile_photo_path')) {
            $request->validate([
                'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
            ]);
            $image = $request->file('profile_photo_path')->store(now()->year . '/' . sprintf("%02d", now()->month));
        }
        if($user->status === 1){
            if($request->has('phone')){
                $request->merge(['phone' => preg_replace('/[^0-9]/', '', $request->phone)]);
            }
            $request->validate([
                'profile_photo_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
                'name' => 'required',
                'phone' => 'required|digits:9',
                'email' =>  'required|email',
                'city_id' => 'required',
                'password' => 'required|confirmed|min:8'
            ]);
        }
        $user->update($request->all() + ['profile_photo_path' => $request->file('profile_photo_path') ? $image : $user->profile_photo_path]);
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => $user->status == 1 ? 'Пользователи' : 'Клиенты',
            'description' => 'Имя: ' . $request->name . ',    Эл. почта: ' . $request->email . ', Телефон: ' . str_replace(' ', '', $request->phone)
        ]);
        return redirect(session('previous_user'))->with(['class' => 'primary', 'message' => 'Сотрудник   «'.$user->name.'»  успешно изменен!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = false;
        $message = 'Невозможно удалить клиента, потому что у клиента зарегистрирован магазин/размещены заказы!';
        $name = $user->status == 1 ? 'users.index' : 'clients.index';
        if($user->orders->isEmpty() && !$user->store || $name == 'users.index') {
            if(Log::where('user_id', $user->id)->exists())
                Log::where('user_id', $user->id)->update(['user_id' => null]);
            $name == 'users.index' ? $message = 'Сотрудник   «'.$user->name.'»  успешно удален!' : 'Клиент   «'.$user->name.'»  успешно удален!';
            $deleted = $user->delete();
        }
        if($deleted) {
            Log::create([
                'user_id' => Auth::user()->id,
                'action' => 3,
                'table'  => $user->status == 1 ? 'Пользователи' : 'Клиенты',
                'description' => 'Имя: ' . $user->name . ',    Эл. почта: ' . $user->email . ', Телефон: ' . str_replace(' ', '', $user->phone)
            ]);
        }
        if ($user->status == 2 )
        {
            return redirect(route('clients.index'))->with(['class' => 'warning', 'message' => $message]);
        }
        return redirect(route('users.index'))->with(['class' => 'warning', 'message' => $message]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function ft_show()
    {
        if (Auth::user()) {
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
        // if (Auth::user()) {
        //     $user = User::find(Auth::user()->id);
        //     $month = public_path('/storage/') . now()->year . '/' . sprintf("%02d", now()->month);
        //     if (!File::isDirectory($month)) {
        //         File::makeDirectory($month, 0777, true);
        //     }
        //     if ($request->file('profile_photo_path')) {
        //         $request->validate([
        //             'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        //         ]);
        //         $image = $this->save($request, 'profile_photo_path');
        //     }
        //     $user->update($request->validated() + ['profile_photo_path' => $request->file('profile_photo_path') ? $image : $user->profile_photo_path]);
        //     return redirect()->route('profile');
        // }

        // return redirect()->route('profile');

        if ($request->ajax() && Auth::user()) {
            $data = $request->validated();
            $user = User::find(Auth::user()->id);
            $avatar_json = $request->avatar;
            $avatar_path = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid() . '.jpg';
            if (preg_match('/^data:image\/(\w+);base64,/', $avatar_json)) {
                $vtr = substr($avatar_json, strpos($avatar_json, ',') + 1);
                $vtr = base64_decode($vtr);
                Storage::disk('public')->put($avatar_path, $vtr);
                $data['profile_photo_path'] = $this->saveImage($avatar_path);
            }
            $user->update($data);
        }
    }

    public function changeAddress(Request $request)
    {
        if($request->ajax()) {
            if($request->table == 'order') {
                Order::where('id', $request->id)->update(['address' => $request->address]);
                return Order::where('id', $request->id)->pluck('address')->first();
            } else if ($request->table == 'store') {
                Store::where('id', $request->id)->update(['address' => $request->address]);
                StoreEdit::where('id', $request->id)->update(['address' => $request->address]);
                return Store::where('id', $request->id)->pluck('address')->first();
            }
        }
    }

    public function save(Request $request, $file_input_name)
    {
        $request->validate([
			$file_input_name 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp'
		]);

        $yearFolder = '/storage/' .now()->year. '/' .sprintf("%02d", now()->month);
        $folder = now()->year. '/' .sprintf("%02d", now()->month);

        $img = Image::make($request->file($file_input_name));
        $filename = '/'.uniqid() . '500x500.'.$request->file($file_input_name)->extension();

        $image = $yearFolder.$filename;

        $img_name = $folder.$filename;

        if (!file_exists(public_path($image))) {
            Storage::makeDirectory($folder);
        }

        $img->save(public_path($image));

        return $img_name;
    }
}
