<div class="container w-full px-5 py-6 mx-auto">
    <div
    x-data="{show: false}"
    x-show="show"
    x-transition.in.duration.500ms.out.duration.1500ms
    x-init="@this.on('saved', () => { show = true; setTimeout(() => { show = false; }, 2500) })"
     class="mx-auto sm:w-3/4 md:w-2/4 fixed inset-x-0 top-10" id="signin-success-message">
        <div class="bg-green-200 px-6 py-4 my-4 rounded-md text-lg flex items-center w-full">
          <svg viewBox="0 0 24 24" class="text-green-600 w-10 h-10 sm:w-5 sm:h-5 mr-3">
                      <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path>
                  </svg>
          <span class="text-green-800">This menu is added to the cart!</span>
        </div>
      </div>
    <div class="grid lg:grid-cols-4 gap-y-6">
      @foreach ($category->menus as $menu)
          <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
              <img class="w-full h-48" src="{{ Storage::url($menu->image) }}"
                alt="Image" />
              <div class="px-6 py-4">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4>
                <p class="leading-normal text-gray-700">
                    {{ $menu->description }}
                </p>
              </div>
              <form wire:submit.prevent="getAddToCart({{ $menu->id }})" action="" method="POST">
              <div class="flex items-center justify-between p-4">
                  @csrf
                <input type="hidden" name="id" value="{{ $menu->id }}">
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 text-green-50">Order Now</button>
                <span class="text-xl text-green-600">${{ $menu->price }}</span>
                </form>
              </div>
            </div>
          @endforeach
    </div>
  </div>

