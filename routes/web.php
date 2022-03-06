<?php

use App\Http\Controllers\Auth\LoginFacebookController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\ClientPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class)->except([
        'show'
    ])->names('categories');
    Route::resource('posts', PostController::class)->except([
        'show'
    ])->names('posts');
});
 
Route::get('all-links', [ClientPostController::class, 'index'])->name('all.links');   
// Route::get('login/facebook', [LoginFacebookController::class , 'redirect']);
// Route::get('login/facebook/callback', [LoginFacebookController::class, 'callback']);
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.auth');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);
Route::get('posts_json', [ClientPostController::class, 'posts_json'])->name('posts.json');
Route::get('all-links/search',  [ClientPostController::class, 'search_posts'])->name('search_posts');
Route::get('all-links/category/{category}', [ClientPostController::class, 'by_category'])->name('by_category');
Route::get('link/{post}', [ClientPostController::class, 'post_show'])->name('post_show');
Route::get('/', [ClientPostController::class, 'client_index'])->name('client.index');

Route::get('all-links/tags/{slug}', [ClientPostController::class, 'by_tag'])->name('by_tag');

Route::get('all-categories', [ClientPostController::class, 'all_categories'])->name('all_categories');



Route::get('publishing-rules', function() {
    $breadcrumbs = [
        [
            'url'=>route('client.index'),
            'text'=>'Home',
        ],
        [
            'url'=>route('all.links'),
            'text'=>'All Links',
        ],
        [
            'url'=>'',
            'text'=> 'Publishing Rules',
        ],
    ];
    return view('client.publishing_rules', compact('breadcrumbs'));
})->name('publishing_rules');


Route::get('privacy-policies', function() {
    $breadcrumbs = [
        [
            'url'=>route('client.index'),
            'text'=>'Home',
        ],
        [
            'url'=>route('all.links'),
            'text'=>'All Links',
        ],
        [
            'url'=>'',
            'text'=> 'Policies and privacy',
        ],
    ];
    return view('client.privacy_policies', compact('breadcrumbs'));
})->name('privacy_policies');



// Auth::routes();

// Route::get('profile', function () {
    // Only verified users may enter...
// })->middleware('verified');

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
