<?php

// use App\Http\Controllers\Controller;
// use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/', 'welcome', ['name'=>'Eric']);
// Route::get('/{get}', ['homeController::class', 'dosomething']);
// Route::view('/', 'home');
Route::get('/', [HomeController::class, 'index']);
Route::get('/news', [NewsController::class, 'list']);
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout']);
// Route::view('/admin', 'backend.module', ['header'=>'網站標題管理', 'module'=>'Title']);
Route::redirect('/admin', '/admin/title');
// Route::view('/admin', 'backend.title');
// Route::view('/admin', 'module');
// Route::view('/admin/title', 'backend.module');
// Route::prefix('admin')->group(function(){
//     Route::view('/', 'backend.title');
//     Route::view('/title', 'backend.title');
//     Route::view('/ad', 'backend.ad');
// });

// Route::get('/admin/{module}', function($module){
//     switch($module){
//         case "title":
//             return view('backend.module', ['header'=>'網站標題管理', 'module'=>'Title']);
//         break;
//         case "ad":
//             return view('backend.module', ['header'=>'動態廣告文字管理', 'module'=>'Ad']);
//         break;
//         case "image":
//             return view('backend.module', ['header'=>'校園映像圖片管理', 'module'=>'Image']);
//         break;
//         case "mvim":
//             return view('backend.module', ['header'=>'動畫圖片管理', 'module'=>'Mvim']);
//         break;
//         case "total":
//             return view('backend.module', ['header'=>'進站人數管理', 'module'=>'Total']);
//         break;
//         case "bottom":
//             return view('backend.module', ['header'=>'頁尾版權管理', 'module'=>'Bottom']);
//         break;
//         case "news":
//             return view('backend.module', ['header'=>'最新消息管理', 'module'=>'News']);
//         break;
//         case "admin":
//             return view('backend.module', ['header'=>'管理者管理', 'module'=>'Admin']);
//         break;
//         case "menu":
//             return view('backend.module', ['header'=>'選單管理', 'module'=>'Menu']);
//         break;
//     }
// });

// Route::get('admin', [App\Http\Controllers\TitleController::class, 'index']);
// Route::get('admin', [TitleController::class, 'index']);
// Route::prefix('admin')->middleware('auth')->group(function(){
Route::prefix('admin')->group(function(){
    //get
    Route::get('/title' ,[TitleController::class, 'index']);
    Route::get('/ad' ,[AdController::class, 'index']);
    Route::get('/image' ,[ImageController::class, 'index']);
    Route::get('/mvim' ,[MvimController::class, 'index']);
    Route::get('/total' ,[TotalController::class, 'index']);
    Route::get('/bottom' ,[BottomController::class, 'index']);
    Route::get('/news' ,[NewsController::class, 'index']);
    Route::get('/admin' ,[AdminController::class, 'index']); 
    Route::get('/menu' ,[MenuController::class, 'index']);
    Route::get('/submenu/{menu_id}' ,[SubMenuController::class, 'index']);
    
    //post
    Route::post('/title' ,[TitleController::class, 'store']);
    Route::post('/ad' ,[AdController::class, 'store']);
    Route::post('/image' ,[ImageController::class, 'store']);
    Route::post('/mvim' ,[MvimController::class, 'store']);
    Route::post('/news' ,[NewsController::class, 'store']);
    Route::post('/admin' ,[AdminController::class, 'store']); 
    Route::post('/menu' ,[MenuController::class, 'store']);
    Route::post('/submenu/{menu_id}' ,[SubMenuController::class, 'store']);

    //update
    Route::patch("/title/{id}", [TitleController::class, 'update']); //也可用post
    Route::patch("/ad/{id}", [AdController::class, 'update']);
    Route::patch("/image/{id}", [ImageController::class, 'update']);
    Route::patch("/mvim/{id}", [MvimController::class, 'update']);
    Route::patch("/total/{id}", [TotalController::class, 'update']);
    Route::patch("/bottom/{id}", [BottomController::class, 'update']);
    Route::patch("/news/{id}", [NewsController::class, 'update']);
    Route::patch("/admin/{id}", [AdminController::class, 'update']);
    Route::patch("/menu/{id}", [MenuController::class, 'update']);
    Route::patch("/submenu/{id}", [SubMenuController::class, 'update']);
    
    //delete
    Route::delete("/title/{id}", [TitleController::class, 'destroy']); //也可用post
    Route::delete("/ad/{id}", [AdController::class, 'destroy']);
    Route::delete("/image/{id}", [ImageController::class, 'destroy']);
    Route::delete("/mvim/{id}", [MvimController::class, 'destroy']);
    Route::delete("/news/{id}", [NewsController::class, 'destroy']);
    Route::delete("/admin/{id}", [AdminController::class, 'destroy']);
    Route::delete("/menu/{id}", [MenuController::class, 'destroy']);
    Route::delete("/submenu/{id}", [SubMenuController::class, 'destroy']);
    
    //show
    Route::patch("/title/sh/{id}", [TitleController::class, 'display']); //也可用post
    Route::patch("/ad/sh/{id}", [AdController::class, 'display']);
    Route::patch("/image/sh/{id}", [ImageController::class, 'display']);
    Route::patch("/mvim/sh/{id}", [MvimController::class, 'display']);
    Route::patch("/news/sh/{id}", [NewsController::class, 'display']);
    Route::patch("/menu/sh/{id}", [MenuController::class, 'display']);
});


