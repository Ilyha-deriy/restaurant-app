<x-guest-layout>



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
                    <div>
                      <p class="w-12 text-center bg-gray-100 outline-none">{{ $menu['quantity'] }}</p>
                    </div>
                  </td>
                  <td class="p-4 px-6 text-center whitespace-nowrap">${{ $menu['price'] }}</td>
                  <td class="p-4 px-6 text-center whitespace-nowrap">
                      <button class="px-4 py-1 text-red-600 bg-red-100">
                          Remove all
                        </button>
                        <button class="px-4 py-1 text-red-600 bg-red-100">
                          Remove by 1
                        </button>
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
                    <button class="px-4 py-1 text-red-600 bg-red-100">
                      Clear All
                    </button>
                  </td>
                </tr>
              </tbody>
          </table>

            <div class="flex justify-end mt-4 space-x-2">
              <button
                class="
                  px-6
                  py-3
                  text-sm text-white
                  bg-indigo-500
                  hover:bg-indigo-700
                "
              >
                Proceed to Checkout
              </button>
          </div>
      </div>
      </div>
          @else
              <div class="row">
                  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                      <h2>No Items in Cart!</h2>
                  </div>
              </div>
          @endif
</x-guest-layout>
