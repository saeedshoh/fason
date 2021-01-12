<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Store;
use App\Models\Monetization;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MonetizationRequest;

class MonetizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monetizations = Monetization::get();
        $personalisations = Store::where('is_monetized', true)->get();
        return view('dashboard.monetizations.index', compact('monetizations', 'personalisations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalisationsIndex()
    {
        $monetizations = Monetization::get();
        $personalisations = Store::where('is_monetized', true)->get();
        return view('dashboard.monetizations.personalisations.index', compact('monetizations', 'personalisations'));
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
        return view('dashboard.monetizations.create', compact('stores', 'previous'));
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
        if($request->store_id) {
            $store = Store::find($request->store_id);
            $store->update(['is_monetized' => true]);
            $store->monetizations()->attach($monetization->id);
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
        $monetizations = Monetization::get();
        $personalisations = Store::where('is_monetized', true)->get();
        $store = Store::find($monetization->id);
        $personalized = $store->monetizations;
        // dd($personalized);
        return view('dashboard.monetizations.show', compact('monetizations', 'personalisations', 'store', 'personalized'));
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
