<?php

namespace App\Http\Controllers;

use App\apartment;
use Illuminate\Http\Request;

class ApiFilterController extends Controller
{
  public function getAll()
  {
    return response()->json(apartment::all());
  }

  public function search(Request $request)
  {
    $query = Apartment::query();
    $query->when($request->name, function ($q) {
      return $q->where('name', 'like', "%" . request('name') . "%");
    });
    $query->when($request->min_price && $request->max_price, function ($q) {
      return $q->where('price', '>=', request('min_price'))->where('price', '<=', request('max_price'));
    });
    $query->when($request->bedrooms, function ($q) {
      return $q->where('bedrooms', request('bedrooms'));
    });
    $query->when($request->bathrooms, function ($q) {
      return $q->where('bathrooms', request('bathrooms'));
    });
    $query->when($request->storeys, function ($q) {
      return $q->where('storeys', request('storeys'));
    });
    $query->when($request->garages, function ($q) {
      return $q->where('garages', request('garages'));
    });

    return response()->json($query->get());
  }
}
