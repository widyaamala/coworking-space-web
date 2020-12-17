<?php

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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'FrontendController@index')->name('homepage');
	Route::get('home', 'FrontendController@home')->name('home');
	Route::get('office', 'FrontendController@office')->name('office');
	Route::get('partnership', 'FrontendController@partnership')->name('partnership');
	Route::get('room', 'FrontendController@room')->name('room');
	Route::get('event-starter', 'FrontendController@eventStarter')->name('event-starter');
	Route::get('detail-event/{id}', 'FrontendController@eventDetail')->name('detail-event');
	Route::get('daftar-event', 'FrontendController@daftarEvent')->name('daftar-event');
	Route::get('signup/{id}', 'FrontendController@checkout')->name('checkout');
	Route::get('room/{id}', 'FrontendController@reserve')->name('reserve');
  Route::get('/terms', 'TermsController@terms')->name('terms');
	Route::post('post-invoice', 'InvoiceController@postInvoice')->name('post-invoice');
	Route::post('post-event', 'EventController@store')->name('post-event');
	Route::post('post-partner', 'PartnershipController@store')->name('post-partner');
	Route::post('post-eventStarter', 'EventStarterController@store')->name('post-eventStarter');
	Route::post('post-comment', 'CommentController@store')->name('post-comment');
	Route::get('confirmation', 'InvoiceController@confirmation')->name('invoice');
	Route::get('confirm-payment/{id}', 'FrontendController@confirmPayment')->name('confirm-payment');
	Route::post('post-confirmation', 'PaymentController@postConfirmation')->name('post-confirmation');
	Route::get('calendar', 'EventController@calendar')->name('calendar');
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    //Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('dashboard', ['as' => 'public.home',   'uses' => 'UserController@index'])->name('home');

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController',
        [
            'names' => [
              'show'   => 'profile',
            ],
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'names' => [
          'index'   => 'deleteduser',
        ],
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'UsersManagementController@search')->name('search-users');

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
    Route::get('routes', 'AdminDetailsController@listRoutes')->name('routes');
    Route::get('active-users', 'AdminDetailsController@activeUsers')->name('active-users');

    Route::resource('products', 'ProductController', [
      'names' => [
          'index'   => 'products',
      ],
    ]);

    Route::resource('memberships', 'MembershipController', [
        'names' => [
            'index'   => 'memberships',
        ],
    ]);

    Route::resource('events', 'EventController', [
        'names' => [
            'index'   => 'events',
			'calendar'   => 'events',
        ],
    ]);

    Route::resource('invoices', 'InvoiceController', [
        'names' => [
            'index'   => 'invoices',
		        'confirmation'   => 'invoice',
        ],
    ]);

	Route::resource('payments', 'PaymentController', [
        'names' => [
            'index'   => 'payments',
        ],
    ]);

	Route::post('confirm', 'PaymentController@confirm')->name('confirm');

	Route::resource('rooms', 'RoomController', [
      'names' => [
          'index'   => 'rooms',
      ],
    ]);
	
	Route::resource('eventStarters', 'EventStarterController', [
        'names' => [
            'index'   => 'eventStarters',
        ],
    ]);
	
	Route::resource('comments', 'CommentController', [
        'names' => [
            'index'   => 'comments',
        ],
    ]);

});

Route::redirect('/php', '/phpinfo', 301);
