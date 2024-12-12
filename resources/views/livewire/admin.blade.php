<div class="p-4">
    <x-title name="Admin Mode" logo="bi bi-person" color="from-[#f3c74e] from-10% to-[#f9b012]" />
    <x-sub-nav>
        <div>
            <i class="bi bi-person"></i>
        </div>
        <div class="text-white underline ">
            Admin Mode
        </div>
        <div>
            /
        </div>
    </x-sub-nav>
    <div class=" mt-4 grid grid-cols-4 gap-4 px-10">
        <x-card-admin name="Manage User" location="User"
            image="https://png.pngtree.com/thumb_back/fh260/background/20210924/pngtree-computer-lighting-technology-theme-user-link-intelligent-background-image_905379.png" />
    </div>


    {{-- <div class="py-2 overflow-y-auto">
        <div class="bg-[#070712] bg-opacity-20 py-2 pt-10 rounded-lg" id="lol">
            <div class="gap-x-10 w-full grid grid-cols-4 gap-4 px-10">
                <x-card color="from-[rgb(199,104,228)] to-[#a506e4]" name="Current" colorText="text-[#a506e4]"
                    logo="bi-lightning-fill" satuan="" />
                <x-card color="from-[#f75849] to-[#de4233]" name="Voltage" colorText="text-[#de4233]"
                    logo="bi-lightning-fill" satuan="" />
                <x-card color="from-[#6b88ff] to-[#072ce9]" name="Modbus A" colorText="text-[#072ce9]"
                    logo="bi-calendar" satuan="" />
                <x-card color="from-[#7ce7b0] to-[#07e916]" name="Modbus B" colorText="text-[#07e916]" logo="bi-clock"
                    satuan="" />
                <x-card color="from-[#7ce7b0] to-[#07e916]" name="Modbus C" colorText="text-[#07e916]" logo="bi-clock"
                    satuan="" />
                <x-card color="from-[#7ce7b0] to-[#07e916]" name="Modbus D" colorText="text-[#07e916]" logo="bi-clock"
                    satuan="" />
            </div>

            <div x-data="{ count: 0 }" class="py-4">
                <div class="flex text-sm font-mono relative mt-6">
                    <div class="absolute z-0 w-full bg-slate-500 h-[0.050rem] bottom-0"></div>
                    <x-button-folder value=0 name="Table" />
                    <x-button-folder value=1 name="Chart" />
                </div>

            </div>
        </div>
    </div> --}}
</div>