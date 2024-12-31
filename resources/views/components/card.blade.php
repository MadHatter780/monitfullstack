<div class="w-full flex  2xl:h-48 h-40 rounded-lg  {{ $color }} to-90% bg-gradient-to-r">
    <div class="w-full flex  flex-col ">
        <div class="flex">
            <div class="2xl:text-xl items-center text-sm flex gap-x-2 p-2">
                <div class="">
                    <div class="px-2 py-1 {{ $colorText }} rounded bg-white">
                        <i class="bi {{ $logo }}"></i>
                    </div>
                </div>
                <div class=" font-semibold {{ $ct }}">
                    {{ $name }}
                </div>
            </div>
        </div>
        <div
            class="text-3xl h-full -mt-5  items-center justify-center gap-x-2 flex font-extrabold font-mono {{ $ct }} ">
            <div class="flex items-end">
                <div class="2xl:text-6xl text-5xl">
                    <div x-text="{{ $value }}" class="">

                    </div>
                </div>

                <div class="text-sm mb-1">
                    {{ $satuan }}
                </div>
            </div>
        </div>
    </div>
</div>