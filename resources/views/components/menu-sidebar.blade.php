@php
$notActive = "hover:bg-gradient-to-r ease-in-out hover:text-white text-slate-500 tracking-[1px]";
$active = "bg-gradient-to-r text-white";
@endphp

<a href="{{ route(strtolower($name)) }}"
    class="{{ request()->is(strtolower($name) . '*') ? $active : $notActive }} flex items-center gap-x-4 md:px-8 px-2 md:py-2.5 py-1 md:text-base text-sm font-bold rounded-sm tracking-[1px] from-[#ec6d61] to-[#de4233] to-90%">
    <div>
        <i class="bi {{ $logo }}"></i>
    </div>
    <div>
        {{ $name }}
    </div>
</a>