<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['test/email'] = 'rss/email_test';

/********** Stay SmallSmall *******************/
$route['admin/booking-details/(:any)'] = 'admin/booking_details/$1';

$route['admin/all-bookings/(:any)'] = 'admin/all_bookings/$1';

$route['admin/all-bookings'] = 'admin/all_bookings';

$route['admin/all-apartments/(:any)'] = 'admin/all_apartments/$1';

$route['admin/all-apartments'] = 'admin/all_apartments';

$route['admin/new-apartment'] = 'admin/new_apartment';

$route['admin/edit-apartment/(:any)'] = 'admin/edit_apartment/$1';
/********** Stay SmallSmall *******************/
//Webhook for Lenco transactions
$route['test-lenco-report'] = 'loans/test_lenco_report';

$route['app/wallet-update'] = 'app/wallet_update';

$route['app/update-profile'] = 'app/update_profile';

$route['app/user-notifications'] = 'app/get_user_notifications';

$route['app/update-notification-status'] = 'app/update_user_notification_status';

$route['app/payment-count'] = 'app/booking_transaction_count';

$route['app/property-rating'] = 'app/send_rating';

$route['app/pay-subscription'] = 'app/pay_subscription';

$route['app/wallet-history'] = 'app/wallet_history';

$route['app/wallet-details'] = 'app/wallet_details';

$route['app/verification-profile'] = 'app/verification_profile';

$route['app/get-inspection-details'] = 'app/inspection_details';

$route['get-virtual-accounts'] = 'loans/get_virtual_accounts';

$route['app/personal-profile'] = 'app/personal_profile';

$route['app/payment-update'] = 'app/updatePayment';

$route['app/password-reset'] = 'app/passwordReset';

$route['app/featured-properties'] = 'app/featured_properties';

$route['app/create-virtual-account'] = 'app/create_wallet_account';

$route['app/check-virtual-account'] = 'app/check_virtual_account';

$route['basquet-transactions'] = 'loans/basquet_transactions';

$route['lenco-transactions'] = 'loans/lenco_transactions';

$route['app/delete-account'] = 'app/change_user_status';

$route['app/subscription-history'] = 'app/subscription_history';

$route['app/confirm-verification'] = 'app/verification_status';

$route['app/subscribe'] = 'app/insertBooking';

$route['app/get-verification/(:any)'] = 'app/get_verification/$1';

$route['app/get-countries'] = 'app/all_countries';

$route['app/get-states'] = 'app/all_states';

$route['app/get-cities'] = 'app/all_cities';

$route['app/test-verification'] = 'app/test_verification';

$route['app/verification'] = 'app/verification';

$route['app/book-inspection'] = 'app/book_inspection';

$route['app/get-all-images'] = 'app/get_all_images';

$route['app/property'] = 'app/property';

$route['app/properties/(:any)'] = 'app/properties/$1';

$route['app/properties'] = 'app/properties';

$route['app/register'] = 'app/register';

$route['app/login'] = 'app/app_login';

$route['app/check-user'] = 'api/check_user';

$route['admin/notify-cx/(:any)'] = 'rss/send_inspection_email/$1';

$route['rss/test-pdf'] = 'rss/test_pdf';

//Link to resend verification to user
$route['admin/resend-verification-email/(:any)/(:any)'] = 'admin/send_another_verification_email/$1/$2';

$route['rss/send-confirmation/(:any)'] = 'rss/send_confirmation/$1';

//$route['rss/sync-users'] = 'rss/sync_users';

$route['rss/send-confirmation/(:any)'] = 'rss/send_confirmation/$1';

//$route['rss/sync-users'] = 'rss/sync_users';

$route['rss/get-rentals'] = 'rss/get_rentals';

$route['update-content'] = 'rss/update_content';

$route['gbogbo-location'] = 'rss/get_the_locations';

$route['get-images/(:any).(:any)'] = 'rss/get_images/$1/$2';

/**RSS Frontend Filter links ***/

$route['rss/filter/(:any)'] = 'rss/get_quick_search/$1';

$route['rss/filter'] = 'rss/get_quick_search';

/**RSS Staging User profile Routes Starts Here ***/

$route['dashboard/request-repair'] = 'dashboard/request_repair';

$route['dashboard/subscription-agreement'] = 'dashboard/subscription_agreement';

$route['user-staging/dashboard'] = 'user/dashboard';

$route['user-staging/my-inspections'] = 'user/my_inspections';

$route['user-staging/bookings'] = 'user/bookings';

$route['user-staging/messages'] = 'user/messages';

$route['user-staging/listings'] = 'user/listings';

$route['user-staging/wallet'] = 'user/wallet';

$route['user-staging/credit'] = 'user/credit';

$route['user-staging/profile'] = 'user/profile';

$route['user-staging/property-rating'] = 'user/property_rating';

