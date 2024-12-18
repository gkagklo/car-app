<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImages;
use App\Models\CarType;
use App\Models\City;
use App\Models\FavouriteCars;
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
        $my_cars = Car::where("user_id", $user_id)->orderBy("created_at", "desc")->paginate(10);
        return view('cars.index', compact('my_cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $models = Model::all();
        $car_types = CarType::all();
        $fuel_types = FuelType::all();
        $states = State::all();
        $cities = City::all();

        return view('cars.create', compact('makers', 'models', 'car_types', 'fuel_types', 'states', 'cities'));
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
           
        return redirect()->route('cars.index')->with('success','Car created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $user_cars_count = Car::where("user_id", $car->user_id)->count();
        return view('cars.show', compact('car', 'user_cars_count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        Gate::authorize('update', $car);
        $makers = Maker::all();
        $models = Model::all();
        $car_types = CarType::all();
        $fuel_types = FuelType::all();
        $states = State::all();
        $cities = City::all();
        $car_images = CarImages::where("car_id", $car->id)->get();
        $car = Car::find($car->id);
        return view('cars.edit', compact('car', 'car_types', 'makers', 'models', 'fuel_types','states', 'cities', 'car_images'));
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
        return redirect()->route('cars.index')->with('success','Car updated successfully');
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
        return redirect()->route('cars.index')->with('error','Car deleted successfully');
    }

    public function search(Request $request)
    {
        
        $maker_id = $request->maker_id;
        $model_id = $request->model_id;
        $state_id = $request->state_id;
        $city_id = $request->city_id;
        $car_type_id = $request->car_type_id;
        $year_from = $request->year_from;
        $year_to = $request->year_to;
        $price_from = $request->price_from;
        $price_to = $request->price_to;
        $fuel_type_id = $request->fuel_type_id;
        $mileage = $request->mileage;
 
        $sort = 'created_at';
        $order = 'desc';
        if($request->sort != null && $request->sort == 'price'){
            $sort = 'price';
            $order = 'asc';
        }elseif( $request->sort != null && $request->sort == '-price'){
            $sort = 'price';
            $order = 'desc';
        }
        if($request->sort != null && $request->sort == 'year'){
            $sort = 'year';
            $order = 'asc';
        }elseif( $request->sort != null && $request->sort == '-year'){
            $sort = 'year';
            $order = 'desc';
        }
        if($request->sort != null && $request->sort == 'mileage'){
            $sort = 'mileage';
            $order = 'asc';
        }elseif( $request->sort != null && $request->sort == '-mileage'){
            $sort = 'mileage';
            $order = 'desc';
        }
        if($request->sort != null && $request->sort == 'created_at'){
            $sort = 'created_at';
            $order = 'asc';
        }elseif( $request->sort != null && $request->sort == '-created_at'){
            $sort = 'mileage';
            $order = 'desc';
        }

        $makers = Maker::all();
        $models = Model::all();
        $carTypes = CarType::all();
        $states = State::all();
        $cities = City::all();
        $fuelTypes = FuelType::all();

        $cars = Car::when($maker_id, function ($q) use ($maker_id) {
            return $q->where('maker_id', $maker_id);
        })
        ->when($model_id, function ($q) use ($model_id) {
            return $q->where('model_id', $model_id);
        })
        ->when($state_id, function ($q) use ($state_id) {
            return $q->where('state_id', $state_id);
        })
        ->when($city_id, function ($q) use ($city_id) {
            return $q->where('city_id', $city_id);
        })
        ->when($car_type_id, function ($q) use ($car_type_id) {
            return $q->where('car_type_id', $car_type_id);
        })
        ->when($year_from, function ($q) use ($year_from) {
            return $q->where('year', '>=', $year_from);
        })
        ->when($year_to, function ($q) use ($year_to) {
            return $q->where('year', '<=', $year_to);
        })
        ->when($price_from, function ($q) use ($price_from) {
            return $q->where('price', '>=', $price_from);
        })
        ->when($price_to, function ($q) use ($price_to) {
            return $q->where('price', '<=', $price_to);
        })
        ->when($fuel_type_id, function ($q) use ($fuel_type_id) {
            return $q->where('fuel_type_id', $fuel_type_id);
        })
        ->when($mileage, function ($q) use ($mileage) {
            return $q->where('mileage', '<=', $mileage);
        })
        ->where('published', 1)
        ->orderBy($sort, $order)
        ->paginate(15)->withQueryString();

        return view('cars.search', compact(
        'maker_id',
        'model_id',
        'state_id',
        'city_id',
        'car_type_id',
        'year_from',
        'year_to',
        'price_from',
        'price_to',
        'fuel_type_id',
        'mileage',
        'makers',
        'models',
        'carTypes',
        'states',
        'cities',
        'fuelTypes',
        'cars'
    ));
    }

    public function editCarImages(Car $car)
    {
        Gate::authorize('update', $car);
        $car_images = CarImages::where("car_id", $car->id)->orderBy("position")->get();
        return view('cars.car_images', compact('car_images','car'));
    }
    
    public function updateCarImages(Request $request, Car $car)
    {
        Gate::authorize('update', $car);
        $index = 0;
        $car_images = CarImages::where("car_id", $car->id)->orderBy("position")->get();
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

        return redirect()->back()->with('success','Car images updated successfully');
    }

    public function carImageCreate(Request $request, Car $car)
    {
        Gate::authorize('create', $car);
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
            $images[] = ['name' => $imageName, 'car_id' => $car->id, 'position' => $latestPosition];
        }
  
        // Store images in the database using create method
        foreach ($images as $imageData) {
            CarImages::create($imageData);
        }

        return redirect()->back()->with('success','Car images added successfully');
    }

    public function favourite_cars()
    {
        $user_id = auth()->user()->id;
        $favourite_cars = FavouriteCars::where("user_id", $user_id)->with('car')->paginate(15);
        return view('cars.favourite_cars', compact('favourite_cars'));
    }

    public function deleteFavouriteCar(Car $car)
    {
        FavouriteCars::where("car_id", $car->id)->delete();
        return redirect()->back();
    }

    public function createFavouriteCar(Car $car)
    {
        FavouriteCars::create([
            'car_id' => $car->id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

}
