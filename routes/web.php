<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Campuses
    Route::delete('campuses/destroy', 'CampusesController@massDestroy')->name('campuses.massDestroy');
    Route::post('campuses/parse-csv-import', 'CampusesController@parseCsvImport')->name('campuses.parseCsvImport');
    Route::post('campuses/process-csv-import', 'CampusesController@processCsvImport')->name('campuses.processCsvImport');
    Route::resource('campuses', 'CampusesController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/parse-csv-import', 'CountriesController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountriesController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountriesController');

    // Provinces
    Route::delete('provinces/destroy', 'ProvincesController@massDestroy')->name('provinces.massDestroy');
    Route::post('provinces/parse-csv-import', 'ProvincesController@parseCsvImport')->name('provinces.parseCsvImport');
    Route::post('provinces/process-csv-import', 'ProvincesController@processCsvImport')->name('provinces.processCsvImport');
    Route::resource('provinces', 'ProvincesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/parse-csv-import', 'CitiesController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CitiesController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CitiesController');

    // Religions
    Route::delete('religions/destroy', 'ReligionsController@massDestroy')->name('religions.massDestroy');
    Route::resource('religions', 'ReligionsController');

    // Pincodes
    Route::delete('pincodes/destroy', 'PincodesController@massDestroy')->name('pincodes.massDestroy');
    Route::post('pincodes/parse-csv-import', 'PincodesController@parseCsvImport')->name('pincodes.parseCsvImport');
    Route::post('pincodes/process-csv-import', 'PincodesController@processCsvImport')->name('pincodes.processCsvImport');
    Route::resource('pincodes', 'PincodesController');

    // Persons
    Route::delete('people/destroy', 'PersonsController@massDestroy')->name('people.massDestroy');
    Route::post('people/parse-csv-import', 'PersonsController@parseCsvImport')->name('people.parseCsvImport');
    Route::post('people/process-csv-import', 'PersonsController@processCsvImport')->name('people.processCsvImport');
    Route::resource('people', 'PersonsController');

    // Boards
    Route::delete('boards/destroy', 'BoardsController@massDestroy')->name('boards.massDestroy');
    Route::post('boards/parse-csv-import', 'BoardsController@parseCsvImport')->name('boards.parseCsvImport');
    Route::post('boards/process-csv-import', 'BoardsController@processCsvImport')->name('boards.processCsvImport');
    Route::resource('boards', 'BoardsController');

    // Addresses
    Route::delete('addresses/destroy', 'AddressesController@massDestroy')->name('addresses.massDestroy');
    Route::post('addresses/parse-csv-import', 'AddressesController@parseCsvImport')->name('addresses.parseCsvImport');
    Route::post('addresses/process-csv-import', 'AddressesController@processCsvImport')->name('addresses.processCsvImport');
    Route::resource('addresses', 'AddressesController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/parse-csv-import', 'CoursesController@parseCsvImport')->name('courses.parseCsvImport');
    Route::post('courses/process-csv-import', 'CoursesController@processCsvImport')->name('courses.processCsvImport');
    Route::resource('courses', 'CoursesController');

    // Faculties
    Route::delete('faculties/destroy', 'FacultiesController@massDestroy')->name('faculties.massDestroy');
    Route::post('faculties/parse-csv-import', 'FacultiesController@parseCsvImport')->name('faculties.parseCsvImport');
    Route::post('faculties/process-csv-import', 'FacultiesController@processCsvImport')->name('faculties.processCsvImport');
    Route::resource('faculties', 'FacultiesController');

    // Degrees
    Route::delete('degrees/destroy', 'DegreesController@massDestroy')->name('degrees.massDestroy');
    Route::post('degrees/parse-csv-import', 'DegreesController@parseCsvImport')->name('degrees.parseCsvImport');
    Route::post('degrees/process-csv-import', 'DegreesController@processCsvImport')->name('degrees.processCsvImport');
    Route::resource('degrees', 'DegreesController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
    Route::post('departments/parse-csv-import', 'DepartmentsController@parseCsvImport')->name('departments.parseCsvImport');
    Route::post('departments/process-csv-import', 'DepartmentsController@processCsvImport')->name('departments.processCsvImport');
    Route::resource('departments', 'DepartmentsController');

    // Centres
    Route::delete('centres/destroy', 'CentresController@massDestroy')->name('centres.massDestroy');
    Route::post('centres/parse-csv-import', 'CentresController@parseCsvImport')->name('centres.parseCsvImport');
    Route::post('centres/process-csv-import', 'CentresController@processCsvImport')->name('centres.processCsvImport');
    Route::resource('centres', 'CentresController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::post('statuses/parse-csv-import', 'StatusesController@parseCsvImport')->name('statuses.parseCsvImport');
    Route::post('statuses/process-csv-import', 'StatusesController@processCsvImport')->name('statuses.processCsvImport');
    Route::resource('statuses', 'StatusesController');

    // Priorities
    Route::delete('priorities/destroy', 'PrioritiesController@massDestroy')->name('priorities.massDestroy');
    Route::post('priorities/parse-csv-import', 'PrioritiesController@parseCsvImport')->name('priorities.parseCsvImport');
    Route::post('priorities/process-csv-import', 'PrioritiesController@processCsvImport')->name('priorities.processCsvImport');
    Route::resource('priorities', 'PrioritiesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/parse-csv-import', 'CategoriesController@parseCsvImport')->name('categories.parseCsvImport');
    Route::post('categories/process-csv-import', 'CategoriesController@processCsvImport')->name('categories.processCsvImport');
    Route::resource('categories', 'CategoriesController');

    // Tickets
    Route::delete('tickets/destroy', 'TicketsController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketsController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/ckmedia', 'TicketsController@storeCKEditorImages')->name('tickets.storeCKEditorImages');
    Route::post('tickets/parse-csv-import', 'TicketsController@parseCsvImport')->name('tickets.parseCsvImport');
    Route::post('tickets/process-csv-import', 'TicketsController@processCsvImport')->name('tickets.processCsvImport');
    Route::resource('tickets', 'TicketsController');

    // Comments
    Route::delete('comments/destroy', 'CommentsController@massDestroy')->name('comments.massDestroy');
    Route::post('comments/parse-csv-import', 'CommentsController@parseCsvImport')->name('comments.parseCsvImport');
    Route::post('comments/process-csv-import', 'CommentsController@processCsvImport')->name('comments.processCsvImport');
    Route::resource('comments', 'CommentsController');

    // Halls
    Route::delete('halls/destroy', 'HallsController@massDestroy')->name('halls.massDestroy');
    Route::post('halls/parse-csv-import', 'HallsController@parseCsvImport')->name('halls.parseCsvImport');
    Route::post('halls/process-csv-import', 'HallsController@processCsvImport')->name('halls.processCsvImport');
    Route::resource('halls', 'HallsController');

    // Hostels
    Route::delete('hostels/destroy', 'HostelsController@massDestroy')->name('hostels.massDestroy');
    Route::post('hostels/parse-csv-import', 'HostelsController@parseCsvImport')->name('hostels.parseCsvImport');
    Route::post('hostels/process-csv-import', 'HostelsController@processCsvImport')->name('hostels.processCsvImport');
    Route::resource('hostels', 'HostelsController');

    // Qualifications
    Route::delete('qualifications/destroy', 'QualificationsController@massDestroy')->name('qualifications.massDestroy');
    Route::post('qualifications/parse-csv-import', 'QualificationsController@parseCsvImport')->name('qualifications.parseCsvImport');
    Route::post('qualifications/process-csv-import', 'QualificationsController@processCsvImport')->name('qualifications.processCsvImport');
    Route::resource('qualifications', 'QualificationsController');

    // Qualification Levels
    Route::delete('qualification-levels/destroy', 'QualificationLevelsController@massDestroy')->name('qualification-levels.massDestroy');
    Route::post('qualification-levels/parse-csv-import', 'QualificationLevelsController@parseCsvImport')->name('qualification-levels.parseCsvImport');
    Route::post('qualification-levels/process-csv-import', 'QualificationLevelsController@processCsvImport')->name('qualification-levels.processCsvImport');
    Route::resource('qualification-levels', 'QualificationLevelsController');

    // Phones
    Route::delete('phones/destroy', 'PhonesController@massDestroy')->name('phones.massDestroy');
    Route::post('phones/parse-csv-import', 'PhonesController@parseCsvImport')->name('phones.parseCsvImport');
    Route::post('phones/process-csv-import', 'PhonesController@processCsvImport')->name('phones.processCsvImport');
    Route::resource('phones', 'PhonesController');

    // Paper Types
    Route::delete('paper-types/destroy', 'PaperTypesController@massDestroy')->name('paper-types.massDestroy');
    Route::post('paper-types/parse-csv-import', 'PaperTypesController@parseCsvImport')->name('paper-types.parseCsvImport');
    Route::post('paper-types/process-csv-import', 'PaperTypesController@processCsvImport')->name('paper-types.processCsvImport');
    Route::resource('paper-types', 'PaperTypesController');

    // Papers
    Route::delete('papers/destroy', 'PapersController@massDestroy')->name('papers.massDestroy');
    Route::post('papers/parse-csv-import', 'PapersController@parseCsvImport')->name('papers.parseCsvImport');
    Route::post('papers/process-csv-import', 'PapersController@processCsvImport')->name('papers.processCsvImport');
    Route::resource('papers', 'PapersController');

    // Enrolments
    Route::delete('enrolments/destroy', 'EnrolmentsController@massDestroy')->name('enrolments.massDestroy');
    Route::post('enrolments/parse-csv-import', 'EnrolmentsController@parseCsvImport')->name('enrolments.parseCsvImport');
    Route::post('enrolments/process-csv-import', 'EnrolmentsController@processCsvImport')->name('enrolments.processCsvImport');
    Route::resource('enrolments', 'EnrolmentsController');

    // Students
    Route::delete('students/destroy', 'StudentsController@massDestroy')->name('students.massDestroy');
    Route::post('students/parse-csv-import', 'StudentsController@parseCsvImport')->name('students.parseCsvImport');
    Route::post('students/process-csv-import', 'StudentsController@processCsvImport')->name('students.processCsvImport');
    Route::resource('students', 'StudentsController');

    // Employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/parse-csv-import', 'EmployeesController@parseCsvImport')->name('employees.parseCsvImport');
    Route::post('employees/process-csv-import', 'EmployeesController@processCsvImport')->name('employees.processCsvImport');
    Route::resource('employees', 'EmployeesController');

    // Designations
    Route::delete('designations/destroy', 'DesignationsController@massDestroy')->name('designations.massDestroy');
    Route::post('designations/parse-csv-import', 'DesignationsController@parseCsvImport')->name('designations.parseCsvImport');
    Route::post('designations/process-csv-import', 'DesignationsController@processCsvImport')->name('designations.processCsvImport');
    Route::resource('designations', 'DesignationsController');

    // Nominees
    Route::delete('nominees/destroy', 'NomineesController@massDestroy')->name('nominees.massDestroy');
    Route::post('nominees/parse-csv-import', 'NomineesController@parseCsvImport')->name('nominees.parseCsvImport');
    Route::post('nominees/process-csv-import', 'NomineesController@processCsvImport')->name('nominees.processCsvImport');
    Route::resource('nominees', 'NomineesController');

    // Family Members
    Route::delete('family-members/destroy', 'FamilyMembersController@massDestroy')->name('family-members.massDestroy');
    Route::post('family-members/parse-csv-import', 'FamilyMembersController@parseCsvImport')->name('family-members.parseCsvImport');
    Route::post('family-members/process-csv-import', 'FamilyMembersController@processCsvImport')->name('family-members.processCsvImport');
    Route::resource('family-members', 'FamilyMembersController');

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
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
