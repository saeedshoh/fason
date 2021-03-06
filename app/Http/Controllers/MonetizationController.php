<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Monetization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MonetizationRequest;

class MonetizationController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create-monitization', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-monitization', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-monitization', ['only' => ['destroy']]);
        $this->middleware('permission:read-monitization', ['only' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $monetizations = Monetization::orderBy('id', 'DESC')->paginate(30);
        $monetizations_categories_count = DB::table('category_monetization')->distinct('category_id')->count();
        $personalisations_count = DB::table('monetization_store')->distinct('store_id')->count();
        return view('dashboard.monetizations.index', compact('monetizations', 'monetizations_categories_count', 'personalisations_count'));
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
        $monetizations_categories_count = DB::table('category_monetization')->distinct('category_id')->count();
        $personalisations = Store::where('is_monetized', true)->orderBy('id', 'DESC')->withCount('monetizations')->paginate(30);
        $personalisations_count = DB::table('monetization_store')->distinct('store_id')->count();
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
        $monetizationsCategories = Category::where('is_monetized', true)->orderBy('id', 'DESC')->withCount('monetizations')->paginate(30);
        $monetizations_categories_count = DB::table('category_monetization')->distinct('category_id')->count();
        $personalisations = Store::where('is_monetized', true)->withCount('monetizations')->get();
        $personalisations_count = DB::table('monetization_store')->distinct('store_id')->count();
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

        $check = $this->checkRangeMonetization($request);
        if ($check >=  1) {
            return redirect(url($request->previous))->with(['class' => 'warning', 'message' => '?????????????????? ???????? ???????????????? ?????????? ?????? ????????????????????']);
        }

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
            'table'  => '??????????????????????',
            'description' => '?????????? ????: ' . $request->min . ', ?????????? ????: ' . $request->max . ', ???????????????????? ????????????: ' . $request->margin
        ]);
        return redirect(url($request->previous))->with(['class' => 'success', 'message' => ' ??????????????????????   ??#' . $monetization->id . '??  ?????????????? ??????????????????!']);
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
        $personalisationsCount = DB::table('monetization_store')->distinct('store_id')->count();
        $categoriesCount = DB::table('category_monetization')->distinct('category_id')->count();
        $monetized = Store::find($monetization->id);
        $monetizations = $monetized->monetizations->sortByDesc('id');
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
        $personalisationsCount = DB::table('monetization_store')->distinct('store_id')->count();
        $categoriesCount = DB::table('category_monetization')->distinct('category_id')->count();
        $monetized = Category::where('id', $id)->first();
        $monetizations = $monetized->monetizations->sortByDesc('id');
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
        $personalisationsCount = DB::table('monetization_store')->distinct('store_id')->count();
        $categoriesCount = DB::table('category_monetization')->distinct('category_id')->count();
        $monetized = Store::where('id', $id)->first();
        $monetizations = $monetized->monetizations->sortByDesc('id');
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
        $previous = url()->previous();
        return view('dashboard.monetizations.edit', compact('monetization', 'previous'));
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
       $check =  $this->updateMonetization($request, $monetization);

       if ($check >=  1) {
        return redirect(url($request->previous))->with(['class' => 'warning', 'message' => '?????????????????? ???????? ???????????????? ?????????? ?????? ????????????????????']);
    }

        $monetization->update($request->validated());
        Log::create([
            'user_id' => Auth::user()->id,
            'action' => 1,
            'table'  => '??????????????????????',
            'description' => '?????????? ????: ' . $request->min . ', ?????????? ????: ' . $request->max . ', ???????????????????? ????????????: ' . $request->margin
        ]);

        if (Str::contains($request->previous, 'dashboard/monetizations')) {
            return redirect()->route('monetizations.index')->with(['class' => 'primary', 'message' => '?????????????????????? ??#' . $monetization->id . '?? ?????????????? ??????????????????.']);
        } else {
            return redirect(url($request->previous))->with(['class' => 'primary', 'message' => '?????????????????????? ??#' . $monetization->id . '?? ?????????????? ??????????????????.']);
        }
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
            'table'     => '??????????????????????',
            'description' => '?????????? ????: ' . $monetization->min . ', ?????????? ????: ' . $monetization->max . ', ???????????????????? ????????????: ' . $monetization->margin
        ]);
        $monetization->delete();
        return redirect()->back()->with(['class' => 'danger', 'message' => '?????????????????????? ??#' . $monetization->id . '?? ?????????????? ??????????????.']);
    }

    public function price(Request $request)
    {
        $store = Store::withoutGlobalScopes()->find($request->store_id);
        $category = Category::withoutGlobalScopes()->find($request->category_id);

        $common_monetization = 0;
        $category_monetization = 0;
        $store_monetization = 0;

        if ($category->is_monetized) {
            foreach ($category->monetizations as $monetization) {
                if (($request->price >= $monetization->min && $request->price < $monetization->max) || ($request->price > $monetization->min && $request->price <= $monetization->max)) {
                    $category_monetization = $request->price * ($monetization->margin / 100) + $monetization->added_val;
                }
            }
        }

        if ($store->is_monetized) {
            if ($store->monetizations->first()) {
                foreach ($store->monetizations as $monetization) {
                    if (($request->price >= $monetization->min && $request->price < $monetization->max) || ($request->price > $monetization->min && $request->price <= $monetization->max)) {
                        $store_monetization = $request->price * ($monetization->margin / 100) + $monetization->added_val;
                    }
                }
            }
        }

        $monetizations = Monetization::doesntHave('stores')->doesntHave('categories')->get();
        if ($monetizations->isNotEmpty()) {
            foreach ($monetizations as $monetization) {
                if (($request->price >= $monetization->min && $request->price < $monetization->max) || ($request->price > $monetization->min && $request->price <= $monetization->max)) {
                    $common_monetization = $request->price * ($monetization->margin / 100) + $monetization->added_val;
                }
            }
        }

        return ceil($request->price + $common_monetization + $store_monetization + $category_monetization);
    }

    public function checkRangeMonetization(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $check = Monetization::where(function ($query) use ($min, $max) {
            $query->whereBetween('min', [$min, $max])
                ->orWhereBetween('max', [$min, $max]);
        })->count();
        return $check;
    }

    public function updateMonetization(Request $request, Monetization $monetization)
    {
        $collection  = Monetization::whereNotIn('id', [$monetization->id])->get();
        $min = $collection->whereBetween('min', [$request->min, $request->max]);
        $max = $collection->whereBetween('max', [$request->min, $request->max]);

        return $min->count() + $max->count();
    }

}
