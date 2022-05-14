<x-guest-layout>

    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Choose Your Reservation
                </h2>
                <form class="justify-center w-full mx-auto" method="post" action="{{ route('checkout') }}">
                    @csrf
                    <div class="">

                        <div class="mt-4">
                            <div class="w-full">
                                <label for="reservation_id" class="block mb-3 text-sm font-semibold text-gray-500">Reservation</label>
                                <select class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600" id="reservation_id" name="reservation_id"
                                    class="form-multiselect block w-full mt-1">
                                    @foreach ($reservations as $reservation)
                                        <option value="{{ $reservation->id }}">
                                            {{ $reservation->res_date }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button
                                class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900">Buy Now</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
                <div class="pt-12 md:pt-0 2xl:ps-4">
                    <h2 class="text-xl font-bold">Order Summary
                    </h2>
                    <div class="mt-8">
                        @foreach ($menus as $menu)
                        <div class="flex flex-col mt-5 space-y-4">
                            <div class="flex space-x-4">
                                <div>
                                    <img src="{{ Storage::url($menu['item']->image) }}" alt="image"
                                    class="inline object-cover w-20 h-20 mr-2 rounded-full">
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">{{ $menu['item']['name'] }}</h2>
                                    <p class="text-sm">Quantity: {{ $menu['quantity'] }}</p>
                                    <span class="text-red-600">Price:</span> ${{ $menu['price'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex p-4 mt-4">
                        <h2 class="text-xl font-bold">ITEMS: {{ $total_quantity }}</h2>
                    </div>
                    <div>
                    <div
                        class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                        Total:<span class="ml-2">${{ $total_price }}</span></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-guest-layout>
