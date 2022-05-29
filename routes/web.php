<?php

use App\Http\Controllers\Client\GalleryController as ClientGalleryController;
use App\Http\Controllers\Client\MyCommentController as ClientMyCommentController;
use App\Http\Controllers\Client\MyPostController;
use App\Http\Controllers\Client\MySupportController;
use App\Http\Controllers\Client\PictureController as ClientPictureController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ProfileController as ClientProfileController;
use App\Http\Controllers\Client\RoleController as ClientRoleController;
use App\Http\Controllers\Client\SupportController;
use App\Http\Controllers\Client\UserController as ClientUserController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Client\CommentController as ClientCommentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Website\LikeController;
use App\Http\Controllers\Website\LoginController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Website\PasswordResetController;
use App\Http\Controllers\Website\PostController;
use App\Http\Controllers\Website\RegisterController;
use App\Http\Controllers\Website\SaveController;
use App\Http\Controllers\Client\SaveController as ClientSaveController;
use App\Http\Controllers\Website\SearchController;
use App\Http\Middleware\CheckPermissionMiddleware;
use App\Models\Role;
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

Route::prefix('')->name('website.')->group(function (){

    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::controller(LoginController::class)->group(function (){
        Route::get('/login','create')->name('login.create')->middleware('guest');
        Route::post('/login','store')->name('login.store')->middleware('guest');
        Route::delete('/logout','destroy')->name('logout');
    });

    Route::controller(RegisterController::class)->middleware('guest')->name('register.')->group(function (){
        Route::get('/register','create')->name('create');
        Route::post('/register','store')->name('store');
        Route::get('/register/email/success','success')->name('success');
        Route::get('/register/{verifyEmail}','verifyemail')->name('verifyemail');
        Route::get('/register/{verifyEmail}/name','name')->name('name');
        Route::patch('/register/{verifyEmail}/name','namestore')->name('name.store');
        Route::get('/register/{verifyEmail}/password','password')->name('password');
        Route::patch('/register/{verifyEmail}/password','passwordstore')->name('password.store');
        Route::get('/register/{verifyEmail}/profile','profile')->name('profile');
        Route::patch('/register/{verifyEmail}/profile','profilestore')->name('profile.store');
    });

    Route::controller(PostController::class)->name('post.')->group(function (){
        Route::get('/post/{post}','show')->name('show');
    });

    Route::controller(CommentController::class)->name('comment.')->group(function (){
        Route::post('/post/{post}/comment','store')->name('store');
        Route::post('/post/{post}/comment/{comment}','awnser')->name('awnser');
    });

    Route::controller(\App\Http\Controllers\Website\ContactController::class)->name('contact.')->group(function (){
        Route::get('/contact','create')->name('create');
        Route::post('/contact','store')->name('store');
    });

    Route::view('/aboutus','website.aboutus.show')->name('aboutus.show');

    Route::get('/search',[SearchController::class,'index'])->name('search.index');

    Route::get('/category/{category}',[CategoryController::class,'show'])->name('category.show');

    Route::controller(PasswordResetController::class)->name('passwordreset.')->group(function (){
        Route::get('/passwordreset','create')->name('create');
        Route::post('/passwordreset','store')->name('store');
        Route::get('/passwordreset/mail/success','mailsuccess')->name('mail.success');
        Route::get('/passwordreset/success','success')->name('success');
        Route::get('/passwordreset/{passwordReset}','passwordedit')->name('password.edit');
        Route::patch('/passwordreset/{passwordReset}','passwordupdate')->name('password.update');
    });
});


