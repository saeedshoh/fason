<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannersRequest;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function sliders()
    {
        $sliders = Banners::where('type', 1)->get();
        return view('dashboard.banners.sliders', compact('sliders'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $banners = Banners::where('type', 2)->get();
        return view('dashboard.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannersRequest $request)
    {
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
        ]);

        $image = $request->file('image')->store(now()->year . '/' . sprintf("%02d", now()->month));
        Banners::create($request->validated() + ['image' => $image]);
        if($request->type == 1) {
            return redirect()->route('banners.sliders')->with('success', 'Слайдер успешно добавлен!');

        }
        else {
            return redirect()->route('banners.index')->with('success', 'Баннер успешно добавлен!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banners $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banners $banner)
    {
        return view('dashboard.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannersRequest $request, Banners $banner)
    {
        if ($request->image != null && $request->image != $banner->image) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP',
            ]);
            if ($request->image != $banner->image) {
                if(Storage::exists($banner->image))
                Storage::delete($banner->image);
                $image = $request->file('image')->store(now()->year . '/' . sprintf("%02d", now()->month));
            }
            $banner->update([
                'image' => $image,
            ]);
        }
        $banner->update($request->validated());
        if($request->type == 1) {
            return redirect()->route('banners.sliders')->with('success', 'Слайдер успешно обновлен!');

        }
        else {
            return redirect()->route('banners.index')->with('success', 'Баннер успешно обновлен!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banners $banner)
    {
        $banner->delete();
        return redirect(route('banners.index'))->with('success', 'Успешно удалена!');
    }
}
