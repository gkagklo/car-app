<?php

namespace App\Http\Controllers;

use App\Models\FavouriteCars;
use App\Models\Maker;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where("published", 1)
        ->orderBy("created_at", "desc")
        ->get();
        return view('home.index', compact('cars'));
    }
}
