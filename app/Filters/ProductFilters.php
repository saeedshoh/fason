<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilters extends QueryFilter
{
	/**
	 * Sorting with given sort value
	 *
	 * @param  int  $sort
	 *
	 * @return Builder
	 */
	public function sort($sort)
	{
        if ($sort == 'new') {
            return $this->builder->orderByDesc('id');
        } elseif ($sort == 'cheap') {
            return $this->builder->orderBy('price');
        } elseif ($sort == 'expensive') {
            return $this->builder->orderByDesc('price');
        }
        return $this->builder;
	}

    /**
	 * Filtering with given priceFrom
	 *
	 * @param  int  $priceFrom
	 *
	 * @return Builder
	 */
	public function priceFrom($priceFrom = '')
	{
        if($priceFrom != '')
        return $this->builder->where('price', '>=', $priceFrom);
	}

    /**
     * Filtering with given priceTo
     *
     * @param int $priceTo
     *
     * @return Builder
     */
	 public function priceTo($priceTo = '')
	 {
        if($priceTo != '')
        return $this->builder->where('price', '<=', $priceTo);
	 }

    /**
	 * Filtering with given city
	 *
	 * @param  $city
	 *
	 * @return Builder
	 */
	public function city($city)
	{
        return $this->builder->whereHas('store', function($store) use ($city){
            $store->where('city_id', $city);
        });
	}
}
