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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $my_cars = Car::where("user_id", $user_id)->orderBy("created_at", "desc")->get();
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
        Gate::authorize('update', $car);
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
        Gate::authorize('update', $car);
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

    public function destroy(Car $car)
    {
        Gate::authorize('delete', $car);
        $car = Car::find($car->id);
        $images = $car->images;
        foreach($images as $image){
            $file_path = public_path().'/images/'.$image->name;
            File::delete($file_path);
        }
        $car->images()->delete();
        $car->carFeature()->delete();
        $car->delete();
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
    
    public function updateCarImages(Request $request, $id)
    {
        $index = 0;
        $car_images = CarImages::where("car_id", $id)->orderBy("position")->get();
        foreach($car_images as $car_image){
            $car_image->update([
                'position' => $request->positions[$index]
            ]);
            $index++;
        }
       
        //Delete images on table
        if($request->delete_images){
            $deletedImagesIds = $request->delete_images;
            foreach($deletedImagesIds as $imageId){
                $image_name = CarImages::where('id', $imageId)->first()->name;
                //Delete image from public folder
                $file_path = public_path().'/images/'.$image_name;
                File::delete($file_path);
                CarImages::find($imageId)->delete();
            }
        }

        return redirect()->back();
    }

    public function carImageCreate(Request $request, $id)
    {
        $car = Car::find($id);
        $latestPosition = $car->latestImage->position;
        
        // Validate incoming request data
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Initialize an array to store image information
        $images = [];

        // Process each uploaded image
        foreach($request->file('images') as $image) {
            $latestPosition++;
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
              
            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);
  
            // Add image information to the array
            $images[] = ['name' => $imageName, 'car_id' => $id, 'position' => $latestPosition];
        }
  
        // Store images in the database using create method
        foreach ($images as $imageData) {
            CarImages::create($imageData);
        }

        return redirect()->back();
    }

}
