<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Admin;
use App\Livewire\History;
use App\Livewire\Realtime;
use App\Livewire\Analitycs;
use App\Livewire\ChartDetail;
use App\Livewire\ChartHome;
use App\Livewire\Login;
use App\Livewire\PowerRealtime;
use App\Livewire\RealtimeDetail;
use Illuminate\Support\Facades\Route;


Route::get("/home",Home::class)->name("home");
Route::get("/",Login::class)->name("login");

Route::get("/realtime",Realtime::class)->name("realtime");
Route::get("/realtime/{name}",PowerRealtime::class)->name("powerRealtime");

Route::get("/chart",ChartHome::class)->name("chart");
Route::get("/chart/{name}",ChartDetail::class)->name("chartDetail");



Route::get("/history",History::class)->name("history");
Route::get("/about",About::class)->name("about");
Route::get("/admin",Admin::class)->name("admin");
