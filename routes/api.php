<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('events', 'EventController');
Route::apiResource('presences', 'PresenceController');
