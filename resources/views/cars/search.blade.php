<x-app-layout title="Search Car" bodyClass="page-search-car">
<main>
    <!-- Found Cars -->
    <section>
      <div class="container">
        <div class="sm:flex items-center justify-between mb-medium">
          <div class="flex items-center">
            <button class="show-filters-button flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" style="width: 20px">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
              </svg>
              Filters
            </button>
            <h2>Define your search criteria</h2>
          </div>

          <select class="sort-dropdown">
            <option value="">Order By</option>
            <option value="price">Price Asc</option>
            <option value="-price">Price Desc</option>
            <option value="year">Year Asc</option>
            <option value="-year">Year Desc</option>
            <option value="mileage">Mileage Asc</option>
            <option value="-mileage">Mileage Desc</option>
            <option value="created_at">Newest at the top</option>
            <option value="-created_at">Oldest at the top</option>
          </select>
        </div>
        <div class="search-car-results-wrapper">
          <div class="search-cars-sidebar">
            <div class="card card-found-cars">
              <p class="m-0">Found <strong>{{ $cars->total() }}</strong> cars</p>

              <button class="close-filters-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 24px">
                  <path fill-rule="evenodd"
                    d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </div>

            <!-- Find a car form -->
            <section class="find-a-car">
              <form action="{{ route('search') }}" method="GET" class="find-a-car-form card flex p-medium">
                <div class="find-a-car-inputs">
                  <div class="form-group">
                    <label class="mb-medium">Maker</label>
                    <select id="makerSelect" name="maker_id">
                      <option value="">Maker</option>
                      @foreach($makers as $maker)
                        <option value="{{ $maker->id }}" @if($maker->id == $maker_id) selected @endif>{{ $maker->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Model</label>
                    <select id="modelSelect" name="model_id">
                      <option value="" style="display: block">Model</option>
                      @foreach($models as $model)
                        <option value="{{ $model->id }}" data-parent="{{ $model->maker_id }}" style="display: none" @if($model->id == $model_id) selected @endif>
                          {{ $model->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Type</label>
                    <select name="car_type_id">
                      <option value="">Type</option>
                      @foreach($carTypes as $carType)
                        <option value="{{ $carType->id }}" @if($carType->id == $car_type_id) selected @endif>{{ $carType->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Year</label>
                    <div class="flex gap-1">
                      <input type="number" placeholder="Year From" name="year_from" value="{{ $year_from }}" />
                      <input type="number" placeholder="Year To" name="year_to" value="{{ $year_to }}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Price</label>
                    <div class="flex gap-1">
                      <input type="number" placeholder="Price From" name="price_from" value="{{ $price_from }}" />
                      <input type="number" placeholder="Price To" name="price_to" value="{{ $price_to }}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Mileage</label>
                    <div class="flex gap-1">
                      <select name="mileage">
                        <option value="">Any Mileage</option>
                        <option value="10000" @if($mileage == 10000) selected @endif>10,000 or less</option>
                        <option value="20000" @if($mileage == 20000) selected @endif>20,000 or less</option>
                        <option value="30000" @if($mileage == 30000) selected @endif>30,000 or less</option>
                        <option value="40000" @if($mileage == 40000) selected @endif>40,000 or less</option>
                        <option value="50000" @if($mileage == 50000) selected @endif>50,000 or less</option>
                        <option value="60000" @if($mileage == 60000) selected @endif>60,000 or less</option>
                        <option value="70000" @if($mileage == 70000) selected @endif>70,000 or less</option>
                        <option value="80000" @if($mileage == 80000) selected @endif>80,000 or less</option>
                        <option value="90000" @if($mileage == 90000) selected @endif>90,000 or less</option>
                        <option value="100000" @if($mileage == 100000) selected @endif>100,000 or less</option>
                        <option value="150000" @if($mileage == 150000) selected @endif>150,000 or less</option>
                        <option value="200000" @if($mileage == 200000) selected @endif>200,000 or less</option>
                        <option value="250000" @if($mileage == 250000) selected @endif>250,000 or less</option>
                        <option value="300000" @if($mileage == 300000) selected @endif>300,000 or less</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">State</label>
                    <select id="stateSelect" name="state_id">
                      <option value="">State</option>
                      @foreach($states as $state)
                        <option value="{{ $state->id }}" @if($state->id == $state_id) selected @endif >{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">City</label>
                    <select id="citySelect" name="city_id">
                      <option value="">City</option>
                      @foreach($cities as $city)
                        <option value="{{ $city->id }}" data-parent="{{ $city->state_id }}" style="display: none" @if($city->id == $city_id) selected @endif>
                          {{ $city->name }}
                        </option>
                      @endforeach   
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="mb-medium">Fuel Type</label>
                    <select name="fuel_type_id">
                      <option value="">Fuel Type</option>
                      @foreach($fuelTypes as $fuelType)
                        <option value="{{ $fuelType->id }}" @if($fuelType->id == $fuel_type_id) selected @endif>{{ $fuelType->name }}</option>
                      @endforeach
                      </select>
                  </div>
                </div>
                <div class="flex">
                  <button type="button" class="btn btn-find-a-car-reset">
                    Reset
                  </button>
                  <button class="btn btn-primary btn-find-a-car-submit">
                    Search
                  </button>
                </div>
              </form>
            </section>
            <!--/ Find a car form -->
          </div>

          <div class="search-cars-results">
            <div class="car-items-listing">
            @foreach($cars as $car)
              <div class="car-item card">
                <a href="{{ route('cars.show', $car->id )}}">
                  <img src="/images/{{ $car->primaryImage->name }}" alt="" class="car-item-img rounded-t" />
                </a>
                <div class="p-medium">
                  <div class="flex items-center justify-between">
                    <small class="m-0 text-muted">{{ $car->state->name }} - {{ $car->city->name }}</small>
                    @auth
                  <?php
                  $favourite = DB::table("favourite_cars")->where("user_id", auth()->user()->id)->where("car_id", $car->id)->first();
                  ?>
                  @if($favourite)
                    @if($car->id == $favourite->car_id)
                    <form action="{{ route('deleteFavouriteCar', $car->id )}}" method="POST" onsubmit="return confirm('Are you sure?');">
                      @csrf
                      @method('DELETE')
                      <button class="btn-heart text-primary">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          fill="currentColor"
                          style="width: 20px"
                        >
                          <path
                            d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                          />
                        </svg>
                      </button>
                      </form>         
                    @endif
                    @else
                    <form action="{{ route('createFavouriteCar', $car->id)}}" method="POST">
                      @csrf
                      <button class="btn-heart">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          style="width: 20px"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                          />
                        </svg>
                      </button>
                    </form>
                  @endif
                  @endauth
                  </div>
                  <h2 class="car-item-title">{{ $car->year }} - {{ $car->maker->name }} {{ $car->model->name }}</h2>
                  <p class="car-item-price">{{ $car->price }}&euro;</p>
                  <hr />
                  <p class="m-0">
                    <span class="car-item-badge">{{ $car->carType->name }}</span>
                    <span class="car-item-badge">{{ $car->fuelType->name }}</span>
                  </p>
                </div>
              </div>
            @endforeach
            </div>
            {{ $cars->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
    </section>
    <!--/ Found Cars -->
  </main>
</x-app-layout>