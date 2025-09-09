<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use App\Models\Brand;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/clear-cache', function () {
   $exitCode = Artisan::call('optimize:clear');
    return '<h1>Cache facade value cleared</h1>';
});


Route::get('/', [IndexController::class, 'Home'])->name('home');
Route::get('/about-us', [IndexController::class, 'About'])->name('about-us');
Route::get('/solutions', [IndexController::class, 'Services'])->name('solutions');
Route::get('/solutions/{slug}', [IndexController::class, 'ServiceDetailsBySlug'])->name('service.details');
Route::post('/solutions/enquery', [IndexController::class, 'ServiceEnquiry'])->name('service.enquiry');
Route::get('/brands', [IndexController::class, 'Brands'])->name('brands');
Route::get('/blogs', [IndexController::class, 'Blogs'])->name('blogs');
Route::get('/blog/{blog_slug}', [IndexController::class, 'BlogDetails'])->name('blog.details');
Route::get('/projects', [IndexController::class, 'Project'])->name('projects');
Route::get('/project/{slug}', [IndexController::class, 'ProjectDetails'])->name('project.details');
Route::get('/contact-us', [IndexController::class, 'Contact'])->name('contact-us');
Route::post('/contact-us', [IndexController::class, 'ContactSend'])->name('contact.send');

Route::get('/thank-you', [IndexController::class, 'Thankyou'])->name('thank-you');
require __DIR__.'/admin.php';
// require __DIR__ . '/auth.php';
