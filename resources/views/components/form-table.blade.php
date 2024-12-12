<div class="flex items-center justify-between py-2 px-5 mt-5" wire:submit="submitSearch">
    <div class="flex gap-x-2">
        <div>
            <div class="text-white text-sm mb-1">
                Select Date
            </div>
            <div class="flex gap-x-2 items-center dark:bg-gray-800 pb-4 rounded-lg">
                <div class="relative">
                    <input type="date" wire:model="start_date"
                        class="bg-gray-800 border  border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 placeholder-gray-400"
                        placeholder="Select Date">

                </div>
                <div class="text-white text-sm">
                    to
                </div>
                <div class="relative">
                    <input type="date" wire:model.live="end_date"
                        class="bg-gray-800 border  border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5 placeholder-gray-400"
                        placeholder="Select Date">

                </div>
            </div>

        </div>
        <div>
            <div class="text-white text-sm mb-1">
                Group By
            </div>
            <div class="flex gap-x-2 items-center dark:bg-gray-800 pb-4 rounded-lg">
                <select wire:model.live='dropdowns'
                    class="block  bg-gray-800 border p-2.5  border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-48  placeholder-gray-400">
                    <option value="" class="bg-gray-800">Select Data</option>

                    @foreach ($dropdown as $item)
                    <option value="{{ $item->name }}" class="bg-gray-800">{{ strtoupper($item->name) }} Data
                    </option>
                    @endforeach

                </select>
            </div>

        </div>
    </div>
    <div class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400 dark:text-gray-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                </svg>
            </div>
            <input type="text" id="simple-search" wire:model="type_data"
                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 placeholder-gray-400"
                placeholder="Search  name..." wire:model="name" />
        </div>
        <button type="submit"
            class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-900">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            <span class="sr-only">Search</span>
        </button>

    </div>
</div>