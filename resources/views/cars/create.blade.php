<x-app-layout title="Create New Car" bodyClass="page-new-car">
<main>
    <div class="container-small">
      <h1 class="car-details-page-title">Add New Car</h1>
      <form
        action="{{ route('cars.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="card add-new-car-form"
      >
      @csrf
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-content">
          <div class="form-details">
            <div class="row">
              <div class="col">
                <div class="form-group @error('maker_id') has-error @enderror">
                  <label>Maker</label>
                  <x-input-select :options="$makers" id="makerSelect" name="maker_id" :value="old('maker_id')">
                    <option value="">Maker</option>
                  </x-input-select>
                  <x-input-error :messages="$errors->get('maker_id')" />
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('model_id') has-error @enderror">
                  <label>Model</label>
                  <x-input-select :options="$models" id="modelSelect" name="model_id" :parent="'maker_id'" :value="old('model_id')">
                    <option value="">Model</option>
                  </x-input-select>
                  <x-input-error :messages="$errors->get('model_id')" />
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('year') has-error @enderror">
                  <label>Year</label>
                  <select name="year">
                    <option value="">Year</option>
                    <option value="2024" {{ old('year') == 2024 ? 'selected' : ''}}>2024</option>
                    <option value="2023" {{ old('year') == 2023 ? 'selected' : ''}}>2023</option>
                    <option value="2022" {{ old('year') == 2022 ? 'selected' : ''}}>2022</option>
                    <option value="2021" {{ old('year') == 2021 ? 'selected' : ''}}>2021</option>
                    <option value="2020" {{ old('year') == 2020 ? 'selected' : ''}}>2020</option>
                    <option value="2019" {{ old('year') == 2019 ? 'selected' : ''}}>2019</option>
                    <option value="2018" {{ old('year') == 2018 ? 'selected' : ''}}>2018</option>
                    <option value="2017" {{ old('year') == 2017 ? 'selected' : ''}}>2017</option>
                    <option value="2016" {{ old('year') == 2016 ? 'selected' : ''}}>2016</option>
                    <option value="2015" {{ old('year') == 2015 ? 'selected' : ''}}>2015</option>
                    <option value="2014" {{ old('year') == 2014 ? 'selected' : ''}}>2014</option>
                    <option value="2013" {{ old('year') == 2013 ? 'selected' : ''}}>2013</option>
                    <option value="2012" {{ old('year') == 2012 ? 'selected' : ''}}>2012</option>
                    <option value="2011" {{ old('year') == 2011 ? 'selected' : ''}}>2011</option>
                    <option value="2010" {{ old('year') == 2010 ? 'selected' : ''}}>2010</option>
                    <option value="2009" {{ old('year') == 2009 ? 'selected' : ''}}>2009</option>
                    <option value="2008" {{ old('year') == 2008 ? 'selected' : ''}}>2008</option>
                    <option value="2007" {{ old('year') == 2007 ? 'selected' : ''}}>2007</option>
                    <option value="2006" {{ old('year') == 2006 ? 'selected' : ''}}>2006</option>
                    <option value="2005" {{ old('year') == 2005 ? 'selected' : ''}}>2005</option>
                    <option value="2004" {{ old('year') == 2004 ? 'selected' : ''}}>2004</option>
                    <option value="2003" {{ old('year') == 2003 ? 'selected' : ''}}>2003</option>
                    <option value="2002" {{ old('year') == 2002 ? 'selected' : ''}}>2002</option>
                    <option value="2001" {{ old('year') == 2001 ? 'selected' : ''}}>2001</option>
                    <option value="2000" {{ old('year') == 2000 ? 'selected' : ''}}>2000</option>
                    <option value="1999" {{ old('year') == 1999 ? 'selected' : ''}}>1999</option>
                    <option value="1998" {{ old('year') == 1998 ? 'selected' : ''}}>1998</option>
                    <option value="1997" {{ old('year') == 1997 ? 'selected' : ''}}>1997</option>
                    <option value="1996" {{ old('year') == 1996 ? 'selected' : ''}}>1996</option>
                    <option value="1995" {{ old('year') == 1995 ? 'selected' : ''}}>1995</option>
                    <option value="1994" {{ old('year') == 1994 ? 'selected' : ''}}>1994</option>
                    <option value="1993" {{ old('year') == 1993 ? 'selected' : ''}}>1993</option>
                    <option value="1992" {{ old('year') == 1992 ? 'selected' : ''}}>1992</option>
                    <option value="1991" {{ old('year') == 1991 ? 'selected' : ''}}>1991</option>
                    <option value="1990" {{ old('year') == 1990 ? 'selected' : ''}}>1990</option>
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
                      <input type="radio" name="car_type_id" value="{{$car_type->id}}" {{ old('car_type_id') == $car_type->id ? 'checked' : ''}} />
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
                  <input type="number" name="price" placeholder="Price" value="{{old('price')}}" />
                  @error('price')
                    <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('vin') has-error @enderror">
                  <label>Vin Code</label>
                  <input name="vin" placeholder="Vin Code" value="{{old('vin')}}" />
                  @error('vin')
                    <p class="error-message">{{ $message }}</p>
                  @enderror 
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('mileage') has-error @enderror">
                  <label>Mileage (ml)</label>
                  <input name="mileage" placeholder="Mileage" value="{{old('mileage')}}" />
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
                      <input type="radio" name="fuel_type_id" value="{{ $fuel_type->id }}" {{ old('fuel_type_id') == $fuel_type->id ? 'checked' : ''}} />
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
                  <x-input-select :options="$states" id="stateSelect" name="state_id" :value="old('state_id')">
                    <option value="">State/Region</option>
                  </x-input-select>
                  <x-input-error :messages="$errors->get('state_id')" />
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('city_id') has-error @enderror">
                  <label>City</label>
                  <x-input-select :options="$cities" id="citySelect" name="city_id" :parent="'state_id'" :value="old('city_id')">
                    <option value="">City</option>
                  </x-input-select>
                  <x-input-error :messages="$errors->get('city_id')" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group @error('address') has-error @enderror">
                  <label>Address</label>
                  <input name="address" placeholder="Address" value="{{old('address')}}" />
                  @error('address')
                    <p class="error-message">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group @error('phone') has-error @enderror">
                  <label>Phone</label>
                  <input name="phone" placeholder="Phone" value="{{old('phone')}}" />
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
                      {{ old('air_conditioning') == 1 ? 'checked' : ''}}
                    />
                    Air Conditioning
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="power_windows" value="1" {{ old('power_windows') == 1 ? 'checked' : ''}} />
                    Power Windows
                  </label>

                  <label class="checkbox">
                    <input
                      type="checkbox"
                      name="power_door_locks"
                      value="1"
                      {{ old('power_door_locks') == 1 ? 'checked' : ''}}
                    />
                    Power Door Locks
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="abs" value="1" {{ old('abs') == 1 ? 'checked' : ''}} />
                    ABS
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="cruise_control" value="1" {{ old('cruise_control') == 1 ? 'checked' : ''}} />
                    Cruise Control
                  </label>

                  <label class="checkbox">
                    <input
                      type="checkbox"
                      name="bluetooth_connectivity"
                      value="1"
                      {{ old('bluetooth_connectivity') == 1 ? 'checked' : ''}}
                    />
                    Bluetooth Connectivity
                  </label>
                </div>
                <div class="col">
                  <label class="checkbox">
                    <input type="checkbox" name="remote_start" value="1" {{ old('remote_start') == 1 ? 'checked' : ''}} />
                    Remote Start
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="gps_navigation" value="1" {{ old('gps_navigation') == 1 ? 'checked' : ''}} />
                    GPS Navigation System
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="heated_seats" value="1" {{ old('heated_seats') == 1 ? 'checked' : ''}} />
                    Heated Seats
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="climate_control" value="1" {{ old('climate_control') == 1 ? 'checked' : ''}} />
                    Climate Control
                  </label>

                  <label class="checkbox">
                    <input
                      type="checkbox"
                      name="rear_parking_sensors"
                      value="1"
                      {{ old('rear_parking_sensors') == 1 ? 'checked' : ''}}
                    />
                    Rear Parking Sensors
                  </label>

                  <label class="checkbox">
                    <input type="checkbox" name="leather_seats" value="1" {{ old('leather_seats') == 1 ? 'checked' : ''}} />
                    Leather Seats
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Detailed Description</label>
              <textarea name="description" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label class="checkbox">
                <input type="checkbox" name="published" value="1" {{ old('published') == 1 ? 'checked' : ''}} />
                Published
              </label>
            </div>
          </div>
          <div class="form-images">
            <div class="form-image-upload">
              <div class="upload-placeholder">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 48px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                  />
                </svg>
              </div>
              <input id="carFormImageUpload" name="images[]" type="file" multiple  />
              @error('images')
                <p class="text-error">{{ $message }}</p>
              @enderror
            </div>
            <div id="imagePreviews" class="car-form-images"></div>  
          </div>
        </div>
        <div class="p-medium" style="width: 100%">
          <div class="flex justify-end gap-1">
            {{-- <button type="button" class="btn btn-default">Reset</button> --}}
            <button class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
</main> 

</x-app-layout>


