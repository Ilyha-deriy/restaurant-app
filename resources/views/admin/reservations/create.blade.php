<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('admin.reservations.store') }}">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
                        <div class="mt-1">
                            <input type="text" id="first_name" name="first_name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('first_name') border-red-400 @enderror" />
                        </div>
                        @error('first_name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
                        <div class="mt-1">
                            <input type="text" id="last_name" name="last_name"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('last_name') border-red-400 @enderror" />
                        </div>
                        @error('last_name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email
                        </label>
                        <div class="mt-1">
                            <input type="email" id="email" name="email"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                        </div>
                        @error('email')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700"> Phone Number </label>
                        <div class="mt-1">
                            <input type="text" id="phone_number" name="phone_number"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('phone_number') border-red-400 @enderror" />
                        </div>
                        @error('phone_number')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation Date </label>
                        <div class="mt-1">
                            <input type="datetime-local" id="res_date" name="res_date"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-400 @enderror" />
                        </div>
                        @error('res_date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number
                        </label>
                        <div class="mt-1">
                            <input type="number" id="guest_number" name="guest_number"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('guest_number') border-red-400 @enderror" />
                        </div>
                        @error('guest_number')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                        <div class="mt-1">
                            <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1 @error('table_id') border-red-400 @enderror">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('table_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                  <div class="mt-6 p-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                  </div>
                </form>
              </div>
            </div>

        </div>
    </div>
</x-admin-layout>
