<?php

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





// ADMIN
Route::prefix('admin')->group(function() {
    Route::get('/login',                                                    ['as' => 'adminLogin',                      'uses' => 'Auth\AdminLoginController@showLoginForm']);
    Route::post('/login',                                                   ['as' => 'adminLoginSubmit',                'uses' => 'Auth\AdminLoginController@login']);
    Route::get('/profile',                                                  ['as' => 'adminProfile',                    'uses' => 'AdminController@profile']);
    Route::get('/profile/edit',                                             ['as' => 'adminProfileEdit',                'uses' => 'AdminController@profileEdit']);
    Route::post('/profile/edit',                                            ['as' => 'adminProfileEditPost',            'uses' => 'AdminController@profileEditPost']);
    Route::get('/profile/edit-credentials',                                 ['as' => 'adminCredentialsEdit',            'uses' => 'AdminController@credentialsEdit']);
    Route::post('/profile/edit-credentials',                                ['as' => 'adminCredentialsEditPost',        'uses' => 'AdminController@credentialsEditPost']);

    Route::get('/admins/list',                                              ['as' => 'adminsList',                      'uses' => 'AdminController@adminsList']);
    Route::get('/{id}',                                                     ['as' => 'adminsListOne',                   'uses' => 'AdminController@adminsListOne']);
    Route::get('/admins/new',                                               ['as' => 'createAdmin',                     'uses' => 'AdminController@createAdmin']);
    Route::post('/admins/new',                                              ['as' => 'createAdminPost',                 'uses' => 'AdminController@createAdminPost']);

    Route::get('/users/list',                                               ['as' => 'usersList',                       'uses' => 'AdminController@usersList']);
    Route::get('/user/{id}',                                                ['as' => 'userListOne',                     'uses' => 'AdminController@usersListOne']);
    Route::get('/user/{id}/status/{redirect?}',                             ['as' => 'userStatus',                      'uses' => 'AdminController@statusUser']);
    Route::get('/user/{id}/delete',                                         ['as' => 'userDelete',                      'uses' => 'AdminController@deleteUser']);

    Route::get('/category/list',                                            ['as' => 'categoryList',                    'uses' => 'AdminController@categoryList']);
    Route::get('/category/new',                                             ['as' => 'createCategory',                  'uses' => 'AdminController@createCategory']);
    Route::post('/category/new',                                            ['as' => 'createCategoryPost',              'uses' => 'AdminController@createCategoryPost']);
    Route::get('/category/{id}/edit',                                       ['as' => 'editCategory',                    'uses' => 'AdminController@editCategory']);
    Route::post('/category/{id}/edit',                                      ['as' => 'editCategoryPost',                'uses' => 'AdminController@editCategoryPost']);
    Route::get('/category/{id}/delete',                                     ['as' => 'deleteCategory',                  'uses' => 'AdminController@deleteCategory']);
    Route::get('/category/{id}/workout/create',                             ['as' => 'createWorkoutByCategory',         'uses' => 'AdminController@createWorkoutByCategory']);  // this will disappear
    
    Route::get('/workout/list/{id_category?}',                              ['as' => 'workoutList',                     'uses' => 'AdminController@workoutList']);
    Route::get('/workout/new/{id_category?}',                               ['as' => 'createWorkout',                   'uses' => 'AdminController@createWorkout']);
    Route::post('/workout/new/{id_category?}',                              ['as' => 'createWorkoutPost',               'uses' => 'AdminController@createWorkoutPost']);
    Route::get('/workout/{id}/edit/{id_category?}',                         ['as' => 'editWorkout',                     'uses' => 'AdminController@editWorkout']);
    Route::post('/workout/{id}/edit/{id_category?}',                        ['as' => 'editWorkoutPost',                 'uses' => 'AdminController@editWorkoutPost']);
    Route::get('/workout/{id}/delete/{redirect?}/{id_category?}',           ['as' => 'deleteWorkout',                   'uses' => 'AdminController@deleteWorkout']);
    Route::get('/workout/{id}/{id_category?}',                              ['as' => 'workoutListOne',                  'uses' => 'AdminController@workoutListOne']);
});

//  Route::get('login',              ['as' => 'login',                      'uses' => function(){ return redirect(route(user_lang())); }]);



// Syscover --> USER routes with lang only for guest
Route::group(['middleware' => ['pulsar.navTools'] ], function() {
    
    Route::get('/',                  ['as' => 'index',                           'uses' => function(){ return redirect()->route(user_lang()); }]);
    Route::get('es',                 ['as' => 'es',                              'uses' => function(){ return view('welcome'); }]);
    Route::get('en',                 ['as' => 'en',                              'uses' => function(){ return view('welcome'); }]);
   
    Route::get('es/404',             ['as' => '404-es',                        'uses' => function(){ return view('errors.404'); }]);
    Route::get('en/404',             ['as' => '404-en',                        'uses' => function(){ return view('errors.404'); }]);

    
    // EN
    Route::get('en/login',           ['as' => 'login-en',                        'uses' => 'Auth\LoginController@showLoginForm']);
    Route::get('en/register',        ['as' => 'register-en',                     'uses' => 'Auth\RegisterController@showRegistrationForm']);


    // ES
    Route::get('es/login',           ['as' => 'login-es',                        'uses' => 'Auth\LoginController@showLoginForm']);
    Route::get('es/registrar',       ['as' => 'register-es',                     'uses' => 'Auth\RegisterController@showRegistrationForm']);

});


