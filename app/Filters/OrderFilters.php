<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderFilters extends QueryFilter
{
	/**
	 * Filtering with given product_id
	 *
	 * @param  int  $product_id
	 *
	 * @return Builder
	 */
	public function product_id($product_id = '')
	{
        if($product_id != '')
        return $this->builder->where('product_id', $product_id);
	}

    /**
	 * Filtering with given store_id
	 *
	 * @param  int  $store_id
	 *
	 * @return Builder
	 */
	public function store_id($store_id = '')
	{
        if($store_id != '')
        return $this->builder->WhereHas('store', function($store) use ($store_id){
            $store->where('id', $store_id); });
	}

    /**
     * Filtering with given user_id
     *
     * @param int $user_id
     *
     * @return Builder
     */
	 public function user_id($user_id = '')
	 {
        if($user_id != '')
        return $this->builder->where('user_id', $user_id);
	 }

    /**
	 * Filtering with given total_from
	 *
	 * @param  $total_from
	 *
	 * @return Builder
	 */
	public function total_from($total_from = '')
	{
        if($total_from != '')
        return $this->builder->where('total', '>=', $total_from);
	}

    /**
	 * Filtering with given total_to
	 *
	 * @param  $total_to
	 *
	 * @return Builder
	 */
	public function total_to($total_to = '')
	{
        if($total_to != '')
        return $this->builder->where('total', '<=', $total_to);
	}

    /**
	 * Filtering with given margin_from
	 *
	 * @param  $margin_from
	 *
	 * @return Builder
	 */
	public function margin_from($margin_from = '')
	{
        if($margin_from != '')
        return $this->builder->where('margin', '>=', $margin_from);
	}

    /**
	 * Filtering with given margin_to
	 *
	 * @param  $margin_to
	 *
	 * @return Builder
	 */
	public function margin_to($margin_to = '')
	{
        if($margin_to != '')
        return $this->builder->where('margin', '<=', $margin_to);
	}

    /**
	 * Filtering with given date_from
	 *
	 * @param  $date_from
	 *
	 * @return Builder
	 */
    public function date_from($date_from = '')
    {
        if($date_from != '')
    	return $this->builder->where('created_at', '>=', $date_from);
    }

    /**
	 * Filtering with given date_to
	 *
	 * @param  $date_to
	 *
	 * @return Builder
	 */
    public function date_to($date_to = '')
    {
        if($date_to != '')
    	return $this->builder->where('created_at', '<=', $date_to);
    }
}
