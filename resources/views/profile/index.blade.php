<x-guest-layout>

<!-- This is an example component -->
<div class="max-w-2xl mx-auto mb-20">
    <div class="my-8">
        <h3 class="text-xl font-bold leading-none">My Orders</h3>
    </div>
                    @if (session()->has('danger'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">{{ session()->get('danger') }}</span>
                        </div>
                    @endif
    @foreach ($orders as $order)
    <div class="my-8">
        <h3 class="text-xl font-bold leading-none">Reservation date of the order: {{ $order->reservation->res_date }}</h3>
    </div>
	<div class=" bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700 content-center">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Products</h3>
        <p class="text-sm font-medium text-blue-600 dark:text-blue-500">
            Total Price: ${{ $order->cart->total_price }}
        </p>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($order->cart->items as $item)
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{ Storage::url($item['item']->image) }}" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $item['item']['name'] }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            Quantity: {{ $item['quantity'] }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        ${{ $item['price'] }}
                    </div>
                </div>
            </li>
            @endforeach
            <div class="flex justify-end space-x-2">
                <form action="{{ route('profile.destroy', $order->id) }}"
                    method="POST"
                    class="mt-4 px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </ul>
    </div>
</div>
<br>
<br>
<hr>
@endforeach
    </div>



</x-guest-layout>
