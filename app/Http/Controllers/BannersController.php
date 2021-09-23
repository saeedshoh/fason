<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Banners;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Traits\ImageInvTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BannersRequest;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    use ImageInvTrait;

    public function __construct()
    {
        $this->middleware('permission:create-banners', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-banners', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-banners', ['only' => ['destroy']]);
        $this->middleware('permission:read-banners', ['only' => ['index', 'show']]);
    }


    public function sliders()
    {
        $sliders = Banners::where('type', 1)->paginate(30);
        return view('dashboard.banners.sliders', compact('sliders'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $banners = Banners::where('type', 2)->paginate(30);
        return view('dashboard.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $back = url()->previous();
        if (Str::contains($back, 'banners')) {
            if (Banners::where('type', 2)->count() == 2) {
                return redirect()->route('banners.index')->with(['class' => 'warning', 'message' => 'Вы не можете вставить новый баннер, потому что все позиции заняты.']);
            }
        } else {
            if (Banners::where('type', 1)->count() == 7) {
                return redirect()->route('banners.sliders')->with(['class' => 'warning', 'message' => 'Вы не можете вставить новый слайд, потому что все позиции заняты']);
            }
        }
        $sliders_position = Banners::where('type', 1)->pluck('position')->toArray();
        $banners_position = Banners::where('type', 2)->pluck('position')->toArray();
        return view('dashboard.banners.create', compact('back', 'sliders_position', 'banners_position'));
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
            'image' => 'required',
        ]);

        $base64_image = $request->image;
        $year_month = now()->year . '/' . sprintf("%02d", now()->month);
        $image = $year_month . '/' . uniqid() . '.jpg';
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
            $data = substr($base64_image, strpos($base64_image, ',') + 1);
            $data = base64_decode($data);
            Storage::disk('public')->put($image, $data);
        };
        Banners::create($request->validated() + ['image' => $image]);
        $type = $request->type == 1 ? 'Слайдер' : 'Баннер';
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => 'Атрибуты',
            'description' => 'Позиция: ' . $request->position . ', Ссылка: ' . $request->url . ', Тип: ' . $type . ', Изображение: ' . $image
        ]);
        if ($request->type == 1) {
            return redirect()->route('banners.sliders')->with(['class' => 'success', 'message' => 'Слайдер успешно добавлен!']);
        } else {
            return redirect()->route('banners.index')->with(['class' => 'success', 'message' => 'Баннер успешно добавлен!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banners $banner)
    {
        $back = url()->previous();
        $sliders_position = Banners::where('type', 1)->pluck('position')->toArray();
        $banners_position = Banners::where('type', 2)->pluck('position')->toArray();
        return view('dashboard.banners.edit', compact('banner', 'back', 'sliders_position', 'banners_position'));
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
        $page = '';
        if (strrpos($request->previous, '?')) {
            $page = substr($request->previous, strrpos($request->previous, '?'));
        }
        $myImage = 'Не установлен';
        if ($request->image != null && $request->image != $banner->image) {
            $request->validate([
                'image' => 'required',
            ]);
            if ($request->image != $banner->image) {
                if (Storage::exists($banner->image)) {
                    Storage::delete($banner->image);
                }
                $base64_image = $request->image;
                $year_month = now()->year . '/' . sprintf("%02d", now()->month);
                $image = $year_month . '/' . uniqid() . '.jpg';
                if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                    $data = substr($base64_image, strpos($base64_image, ',') + 1);
                    $data = base64_decode($data);
                    Storage::disk('public')->put($image, $data);
                };
            }
            $banner->update([
                'image' => $image,
            ]);
            $myImage = $image;
        }
        $type = $request->type == 1 ? 'Слайдер' : 'Баннер';

        $banner->update($request->validated());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 2,
            'table'  => 'Атрибуты',
            'description' => 'Позиция: ' . $request->position . ', Ссылка: ' . $request->url . ', Тип: ' . $type . ', Изображение: ' . $myImage
        ]);
        if ($request->type == 1) {
            return redirect()->route('banners.sliders')->with(['class' => 'primary', 'message' => 'Слайдер успешно обновлен!']);
        } else {
            return redirect()->route('banners.index')->with(['class' => 'primary', 'message' => 'Баннер успешно обновлен!']);
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
        $type = $banner->type == 1 ? 'Слайдер' : 'Баннер';
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 3,
            'table'  => 'Атрибуты',
            'description' => 'Позиция: ' . $banner->position . ' Ссылка: ' . $banner->url . ' Тип: ' . $type . ' Изображение: ' . $banner->image
        ]);
        $banner->delete();

        if ($banner->type == 1) {
            return redirect()->route('banners.sliders')->with(['class' => 'danger', 'message' => 'Слайдер успешно удален!']);
        } else {
            return redirect()->route('banners.index')->with(['class' => 'danger', 'message' => 'Баннер успешно удален!']);
        }
    }
}
