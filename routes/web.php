<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIChatController;

Route::middleware(['auth'])->group(function () {
    Route::post('/ai/chat', [AIChatController::class, 'chat']);
});
