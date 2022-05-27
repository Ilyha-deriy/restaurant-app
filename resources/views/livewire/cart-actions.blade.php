
    <div>
        @if (session()->has('cart'))
        <div class="container p-8 mx-auto mt-12 bg-white">
            <div class="w-full overflow-x-auto">
              <div class="my-2">
                <h3 class="text-xl font-bold tracking-wider">Shopping Cart Items</h3>
              </div>
              <table class="w-full shadow-inner">
                <thead>
                  <tr class="bg-gray-100">
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Image</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Product</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Quantity</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
                    <th class="px-6 py-3 font-bold whitespace-nowrap">Remove</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($menus as $menu)
                  <tr>
                    <td class="p-4 px-6 text-center whitespace-nowrap"><img class="inline object-cover w-20 h-20 mr-2 rounded-full" src="{{ Storage::url($menu['item']->image) }}"
                        alt="Image" /></td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">{{ $menu['item']['name'] }}</td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">
                          <div class="flex justify-center">
                            <form wire:submit.prevent="reduceByOne({{ $menu['item']['id'] }})" action="" method="POST">
                                @csrf
                              <button class="mr-4 px-2 py-0 shadow hover:bg-gray-100">-</button>
                            </form>
                            {{ $menu['quantity'] }}
                            <form wire:submit.prevent="plusItem({{ $menu['item']['id'] }})" action="" method="POST">
                          <button class="ml-4 px-2 py-0 shadow">+</button>
                            </form>
                          </div>
                    </td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">${{ $menu['price'] }}</td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">
                        <form wire:submit.prevent="removeItem({{ $menu['item']['id'] }})" action="" method="POST">
                            @csrf
                          <button class="px-4 py-1 text-red-600 bg-red-100 hover:bg-red-200 rounded">
                              X
                          </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                      <td class="p-4 px-6 text-center whitespace-nowrap"></td>
                      <td class="p-4 px-6 text-center whitespace-nowrap"></td>
                          <td class="p-4 px-6 text-center whitespace-nowrap">
                              <div class="font-bold">Total Quantity: {{ $total_quantity }}</div>
                          </td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">
                      <div class="font-bold">Total Price: ${{ $total_price }}</div>
                    </td>
                    <td class="p-4 px-6 text-center whitespace-nowrap">
                        <form wire:submit.prevent="destroyCart" action="" method="POST">
                            <button class="px-4 py-1 text-red-600 bg-red-100 hover:bg-red-200 rounded">
                        Clear All
                      </button>
                        </form>
                    </td>
                  </tr>
                </tbody>
            </table>

              <div class="flex justify-end mt-4 space-x-2">
                <a href="{{ route('checkout') }}" type="submit"
                  class="
                    px-6
                    py-3
                    text-sm text-white
                    bg-indigo-500
                    hover:bg-indigo-700
                  "
                >
                  Proceed To Order
              </a>
            </div>
        </div>
        </div>
            @else
            <div class="container p-8 mx-auto mt-12 bg-white">
              <div class="w-full overflow-x-auto">
                <div class="my-2">
                  <h3 class="text-xl font-bold tracking-wider">Shopping Cart Items</h3>
                </div>
                <table class="w-full shadow-inner">
                  <thead>
                    <tr class="bg-gray-100">
                      <th class="px-6 py-3 font-bold whitespace-nowrap">Image</th>
                      <th class="px-6 py-3 font-bold whitespace-nowrap">Product</th>
                      <th class="px-6 py-3 font-bold whitespace-nowrap">Quantity</th>
                      <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
                      <th class="px-6 py-3 font-bold whitespace-nowrap">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                      <td class="p-4 px-6 text-center whitespace-nowrap"></td>
                      <td class="p-4 px-6 text-center whitespace-nowrap"></td>
                      <td class="p-4 px-6 text-center whitespace-nowrap">
                          <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                              <a href="{{ route('menus.index') }}" class="inline-flex bg-indigo-500 hover:bg-indigo-700 text-white rounded-full h-6 px-3 justify-center items-center">Go To The Menu</a>
                              <span class="inline-flex px-2">No Items In The Cart!</span>
                          </div>
                      </td>
                  </tbody>
              </table>

          </div>
      </div>
            @endif
      </div>
