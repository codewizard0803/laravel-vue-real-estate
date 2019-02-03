<?php

namespace App\Http\Controllers;

use App\ListModel;
use Illuminate\Http\Request;
use Validator;

class ListController extends Controller
{
    public function index(Request $request, \App\Search\ListSearch $listSearch)
    {
        return response()->json($listSearch->search($request));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            // TODO: not sure if max int can be save in db
            'price' => 'required|integer|digits_between:0,' . PHP_INT_MAX . '',
            'isOnSale' => 'required|boolean',
            'city_id' => 'required|exists:cities,id',
            'developer_id' => 'required|exists:developers,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        return response()->json(ListModel::create($request->all()));
    }

    public function show($id)
    {
        return response()->json(ListModel::findOrFail($id));
    }
}
