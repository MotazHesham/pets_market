<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Sliders
    Route::delete('sliders/destroy', 'SlidersController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SlidersController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SlidersController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SlidersController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingsController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingsController@storeCKEditorImages')->name('settings.storeCKEditorImages');
    Route::resource('settings', 'SettingsController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

    // Stores
    Route::delete('stores/destroy', 'StoresController@massDestroy')->name('stores.massDestroy');
    Route::post('stores/media', 'StoresController@storeMedia')->name('stores.storeMedia');
    Route::post('stores/ckmedia', 'StoresController@storeCKEditorImages')->name('stores.storeCKEditorImages');
    Route::resource('stores', 'StoresController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductsController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductsController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Order Details
    Route::delete('order-details/destroy', 'OrderDetailsController@massDestroy')->name('order-details.massDestroy');
    Route::resource('order-details', 'OrderDetailsController');

    // Brands
    Route::delete('brands/destroy', 'BrandsController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandsController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandsController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::resource('brands', 'BrandsController');

    // Wishlists
    Route::delete('wishlists/destroy', 'WishlistsController@massDestroy')->name('wishlists.massDestroy');
    Route::resource('wishlists', 'WishlistsController');

    // Clinics
    Route::delete('clinics/destroy', 'ClinicsController@massDestroy')->name('clinics.massDestroy');
    Route::post('clinics/media', 'ClinicsController@storeMedia')->name('clinics.storeMedia');
    Route::post('clinics/ckmedia', 'ClinicsController@storeCKEditorImages')->name('clinics.storeCKEditorImages');
    Route::resource('clinics', 'ClinicsController');

    // Clinic Services
    Route::delete('clinic-services/destroy', 'ClinicServicesController@massDestroy')->name('clinic-services.massDestroy');
    Route::post('clinic-services/media', 'ClinicServicesController@storeMedia')->name('clinic-services.storeMedia');
    Route::post('clinic-services/ckmedia', 'ClinicServicesController@storeCKEditorImages')->name('clinic-services.storeCKEditorImages');
    Route::resource('clinic-services', 'ClinicServicesController');

    // Clinic Appointments
    Route::delete('clinic-appointments/destroy', 'ClinicAppointmentsController@massDestroy')->name('clinic-appointments.massDestroy');
    Route::resource('clinic-appointments', 'ClinicAppointmentsController');

    // Rescue Cases
    Route::delete('rescue-cases/destroy', 'RescueCasesController@massDestroy')->name('rescue-cases.massDestroy');
    Route::post('rescue-cases/media', 'RescueCasesController@storeMedia')->name('rescue-cases.storeMedia');
    Route::post('rescue-cases/ckmedia', 'RescueCasesController@storeCKEditorImages')->name('rescue-cases.storeCKEditorImages');
    Route::resource('rescue-cases', 'RescueCasesController');

    // Pet Types
    Route::delete('pet-types/destroy', 'PetTypesController@massDestroy')->name('pet-types.massDestroy');
    Route::resource('pet-types', 'PetTypesController');

    // Missing Pets
    Route::delete('missing-pets/destroy', 'MissingPetsController@massDestroy')->name('missing-pets.massDestroy');
    Route::resource('missing-pets', 'MissingPetsController');

    // Delivery Pets
    Route::delete('delivery-pets/destroy', 'DeliveryPetsController@massDestroy')->name('delivery-pets.massDestroy');
    Route::resource('delivery-pets', 'DeliveryPetsController');

    // Refuges
    Route::delete('refuges/destroy', 'RefugesController@massDestroy')->name('refuges.massDestroy');
    Route::post('refuges/media', 'RefugesController@storeMedia')->name('refuges.storeMedia');
    Route::post('refuges/ckmedia', 'RefugesController@storeCKEditorImages')->name('refuges.storeCKEditorImages');
    Route::resource('refuges', 'RefugesController');

    // Refuge Pets
    Route::delete('refuge-pets/destroy', 'RefugePetsController@massDestroy')->name('refuge-pets.massDestroy');
    Route::post('refuge-pets/media', 'RefugePetsController@storeMedia')->name('refuge-pets.storeMedia');
    Route::post('refuge-pets/ckmedia', 'RefugePetsController@storeCKEditorImages')->name('refuge-pets.storeCKEditorImages');
    Route::resource('refuge-pets', 'RefugePetsController');

    // Adoption Requests
    Route::delete('adoption-requests/destroy', 'AdoptionRequestsController@massDestroy')->name('adoption-requests.massDestroy');
    Route::resource('adoption-requests', 'AdoptionRequestsController');

    // Contactus
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');
    Route::resource('contactus', 'ContactusController', ['except' => ['create', 'store', 'edit', 'update', 'show']]);

    // User Pets
    Route::delete('user-pets/destroy', 'UserPetsController@massDestroy')->name('user-pets.massDestroy');
    Route::post('user-pets/media', 'UserPetsController@storeMedia')->name('user-pets.storeMedia');
    Route::post('user-pets/ckmedia', 'UserPetsController@storeCKEditorImages')->name('user-pets.storeCKEditorImages');
    Route::resource('user-pets', 'UserPetsController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomersController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostsController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostsController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostsController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentsController');

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Product Reviews
    Route::delete('product-reviews/destroy', 'ProductReviewsController@massDestroy')->name('product-reviews.massDestroy');
    Route::resource('product-reviews', 'ProductReviewsController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Volunteers
    Route::delete('volunteers/destroy', 'VolunteersController@massDestroy')->name('volunteers.massDestroy');
    Route::resource('volunteers', 'VolunteersController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
