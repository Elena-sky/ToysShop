<?php

namespace App\Http\Controllers;

use App\Goods;
use App\GoodsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;


class SearchController extends Controller
{

    /**
     * Search by product name.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete()
    {
        $term = Input::get('term');
        $queries = Goods::where('name', 'LIKE', '%' . $term . '%')->get(['id', 'name as value']);

        return response()->json($queries);

    }


}
