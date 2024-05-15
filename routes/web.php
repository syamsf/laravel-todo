<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->prefix("todo")->name("todo.")->group(function () {
    Route::get("/", [\App\Http\Controllers\ToDo\ToDoWebController::class, "showAll"])->name("show-all");
    Route::get("/create", [\App\Http\Controllers\ToDo\ToDoWebController::class, "create"])->name("create-form");
    Route::get("/update/{id}", [\App\Http\Controllers\ToDo\ToDoWebController::class, "update"])->name("update-form");

    Route::post("/mark-done/{id}", [\App\Http\Controllers\ToDo\ToDoProvisioningController::class, "markAsDone"])->name("mark-as-done");
    Route::post("/", [\App\Http\Controllers\ToDo\ToDoProvisioningController::class, "create"])->name("create");
    Route::put("/{id}", [\App\Http\Controllers\ToDo\ToDoProvisioningController::class, "update"])->name("update");
});
