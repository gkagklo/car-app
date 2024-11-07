<x-app-layout title="Show Car" bodyClass="page-show-car">
    <main>
        <div class="container">
          <h1 class="car-details-page-title">{{ $car->maker->name }} {{ $car->model->name}} - {{ $car->year }}</h1>
          <div class="car-details-region">{{ $car->state->name }} {{ $car->city->name }} - {{ $car->created_at }}</div>
  
          <div class="car-details-content">
            <div class="car-images-and-description">
              <div class="car-images-carousel">
                <div class="car-image-wrapper">
                  <img
                    src="/images/{{ $car->primaryImage->name }}"
                    alt=""
                    class="car-active-image"
                    id="activeImage"
                  />
                </div>
                <div class="car-image-thumbnails">
                  @foreach($car->images as $image_thumbnail)
                    <img src="/images/{{ $image_thumbnail->name }}" alt="" />
                  @endforeach
                </div>
                <button class="carousel-button prev-button" id="prevButton">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 64px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15.75 19.5 8.25 12l7.5-7.5"
                    />
                  </svg>
                </button>
                <button class="carousel-button next-button" id="nextButton">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 64px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m8.25 4.5 7.5 7.5-7.5 7.5"
                    />
                  </svg>
                </button>
              </div>
  
              <div class="card car-detailed-description">
                <h2 class="car-details-title">Detailed Description</h2>
                <p>
                  {{ $car->description }}
                </p>
              </div>
  
              <div class="card car-detailed-description">
                <h2 class="car-details-title">Car Specifications</h2>
  
                <ul class="car-specifications">
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->air_conditioning == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                      <path
                        fill-rule="evenodd"
                        d="{{ ($car->carFeature->air_conditioning == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                        clip-rule="evenodd"
                      />
                    </svg>
                    Air Conditioning
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->power_windows == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->power_windows == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    Power Windows
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->power_door_locks == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->power_door_locks == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    Power Door Locks
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->abs == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->abs == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    ABS
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->cruise_control == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->cruise_control == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
  
                    Cruise Control
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->bluetooth_connectivity == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->bluetooth_connectivity == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
  
                    Bluetooth Connectivity
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->remote_start == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->remote_start == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
  
                    Remote Start
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->gps_navigation == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->gps_navigation == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    GPS Navigation System
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->heated_seats == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->heated_seats == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    Heated Seats
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->climate_control == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->climate_control == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
                    Climate Control
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->rear_parking_sensors == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->rear_parking_sensors == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
  
                    Rear Parking Sensors
                  </li>
                  <li>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      style="{{ ($car->carFeature->leather_seats == 1) ? 'color: rgb(0, 192, 102)' : 'color: red'}}"
                    >
                    <path
                    fill-rule="evenodd"
                    d="{{ ($car->carFeature->leather_seats == 1) ? 'M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' : 'M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z'}}"
                    clip-rule="evenodd"
                  />
                    </svg>
  
                    Leather Seats
                  </li>
                </ul>
              </div>
            </div>
            <div class="car-details card">
              <div class="flex items-center justify-between">
                <p class="car-details-price">{{ $car->price }}&euro;</p>
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
              </div>
  
              <hr />
              <table class="car-details-table">
                <tbody>
                  <tr>
                    <th>Maker</th>
                    <td>{{ $car->maker->name }}</td>
                  </tr>
                  <tr>
                    <th>Model</th>
                    <td>{{ $car->model->name }}</td>
                  </tr>
                  <tr>
                    <th>Year</th>
                    <td>{{ $car->year }}</td>
                  </tr>
                  <tr>
                    <th>Car Type</th>
                    <td>{{ $car->carType->name }}</td>
                  </tr>
                  <tr>
                    <th>Fuel Type</th>
                    <td>{{ $car->fuelType->name }}</td>
                  </tr>
                </tbody>
              </table>
              <hr />
  
              <div class="flex gap-1 my-medium">
                <img
                  src="/img/avatar.png"
                  alt=""
                  class="car-details-owner-image"
                />
                <div>
                  <h3 class="car-details-owner">{{ $car->user->name }}</h3>
                  <div class="text-muted">{{ $user_cars_count }} cars</div>
                </div>
              </div>
              <a href="tel:+{{ $car->phone }}" class="car-details-phone">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 16px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                  />
                </svg>
  
                +{{ $car->phone }}
                {{-- <span class="car-details-phone-view">view full number</span> --}}
              </a>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>