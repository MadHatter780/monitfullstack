<div class="h-16 border-y flex items-center justify-between border-slate-600">
    <div class="flex items-center gap-x-1 text-white ml-2">
        <i class="bi bi-clock"></i>
        <div class="text-xs 2xl:text-sm">
            <div class="text-white border-b font-thin flex items-center gap-x-1 ml-2">
                <div id="clock" class="font-bold"></div>
            </div>
            <div class="text-white font-thin flex items-center gap-x-1 ml-2">
                <div id="day" class="font-bold"></div>
            </div>
        </div>
    </div>
    <div class="mr-7 flex items-center gap-x-2" id="lol">
        <img @click="showOverlay = !showOverlay" src="{{ asset('img/user/tenor.gif') }}"
            class="2xl:w-12 2xl:h-12 w-9 h-9 rounded-full mr-1" alt="">
        <div class="2xl:text-sm md:hidden block text-2xl font-semibold font-mono text-white text-opacity-70">
            <i @click="showOverlay2 = !showOverlay2" class="bi bi-list"></i>
        </div>
        <div class="2xl:text-sm text-[0.6rem] hidden md:block font-semibold font-mono text-white text-opacity-70">
            <div class="tracking-[1px] border-b">
                TRIAL Monitoring
            </div>
            <div class="mt-0.5 w-full flex">
                User
            </div>
        </div>
    </div>
</div>