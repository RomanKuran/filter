<?php

namespace App\Http\Controllers;

class ApartmentController extends Controller
{
  public function index()
  {
    return view('apartment_filter');
  }
}
