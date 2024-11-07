<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where("published", 1)->orderBy("created_at")->get();
        return view('home.index', compact('cars'));
    }
}
