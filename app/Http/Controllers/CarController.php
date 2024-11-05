<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImages;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_cars = Car::orderBy("created_at", "desc")->get();
        return view('car.index', compact('my_cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $car_types = CarType::all();
        $fuel_types = FuelType::all();
        $states = State::all();

        return view('car.create', compact('makers', 'car_types', 'fuel_types', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        
        $car = Car::create($request->validated());
        CarFeatures::create([
            'car_id'=> $car->id,
            'abs'=> $request->abs ?? 0,
            'air_conditioning'=> $request->air_conditioning ?? 0,
            'power_windows'=> $request->power_windows ?? 0,
            'power_door_locks'=> $request->power_door_locks ?? 0,
            'cruise_control'=> $request->cruise_control ?? 0,
            'bluetooth_connectivity'=> $request->bluetooth_connectivity ?? 0,
            'remote_start'=> $request->remote_start ?? 0,
            'gps_navigation'=> $request->gps_navigation ?? 0,
            'heated_seats'=> $request->heated_seats ?? 0,
            'climate_control'=> $request->climate_control ?? 0,
            'rear_parking_sensors'=> $request->rear_parking_sensors ?? 0,
            'leather_seats'=> $request->leather_seats ?? 0,
        ]);

        // Validate incoming request data
        // $request->validate([
        //     'images' => 'required|array',
        //     'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
  
        // Initialize an array to store image information
        $images = [];
        $position = 0;
        // Process each uploaded image
        foreach($request->file('images') as $image) {
            $position++;
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
              
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
  
            // Add image information to the array
            $images[] = ['name' => $imageName, 'car_id' => $car->id, 'position' => $position];
        }
  
        // Store images in the database using create method
        foreach ($images as $imageData) {
            CarImages::create($imageData);
        }
           
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('car.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $makers = Maker::all();
        $models = Model::where("maker_id", $car->maker_id)->get();
        $car_types = CarType::all();
        $fuel_types = FuelType::all();
        $states = State::all();
        $cities = City::where("state_id", $car->state_id)->get();
        $car_images = CarImages::where("car_id", $car->id)->get();
        $car = Car::find($car->id);
        return view('car.edit', compact('car', 'car_types', 'makers', 'models', 'fuel_types','states', 'cities', 'car_images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $car->update($request->validated());
        
        CarFeatures::where("car_id", $car->id)->update([
            'abs'=> $request->abs ?? 0,
            'air_conditioning'=> $request->air_conditioning ?? 0,
            'power_windows'=> $request->power_windows ?? 0,
            'power_door_locks'=> $request->power_door_locks ?? 0,
            'cruise_control'=> $request->cruise_control ?? 0,
            'bluetooth_connectivity'=> $request->bluetooth_connectivity ?? 0,
            'remote_start'=> $request->remote_start ?? 0,
            'gps_navigation'=> $request->gps_navigation ?? 0,
            'heated_seats'=> $request->heated_seats ?? 0,
            'climate_control'=> $request->climate_control ?? 0,
            'rear_parking_sensors'=> $request->rear_parking_sensors ?? 0,
            'leather_seats'=> $request->leather_seats ?? 0,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("delete");
    }

    public function search()
    {
        return view('car.search');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchModel(Request $request): JsonResponse
    {
        $data['models'] = Model::where("maker_id", $request->maker_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request): JsonResponse
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    public function editCarImages($id)
    {
        $car_info = Car::find($id);
        // dd($car_info->year);
        $car_images = CarImages::where("car_id", $id)->orderBy("position")->get();
        return view('car.car_images', compact('car_images','car_info'));
    }
    
}
