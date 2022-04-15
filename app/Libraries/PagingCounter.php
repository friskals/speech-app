<?php

namespace App\Libraries;

use Illuminate\Http\Request;

class PagingCounter
{
    /**
     * Default number of item per page
     */
    private const DEFAULT_PER_PAGE = 15;

    /**
     * Get number of item in a page based on the given request
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return int 
     */
    public static function countItemPerPage($query, Request $request)
    {
        return $request->get('page') == 'all' ? ($query->count()) : ($request->has('per_page') ? $request->get('per_page') : self::DEFAULT_PER_PAGE);
    }
}
