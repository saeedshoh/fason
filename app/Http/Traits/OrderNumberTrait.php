<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

trait OrderNumberTrait {

    /**
     * Change item order number
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function changeOrder(Request $request, Model $model)
    {
        if($request->ajax()) {
            $prev_order_number = $model->where('order_number', '<', $request->order_number)->max('order_number');
            $prev = $model->where('order_number', $prev_order_number)->first();

            $next_order_number = $model->where('order_number', '>', $request->order_number)->min('order_number');
            $next = $model->where('order_number', $next_order_number)->first();

            if($request->type == 1) {
                $model->where('id', $prev->id)->update(['order_number' => $request->order_number]);
                $model->where('id', $request->id)->update(['order_number' => $prev_order_number]);
            } else {
                $model->where('id', $next->id)->update(['order_number' => $request->order_number]);
                $model->where('id', $request->id)->update(['order_number' => $next_order_number]);
            }
        } else {
            abort(404);
        }
    }
}
