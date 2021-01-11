<?php

namespace App\Http\Controllers;

use App\Models\Monetization;
use App\Http\Requests\MonetizationRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.monetizations.index', compact('monetizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.monetizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MonetizationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonetizationRequest $request)
    {
        Monetization::create($request->validated());
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
        //
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
