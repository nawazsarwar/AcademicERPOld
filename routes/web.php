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

    // Peoples
    Route::delete('people/destroy', 'PeoplesController@massDestroy')->name('people.massDestroy');
    Route::post('people/parse-csv-import', 'PeoplesController@parseCsvImport')->name('people.parseCsvImport');
    Route::post('people/process-csv-import', 'PeoplesController@processCsvImport')->name('people.processCsvImport');
    Route::resource('people', 'PeoplesController');

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

    // Support Statuses
    Route::delete('support-statuses/destroy', 'SupportStatusesController@massDestroy')->name('support-statuses.massDestroy');
    Route::post('support-statuses/parse-csv-import', 'SupportStatusesController@parseCsvImport')->name('support-statuses.parseCsvImport');
    Route::post('support-statuses/process-csv-import', 'SupportStatusesController@processCsvImport')->name('support-statuses.processCsvImport');
    Route::resource('support-statuses', 'SupportStatusesController');

    // Support Priorities
    Route::delete('support-priorities/destroy', 'SupportPrioritiesController@massDestroy')->name('support-priorities.massDestroy');
    Route::post('support-priorities/parse-csv-import', 'SupportPrioritiesController@parseCsvImport')->name('support-priorities.parseCsvImport');
    Route::post('support-priorities/process-csv-import', 'SupportPrioritiesController@processCsvImport')->name('support-priorities.processCsvImport');
    Route::resource('support-priorities', 'SupportPrioritiesController');

    // Support Categories
    Route::delete('support-categories/destroy', 'SupportCategoriesController@massDestroy')->name('support-categories.massDestroy');
    Route::post('support-categories/parse-csv-import', 'SupportCategoriesController@parseCsvImport')->name('support-categories.parseCsvImport');
    Route::post('support-categories/process-csv-import', 'SupportCategoriesController@processCsvImport')->name('support-categories.processCsvImport');
    Route::resource('support-categories', 'SupportCategoriesController');

    // Support Tickets
    Route::delete('support-tickets/destroy', 'SupportTicketsController@massDestroy')->name('support-tickets.massDestroy');
    Route::post('support-tickets/media', 'SupportTicketsController@storeMedia')->name('support-tickets.storeMedia');
    Route::post('support-tickets/ckmedia', 'SupportTicketsController@storeCKEditorImages')->name('support-tickets.storeCKEditorImages');
    Route::post('support-tickets/parse-csv-import', 'SupportTicketsController@parseCsvImport')->name('support-tickets.parseCsvImport');
    Route::post('support-tickets/process-csv-import', 'SupportTicketsController@processCsvImport')->name('support-tickets.processCsvImport');
    Route::resource('support-tickets', 'SupportTicketsController');

    // Support Comments
    Route::delete('support-comments/destroy', 'SupportCommentsController@massDestroy')->name('support-comments.massDestroy');
    Route::post('support-comments/parse-csv-import', 'SupportCommentsController@parseCsvImport')->name('support-comments.parseCsvImport');
    Route::post('support-comments/process-csv-import', 'SupportCommentsController@processCsvImport')->name('support-comments.processCsvImport');
    Route::resource('support-comments', 'SupportCommentsController');

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

    // Academic Qualifications
    Route::delete('academic-qualifications/destroy', 'AcademicQualificationsController@massDestroy')->name('academic-qualifications.massDestroy');
    Route::post('academic-qualifications/media', 'AcademicQualificationsController@storeMedia')->name('academic-qualifications.storeMedia');
    Route::post('academic-qualifications/ckmedia', 'AcademicQualificationsController@storeCKEditorImages')->name('academic-qualifications.storeCKEditorImages');
    Route::post('academic-qualifications/parse-csv-import', 'AcademicQualificationsController@parseCsvImport')->name('academic-qualifications.parseCsvImport');
    Route::post('academic-qualifications/process-csv-import', 'AcademicQualificationsController@processCsvImport')->name('academic-qualifications.processCsvImport');
    Route::resource('academic-qualifications', 'AcademicQualificationsController');

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

    // Hostel Rooms
    Route::delete('hostel-rooms/destroy', 'HostelRoomsController@massDestroy')->name('hostel-rooms.massDestroy');
    Route::post('hostel-rooms/parse-csv-import', 'HostelRoomsController@parseCsvImport')->name('hostel-rooms.parseCsvImport');
    Route::post('hostel-rooms/process-csv-import', 'HostelRoomsController@processCsvImport')->name('hostel-rooms.processCsvImport');
    Route::resource('hostel-rooms', 'HostelRoomsController');

    // Course Levels
    Route::delete('course-levels/destroy', 'CourseLevelsController@massDestroy')->name('course-levels.massDestroy');
    Route::post('course-levels/parse-csv-import', 'CourseLevelsController@parseCsvImport')->name('course-levels.parseCsvImport');
    Route::post('course-levels/process-csv-import', 'CourseLevelsController@processCsvImport')->name('course-levels.processCsvImport');
    Route::resource('course-levels', 'CourseLevelsController');

    // Academic Sessions
    Route::delete('academic-sessions/destroy', 'AcademicSessionsController@massDestroy')->name('academic-sessions.massDestroy');
    Route::post('academic-sessions/parse-csv-import', 'AcademicSessionsController@parseCsvImport')->name('academic-sessions.parseCsvImport');
    Route::post('academic-sessions/process-csv-import', 'AcademicSessionsController@processCsvImport')->name('academic-sessions.processCsvImport');
    Route::resource('academic-sessions', 'AcademicSessionsController');

    // Postal Code
    Route::delete('postal-codes/destroy', 'PostalCodeController@massDestroy')->name('postal-codes.massDestroy');
    Route::post('postal-codes/parse-csv-import', 'PostalCodeController@parseCsvImport')->name('postal-codes.parseCsvImport');
    Route::post('postal-codes/process-csv-import', 'PostalCodeController@processCsvImport')->name('postal-codes.processCsvImport');
    Route::resource('postal-codes', 'PostalCodeController');

    // Admission Charges
    Route::delete('admission-charges/destroy', 'AdmissionChargesController@massDestroy')->name('admission-charges.massDestroy');
    Route::post('admission-charges/parse-csv-import', 'AdmissionChargesController@parseCsvImport')->name('admission-charges.parseCsvImport');
    Route::post('admission-charges/process-csv-import', 'AdmissionChargesController@processCsvImport')->name('admission-charges.processCsvImport');
    Route::resource('admission-charges', 'AdmissionChargesController');

    // Continuation Charges
    Route::delete('continuation-charges/destroy', 'ContinuationChargesController@massDestroy')->name('continuation-charges.massDestroy');
    Route::post('continuation-charges/parse-csv-import', 'ContinuationChargesController@parseCsvImport')->name('continuation-charges.parseCsvImport');
    Route::post('continuation-charges/process-csv-import', 'ContinuationChargesController@processCsvImport')->name('continuation-charges.processCsvImport');
    Route::resource('continuation-charges', 'ContinuationChargesController');

    // Programme Delivery Mode
    Route::delete('programme-delivery-modes/destroy', 'ProgrammeDeliveryModeController@massDestroy')->name('programme-delivery-modes.massDestroy');
    Route::resource('programme-delivery-modes', 'ProgrammeDeliveryModeController');

    // Admission Entrance Type
    Route::delete('admission-entrance-types/destroy', 'AdmissionEntranceTypeController@massDestroy')->name('admission-entrance-types.massDestroy');
    Route::resource('admission-entrance-types', 'AdmissionEntranceTypeController');

    // Programme Duration Type
    Route::delete('programme-duration-types/destroy', 'ProgrammeDurationTypeController@massDestroy')->name('programme-duration-types.massDestroy');
    Route::resource('programme-duration-types', 'ProgrammeDurationTypeController');

    // Registration Forms
    Route::delete('registration-forms/destroy', 'RegistrationFormsController@massDestroy')->name('registration-forms.massDestroy');
    Route::post('registration-forms/parse-csv-import', 'RegistrationFormsController@parseCsvImport')->name('registration-forms.parseCsvImport');
    Route::post('registration-forms/process-csv-import', 'RegistrationFormsController@processCsvImport')->name('registration-forms.processCsvImport');
    Route::resource('registration-forms', 'RegistrationFormsController');

    // Exam Registrations
    Route::delete('exam-registrations/destroy', 'ExamRegistrationsController@massDestroy')->name('exam-registrations.massDestroy');
    Route::resource('exam-registrations', 'ExamRegistrationsController');

    // Papers Registration
    Route::delete('papers-registrations/destroy', 'PapersRegistrationController@massDestroy')->name('papers-registrations.massDestroy');
    Route::resource('papers-registrations', 'PapersRegistrationController');

    // Employment Status
    Route::delete('employment-statuses/destroy', 'EmploymentStatusController@massDestroy')->name('employment-statuses.massDestroy');
    Route::resource('employment-statuses', 'EmploymentStatusController');

    // Castes
    Route::delete('castes/destroy', 'CastesController@massDestroy')->name('castes.massDestroy');
    Route::post('castes/parse-csv-import', 'CastesController@parseCsvImport')->name('castes.parseCsvImport');
    Route::post('castes/process-csv-import', 'CastesController@processCsvImport')->name('castes.processCsvImport');
    Route::resource('castes', 'CastesController');

    // Designation Type
    Route::delete('designation-types/destroy', 'DesignationTypeController@massDestroy')->name('designation-types.massDestroy');
    Route::resource('designation-types', 'DesignationTypeController');

    // Biometrics
    Route::delete('biometrics/destroy', 'BiometricsController@massDestroy')->name('biometrics.massDestroy');
    Route::post('biometrics/media', 'BiometricsController@storeMedia')->name('biometrics.storeMedia');
    Route::post('biometrics/ckmedia', 'BiometricsController@storeCKEditorImages')->name('biometrics.storeCKEditorImages');
    Route::resource('biometrics', 'BiometricsController');

    // Work Experiences
    Route::delete('work-experiences/destroy', 'WorkExperiencesController@massDestroy')->name('work-experiences.massDestroy');
    Route::resource('work-experiences', 'WorkExperiencesController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

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
