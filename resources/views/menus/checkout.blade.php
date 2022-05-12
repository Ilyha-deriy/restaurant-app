<x-guest-layout>
    <div class="mt-20">
        <h1 class="flex items-center justify-center font-bold text-blue-600 text-md lg:text-3xl">Tailwind CSS
            Ecommerce
            Checkout Page UI
        </h1>
    </div>
    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Shipping Address
                </h2>
                <form class="justify-center w-full mx-auto" method="post" action>
                    @csrf
                    <div class="">
                        <div class="space-x-0 lg:flex lg:space-x-4">
                            <form method="POST" action="{{ route('checkout') }}" id="checkout-form">
                            <div class="w-full lg:w-1/2">
                                <label for="first_name" class="block mb-3 text-sm font-semibold text-gray-500">First
                                    Name</label>
                                <input name="first_mame" id="first_name" type="text" placeholder="First Name" required
                                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="w-full lg:w-1/2 ">
                                <label for="last_name" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                    Name</label>
                                <input name="last_name" type="text" id="last_name" placeholder="Last Name" required
                                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="Email"
                                    class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                <input name="email" type="text" placeholder="Email" id="email" required
                                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="card_holder"
                                    class="block mb-3 text-sm font-semibold text-gray-500">Credit Card Holder Name</label>
                                <input name="card_holder" type="text" placeholder="Credit Card Holder Name" id="card_holder" required
                                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="credit_card"
                                    class="block mb-3 text-sm font-semibold text-gray-500">Cart Number</label>
                                <input name="credit_card" type="text" placeholder="Card Number" id="credit_card" required
                                    class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-4 space-x-0 lg:flex lg:space-x-4">
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="expiration_month" class="block mb-3 text-sm font-semibold text-gray-500">Expiration Month</label>
                                    <input name="expiration_month" id="expiration_month" type="text" placeholder="Expiration Month" required
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="expiration_year" class="block mb-3 text-sm font-semibold text-gray-500">Expiration Year</label>
                                    <input name="expiration_year" type="text" id="expiration_year" placeholder="Expiration Year" required
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="cvv" class="block mb-3 text-sm font-semibold text-gray-500">CVV</label>
                                    <input name="cvv" type="text" id="cvv" placeholder="Last Name" required
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="address"
                                    class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                <textarea required id="address"
                                    class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    name="Address" cols="20" rows="4" placeholder="Address"></textarea>
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
</x-guest-layout>
