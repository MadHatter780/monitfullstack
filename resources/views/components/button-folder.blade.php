<button @click=" count = {{ $value }}"
    :class=" count == {{ $value }} ? 'border-x-2 border-t-2 border-b-[#302c44]' : ''   "
    class=" z-10 ml-2  border-b   pr-16 pl-5 rounded-t-xl border-slate-500 tracking-[1.5px] pt-2.5 text-white pb-2 ">
    {{ $name }}
</button>