$route['user-staging/native-square'] = 'user/native_square';

$route['user-staging/repairs'] = 'user/repairs';

$route['user-staging/transactions'] = 'user/transactions';

$route['user-staging/feedback'] = 'user/feedback';

/**RSS Frontend User profile Routes Starts Here ***/

$route['user/dashboard'] = 'rss/dashboard';

$route['user/my-inspections'] = 'rss/my_inspections';

$route['user/bookings'] = 'rss/bookings';

$route['user/messages'] = 'rss/messages';

$route['user/listings'] = 'rss/listings';

$route['user/wallet'] = 'rss/wallet';

$route['user/credit'] = 'rss/credit';

$route['user/profile'] = 'rss/profile';

$route['user/property-rating'] = 'rss/property_rating';

$route['user/native-square'] = 'rss/native_square';

$route['user/repairs'] = 'rss/repairs';

$route['user/transactions'] = 'rss/transactions';

$route['user/feedback'] = 'rss/feedback';

/**RSS Frontend Landlord profile Routes Starts Here ***/

$route['landlord/dashboard'] = 'rss/landlord_dashboard';

$route['landlord/subscribers/(:any)'] = 'rss/subscribers/$1';

$route['landlord/subscribers'] = 'rss/subscribers';

$route['landlord/messages/(:any)'] = 'rss/landlord_messages/$1';

$route['landlord/messages'] = 'rss/landlord_messages';

$route['landlord/payouts'] = 'rss/payouts';

$route['landlord/repairs'] = 'rss/landlord_repairs';

$route['landlord/properties/(:any)'] = 'rss/landlord_properties/$1';

$route['landlord/properties'] = 'rss/landlord_properties';

$route['landlord/profile'] = 'rss/landlord_profile';

$route['landlord/bss-requests'] = 'buytolet/buysmallsmall_requests';

$route['tenant/bss-requests'] = 'buytolet/buysmallsmall_requests_tenant';

$route['tenant/bss-payment-details/'] = 'buytolet/bss_payment_details_tenant';

$route['tenant/bss-unit/(:any)'] = 'buytolet/bss_unit_tenant/$1';

$route['landlord/bss-unit/(:any)'] = 'buytolet/bss_unit/$1';

$route['tenant/finance-details/(:any)'] = 'buytolet/finance_details_tenant/$1';

$route['landlord/finance-details/(:any)'] = 'buytolet/finance_details/$1';

$route['landlord/payment-details/(:any)'] = 'buytolet/payment_details/$1'; 

$route['tenant/payment-details/(:any)'] = 'buytolet/payment_details_tenant/$1';




/**Admin Routes Starts Here ***/

$route['admin/create-btl-promo'] = 'admin/promo_form'; 

$route['admin/share-form'] = 'admin/share_form'; 

$route['admin/search-accounts/(:any)'] = 'admin/search_accounts/$1';

$route['admin/search-accounts'] = 'admin/search_accounts';

$route['admin/wallet/(:any)/(:any)'] = 'admin/wallet_transactions/$1/$2';

$route['admin/wallet/(:any)'] = 'admin/wallet_transactions/$1';

$route['admin/wallet-accounts/(:any)'] = 'admin/wallet_accounts/$1';

$route['admin/wallet-accounts'] = 'admin/wallet_accounts';

$route['admin/app-profile/(:any)'] = 'admin/app_profile/$1';

$route['admin/app-verifications'] = 'admin/app_verifications';

$route['admin/app-verifications/(:any)'] = 'admin/app_verifications/$1';

$route['admin/clone-property/(:any)'] = 'admin/clone_property/$1';

$route['admin/clone-btl-property/(:any)'] = 'admin/clone_btl_property/$1';

$route['admin/profile/(:any)'] = 'admin/profile/$1';

$route['admin/transactions/(:any)'] = 'admin/transactions/$1';

$route['admin/app-transactions/(:any)'] = 'admin/app_transactions/$1';

$route['admin/app-transactions'] = 'admin/app_transactions';

$route['admin/booking/(:any)'] = 'admin/booking_details/$1';

$route['admin/btl-requests/(:any)'] = 'admin/buytolet_property_requests/$1';

$route['admin/request-details/(:any)'] = 'admin/btl_request_details/$1';

$route['admin/btl-requests'] = 'admin/buytolet_property_requests';

$route['admin/bookings'] = 'admin/bookings';

$route['admin/btl-user/(:any)'] = 'admin/btl_user/$1';

$route['admin/btl-inspections/(:any)'] = 'admin/btl_inspection_requests/$1';

$route['admin/btl-inspections'] = 'admin/btl_inspection_requests';

$route['admin/inspection/(:any)'] = 'admin/inspection_requests/$1';   

$route['admin/inspection'] = 'admin/inspection_requests';  