Route::prefix('/panel')->name('client.')->middleware(['auth',CheckPermissionMiddleware::class . ':view-client-dashboard'])->group(function (){

    Route::get('/',[ClientHomeController::class,'index'])->name('home');
    Route::post('/menu',[ClientHomeController::class,'menu'])->name('menu');

    Route::controller(MyPostController::class)->name('myposts.')->group(function (){
        Route::get('/myposts','index')->name('index');
        Route::get('/myposts/{post}/edit','edit')->name('edit');
        Route::patch('/myposts/{post}','update')->name('update');
        Route::delete('/myposts/{post}','destroy')->name('destroy');
    });

    Route::controller(ClientPostController::class)->group(function (){
        Route::get('/posts','index')->name('post.index');
        Route::get('/post/create','create')->name('post.create');
        Route::post('/post/create','store')->name('post.store');
        Route::get('/post/{post}/edit','edit')->name('post.edit');
        Route::patch('/post/{post}','update')->name('post.update');
        Route::delete('/post/{post}','destroy')->name('post.destroy');
        Route::post('/morepost','morepost')->name('post.morepost');
    });

    Route::controller(ClientCategoryController::class)->group(function (){
        Route::get('/categories','index')->name('category.index');
        Route::get('/category/create','create')->name('category.create');
        Route::post('/category/create','store')->name('category.store');
        Route::get('/category/{category}/edit','edit')->name('category.edit');
        Route::patch('/category/{category}','update')->name('category.update');
        Route::delete('/category/{category}','destroy')->name('category.destroy');
    });

    Route::controller(ClientUserController::class)->name('user.')->group(function (){
        Route::get('/users','index')->name('index');
        Route::get('/user/create','create')->name('create');
        Route::post('/user/create','store')->name('store');
        Route::get('/user/{user}/edit','edit')->name('edit');
        Route::patch('/user/{user}','update')->name('update');
        Route::delete('/user/{user}','destroy')->name('destroy');
    });

    Route::controller(ClientRoleController::class)->name('role.')->group(function (){
        Route::get('/roles','index')->name('index');
        Route::get('/role/create','create')->name('create');
        Route::post('/role/create','store')->name('store');
        Route::get('/role/{role}/edit','edit')->name('edit');
        Route::patch('/role/{role}','update')->name('update');
        Route::delete('/role/{role}','destroy')->name('destroy');
    });

    Route::controller(ClientGalleryController::class)->name('gallery.')->group(function (){
        Route::get('/galleries','index')->name('index');
        Route::get('/gallery/create','create')->name('create');
        Route::post('/gallery/create','store')->name('store');
        Route::get('/gallery/{gallery}/edit','edit')->name('edit');
        Route::patch('/gallery/{gallery}','update')->name('update');
        Route::delete('/gallery/{gallery}','destroy')->name('destroy');
    });

    Route::controller(ClientPictureController::class)->name('picture.')->group(function (){
        Route::get('/gallery/{gallery}/pictures','index')->name('index');
        Route::post('/gallery/{gallery}/pictures','store')->name('store');
        Route::delete('/gallery/{gallery}/picture/{picture}','destroy')->name('destroy')->scopeBindings();
    });

    Route::controller(ClientSaveController::class)->name('save.')->group(function (){
        Route::get('/saves','index')->name('index');
        Route::delete('/save/{post}','destroy')->name('destroy');
    });

    Route::controller(ClientCommentController::class)->name('comment.')->group(function (){
        Route::get('/post/{post}/comments','index')->name('index');
    });

    Route::controller(ClientMyCommentController::class)->name('mycomment.')->group(function (){
        Route::get('/mypost/{post}/comments','index')->name('index');
    });

    Route::controller(ClientProfileController::class)->name('profile.')->group(function (){
        Route::get('/profile/edit','edit')->name('edit');
        Route::patch('/profile/edit','update')->name('update');
    });

    Route::controller(MySupportController::class)->name('mysupport.')->group(function (){
        Route::get('/mysupports','index')->name('index');
        Route::get('/mysupport/create','create')->name('create');
        Route::post('/mysupport/create','store')->name('store');
        Route::get('/mysupport/{startSupport}','show')->name('show');
        Route::post('/mysupport/{startSupport}/reply','reply')->name('reply');
    });

    Route::controller(SupportController::class)->name('support.')->group(function (){
        Route::get('/supports','index')->name('index');
        Route::get('/support/{startSupport}','show')->name('show');
        Route::post('/support/{startSupport}/reply','reply')->name('reply');
    });


});
