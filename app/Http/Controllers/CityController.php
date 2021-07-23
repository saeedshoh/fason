<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::where('name', 'like', '%' . $request->search . '%')
            ->paginate(30)
            ->withQueryString();
        if ($request->ajax()) {
            return response()->json(
                view(
                    'dashboard.ajax.cities',
                    compact('cities')
                )->render()
            );
        }
        return view('dashboard.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => ' Города',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('cities.index'))->with(['class' => 'success', 'message' => 'Город  «'.$city->name.'»  успешно добавлен!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('dashboard.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $page = '';
        if(strrpos($request->previous,'?')){
            $page = substr($request->previous, strrpos($request->previous,'?'));
        }
        $city->update($request->all());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => ' Города',
            'description' => 'Название: ' . $request->name
        ]);
        return redirect(route('cities.index'))->with(['class' => 'primary', 'message' => 'Город  «'.$city->name.'»  успешно изменена!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => ' Города',
            'description' => 'Название: ' . $city->name
        ]);
        return redirect(route('cities.index'))->with(['class' => 'danger', 'message' => 'Город  «'.$city->name.'»  успешно удален!']);

    }
}
