<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('user/login', 'FrontendController@login')->name('login.form');
Route::post('user/login', 'FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout', 'FrontendController@logout')->name('user.logout');

Route::get('user/register', 'FrontendController@register')->name('register.form');
Route::post('user/register', 'FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/home', 'FrontendController@index');
Route::get('surveydetail/{slug}', 'FrontendController@surveyDetail')->name('surveydetail');
Route::post('/survey/search', 'FrontendController@surveySearch')->name('survey.search');
Route::get('/survey-cat/{slug}', 'FrontendController@surveySubCat')->name('survey-cat');
Route::get('/survey-sub-cat/{slug}/{sub_slug}', 'FrontendController@surveySubCat')->name('survey-sub-cat');
Route::get('/survey-lists', 'FrontendController@surveyLists')->name('survey-lists');
Route::match(['get', 'post'], '/filter', 'FrontendController@surveyFilter')->name('survey.filter');
Route::post('survey/sampling', 'FrontendController@surveySampling')->name('sampling');
Route::get('/downloadPDF', 'FrontendController@createPDF')->name('download');
Route::get('/file/download/{id}', 'FrontendController@downloadFile')->name('downloadFile');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/file-manager', function () {
        return view('backend.layout.file-manager');
    })->name('file-manager');
    //Ангилал
    Route::resource('users', 'UsersController');
    Route::resource('/category', 'CategoryController');
    // Судалгаа
    Route::resource('/survey', 'SurveyController');
    //Filemanager
    Route::resource('/file', 'FileController');
    // Ajax for sub category
    Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
});


Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    Route::get('/', 'HomeController@index')->name('user');
    // Profile
    Route::get('/profile', 'HomeController@profile')->name('user-profile');
    Route::post('/profile/{id}', 'HomeController@profileUpdate')->name('user-profile-update');

    // Survey Review
    Route::get('/user-review', 'HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', 'HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', 'HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', 'HomeController@productReviewUpdate')->name('user.productreview.update');


    Route::get('user-post/comment', 'HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', 'HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', 'HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}', 'HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
