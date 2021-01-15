<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function ordersStatistic()
    {
        $now = Carbon::now();
        $ordersByMonth = Order::whereBetween('updated_at', [$now->startOfMonth()->format('Y-m-d H:i'), $now->endOfMonth()->format('Y-m-d H:i')])->orderBy('updated_at')->get();
        $labels = [];
        $datas =[];
        $months = [];

        foreach ($ordersByMonth as $order) {
            $date = new Carbon($order['updated_at']);
            $date->locale('ru_RU');
            $months[$date->day][] = $order;
        }
        foreach($months as $key => $val){
            array_push($labels, $key);
            array_push($datas, count($val));
        }

        $sumOrders = Order::whereBetween('updated_at', [$now->startOfMonth()->format('Y-m-d H:i'), $now->endOfMonth()->format('Y-m-d H:i')])->orderBy('updated_at')->get();
        $orders = Order::select(
                    DB::raw('sum(total) as sums'),
                    DB::raw("DATE_FORMAT(updated_at,'%M') as months")
        )
        ->groupBy('months')->get();
        $invoices = Order::select(
                DB::raw('format(updated_at, "MM") as month'),
                DB::raw('SUM(total) as sum')
            )
            ->whereYear('updated_at', '=', Carbon::now()->year)
            ->orWhereYear('updated_at', '=', Carbon::now()->subYear()->year)
            ->groupBy('month')
            ->get();

        $salom = Order::whereYear('updated_at', $now->year)->select(DB::raw('SUM(total) as total'),DB::raw("DATE_FORMAT(updated_at,'%M') as months"))->groupBy('months')->get();
        return $invoices;
        // $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        // $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        // $ordersByDay = Order::whereDate('updated_at', Carbon::today())->get();
        // $ordersByWeek = Order::whereBetween('updated_at', [$weekStartDate, $weekEndDate])->get();
        // $ordersByMonth = Order::whereBetween('updated_at', [$now->startOfYear()->format('Y-m-d H:i'), $now->endOfYear()->format('Y-m-d H:i')])->orderBy('updated_at')->get();

        // $labels = [];
        // $labels['days'] =[];
        // $labels['weeks'] =[];
        // $labels['months'] =[];

        // $datas =[];
        // $datas['days'] = [];
        // $datas['weeks'] = [];
        // $datas['months'] = [];

        // $day = [];
        // $week = [];
        // $months = [];

        // foreach ($ordersByDay as $order) {
        //     $date = new Carbon($order['updated_at']);
        //     $date->locale('ru_RU');
        //     $day[$date->hour][] = $order;
        // }
        // foreach($day as $key => $val){
        //     array_push($labels['days'], $key);
        //     array_push($datas['days'], count($val));
        // }

        // foreach ($ordersByWeek as $order) {
        //     $date = new Carbon($order['updated_at']);
        //     $date->locale('ru_RU');
        //     $week[$date->dayName][] = $order;
        // }
        // foreach($week as $key => $val){
        //     array_push($labels['weeks'], $key);
        //     array_push($datas['weeks'], count($val));
        // }

        // foreach ($ordersByMonth as $order) {
        //     $date = new Carbon($order['updated_at']);
        //     $date->locale('ru_RU');
        //     $months[$date->monthName][] = $order;
        // }
        // foreach($months as $key => $val){
        //     array_push($labels['months'], $key);
        //     array_push($datas['months'], count($val));
        // }

        // $ordersByMonth = Order::orderBy('updated_at')->get()->groupBy(function($d) {
        //     return Carbon::parse($d->updated_at)->locale('ru_Ru')->monthName;
        // });

        // foreach ($ordersByMonth as $order){
        //     return $order->updated_at;
        // }
        // $datas = [];
        // $labels = [];
        // $months = [];

        // foreach ($ordersByMonth as $order) {
        //     $date = new Carbon($order->updated_at);
        //     echo $date;
        //     // $date->locale('ru_RU');
        //     // $months[$date->monthName][] = $order;
        // }
        // return $ordersByMonth;

        // foreach($months as $key => $val){
        //     array_push($labels, $key);
        //     array_push($datas, count($val));
        // }

        return response()->json(['labels' => $labels, 'datas' => $datas]);
    }
}
