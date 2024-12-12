<div class="max-w-sm bg-gray-800 border border-gray-700 rounded-lg shadow">
    <div class="relative h-48 w-full flex">
        <img class="rounded-t-lg h-full w-full" src="{{ $image }}" alt="Office Image" />
        <div class="h-full w-full bg-black absolute bg-opacity-40">
        </div>
    </div>
    <div class="p-5 w-full">
        <a href="{{ route($ref,['name' => $ref]) }}">
            <h5 class="mb-2 font-mono text-2xl font-bold tracking-[1.5px] text-white">{{ $location }}</h5>
        </a>

        <div class="flex justify-end">
            <a href="{{ route($ref,['name' => strtolower($ref)]) }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800">
                Read more
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</div>
