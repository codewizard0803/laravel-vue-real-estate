<?php
namespace App\Search;

use App\ListModel;
use Illuminate\Http\Request;

class ListSearch
{
    private $lists;

    public function __construct()
    {
        $this->lists = ListModel::query()->with('city');
    }

    public function search(Request $request)
    {
        if ($request->has('isOnSale')) {
            $this->handleIsOnSale($request->input('isOnSale'));
        }
        if ($request->has('country')) {
            $this->handleCountry($request->input('country'));
        }
        if ($request->has('price_less_than')) {
            $this->handlePriceLessThan($request->input('price_less_than'));
        }

        return $this->lists->get();
    }

    private function handleIsOnSale($isOnSale)
    {
        $this->lists->isOnSale($isOnSale);
    }

    private function handleCountry($country)
    {
        $this->lists->whereHas('city', function($query) use ($country) {
            $query->where('country', $country);
        });
    }

    private function handlePriceLessThan($price)
    {
        $this->lists->priceLessThan($price);
    }
}