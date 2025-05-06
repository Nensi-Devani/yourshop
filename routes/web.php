<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/',App\Livewire\Frontend\Index::class);
Route::get('/categories',App\Livewire\Frontend\Categories::class);
Route::get('/categories/{categorySlug}',App\Livewire\Frontend\Products::class);
Route::get('/categories/{categorySlug}/{productSlug}',App\Livewire\Frontend\ProductView::class);
Route::get('/new-arrivals',App\Livewire\Frontend\NewArrival::class);
Route::get('/featured',App\Livewire\Frontend\Featured::class);
Route::get('/home-applience',App\Livewire\Frontend\HomeApplience::class);
Route::get('/jewellery',App\Livewire\Frontend\Jewellery::class);
Route::get('/photos-idol',App\Livewire\Frontend\PhotosIdol::class);
Route::get('/search','App\Http\Controllers\Frontend\SearchController@searchProducts');

Route::middleware(['auth'])->group(function(){
    Route::get('/profile',App\Livewire\Frontend\UserProfile::class);
    Route::get('/wishlist',App\Livewire\Frontend\Wishlist::class);
    Route::get('/cart',App\Livewire\Frontend\Cart::class);
    Route::get('/checkout',App\Livewire\Frontend\Checkout::class);
    Route::get('/buy-now/{productSlug}/{c}/{quantity}',App\Livewire\Frontend\BuyNow::class);
    Route::get('/thank-you',App\Livewire\Frontend\ThankYou::class)->name('success');
    Route::get('/orders',App\Livewire\Frontend\Orders::class);
    Route::get('/orders/{orderId}/order-information/{orderItemId}',App\Livewire\Frontend\OrderInformation::class);
    // to download the invoice
    Route::controller(OrderController::class)->group(function(){
        Route::get('downloadInvoice/{orderId}/generate/{orderItemId}','downloadInvoice');
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('profile',App\Livewire\Admin\Profile::class);

    Route::get('/orders',App\Livewire\Admin\Orders\Index::class);
    Route::get('/orders/{orderId}',App\Livewire\Admin\Orders\View::class);
    Route::controller(OrderController::class)->group(function(){
        Route::get('orders/invoice/{orderId}','viewInvoice');
        Route::get('orders/invoice/{orderId}/generate','generateInvoice');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('category','index');
        Route::get('category/create-category','create');
        Route::post('category','store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category_id}','update');
    });

    Route::get('/sub-categories',App\Livewire\Admin\SubCategory\Index::class);

    // for products
    Route::get('/products/create-product',App\Livewire\Admin\Product\Create::class);
    Route::get('/product/{product_id}/add-color',App\Livewire\Admin\Product\CreateAnotherColor::class);
    Route::get('/product/{product_id}/edit',App\Livewire\Admin\Product\Edit::class);

    Route::controller(ProductController::class)->group(function(){
        Route::get('products','index');
        // Route::get('products/create','create');
        // Route::post('products','store');
        // Route::get('products/{product}/edit','edit');
        // Route::put('products/{product_id}','update');
        Route::get('products-img/{productImgId}/delete','destroyImage'); // to delete image individual
        Route::post('product-color/{pro_color_id}','updateProductColor'); // to update color quantity for the product
        Route::get('product-color/{pro_color_id}/delete','deleteProductColor'); // to update color quantity for the product
    });
    Route::get('/brands',App\Livewire\Admin\Brand\Index::class); // using livewire only
    Route::get('/materials',App\Livewire\Admin\Material\Index::class); // using livewire only
    Route::get('/colors',App\Livewire\Admin\Color\Index::class);
    Route::get('/sizes',App\Livewire\Admin\Size\Index::class); // using livewire only
    // for user
    Route::get('/users',App\Livewire\Admin\User\Index::class); // using livewire only
    Route::get('/user/create-user',App\Livewire\Admin\User\Create::class);
    Route::get('/user/{user_id}/edit',App\Livewire\Admin\User\Edit::class);

    Route::get('/sliders',App\Livewire\Admin\Slider\Index::class);
    Route::get('/settings',App\Livewire\Admin\Setting\Index::class);
});