$route['admin/residential-inspections/(:any)'] = 'admin/app_residential_inspections/$1';

$route['admin/residential-inspections'] = 'admin/app_residential_inspections';

$route['admin/rent-type'] = 'admin/rent_type';

$route['admin/apt-type'] = 'admin/apartment_type';

$route['admin/statistics'] = 'admin/statistics';

$route['admin/btl-statistics'] = 'admin/btl_statistics';

$route['admin/furnisure-type'] = 'admin/furnisure_type';

$route['admin/furnisure-category'] = 'admin/furnisure_category';

$route['admin/view-items/(:any)'] = 'admin/view_items/$1';

$route['admin/view-items'] = 'admin/view_items';

$route['admin/edit-btl/(:any)'] = 'admin/edit_buytolet_property/$1';

$route['admin/edit-item/(:any)'] = 'admin/edit_item/$1';

$route['admin/new-furniture'] = 'admin/add_furniture';

$route['admin/facility-category'] = 'admin/facility_category';

$route['admin/neighborhood-distance'] = 'admin/neighborhood_distance';

$route['admin/amenities'] = 'admin/amenities';

$route['admin/edit-article/(:any)'] = 'admin/edit_article/$1';  

$route['admin/view-all-news/(:any)'] = 'admin/view_all_news/$1';

$route['admin/view-all-news'] = 'admin/view_all_news';

$route['admin/add-news'] = 'admin/add_news'; 

$route['admin/search-inspection/(:any)'] = 'admin/search_inspection/$1';

$route['admin/search-inspection'] = 'admin/search_inspection';

$route['admin/search-users'] = 'admin/search_users';

$route['admin/search-users/(:any)'] = 'admin/search_users/$1';

$route['admin/search-properties'] = 'admin/search_properties';

$route['admin/search-properties/(:any)'] = 'admin/search_properties/$1';

$route['admin/view-properties'] = 'admin/view_properties';

$route['admin/view-properties/(:any)'] = 'admin/view_properties/$1';

$route['admin/edit-property/(:any)'] = 'admin/edit_property/$1';

$route['admin/new-rss-property'] = 'admin/add_new_rss_property';

$route['admin/property-alert-list'] = 'admin/property_alert_list';

$route['admin/all-buytolet-properties/(:any)'] = 'admin/all_buytolet_properties/$1';

$route['admin/all-buytolet-properties'] = 'admin/all_buytolet_properties';

$route['admin/new-buytolet-property'] = 'admin/add_new_buytolet_property';

$route['admin/rss-users/(:any)'] = 'admin/rss_users/$1';

$route['admin/user-profile/(:any)'] = 'admin/user_profile/$1'; 

$route['admin/rss-users'] = 'admin/rss_users';

$route['admin/app-users/(:any)'] = 'admin/app_users/$1';

$route['admin/app-users'] = 'admin/app_users';

$route['admin/btl-users/(:any)'] = 'admin/btl_users/$1';

$route['admin/btl-users'] = 'admin/btl_users';

$route['admin/add-admin'] = 'admin/add_admin';

$route['admin/dashboard'] = 'admin/dashboard';

$route['admin/rss-about-us'] = 'admin/rss_about_us';

$route['admin/buytolet-about-us'] = 'admin/buytolet_about_us';

$route['admin/btl-how-it-works'] = 'admin/btl_how_it_works';

$route['admin/edit-notification/(:any)'] = 'admin/edit_notification/$1';

$route['admin/add-notification'] = 'admin/add_notification';

$route['admin/all-notifications/(:any)'] = 'admin/all_notifications/$1';

$route['admin/all-notifications'] = 'admin/all_notifications';

$route['admin/pages'] = 'admin/pages';

$route['reset/(:any)/(:any)'] = 'rss/user_reset/$1/$2';

$route['activate-reset/(:any)/(:any)'] = 'rss/activate_reset/$1/$2';

$route['passreset/(:any)'] = 'rss/passreset/$1';

$route['reset-password'] = 'rss/reset_password';

$route['reset-app-password'] = 'rss/reset_password_app';

$route['admin/logout'] = 'admin/logout';

$route['admin'] = 'admin/login';

$route['admin/login'] = 'admin/login';

/**RSS Frontend Routes Starts Here ***/

// $route['new-index'] = 'pages/new_index'; // To make default later after testing

$route['ask-us'] = 'pages/ask_us';

$route['careers'] = 'pages/careers';

$route['subscription-terms'] = 'pages/subscription_terms';

$route['rss-subscription-terms'] = 'pages/rss_subscription_terms';// For Mobile App Dev

$route['all-properties'] = 'rss/all_properties';

$route['property-management'] = 'pages/property_management';

$route['faq-payout'] = 'pages/faq_payout';

$route['faq-tenants'] = 'pages/faq_tenants';

$route['safety-and-security'] = 'pages/safety_and_security';