// auth required
Route::group(['middleware' => ['pulsar.navTools' , 'auth'] ], function() {
    
    // Route::get('/',                                                         ['as' => 'index',                           'uses' => function(){ return redirect()->route(user_lang()); }]);

    
    // Route::get('es',                                                        ['as' => 'es',                              'uses' => 'RoutineController@topTen']);
    // Route::get('en',                                                        ['as' => 'en',                              'uses' => 'RoutineController@topTen']);
    
    
    // EN
    Route::get('en/home',                                                   ['as' => 'home-en',                         'uses' => 'RoutineController@topTen']);

    
    Route::get('en/user/profile',                                           ['as' => 'profile-en',                      'uses' => 'UserController@index']);
    Route::get('en/user/edit',                                              ['as' => 'edit_user-en',                    'uses' => 'UserController@showEditForm']);
    Route::post('en/user/edit',                                             ['as' => 'edit_user_post-en',               'uses' => 'UserController@editProfile']);
    Route::get('en/user/edit-credentials',                                  ['as' => 'user_credentials-en',             'uses' => 'UserController@showCredentialsForm']);
    Route::post('en/user/edit-credentials',                                 ['as' => 'user_credentials_post-en',        'uses' => 'UserController@editCredentials']);
                        
    Route::get('en/workout',                                                ['as' => 'list_workout-en',                 'uses' => 'WorkoutController@index']);
    Route::get('en/workout/{id}',                                           ['as' => 'list_workout_by_category-en',     'uses' => 'WorkoutController@listWorkoutByCategory']);
                        
    Route::get('en/routine/new',                                            ['as' => 'routine_new-en',                  'uses' => 'RoutineController@showCreateForm']);
    Route::post('en/routine/new',                                           ['as' => 'routine_new_post-en',             'uses' => 'RoutineController@create']);
    Route::get('en/routine/like/{id_routine}',                              ['as' => 'routine_like-en',                 'uses' => 'RoutineController@like']);
    
    Route::get('en/routine/{id_routine}/start',                             ['as' => 'routine_start-en',                'uses' => 'RoutineController@start']);

    Route::get('en/routine/workout/remove/{id_rout}/{id_work}',             ['as' => 'routine_del_workout-en',          'uses' => 'RoutineController@removeWorkout']);
    Route::get('en/routine/{id_routine}/edit',                              ['as' => 'routine_edit-en',                 'uses' => 'RoutineController@showEditForm']);
    Route::post('en/routine/{id_routine}/edit',                             ['as' => 'routine_edit_post-en',            'uses' => 'RoutineController@edit']);
    Route::get('en/routine/{id_routine}/delete/{redirect?}',                ['as' => 'routine_delete-en',               'uses' => 'RoutineController@destroy']);
    Route::get('en/routine/{id_routine}/detail',                            ['as' => 'routine_detail-en',               'uses' => 'RoutineController@show']);
            
    Route::get('en/routine/{id_routine}/add-workout',                       ['as' => 'routine_add_workout_1-en',        'uses' => 'RoutineController@chooseCategory']); // muestro las categorias
    Route::get('en/routine/{id_routine}/add-workout/{id_category}',         ['as' => 'routine_add_workout_1_post-en',   'uses' => 'RoutineController@chooseCategoryPost']); // recojo id_cat e id_rout y muestro formulario ejercicios
    Route::post('en/routine/{id_routine}/add-workouts/{id_category}',       ['as' => 'routine_add_workout_2_post-en',   'uses' => 'RoutineController@chooseWorkoutsPost']); // recojo ejercicios seleccionados y vuelvo a categorias

    Route::get('en/routines',                                               ['as' => 'routine_user-en',                 'uses' => 'RoutineController@userRoutines']);
    
    Route::get('en/routine/{id_routine}/edit-workout/{id_workout}',         ['as' => 'routine_edit_user_workout-en',     'uses' => 'RoutineController@showEditWorkoutForm']); 
    Route::post('en/routine/{id_routine}/edit-workout/{id_workout}',        ['as' => 'routine_edit_user_workout_post-en','uses' => 'RoutineController@editUserWorkout']); 

    Route::get('en/calendar',                                               ['as' => 'calendar-en',                     'uses' => 'DayController@show']);
    Route::get('en/calendar/edit/{id_day}',                                 ['as' => 'calendar_edit-en',                'uses' => 'DayController@edit']);
    Route::get('en/calendar/edit/{id_day}/{id_routine}',                    ['as' => 'calendar_edit_post-en',           'uses' => 'DayController@editPost']);
    
    
    Route::get('en/legal',                                                  ['as' =>'legal-en',                          'uses' => function(){ return view('legal_advice_en'); }]);
    Route::get('en/contact',                                                ['as' =>'contact-en',                        'uses' => function(){ return view('contact_form'); }]);
    Route::post('en/contact',                                               ['as' =>'contact_post-en',                   'uses' => 'ContactController@sendEmail']);
    
    
    // ES
    Route::get('es/inicio',                                                 ['as' => 'home-es',                         'uses' => 'RoutineController@topTen']);
                            
    Route::get('es/usuario/perfil',                                         ['as' => 'profile-es',                      'uses' => 'UserController@index']);
    Route::get('es/usuario/editar',                                         ['as' => 'edit_user-es',                    'uses' => 'UserController@showEditForm']);
    Route::post('es/usuario/editar',                                        ['as' => 'edit_user_post-es',               'uses' => 'UserController@editProfile']);
    Route::get('es/usuario/editar-credeciales',                             ['as' => 'user_credentials-es',             'uses' => 'UserController@showCredentialsForm']);
    Route::post('es/usuario/editar-credeciales',                            ['as' => 'user_credentials_post-es',        'uses' => 'UserController@editCredentials']);
                            
    Route::get('es/ejercicio',                                              ['as' => 'list_workout-es',                 'uses' => 'WorkoutController@index']);
    Route::get('es/ejercicio/{id}',                                         ['as' => 'list_workout_by_category-es',     'uses' => 'WorkoutController@listWorkoutByCategory']);
                        
    Route::get('es/rutina/nueva',                                           ['as' => 'routine_new-es',                  'uses' => 'RoutineController@showCreateForm']);
    Route::post('es/rutina/nueva',                                          ['as' => 'routine_new_post-es',             'uses' => 'RoutineController@create']);
    Route::get('es/rutina/like/{id_routine}',                               ['as' => 'routine_like-es',                 'uses' => 'RoutineController@like']);

    Route::get('es/rutina/{id_routine}/start',                              ['as' => 'routine_start-es',                'uses' => 'RoutineController@start']);

    Route::get('es/rutina/ejercicio/borrar/{id_rout}/{id_work}',            ['as' => 'routine_del_workout-es',          'uses' => 'RoutineController@removeWorkout']);
    Route::get('es/rutina/{id_routine}/editar',                             ['as' => 'routine_edit-es',                 'uses' => 'RoutineController@showEditForm']);
    Route::post('es/rutina/{id_routine}/editar',                            ['as' => 'routine_edit_post-es',            'uses' => 'RoutineController@edit']);
    Route::get('es/rutina/{id_routine}/borrar/{redirect?}',                 ['as' => 'routine_delete-es',               'uses' => 'RoutineController@destroy']);
    Route::get('es/rutina/{id_routine}/detalle',                            ['as' => 'routine_detail-es',               'uses' => 'RoutineController@show']);
    
    Route::get('es/rutina/{id_routine}/agregar-ejercicio',                  ['as' => 'routine_add_workout_1-es',        'uses' => 'RoutineController@chooseCategory']); // muestro las categorias
    Route::get('es/rutina/{id_routine}/agregar-ejercicio/{id_category}',    ['as' => 'routine_add_workout_1_post-es',   'uses' => 'RoutineController@chooseCategoryPost']); // recojo id_cat e id_rout y muestro formulario ejercicios
    Route::post('es/rutina/{id_routine}/agregar-ejercicios/{id_category}',  ['as' => 'routine_add_workout_2_post-es',   'uses' => 'RoutineController@chooseWorkoutsPost']); // recojo ejercicios seleccionados y vuelvo a categorias
    
    Route::get('es/rutina/{id_routine}/editar-ejercicio/{id_workout}',      ['as' => 'routine_edit_user_workout-es',     'uses' => 'RoutineController@showEditWorkoutForm']); 
    Route::post('es/rutina/{id_routine}/editar-ejercicio/{id_workout}',     ['as' => 'routine_edit_user_workout_post-es','uses' => 'RoutineController@editUserWorkout']); 
    
    Route::get('es/rutinas',                                                ['as' => 'routine_user-es',                 'uses' => 'RoutineController@userRoutines']);

    
    Route::get('es/calendario',                                             ['as' => 'calendar-es',                     'uses' => 'DayController@show']);
    Route::get('es/calendario/editar/{id_day}',                             ['as' => 'calendar_edit-es',                'uses' => 'DayController@edit']);
    Route::get('es/calendario/editar/{id_day}/{id_routine}',                ['as' => 'calendar_edit_post-es',           'uses' => 'DayController@editPost']);
    
    Route::get('es/legal',                                                  ['as' =>'legal-es',                         'uses' => function(){ return view('legal_advice_es'); }]);
    Route::get('es/contacto',                                               ['as' =>'contact-es',                       'uses' => function(){ return view('contact_form'); }]);
    Route::post('es/contacto',                                              ['as' =>'contact_post-es',                  'uses' => 'ContactController@sendEmail']);
    
    
});

Auth::routes();


/*
/vendor/laravel/framework/src/Illuminate/Routing/Router.php
linea 997

public function auth()
    {
        // Authentication Routes...
        //$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    }
*/
