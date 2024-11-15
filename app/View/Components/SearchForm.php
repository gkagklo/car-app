<?php

namespace App\View\Components;

use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $makers = Maker::all();
        $models = Model::all();
        $states = State::all();
        $cities = City::all();
        $carTypes = CarType::all();
        $fuelTypes = FuelType::all();
        return view('components.search-form', compact('makers', 'models', 'states', 'cities', 'carTypes', 'fuelTypes'));
    }
}
