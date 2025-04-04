<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\SmartPhoneController;
use App\Http\Controllers\Backend\AccessoriesController;
use App\Http\Controllers\Backend\DynamicPagesController;
use App\Http\Controllers\Backend\FeaturePhoneController;
use App\Http\Controllers\Backend\PermissionGroupController;
use App\Http\Controllers\Backend\ExploreProductSliderController;
use App\Http\Controllers\Backend\SmartPhoneSpecificationController;
use App\Http\Controllers\Backend\FeaturePhoneSpecificationController;
use App\Http\Controllers\Frontend\category\AccessoriesFrontController;
use App\Http\Controllers\Frontend\category\SmartPhoneFronEndController;
use App\Http\Controllers\Frontend\category\FeaturePhoneFronEndController;
use App\Http\Controllers\Backend\MetaTagController;
use App\Http\Controllers\Backend\BloodGroupController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\BankUserController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\ThanaController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\VillageController;
use App\Http\Controllers\Backend\NewsTickerController;
use App\Http\Controllers\Backend\NewsBoardController;
use App\Http\Controllers\Backend\SpeechController;
use App\Http\Controllers\Backend\ExpensiveController;
use App\Http\Controllers\Backend\ExpensiveAmountController;
use App\Http\Controllers\Backend\JobSeekerController;
use App\Http\Controllers\Frontend\HomeViewController;
use App\Http\Controllers\ComiteeDesignationController;


Route::get('/', [HomeViewController::class, 'index'])->name('homepage');
Route::get('/contact', [HomeViewController::class, 'contact'])->name('contact');

Route::get('/speech-page/{id}', [HomeViewController::class, 'speechPage'])->name('speechPage');
Route::get('/notice-page/{id}', [HomeViewController::class, 'noticePage'])->name('noticePage');
Route::get('/event-page/{id}', [HomeViewController::class, 'eventPage'])->name('eventPage');
Route::get('/search-page', [HomeViewController::class, 'search'])->name('searchPage');

Route::get('/central-community-page', [HomeViewController::class, 'centralCommunity'])->name('centralCommunity');
Route::get('/nawabganj-sub-community-page', [HomeViewController::class, 'nawabganjSubComitee'])->name('nawabganjSubComitee');
Route::get('/dohar-sub-community-page', [HomeViewController::class, 'doharSubComitee'])->name('doharSubComitee');

Route::get('/lifetime-member-page', [HomeViewController::class, 'lifetimeMember'])->name('lifetimeMember');
Route::get('/general-member-page', [HomeViewController::class, 'generalMember'])->name('generalMember');
Route::get('/find-member-page', [HomeViewController::class, 'findMember'])->name('findMember');

Route::get('/jobSeeker-form', [HomeViewController::class, 'jobSeekerForm'])->name('jobSeeker.form');
Route::post('/submit-jobSeeker-form', [HomeViewController::class, 'submitJobSeekerForm'])->name('submit.jobSeeker.form');
Route::get('/register-form', [HomeViewController::class, 'registerForm'])->name('register.form');
Route::post('/submit-register-form', [HomeViewController::class, 'submitRegisterForm'])->name('submit.register.form');

Route::get('/check-job-status', [HomeViewController::class, 'searchStatus'])->name('search.job.status');
Route::post('/feedback-job-status', [HomeViewController::class, 'feedbackStatus'])->name('feedback.job.status');


Route::get('/comitee-designation', [ComiteeDesignationController::class, 'view']);
Route::get('/comitee-designation-list', [ComiteeDesignationController::class, 'edit_view']);
Route::get('/bankuser-info', [ComiteeDesignationController::class, 'bankuser_info']);
Route::post('/store_designation', [ComiteeDesignationController::class, 'store_designation']);
Route::get('/designation-list', [ComiteeDesignationController::class, 'designation_list']);
Route::get('/designation-list-edit/{id}', [ComiteeDesignationController::class, 'designation_list_edit']);
Route::get('/designation-get/{id}', [ComiteeDesignationController::class, 'designation_get']);
Route::post('/update_designation', [ComiteeDesignationController::class, 'update_designation']);
Route::post('/designation-list-delete/{id}', [ComiteeDesignationController::class, 'destroy']);




