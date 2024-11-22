<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrashProperty;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\AuhController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MessageControllerEvent;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TrashPropertyController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\RentToWhoController;
use App\Http\Controllers\Auth\TenantAuthController;
use App\Http\Controllers\Auth\LandlordAuthController;
use App\Http\Controllers\LandLord\PropertyController;
use App\Http\Controllers\tenant\TenantPropertiesController;
use App\Http\Controllers\tenant\ApplyPropertyHistoryController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;

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
// WEBSITE ROUTES
Route::get('/',[WebController::class,'index'])->name('index');
Route::get('/about',[WebController::class,'about'])->name('about');
Route::get('/help',[WebController::class,'help'])->name('help');
Route::get('/blog',action: [WebController::class,'blog'])->name('blog');
Route::get('/faqs',[WebController::class,'faqs'])->name('faqs');
Route::get('/contact',[WebController::class,'contact'])->name('contact');
Route::get('/services',[WebController::class,'services'])->name('services');
Route::get('/seekingahome',[WebController::class,'seekingahome'])->name('seekingahome');
Route::get('/rentahome',[WebController::class,'rentahome'])->name('rentahome');
Route::get('/info',[WebController::class,'info'])->name('info');
// guest
Route::get('/login',[WebController::class,'login'])->name('login');
Route::get('/register',[WebController::class,'register'])->name('register');
Route::post('/register/store',[AuhController::class,'register'])->name('register.store');
Route::post('/login/store',[AuhController::class,'login'])->name('login.store');
Route::post('/logout',[AuhController::class,'logout'])->name('logout');
Route::get('/verify-code', [AuhController::class, 'verifyCodeView'])->name('verify.code');
Route::post('/reset-verify-code', [AuhController::class, 'resentVerifyCode'])->name('reset.verify.code');
Route::post('/verify-code', [AuhController::class, 'CodeVerify'])->name('verify.code.check');
Route::get('verify-email/{token}', [AuhController::class, 'verify'])->name('verify.email');

Route::get('password/reset', [AuhController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AuhController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuhController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuhController::class, 'reset'])->name('password.update');

// blogs
Route::get('blog', [WebController::class, 'blog'])->name('blog');
Route::get('blog/details/{id}', [WebController::class, 'blogDetails'])->name('blog-details');



// Dashboard Routes
Route::prefix('tenant')->name('tenant.')->group(function () {
    Route::middleware(['auth', 'verified','role:tenant'])->group(function () {
    Route::get('/dashboard',[TenantAuthController::class,'dashboard'])->name('dashboard');
    Route::get('/screening', [TenantPropertiesController::class, 'screening'])->name('screening');
    Route::get('/properties',[TenantPropertiesController::class,'properties'])->name('properties');
    Route::get('/fluter/property/{id}',[TenantPropertiesController::class,'fluterproperty'])->name('fluter.property');
    Route::get('/propertiesdetails/{id}', [TenantPropertiesController::class, 'propertiesdetails'])->name('propertiesdetails');
    Route::get('/propertieslistings',[TenantPropertiesController::class,'propertieslistings'])->name('propertieslistings');
    Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
    Route::get('/wishlist',[DashboardController::class,'wishlist'])->name('wishlist');
    // profile
    Route::get('/profile',[TenantAuthController::class,'profile'])->name('profile');
    Route::post('/profile/update', [TenantAuthController::class, 'updateProfile'])->name('profile.update');
        // wishlist
    Route::post('/wishlistadd', [TenantAuthController::class, 'addToWishlist'])->name('wishlist.add');
     Route::post('/wishlistremove', [TenantAuthController::class, 'removeFromWishlist'])->name('wishlist.remove');
     Route::get('/wishlist/show',[TenantAuthController::class,'showWishlist'])->name('wishlist.show');
    //  Bank Info
    Route::post('/bank', [TenantAuthController::class, 'bank'])->name('bank');

    Route::get('/applyforproperty/{property}/{user}', action: [TenantPropertiesController::class, 'applyForProperty'])->name('applyForProperty');
    Route::get('/applyhistory',action: [ApplyPropertyHistoryController::class,'applyhistory'])->name('applyhistory');

    //chat
     Route::get('chat', [MessageControllerEvent::class, 'go_to_chat'])->name('go.chat');


    Route::get('/fetch-messages', [MessageControllerEvent::class, 'fetchMessages'])->name('fetch.messages');


});
});


