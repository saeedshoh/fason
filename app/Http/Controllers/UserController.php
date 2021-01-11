<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month, 0777, true);
        }
        if($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path')->store('public/'.now()->year . '/' . sprintf("%02d", now()->month));
        }

        $user = User::updateOrCreate(
            ['phone' => $request->phone],
            [
                'name' =>  $request->name,
                'address' =>  $request->address,
                'city_id' =>  $request->city_id,
                'profile_photo_path' =>  $image ? $image : null
            ]
        );

        Auth::loginUsingId($user->id);

        return redirect()->route('home');
    }

    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