// wep api
Route::get('get-thanas/{id}', function ($id) {
    return json_encode( App\Models\Thana::where('district_id', $id)->orWhere('name', $id)->get() );
});
Route::get('get-unions/{id}', function ($id) {
    return json_encode( App\Models\Union::where('thana_id', $id)->orWhere('name', $id)->get() );
});
Route::get('get-villages/{id}', function ($id) {
    return json_encode( App\Models\Village::where('union_id', $id)->get() );
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/col', [HomeController::class, 'col'])->name('col');
Route::get('/highlight', [HomeController::class, 'highlight'])->name('highlight');
Route::get('/cat', [HomeController::class, 'cat'])->name('cat');
Route::get('/search/{id}/{cat}', [HomeController::class, 'search'])->name('search');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/category/phone', [HomeController::class, 'categoryPhone'])->name('categry.phone.view');

//slider
Route::middleware(['permission:news.create'])->group(function () {
    Route::get('/collection-add', [NewsController::class, 'create'])->name('news.create');
    Route::post('/collection-add', [NewsController::class, 'store'])->name('news.store');
});

Route::get('/slider-index', [SliderController::class, 'index'])->middleware(['permission:slider.list.view'])->name('slider.list.view');
Route::middleware(['permission:slider.create.view'])->group(function () {

Route::get('/slider-add', [SliderController::class, 'createSlider'])->middleware(['auth'])->name('slider.create.view');
Route::post('/slider-add', [SliderController::class, 'storeSlider'])->name('slider.create');
});
Route::middleware(['permission:slider.edit'])->group(function () {

Route::get('/slider-edit/{id}', [SliderController::class, 'editSlider'])->middleware(['permission:slider.edit'])->name('slider.edit.view');
Route::post('/slider-edit/{id}', [SliderController::class, 'updateSlider'])->middleware(['permission:slider.edit'])->name('slider.edit');
});
Route::middleware(['permission:slider.destroy'])->group(function () {

Route::get('/slider-delete/{id}', [SliderController::class, 'destroySlider'])->middleware(['permission:slider.edit'])->name('slider.destroy');
});


//category
Route::middleware(['permission:category.create'])->group(function () {
    Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create.view');
    Route::post('/category-create',  [CategoryController::class, 'store'])->name('category.create');
});

Route::middleware(['permission:category.list.view'])->group(function () {
    Route::get('/category-list',  [CategoryController::class, 'listView'])->middleware(['permission:category.list.view'])->name('category.list.view');
    Route::get('/category-list-data',  [CategoryController::class, 'list'])->middleware(['permission:category.list.view'])->name('category.list');
});

Route::middleware(['permission:category.edit'])->group(function () {
    Route::get('/category-edit/{id}',  [CategoryController::class, 'edit'])->name('category.edit.view');
    Route::put('/category-edit/{id}',  [CategoryController::class, 'update'])->name('category.edit');
});

Route::delete('/category-delete/{id}', [CategoryController::class, 'destroy'])->middleware(['permission:categories.destroy'])->name('categories.destroy');

// Bank User Management
Route::group(['prefix'=>'/bank-user'], function(){
    Route::get('/manage', [BankUserController::class, 'index'])->name('manage.bankUser');
    Route::get('/pending', [BankUserController::class, 'pending'])->name('pending.bankUser');
    Route::get('/create', [BankUserController::class, 'create'])->name('create.bankUser');
    Route::post('/store', [BankUserController::class, 'store'])->name('store.bankUser');
    Route::get('/edit', [BankUserController::class, 'edit'])->name('edit.bankUser');
    Route::post('/update', [BankUserController::class, 'update'])->name('update.bankUser');
    Route::post('/destroy', [BankUserController::class, 'destroy'])->name('destroy.bankUser');
});

// Job Seeker Group
Route::group(['prefix'=>'/job-seeker'], function(){
    Route::get('/manage', [JobSeekerController::class, 'index'])->name('manage.jobSeeker');
    Route::post('/update', [JobSeekerController::class, 'update'])->name('update.jobSeeker');
    Route::post('/destroy/{id}', [JobSeekerController::class, 'destroy'])->name('destroy.jobSeeker');
});

// Blood Groups
Route::get('/blood-group/manage', [BloodGroupController::class, 'index'])->name('manage.bloodGroup');
Route::post('/blood-group/store', [BloodGroupController::class, 'addBloodGroup'])->name('store.bloodGroup');
Route::get('/blood-group/fetch-all', [BloodGroupController::class, 'fetchAll'])->name('fetchAll.bloodGroup');
Route::get('/blood-group/edit', [BloodGroupController::class, 'edit'])->name('edit.bloodGroup');
Route::post('/blood-group/update', [BloodGroupController::class, 'update'])->name('update.bloodGroup');
Route::delete('/blood-group/destroy', [BloodGroupController::class, 'destroy'])->name('destroy.bloodGroup');

// Designations
Route::get('/designation/manage', [DesignationController::class, 'index'])->name('manage.designation');
Route::post('/designation/store', [DesignationController::class, 'store'])->name('store.designation');
Route::get('/designation/fetch-all', [DesignationController::class, 'fetchAll'])->name('fetchAll.designation');
Route::get('/designation/edit', [DesignationController::class, 'edit'])->name('edit.designation');
Route::post('/designation/update', [DesignationController::class, 'update'])->name('update.designation');
Route::delete('/designation/destroy', [DesignationController::class, 'destroy'])->name('destroy.designation');

// News Ticker Group
Route::group(['prefix'=>'/news-ticker'], function(){
    Route::get('/manage', [NewsTickerController::class, 'index'])->name('news.ticker.manage');
    Route::get('/create', [NewsTickerController::class, 'create'])->name('news.ticker.create');
    Route::post('/store', [NewsTickerController::class, 'store'])->name('news.ticker.store');
    Route::get('/edit/{id}', [NewsTickerController::class, 'edit'])->name('news.ticker.edit');
    Route::post('/update/{id}', [NewsTickerController::class, 'update'])->name('news.ticker.update');
    Route::post('/destroy/{id}', [NewsTickerController::class, 'destroy'])->name('news.ticker.destroy');
});

// NewsBoard and MissionVision Group
Route::group(['prefix'=>'/news-board-vision'], function(){
    Route::get('/manage', [NewsBoardController::class, 'index'])->name('news.vision.manage');
    Route::get('/create', [NewsBoardController::class, 'create'])->name('news.vision.create');
    Route::post('/store', [NewsBoardController::class, 'store'])->name('news.vision.store');
    Route::get('/edit', [NewsBoardController::class, 'edit'])->name('news.vision.edit');
    Route::post('/update', [NewsBoardController::class, 'update'])->name('news.vision.update');
    Route::post('/destroy', [NewsBoardController::class, 'destroy'])->name('news.vision.destroy');
});

// Speech Group
Route::group(['prefix'=>'/speech'], function(){
    Route::get('/manage', [SpeechController::class, 'index'])->name('speech.manage');
    Route::get('/create', [SpeechController::class, 'create'])->name('speech.create');
    Route::post('/store', [SpeechController::class, 'store'])->name('speech.store');
    Route::get('/edit', [SpeechController::class, 'edit'])->name('speech.edit');
    Route::post('/update', [SpeechController::class, 'update'])->name('speech.update');
    Route::post('/destroy', [SpeechController::class, 'destroy'])->name('speech.destroy');
});

// Expensive Type Group
Route::group(['prefix'=>'/expensive-type'], function(){
    Route::get('/manage', [ExpensiveController::class, 'index'])->name('expensive.manage');
    Route::get('/create', [ExpensiveController::class, 'create'])->name('expensive.create');
    Route::post('/store', [ExpensiveController::class, 'store'])->name('expensive.store');
    Route::get('/edit', [ExpensiveController::class, 'edit'])->name('expensive.edit');
    Route::post('/update', [ExpensiveController::class, 'update'])->name('expensive.update');
    Route::post('/destroy', [ExpensiveController::class, 'destroy'])->name('expensive.destroy');
});

// Expensive Amount Group
Route::group(['prefix'=>'/expensive-amount'], function(){
    Route::get('/manage', [ExpensiveAmountController::class, 'index'])->name('expensive.amount.manage');
    Route::get('/create', [ExpensiveAmountController::class, 'create'])->name('expensive.amount.create');
    Route::post('/store', [ExpensiveAmountController::class, 'store'])->name('expensive.amount.store');
    Route::get('/edit', [ExpensiveAmountController::class, 'edit'])->name('expensive.amount.edit');
    Route::post('/update', [ExpensiveAmountController::class, 'update'])->name('expensive.amount.update');
    Route::post('/destroy', [ExpensiveAmountController::class, 'destroy'])->name('expensive.amount.destroy');
});

// District Group
Route::group(['prefix'=>'/district'], function(){
    Route::get('/manage', [DistrictController::class, 'index'])->name('district.manage');
    Route::get('/trash', [DistrictController::class, 'trash'])->name('district.trash');
    Route::get('/create', [DistrictController::class, 'create'])->name('district.create');
    Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
    Route::get('/show', [DistrictController::class, 'show'])->name('district.show');
    Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
    Route::post('/update/{id}', [DistrictController::class, 'update'])->name('district.update');
    Route::post('/destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy');
});

// Thana Group
Route::group(['prefix'=>'/thana'], function(){
    Route::get('/manage', [ThanaController::class, 'index'])->name('thana.manage');
    Route::get('/trash', [ThanaController::class, 'trash'])->name('thana.trash');
    Route::get('/create', [ThanaController::class, 'create'])->name('thana.create');
    Route::post('/store', [ThanaController::class, 'store'])->name('thana.store');
    Route::get('/show', [ThanaController::class, 'show'])->name('thana.show');
    Route::get('/edit/{id}', [ThanaController::class, 'edit'])->name('thana.edit');
    Route::post('/update/{id}', [ThanaController::class, 'update'])->name('thana.update');
    Route::post('/destroy/{id}', [ThanaController::class, 'destroy'])->name('thana.destroy');
});

// Union Group
Route::group(['prefix'=>'/union'], function(){
    Route::get('/manage', [UnionController::class, 'index'])->name('union.manage');
    Route::get('/trash', [UnionController::class, 'trash'])->name('uniontrash');
    Route::get('/create', [UnionController::class, 'create'])->name('union.create');
    Route::post('/store', [UnionController::class, 'store'])->name('union.store');
    Route::get('/show', [UnionController::class, 'show'])->name('union.show');
    Route::get('/edit/{id}', [UnionController::class, 'edit'])->name('union.edit');
    Route::post('/update/{id}', [UnionController::class, 'update'])->name('union.update');
    Route::post('/destroy/{id}', [UnionController::class, 'destroy'])->name('union.destroy');
});

// Village Group
Route::group(['prefix'=>'/village'], function(){
    Route::get('/manage', [VillageController::class, 'index'])->name('village.manage');
    Route::get('/trash', [VillageController::class, 'trash'])->name('village.trash');
    Route::get('/create', [VillageController::class, 'create'])->name('village.create');
    Route::post('/store', [VillageController::class, 'store'])->name('village.store');
    Route::get('/show', [VillageController::class, 'show'])->name('village.show');
    Route::get('/edit/{id}', [VillageController::class, 'edit'])->name('village.edit');
    Route::post('/update/{id}', [VillageController::class, 'update'])->name('village.update');
    Route::post('/destroy/{id}', [VillageController::class, 'destroy'])->name('village.destroy');
});


//user management
    //users ---------- //admin permissions
Route::get('/users-list',  [AdminController::class, 'userList'])->name('admin.user.list');
Route::get('/user-edit/{id}',[AdminController::class, 'userEdit'])->name('admin.user.edit.view');
Route::put('/user-edit/{id}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
Route::delete('/user-delete/{id}',  [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
Route::get('/create-user', [AdminController::class, 'regUser'] )->name('user.create.view');
Route::post('/create-user', [AdminController::class, 'storeUser'])->name('user.create');

//roles
Route::get('/role-list', [RolesController::class, 'index'])->name('admin.roles');
// Route::get('/role-create', 'Auth\RolesController@create')->name('admin.roles.create.view');
 Route::get('/roles-create', [RolesController::class, 'create'])->name('admin.roles.create.view');
Route::post('/roles-create',[RolesController::class, 'store'])->name('admin.roles.create');

Route::get('/role-edit/{id}',[RolesController::class, 'edit'])->name('admin.roles.edit.view');
Route::put('/role-edit/{id}',[RolesController::class, 'update'])->name('admin.roles.update');
Route::delete('/role-delete/{id}',[RolesController::class, 'destroy'])->name('admin.roles.destroy');
  ////permissions


  Route::get('/permission-edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
  Route::put('/permission-edit/{id}', [PermissionController::class, 'update'])->name('permission.update');
  Route::delete('/permission-delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

  //Permission group
  Route::get('/permission-group-list', [PermissionGroupController::class, 'list'])->name('permission.group.list');
  Route::get('/permission-group-list-data', [PermissionGroupController::class, 'listData'])->name('permission.group.list.data');

  Route::get('/permission-group-add', [PermissionGroupController::class, 'create'])->name('permission.group.create');
  Route::post('/permission-group-add', [PermissionGroupController::class, 'store'])->name('permission.group.store');

  Route::get('/permission-group-edit/{id}', [PermissionGroupController::class, 'edit'])->name('permission.group.edit');
  Route::put('/permission-group-edit/{id}', [PermissionGroupController::class, 'update'])->name('permission.group.update');

  Route::delete('/permission-group-delete/{id}', [PermissionGroupController::class, 'destroy'])->name('permission.group.destroy');

  //permission ajax Request
  Route::get('/permission-name-list', [PermissionController::class, 'getPermissionList'])->name('permission.ajax.list');

  Route::get('/permission-list', [PermissionController::class, 'index'])->name('permission.list');
  Route::get('/permission-list-data', [PermissionController::class, 'listData'])->name('permission.list.data');

  Route::get('/permission-create', [PermissionController::class, 'create'])->name('permission.create.view');
  Route::post('/permission-create', [PermissionController::class, 'store'])->name('permission.create');


  //news
  Route::middleware(['permission:news.create'])->group(function () {
  Route::get('/collection-list', [NewsController::class, 'list'])->name('news.list');
  Route::get('/news-list-data', [NewsController::class, 'listData'])->name('news.list.data');
  });


  Route::middleware(['permission:news.edit'])->group(function () {
  Route::get('/collection-edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
  Route::put('/collection-edit/{id}', [NewsController::class, 'update'])->name('news.update');
});
Route::middleware(['permission:news.destroy'])->group(function () {

  Route::delete('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});


  //Frontend  News
//    Route::get('/all-news', [HomeController::class, 'allNews'])->name('front.news.all');

  Route::get('/all-exibition', [HomeController::class, 'allexibition'])->name('front.exibition.all');
  Route::get('/exibition', [HomeController::class, 'exibition'])->name('front.exibition');
  Route::get('/collections', [HomeController::class, 'allcategories'])->name('front.categories.all');
  Route::get('/exibition-details/{id}', [HomeController::class, 'detailsExibition'])->name('front.exibition.details');
  Route::get('/collection/{cat}', [HomeController::class, 'cat_News'])->name('front.cat.all');
  Route::get('/news-details/{id}', [HomeController::class, 'detailsNews'])->name('front.news.details');
  Route::get('/get_ajax_data', [HomeController::class, 'getNewsData'])->name('front.news.get.data');





  //contact us Front
  Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us.view');
  Route::post('/contact-us', [HomeController::class, 'storeContactForm'])->name('contact.us');

  //About us Front
  Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us.view');




















// create accesories promo-slider
Route::middleware(['permission:exibition.create'])->group(function () {
    Route::get('/exibition-create', [AccessoriesController::class, 'sliderCreate'])->name('exibition.create');
    Route::post('/exibition-create', [AccessoriesController::class, 'sliderStore'])->name('exibition.store');
});
// Route::middleware(['permission:exibition.list'])->group(function () {
    Route::get('/exibition-list', [AccessoriesController::class, 'sliderListView'])->middleware(['permission:exibition.list.view'])->name('exibition.list.view');

// });
Route::middleware(['permission:exibition.edit'])->group(function () {
    Route::get('/exibition-edit/{id}', [AccessoriesController::class, 'sliderEdit'])->name('exibition.edit');
    Route::post('/exibition-edit/{id}', [AccessoriesController::class, 'sliderUpdate'])->name('accessories.slider.update');
});

Route::get('/exibition-delete/{id}', [AccessoriesController::class, 'sliderDestroy'])->middleware(['permission:exibition.destroy'])->name('exibition.destroy');





// //about us backend

Route::middleware(['permission:about.us.create'])->group(function () {
    Route::get('/about-us-create', [DynamicPagesController::class, 'aboutUsCreate'])->name('about.us.create.view');
    Route::post('/about-us-create', [DynamicPagesController::class, 'aboutUsStore'])->name('about.us.store');

});
Route::middleware(['permission:about.us.list.view'])->group(function () {
    Route::get('/about-us-list', [DynamicPagesController::class, 'aboutUsListView'])->name('about.us.list.view');
    Route::get('/about-us-list-data', [DynamicPagesController::class, 'aboutUsListData'])->name('about.us.list.data');
    Route::get('/contact-list', [HomeController::class, 'contactlist'])->name('contactlist.view');
    Route::get('/contact-list-data', [HomeController::class, 'contactlistdata'])->name('contactlistdata.view');
});
Route::middleware(['permission:about.us.edit'])->group(function () {
    Route::get('/about-us-edit/{id}', [DynamicPagesController::class, 'aboutUsEdit'])->name('about.us.edit.view');
    Route::put('/about-us-edit/{id}', [DynamicPagesController::class, 'aboutUsUpdate'])->name('about.us.update');
});

Route::get('/about-us-delete/{id}', [DynamicPagesController::class, 'aboutUsDestroy'])->middleware(['permission:about.us.destroy'])->name('about.us.destroy');





Route::get('/clear', function () {
    $exitCode = Artisan::call('optimize');

    return  $exitCode;
});