// Landlord Routes
Route::prefix('landlord')->name('landlord.')->group(function () {
    Route::middleware(['auth', 'verified', 'role:land_lord'])->group(function () {
    Route::get('/dashboard',[LandlordAuthController::class,'dashboard'])->name('dashboard');
    // properties
    Route::get('property',[PropertyController::class,'properties'])->name('properties');
    Route::get('create/property',[PropertyController::class,'add_property'])->name('add_property');
    Route::post('store/property',[PropertyController::class,'store'])->name('store_property');
    Route::get('/propertiesdetails/{id}', [PropertyController::class, 'propertiesdetails'])->name('propertiesdetails');
    Route::get('edit/property/{id}', [PropertyController::class, 'properties_edit'])->name('properties.edit');
    Route::put('update/property/{id}', [PropertyController::class, 'properties_update'])->name('properties.update');
    Route::post('delete/property/{id}', [PropertyController::class, 'properties_delete'])->name('properties.delete');
    Route::post('store/category',[PropertyController::class,'category_store'])->name('category.store');

      // Trash Properties
      Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/index', [TrashPropertyController::class, 'index'])->name('index');
        Route::match(['get' , 'post'],'{user}/undo', [TrashPropertyController::class, 'undo'])->name('undo'); // Fixed to reference 'user'
    });

    //chat
    Route::get('chat', [MessageControllerEvent::class, 'go_to_chat'])->name('go.chat');

    // profile
    Route::get('/profile',[LandlordAuthController::class,'profile'])->name('profile');
    Route::post('/profile/update', [LandlordAuthController::class, 'updateProfile'])->name('profile.update');
    // Profile end
    });
});
    // Messages routes
    Route::middleware(['auth'])->group(function () {
        Route::post('/message/send', [MessageController::class, 'sendMessage'])->name('message.send');
        Route::get('/messages/{receiverId}', [MessageController::class, 'getMessages'])->name('messages.get');
        // blade message
        Route::get('/messages',[MessageController::class,'messages'])->name('messages');
        Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
    });
    // Messages End routes
    // Notification All get
    Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications')->middleware('auth');
    //Admin Dashboard Routes
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'verified','role:admin|land_lord'])->group(function () {
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('dashboard');
    Route::get('/properties',[AdminPropertyController::class,'properties'])->name(name: 'properties');
    Route::get('/properties/approve/{id}',[AdminPropertyController::class,'propertyApprove'])->name('properties.approve');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::post('/notifications/{id}/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/properties/Bylandlord',[PropertyController::class,'Bylandlord'])->name('properties.bylandlord');
    Route::get('/income_reports',[AdminAuthController::class,'income_reports'])->name('income_reports');
    Route::get('/user_reports',[AdminAuthController::class,'user_reports'])->name('user_reports');
    Route::get('/pricing',[AdminAuthController::class,'pricing'])->name('pricing');
    Route::get('/edit_pricing',[AdminAuthController::class,'edit_pricing'])->name('edit_pricing');
    Route::get('/users',[AdminAuthController::class,'users'])->name('users');
    Route::get('/propertiesdetails/{id}', [AdminPropertyController::class, 'propertiesdetails'])->name('propertiesdetails');

    Route::get('/propertieslistings',[AdminPropertyController::class,'propertieslistings'])->name('propertieslistings');
    Route::get('/wishlist',[AdminAuthController::class,'wishlist'])->name('wishlist');
    // Route::get('/notifications',[AdminAuthController::class,'notifications'])->name('notifications');
    // profile
    Route::get('/profile',[AdminAuthController::class,'profile'])->name('profile');
    Route::post('/profile/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
    //Room Feature
    Route::get('room-features',[AdminAuthController::class,'room_features'])->name('room_features');
    Route::post('store-features',[AdminAuthController::class,'features_store'])->name('features.store');
    Route::get('store-features/show',[AdminAuthController::class,'features_show'])->name('features.show');
    Route::get('roomFeature/{id}/edit', [AdminAuthController::class, 'edit'])->name('roomFeature.edit');
    Route::post('roomFeature/{id}', [AdminAuthController::class, 'update'])->name('roomFeature.update');
    Route::delete('roomFeature/{id}', [AdminAuthController::class, 'destroy'])->name('roomFeature.destroy');
    // pets
    Route::prefix('pets')->name('pets.')->group(function () {
        Route::get('/', [PetController::class, 'index'])->name('index');
        Route::get('create', [PetController::class, 'create'])->name('create');
        Route::post('/', [PetController::class, 'store'])->name('store');
        Route::get('{pet}/edit', [PetController::class, 'edit'])->name('edit');
        Route::post('{pet}', [PetController::class, 'update'])->name('update');
        Route::delete('{pet}', [PetController::class, 'destroy'])->name('destroy');
    });
    //category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::post('{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Trash
    Route::prefix('trash')->name('trash.')->group(function () {
        Route::get('/index', [TrashController::class, 'index'])->name('index');
        Route::get('/search', [TrashController::class, 'search'])->name('search');
        Route::post('{user}/undo', [TrashController::class, 'undo'])->name('undo'); // Fixed to reference 'user'
    });

    //user
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('index');
        Route::get('/search', [UserController::class, 'search'])->name('search');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('{user}', [UserController::class, 'update'])->name('update'); // Fixed to reference 'user'
        Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy'); // Fixed to reference 'user'
    });

    // RentToWho
        Route::prefix('rent-to-who')->name('rent-to-who.')->group(function () {
        Route::get('/', [RentToWhoController::class, 'index'])->name('index');
        Route::get('create', [RentToWhoController::class, 'create'])->name('create');
        Route::post('/', [RentToWhoController::class, 'store'])->name('store');
        Route::get('{id}/edit', [RentToWhoController::class, 'edit'])->name('edit');
        Route::post('{id}', [RentToWhoController::class, 'update'])->name('update');
        Route::delete('{id}', [RentToWhoController::class, 'destroy'])->name('destroy');
    });


      // Blogs
      Route::prefix('blog')->name('blog.')->group(function () {
      Route::get('index', [BlogController::class, 'index'])->name('index');
      Route::get('/create', [BlogController::class, 'create'])->name('create');
      Route::post('/store', [BlogController::class, 'store'])->name('store');
      Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
      Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
      Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('destroy');
    });
});
});

Route::post('tenant/get/messages', [MessageControllerEvent::class, 'getMessages'])->name('tenant.get.messages');
Route::post('tenant/send-message', [MessageControllerEvent::class, 'sendMessage'])->name('tenant.send.message');
