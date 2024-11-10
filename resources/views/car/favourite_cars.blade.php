<x-app-layout title="Favourite Cars" bodyClass="page-favourite-cars">
    <main>
        <!-- New Cars -->
        <section>
          <div class="container">
            <h2>My Favourite Cars</h2>
            <div class="car-items-listing">
            @foreach($favourite_cars as $favourite_car)
              <div class="car-item card">
                <a href="{{ route('car.show', $favourite_car->car->id )}}">
                  <img
                    src="/images/{{ $favourite_car->car->primaryImage->name }}"
                    alt=""
                    class="car-item-img rounded-t"
                  />
                </a>
                <div class="p-medium">
                  <div class="flex items-center justify-between">
                    <small class="m-0 text-muted">{{ $favourite_car->car->state->name }} - {{ $favourite_car->car->city->name }}</small>
                    <form action="{{ route('deleteFavouriteCar', $favourite_car->car->id )}}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn-heart text-primary">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        style="width: 16px"
                      >
                        <path
                          d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"
                        />
                      </svg>
                    </button>
                    </form>
                  </div>
                  <h2 class="car-item-title">{{ $favourite_car->car->year }} - {{ $favourite_car->car->maker->name}} {{ $favourite_car->car->model->name}}</h2>
                  <p class="car-item-price">{{ $favourite_car->car->price }}&euro;</p>
                  <hr />
                  <p class="m-0">
                    <span class="car-item-badge">{{ $favourite_car->car->carType->name }}</span>
                    <span class="car-item-badge">{{ $favourite_car->car->fuelType->name }}</span>
                  </p>
                </div>
              </div>
            @endforeach 
            </div>
  
            <nav class="pagination my-large">
              <a href="#" class="pagination-item">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 18px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"
                  />
                </svg>
              </a>
              <a href="#" class="pagination-item">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 18px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 19.5 8.25 12l7.5-7.5"
                  />
                </svg>
              </a>
  
              <a href="#" class="pagination-item"> 1 </a>
              <a href="#" class="pagination-item"> 2 </a>
              <span class="pagination-item active"> 3 </span>
              <a href="#" class="pagination-item"> 4 </a>
              <a href="#" class="pagination-item">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 18px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5"
                  />
                </svg>
              </a>
              <a href="#" class="pagination-item">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  style="width: 18px"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"
                  />
                </svg>
              </a>
            </nav>
          </div>
        </section>
        <!--/ New Cars -->
      </main>
</x-app-layout>