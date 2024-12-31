@php
$notActive = "hover:bg-gradient-to-r ease-in-out hover:text-white text-slate-500 tracking-[1px]";
$active = "bg-gradient-to-r text-white";
@endphp

<div
    class="w-full {{ request()->is(strtolower($name) . '*') ? 'border-r-2 border-[#de4233]' : '' }} flex justify-center">
    <a href="{{ route(strtolower($name)) }}"
        class="{{ request()->is(strtolower($name) . '*') ? $active : $notActive }} 2xl:h-12 2xl:w-12 w-8 h-8 justify-center rounded-full flex items-center gap-x-4  md:py-2.5 py-1 2xl:text-base text-xs font-bold  tracking-[1px] from-[#ec6d61] to-[#de4233] to-90%">
        <div>
            <i class="bi {{ $logo }}"></i>
        </div>

    </a>

</div>