//modals

// Route::view("/modals/addTitle", 'modals.base_modal', ['modal_header'=>'新增網站標題']);
// Route::view("/modals/addAd", 'modals.base_modal', ['modal_header'=>'新增動態廣告文字']);
// Route::view("/modals/addImage", 'modals.base_modal', ['modal_header'=>'校園映像圖片管理']);
// Route::view("/modals/addMvim", 'modals.base_modal', ['modal_header'=>'動畫圖片管理']);
// Route::view("/modals/addTotal", 'modals.base_modal', ['modal_header'=>'進站人數管理']);
// Route::view("/modals/addBottom", 'modals.base_modal', ['modal_header'=>'頁尾版權管理']);
// Route::view("/modals/addNews", 'modals.base_modal', ['modal_header'=>'最新消息管理']);
// Route::view("/modals/addAdmin", 'modals.base_modal', ['modal_header'=>'管理者管理']);
// Route::view("/modals/addMenu", 'modals.base_modal', ['modal_header'=>'選單管理']);
Route::get("/modals/addTitle", [TitleController::class, 'create']);
Route::get("/modals/addAd", [AdController::class, 'create']);
Route::get("/modals/addImage", [ImageController::class, 'create']);
Route::get("/modals/addMvim", [MvimController::class, 'create']);
Route::get("/modals/addNews", [NewsController::class, 'create']);
Route::get("/modals/addAdmin", [AdminController::class, 'create']);
Route::get("/modals/addMenu", [MenuController::class, 'create']);
Route::get("/modals/addSubMenu/{menu_id}", [SubMenuController::class, 'create']);

//edit
Route::get("/modals/title/{id}", [TitleController::class, 'edit']);
Route::get("/modals/ad/{id}", [AdController::class, 'edit']);
Route::get("/modals/image/{id}", [ImageController::class, 'edit']);
Route::get("/modals/mvim/{id}", [MvimController::class, 'edit']);
Route::get("/modals/total/{id}", [TotalController::class, 'edit']);
Route::get("/modals/bottom/{id}", [BottomController::class, 'edit']);
Route::get("/modals/news/{id}", [NewsController::class, 'edit']);
Route::get("/modals/admin/{id}", [AdminController::class, 'edit']);
Route::get("/modals/menu/{id}", [MenuController::class, 'edit']);
Route::get("/modals/submenu/{id}", [SubMenuController::class, 'edit']);

//unit test
Route::get('/posts','App\Http\Controllers\PostController@index');
Route::post('/posts/store','App\Http\Controllers\PostController@store');
Route::match(['get','post'],'/posts/{id}','App\Http\Controllers\PostController@show');