$route['moving'] = 'pages/move_in';

$route['apartment-policy'] = 'pages/apartment_policy';

$route['subscription'] = 'pages/subscription';

$route['faq'] = 'pages/faq_update';

$route['landlord-landing'] = 'pages/landlord_landing';

$route['refer-and-earn'] = 'pages/refer_and_earn';

$route['contact-us'] = 'pages/contact_us';

$route['privacy-policy'] = 'pages/privacy_policy';

$route['terms-of-use'] = 'pages/terms_of_use';

$route['tenancy-terms'] = 'pages/tenancy_terms';

$route['rss-faq'] = 'pages/rss_faq'; // For Mobile

$route['frequently-asked-questions'] = 'pages/frequently_asked_questions'; 

$route['thank-you'] = 'pages/thank_you';

$route['add-amenities'] = 'pages/add_amenities';

$route['add-property'] = 'pages/add_property';

$route['partner-with-us'] = 'pages/partner_with_us';

$route['about-us'] = 'pages/about';

$route['article/(:any)'] = 'pages/article/$1';

$route['blog/(:any)'] = 'pages/news/$1';

$route['blog'] = 'pages/news';

$route['upcoming-properties'] = 'pages/upcoming_properties';

//$route['property-alert/(:any)'] = 'pages/property_alert/$1';

$route['property-alert'] = 'pages/property_alert';

$route['logout'] = 'rss/logout';

$route['login'] = 'rss/login';

$route['login2'] = 'rss/login2';

$route['signup'] = 'rss/signup';

$route['confirm/(:any)'] = 'rss/confirm/$1';

$route['type/(:any)/(:any)'] = 'rss/property_type/$1/$2';

$route['type/(:any)'] = 'rss/property_type/$1';

$route['properties'] = 'rss/properties';

$route['areas-we-cover/(:any)/(:any)'] = 'rss/areas_we_cover/$1/$2';

$route['areas-we-cover/(:any)'] = 'rss/areas_we_cover/$1';

$route['properties/(:any)'] = 'rss/properties/$1';

$route['test-properties'] = 'rss/test_properties';

// $route['property/(:any)'] = 'rss/property/$1'; // OLD Property Route

$route['property/(:any)'] = 'rss/single_property/$1'; // New Property Route

$route['default_controller'] = 'pages';

/**Furnisure Frontend Routes Starts Here ***/

$route['furnisure'] = 'furnisure/furnisure_home';

$route['furnisure/payment-transfer'] = 'furnisure/make_transfer';

$route['furnisure/payment-success/(:any)'] = 'furnisure/payment_success/$1';

$route['furnisure/verification-complete'] = 'furnisure/verification_complete';

$route['furnisure/verification/(:any)'] = 'furnisure/verification/$1'; 

$route['furnisure/item/(:any)'] = 'furnisure/item/$1';

$route['furnisure/furnitures'] = 'furnisure/furnitures';

$route['furnisure/furnitures/(:any)'] = 'furnisure/furnitures/$1';

$route['furnisure/appliances'] = 'furnisure/appliances';

$route['furnisure/appliances/(:any)'] = 'furnisure/appliances/$1';

/**Verification Frontend Routes Starts Here ***/

/*$route['rss/encdec'] = 'rss/encdec'; */ 

$route['payment-summary'] = 'rss/payment_summary';

$route['testemails'] = 'rss/testemails';

$route['do-password-reset'] = 'rss/first_timer_reset';  

$route['rss/ship-users'] = 'rss/ship_users';

$route['rss/payment-fail/(:any)'] = 'rss/payment_fail/$1';

$route['rss/payment-success/(:any)'] = 'rss/payment_success/$1';

$route['renew-payment/(:any)'] = 'rss/renew_payment/$1';

$route['pay-now/(:any)/(:any)'] = 'rss/pay_now/$1/$2';

$route['payment-transfer'] = 'rss/make_transfer';

$route['furnisure/verify-details'] = 'furnisure/verify_details';

$route['verify-details'] = 'rss/verify_details';

$route['renew-rent/(:any)'] = 'rss/renew_rent/$1';

$route['rss/verify-payment/(:any)'] = 'rss/verify_payment/$1';

$route['rss/verification-complete'] = 'rss/verification_complete';

$route['rss/verification/(:any)'] = 'rss/verification/$1';

$route['rss/verify-test-payment/(:any)'] = 'rss/verify_test_payment/$1';

$route['pay-test'] = 'rss/pay_test'; 

$route['pay'] = 'rss/pay'; 

$route['test-home'] = 'pages/test_home';

$route['test-date'] = 'rss/test_date';

$route['getting-renewal-details/(:any)'] = 'rss/getting_renewal_details/$1'; 

$route['404_override'] = 'my404';

$route['translate_uri_dashes'] = FALSE;