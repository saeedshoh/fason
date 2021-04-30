<?php

namespace App\Http\Traits;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

trait FilterableTrait
{
	/**
	 * Filter a result set.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  \App\Filters\QueryFilter  $filters
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeFilter(Builder $query, QueryFilter $filters)
	{
		return $filters->apply($query);
	}
}
