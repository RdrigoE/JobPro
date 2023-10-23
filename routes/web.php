<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedJobController;
use App\Models\JobListing;
use App\Models\SavedJob;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

Route::get('/', [JobListingController::class, 'index']);


Route::resource('/jobs', JobListingController::class)
    ->only(['index', 'show', 'create', 'store', 'destroy', 'update', 'edit'])
    ->middleware(['auth', 'verified']);

Route::resource('/saved-jobs', SavedJobController::class)
    ->only(['index', 'show', 'create', 'store', 'destroy', 'update', 'edit'])
    ->middleware(['auth', 'verified']);

Route::get('my-jobs', function (): View {
    $user = Auth::user();
    $myJobListings = $user->JobListings()->paginate(8);
    return view('mine', ['jobListings' => $myJobListings]);
})->middleware(['auth', 'verified'])->name('my-jobs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
