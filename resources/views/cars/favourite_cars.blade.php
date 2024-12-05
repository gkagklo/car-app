<x-app-layout title="Favourite Cars" bodyClass="page-favourite-cars">
    <main>
        <!-- New Cars -->
        <section>
          <div class="container">
            <h2>My Favourite Cars</h2>
            <div class="car-items-listing">
            @forelse($favourite_cars as $favourite_car)
              <div class="car-item card">
                <a href="{{ route('cars.show', $favourite_car->car->id )}}">
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
            @empty
              <p class="text-center">No favourite cars found!</p>
            @endforelse
            </div>
            
            {{ $favourite_cars->links('vendor.pagination.custom') }}
           
          </div>
        </section>
        <!--/ New Cars -->
      </main>
</x-app-layout>