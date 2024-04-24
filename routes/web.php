<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return redirect("/par");
})->name("home");

// Route for displaying the list/table
Route::get('/par', [ParController::class, 'index'])->name('par.index');

// Route for displaying the form
Route::get('/par/create', [ParController::class, 'create'])->name('par.create');

// Route for handling form submission
Route::post('/par/store', [ParController::class, 'store'])->name('par.store');

// Define route for displaying the edit form
Route::get('/par/{id}/edit', [ParController::class, 'edit'])->name('par.edit');

// Define route for deleting a record
Route::delete('/par/{id}', [ParController::class, 'destroy'])->name('par.destroy');

// Define the route for updating records
Route::put('/par/{id}', [ParController::class, 'update'])->name('par.update');






