<x-app-layout title="Edit Car" bodyClass="page-edit-car">
    <main>
        <div class="container-small">
          <h1 class="car-details-page-title">Edit Car: {{ $car->maker->name }} {{ $car->model->name }} - {{ $car->year }}</h1>
          <form
            action="{{ route('cars.update', $car->id) }}"
            method="POST"
            
            class="card add-new-car-form"
          >
          @csrf
          @method('PUT')
            <div class="form-content">
              <div class="form-details">
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('maker_id') has-error @enderror">
                      <label>Maker</label>
                      <select name="maker_id" id="maker-dropdown">
                        <option value="">Maker</option>
                        @foreach($makers as $maker)
                          <option value="{{ $maker->id }}" @if($maker->id == $car->maker_id) selected @endif >{{ $maker->name }}</option>
                        @endforeach 
                      </select>
                      @error('maker_id')
                        <p class="error-message">{{ $message }}</p>
                      @enderror 
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('model_id') has-error @enderror">
                      <label>Model</label>
                      <select name="model_id" id="model-dropdown">
                        @foreach($models as $model)
                          <option value="{{ $model->id }}" @if($model->id == $car->model_id) selected @endif >{{ $model->name }}</option>
                        @endforeach
                      </select>
                      @error('model_id')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('year') has-error @enderror">
                      <label>Year</label>
                      <select name="year">
                        <option value="">Year</option>
                        <option value="2024" @if($car->year == 2024) selected @endif>2024</option>
                        <option value="2023"  @if($car->year == 2023) selected @endif>2023</option>
                        <option value="2022"  @if($car->year == 2022) selected @endif>2022</option>
                        <option value="2021"  @if($car->year == 2021) selected @endif>2021</option>
                        <option value="2020"  @if($car->year == 2020) selected @endif>2020</option>
                        <option value="2019"  @if($car->year == 2019) selected @endif>2019</option>
                        <option value="2018"  @if($car->year == 2018) selected @endif>2018</option>
                        <option value="2017"  @if($car->year == 2017) selected @endif>2017</option>
                        <option value="2016"  @if($car->year == 2016) selected @endif>2016</option>
                        <option value="2015"  @if($car->year == 2015) selected @endif>2015</option>
                        <option value="2014"  @if($car->year == 2014) selected @endif>2014</option>
                        <option value="2013"  @if($car->year == 2013) selected @endif>2013</option>
                        <option value="2012"  @if($car->year == 2012) selected @endif>2012</option>
                        <option value="2011"  @if($car->year == 2011) selected @endif>2011</option>
                        <option value="2010"  @if($car->year == 2010) selected @endif>2010</option>
                        <option value="2009"  @if($car->year == 2009) selected @endif>2009</option>
                        <option value="2008"  @if($car->year == 2008) selected @endif>2008</option>
                        <option value="2007"  @if($car->year == 2007) selected @endif>2007</option>
                        <option value="2006"  @if($car->year == 2006) selected @endif>2006</option>
                        <option value="2005"  @if($car->year == 2005) selected @endif>2005</option>
                        <option value="2004"  @if($car->year == 2004) selected @endif>2004</option>
                        <option value="2003"  @if($car->year == 2003) selected @endif>2003</option>
                        <option value="2002"  @if($car->year == 2002) selected @endif>2002</option>
                        <option value="2001"  @if($car->year == 2001) selected @endif>2001</option>
                        <option value="2000"  @if($car->year == 2000) selected @endif>2000</option>
                        <option value="1999"  @if($car->year == 1999) selected @endif>1999</option>
                        <option value="1998"  @if($car->year == 1998) selected @endif>1998</option>
                        <option value="1997"  @if($car->year == 1997) selected @endif>1997</option>
                        <option value="1996"  @if($car->year == 1996) selected @endif>1996</option>
                        <option value="1995"  @if($car->year == 1995) selected @endif>1995</option>
                        <option value="1994"  @if($car->year == 1994) selected @endif>1994</option>
                        <option value="1993"  @if($car->year == 1993) selected @endif>1993</option>
                        <option value="1992"  @if($car->year == 1992) selected @endif>1992</option>
                        <option value="1991"  @if($car->year == 1991) selected @endif>1991</option>
                        <option value="1990"  @if($car->year == 1990) selected @endif>1990</option>
                      </select>
                      @error('year')
                        <p class="error-message">{{ $message }}</p>
                      @enderror 
                    </div>
                  </div>
                </div>
                <div class="form-group @error('car_type_id') has-error @enderror">
                  <label>Car Type</label>
                  <div class="row">
                    @foreach($car_types as $car_type)
                      <div class="col">
                        <label class="inline-radio">
                          <input type="radio" name="car_type_id" value="{{ $car_type->id }}" @if($car_type->id == $car->car_type_id) checked @endif />
                          {{ $car_type->name }}
                        </label>
                      </div>
                    @endforeach
                  </div>
                  @error('car_type_id')
                    <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('price') has-error @enderror">
                      <label>Price</label>
                      <input type="number" name="price" placeholder="Price" value="{{ $car->price }}" />
                      @error('price')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('vin') has-error @enderror">
                      <label>Vin Code</label>
                      <input name="vin" placeholder="Vin Code" value="{{ $car->vin }}" />
                      @error('vin')
                        <p class="error-message">{{ $message }}</p>
                      @enderror 
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('mileage') has-error @enderror">
                      <label>Mileage (ml)</label>
                      <input name="mileage" placeholder="Mileage" value="{{ $car->mileage }}" />
                      @error('mileage')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group @error('fuel_type_id') has-error @enderror">
                  <label>Fuel Type</label>
                  <div class="row">
                    @foreach($fuel_types as $fuel_type)
                      <div class="col">
                        <label class="inline-radio">
                          <input type="radio" name="fuel_type_id" value="{{ $fuel_type->id }}" @if($fuel_type->id == $car->fuel_type_id) checked @endif/>
                          {{ $fuel_type->name }}
                        </label>
                      </div>
                    @endforeach
                  </div>
                  @error('fuel_type_id')
                    <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('state_id') has-error @enderror">
                      <label>State/Region</label>
                      <select name="state_id" id="state-dropdown">
                        <option value="">State/Region</option>
                        @foreach($states as $state)
                          <option value="{{ $state->id }}" @if($state->id == $car->state_id) selected @endif >{{ $state->name }}</option>
                        @endforeach
                      </select>
                      @error('state_id')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('city_id') has-error @enderror">
                      <label>City</label>
                      <select name="city_id" id="city-dropdown">
                        <option value="">City</option>
                        @foreach($cities as $city)
                          <option value="{{ $city->id }}" @if($city->id == $car->city_id) selected @endif>{{ $city->name }}</option>
                        @endforeach
                      </select>
                      @error('city_id')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group @error('address') has-error @enderror">
                      <label>Address</label>
                      <input name="address" value="{{ $car->address }}" placeholder="Address" />
                      @error('address')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group @error('phone') has-error @enderror">
                      <label>Phone</label>
                      <input name="phone" value="{{ $car->phone }}" placeholder="Phone" />
                      @error('phone')
                        <p class="error-message">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="air_conditioning"
                          value="1"
                          @if($car->carFeature->air_conditioning == 1) checked @endif
                        />
                        Air Conditioning
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="power_windows" value="1" @if($car->carFeature->power_windows == 1) checked @endif />
                        Power Windows
                      </label>
    
                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="power_door_locks"
                          value="1"
                          @if($car->carFeature->power_door_locks == 1) checked @endif
                        />
                        Power Door Locks
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="abs" value="1" @if($car->carFeature->abs == 1) checked @endif />
                        ABS
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="cruise_control" value="1" @if($car->carFeature->cruise_control == 1) checked @endif />
                        Cruise Control
                      </label>
    
                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="bluetooth_connectivity"
                          value="1"
                          @if($car->carFeature->bluetooth_connectivity == 1) checked @endif
                        />
                        Bluetooth Connectivity
                      </label>
                    </div>
                    <div class="col">
                      <label class="checkbox">
                        <input type="checkbox" name="remote_start" value="1" @if($car->carFeature->remote_start == 1) checked @endif />
                        Remote Start
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="gps_navigation" value="1" @if($car->carFeature->gps_navigation == 1) checked @endif />
                        GPS Navigation System
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="heated_seats" value="1" @if($car->carFeature->heated_seats == 1) checked @endif />
                        Heated Seats
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="climate_control" value="1" @if($car->carFeature->climate_control == 1) checked @endif />
                        Climate Control
                      </label>
    
                      <label class="checkbox">
                        <input
                          type="checkbox"
                          name="rear_parking_sensors"
                          value="1"
                          @if($car->carFeature->rear_parking_sensors == 1) checked @endif
                        />
                        Rear Parking Sensors
                      </label>
    
                      <label class="checkbox">
                        <input type="checkbox" name="leather_seats" value="1" @if($car->carFeature->leather_seats == 1) checked @endif />
                        Leather Seats
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Detailed Description</label>
                  <textarea name="description" rows="10">{{ $car->description }}</textarea>
                </div>
                <div class="form-group">
                  <label class="checkbox">
                      <input type='hidden' value='0' name='published'>
                      <input type="checkbox" name="published" value="1" @if($car->published == 1) checked @endif/>   
                    Published
                  </label>
                </div>
              </div>
              <div class="form-images">
                <p class="my-large">
                  Manage your images
                  <a href="{{ route('car_images', $car->id) }}">From here</a>
                </p>
                <div class="car-form-images">
                  @foreach($car_images as $car_image)
                    <a class="car-form-image-preview">
                      <img src="/images/{{$car_image->name}}" alt="" />
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="p-medium" style="width: 100%">
              <div class="flex justify-end gap-1">
                <button class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
    </main>
    </x-app-layout>

    <script type="text/javascript">
      $(document).ready(function () {
    
          /*------------------------------------------
          --------------------------------------------
          Maker Dropdown Change Event
          --------------------------------------------
          --------------------------------------------*/
          $('#maker-dropdown').on('change', function () {
              var idMaker = this.value;
              $("#model-dropdown").html('');
              $.ajax({
                  url: "{{url('api/fetch-models')}}",
                  type: "POST",
                  data: {
                      maker_id: idMaker,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                      $('#model-dropdown').html('<option value="">Model</option>');
                      $.each(result.models, function (key, value) {
                          $("#model-dropdown").append('<option value="' + value
                              .id + '">' + value.name + '</option>');
                      });
                  }
              });
          });
    
            /*------------------------------------------
          --------------------------------------------
          State Dropdown Change Event
          --------------------------------------------
          --------------------------------------------*/
          $('#state-dropdown').on('change', function () {
              var idState = this.value;
              $("#city-dropdown").html('');
              $.ajax({
                  url: "{{url('api/fetch-cities')}}",
                  type: "POST",
                  data: {
                      state_id: idState,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                      $('#city-dropdown').html('<option value="">City</option>');
                      $.each(result.cities, function (key, value) {
                          $("#city-dropdown").append('<option value="' + value
                              .id + '">' + value.name + '</option>');
                      });
                  }
              });
          });
    
      });
    </script>