<div class="flex-1 items-center  text-white flex 2xl:h-40 h-32 rounded-lg bg-[#202228]">
    <div class=" flex gap-x-2 md:p-0 p-4 items-center w-full justify-items-start md:pl-10">
        <div
            class="  2xl:w-16  2xl:h-16 h-12 w-12 rounded-sm bg-orange-600 bg-opacity-20 flex justify-center items-center">
            <div class="bg-orange-500 w-1/2 h h-1/2 rounded-full">
            </div>
        </div>
        <div>
            <div class="2xl:text-base text-sm">
                {{ $name }}
            </div>
            <div class="flex gap-x-1 items-end">
                <div class="2xl:text-5xl text-4xl tracking-[1px] font-mono" x-text="{{ $value }}">
                </div>
                <div class="font-semibold">
                    {{ $satuan }}
                </div>
            </div>
        </div>

    </div>
</div>