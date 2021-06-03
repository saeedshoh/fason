<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Store;
use App\Models\Category;
use App\Models\Monetization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MonetizationRequest;

class MonetizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monetizations = Monetization::get();
        $monetizationsCategories = Category::where('is_monetized', true)->withCount('monetizations')->get();
        $monetizations_categories_count = DB::table('category_monetization')->count();
        $personalisations = Store::where('is_monetized', true)->withCount('monetizations')->get();
        $personalisations_count = DB::table('monetization_store')->count();
        return view('dashboard.monetizations.index', compact('monetizations', 'personalisations', 'monetizationsCategories', 'monetizations_categories_count', 'personalisations_count'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalisationsIndex()
    {
        $monetizations = Monetization::get();
        $monetizationsCategories = Category::where('is_monetized', true)->withCount('monetizations')->get();
        $monetizations_categories_count = DB::table('category_monetization')->count();
        $personalisations = Store::where('is_monetized', true)->withCount('monetizations')->get();
        $personalisations_count = DB::table('monetization_store')->count();
        return view('dashboard.monetizations.personalisations.index', compact('monetizations', 'personalisations', 'monetizationsCategories', 'monetizations_categories_count', 'personalisations_count'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryMonetizationsIndex()
    {
        $monetizations = Monetization::get();
        $monetizationsCategories = Category::where('is_monetized', true)->withCount('monetizations')->get();
        $monetizations_categories_count = DB::table('category_monetization')->count();
        $personalisations = Store::where('is_monetized', true)->withCount('monetizations')->get();
        $personalisations_count = DB::table('monetization_store')->count();
        return view('dashboard.monetizations.categories.index', compact('monetizations', 'personalisations', 'monetizationsCategories', 'monetizations_categories_count', 'personalisations_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $previous = url()->previous();
        $stores = Store::get();
        $categories = Category::get();
        return view('dashboard.monetizations.create', compact('stores', 'previous', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MonetizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonetizationRequest $request)
    {
        $monetization = Monetization::create($request->validated());
        if ($request->store_id) {
            $store = Store::find($request->store_id);
            $store->update(['is_monetized' => true]);
            $store->monetizations()->attach($monetization->id);
        }
        if ($request->category_id) {
            $category = Category::find($request->category_id);
            $category->update(['is_monetized' => true]);
            $category->monetizations()->attach($monetization->id);
        }
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => 'Монетизация',
            'description' => 'Сумма от: ' . $request->min . ', Сумма до: ' . $request->max . ', Процентная ставка: ' . $request->margin
        ]);
        return redirect(route('monetizations.index'))->with('success', 'Монетизация успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function show(Monetization $monetization)
    {
        $monetizationsCount = Monetization::count();
        $personalisationsCount = DB::table('monetization_store')->count();
        $categoriesCount = DB::table('category_monetization')->count();
        $monetized = Store::find($monetization->id);
        $monetizations = $monetized->monetizations;
        return view('dashboard.monetizations.show', compact('monetizationsCount', 'personalisationsCount', 'categoriesCount', 'monetized', 'monetizations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function showCategoryMonetization($id)
    {
        $monetizationsCount = Monetization::count();
        $personalisationsCount = DB::table('monetization_store')->count();
        $categoriesCount = DB::table('category_monetization')->count();
        $monetized = Category::where('id', $id)->first();
        $monetizations = $monetized->monetizations;
        return view('dashboard.monetizations.show', compact('monetizationsCount', 'personalisationsCount', 'categoriesCount', 'monetized', 'monetizations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function showStoreMonetization($id)
    {
        $monetizationsCount = Monetization::count();
        $personalisationsCount = DB::table('monetization_store')->count();
        $categoriesCount = DB::table('category_monetization')->count();
        $monetized = Store::where('id', $id)->first();
        $monetizations = $monetized->monetizations;
        return view('dashboard.monetizations.show', compact('monetizationsCount', 'personalisationsCount', 'categoriesCount', 'monetized', 'monetizations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function edit(Monetization $monetization)
    {
        return view('dashboard.monetizations.edit', compact('monetization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MonetizationRequest  $request
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function update(MonetizationRequest $request, Monetization $monetization)
    {
        $monetization->update($request->validated());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => 'Монетизация',
            'description' => 'Сумма от: ' . $request->min . ', Сумма до: ' . $request->max . ', Процентная ставка: ' . $request->margin
        ]);
        return redirect(route('monetizations.index'))->with('success', 'Монетизация успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monetization  $monetization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monetization $monetization)
    {
        Log::create([
            'user_id'   => Auth::user()->id,
            'action'    => 3,
            'table'     => 'Монетизация',
            'description' => 'Сумма от: ' . $monetization->min . ', Сумма до: ' . $monetization->max . ', Процентная ставка: ' . $monetization->margin
        ]);
        $monetization->delete();
        return redirect(route('monetizations.index'))->with('success', 'Монетизация успешно удалена!');
    }
}
