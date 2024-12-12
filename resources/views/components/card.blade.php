<div class="w-full items-center flex  h-36 rounded-lg  {{ $color }} to-90% bg-gradient-to-r">
    <div class="w-full items-center flex justify-around">
        <div class="text-xl flex  items-center gap-x-2">
            <div class="px-2 py-1 {{ $colorText }} rounded bg-white">
                <i class="bi {{ $logo }}"></i>
            </div>
            <div class="text-lg font-semibold {{ $ct }}">
                {{ $name }}
            </div>
        </div>
        <div class="text-3xl items-end gap-x-2 flex font-extrabold font-mono {{ $ct }} ">
            <div x-text="{{ $value }}">

            </div>
            <div class="text-sm mb-1">
                {{ $satuan }}
            </div>
        </div>
    </div>
</div>
