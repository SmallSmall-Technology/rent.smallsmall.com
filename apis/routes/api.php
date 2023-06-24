<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {

    Route::get('articles', 'ArticleController@index');
    Route::get('articles/{id}', 'ArticleController@show');
    Route::post('articles', 'ArticleController@store');
    Route::put('articles/{id}', 'ArticleController@update');
    Route::delete('articles/{id}', 'ArticleController@delete');
    
});

Route::get('verified-user/{id}', 'VerifiedUserController@show');
Route::get('profile/{id}', 'UserProfileController@show');
Route::put('profile', 'UserProfileController@update');
Route::put('profile_image', 'UserImageController@update');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');


Route::get('residentials/{id}', 'ResidentialController@show')->name('residential_detail_by_id');
Route::get('residentials/', 'ResidentialController@index')->name('residential_all_no_offset_limit');
Route::get('residentials_price_range', 'ResidentialController@price_range');
Route::get('residentials/{limit}/{offset}', 'ResidentialController@index')->name('residential_all');
Route::get('residentials_featured/{limit}/{offset}', 'FeaturedResidentialController@index')->name('featured_residential_all');
Route::get('residentials_featured/', 'FeaturedResidentialController@index')->name('featured_residential_all_no_offset_limit');
Route::get('residentials_filter/', 'ResidentialController@search')->name('residential_filter');
Route::post('residentials_inspection/', 'ResidentialInspectionController@store')->name('residential_inspection');

Route::get('storages/{id}', 'StorageController@show')->name('storage_detail_by_id');
Route::get('storages/', 'StorageController@index')->name('storage_all_no_offset_limit');
Route::get('storages_price_range', 'StorageController@price_range');
Route::get('storages_sqm_range', 'StorageController@sqm_range');
Route::get('storages/{limit}/{offset}', 'StorageController@index')->name('storage_all');
Route::get('storages_filter', 'StorageController@search')->name('storage_filter');
Route::post('storages_inspection/', 'StorageInspectionController@store')->name('storage_inspection');

Route::get('furnisures/{id}', 'FurnisureController@show')->name('furnisure_detail_by_id');
Route::get('furnisures/', 'FurnisureController@index')->name('furnisure_all_no_offset_limit');
Route::get('furnisures_price_range', 'FurnisureController@price_range');
Route::get('furnisures/{limit}/{offset}', 'FurnisureController@index')->name('furnisure_all');
Route::get('furnisures_filter/', 'FurnisureController@search')->name('furnisure_filter');

Route::get('coworkings/{id}', 'CoworkingController@show')->name('coworking_detail_by_id');
Route::get('coworkings/', 'CoworkingController@index')->name('coworking_all_no_offset_limit');
Route::get('coworkings_price_range', 'CoworkingController@price_range');
Route::get('coworkings_interest_types', 'CoworkingController@interest_types');
Route::get('coworkings/{limit}/{offset}', 'CoworkingController@index')->name('coworking_all');
Route::get('coworkings_filter', 'CoworkingController@search')->name('coworking_filter');
Route::post('coworkings_inspection/', 'CoworkingInspectionController@store')->name('coworking_inspection');

Route::post('send_test_email', function(){

    Validator::make(request()->input(), [
        'email' => 'required',
    ])->validate();
    Mail::raw('Test Sending emails with Mailgun and Laravel !', function($message)
    {
        $message->from('no-reply@website_name.com', 'RentSmallSmall Test Mail');
        $message->to(request()->input('email'));
    });
  });

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/payment/webhook', 'PaymentController@handleGatewayWebhook');

Route::get('bookings/', 'BookingController@index')->name('booking_all_no_offset_limit');
Route::get('bookings/{limit}/{offset}', 'BookingController@index')->name('booking_all');

Route::get('payment_history/', 'PaymentHistoryController@index')->name('payment_history_all_no_offset_limit');
Route::get('payment_history/{limit}/{offset}', 'PaymentHistoryController@index')->name('payment_history_all');

Route::get('topic_detail/{id}', 'TopicController@show')->name('topic_detail_by_id');
Route::get('topics/', 'TopicController@index')->name('topics');
Route::get('topics/{limit}/{offset}', 'TopicController@index')->name('topics_limit_offset');
Route::post('topics/', 'TopicController@create')->name('create_topic');

Route::get('messages/{id}', 'MessageController@show')->name('message_by_id');
Route::get('messages/', 'MessageController@index')->name('messages');


Route::get('topic_messages/', 'TopicMessageController@index')->name('topic_messages');
Route::get('topic_messages/{limit}/{offset}', 'TopicMessageController@index')->name('topic_message_limit_offset');
Route::post('topic_messages/', 'TopicMessageController@create')->name('post_message');


Route::get('user_favorites', 'FavoriteController@index')->name('user_favorites');
Route::get('user_favorites/{limit}/{offset}', 'FavoriteController@index')->name('user_favorites_limit_offset');
Route::post('user_favorites', 'FavoriteController@create')->name('post_favorite');
Route::delete('user_favorites', 'FavoriteController@delete')->name('delete_favorite');


Route::get('locations/{id}', 'LocationController@show')->name('location_detail_by_id');
Route::get('locations/', 'LocationController@index')->name('locations');
Route::get('locations/{limit}/{offset}', 'LocationController@index')->name('locations_limit_offset');


Route::post('verification', 'UserVerificationController@store')->name('post_verification');
Route::get('verification/{id}', 'UserVerificationController@show')->name('get_verification');

Route::get('home_stats', 'HomeStatsController@index')->name('home_stats');

Route::get('upcoming_locations', 'UpcomingLocationController@index');
Route::get('upcoming_locations/{limit}/{offset}', 'UpcomingLocationController@index');
Route::post('upcoming_locations', 'UpcomingLocationController@store');
Route::delete('upcoming_locations', 'UpcomingLocationController@delete');