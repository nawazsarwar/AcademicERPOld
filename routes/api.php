<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Campuses
    Route::apiResource('campuses', 'CampusesApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Provinces
    Route::apiResource('provinces', 'ProvincesApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // Religions
    Route::apiResource('religions', 'ReligionsApiController');

    // Pincodes
    Route::apiResource('pincodes', 'PincodesApiController');

    // Persons
    Route::apiResource('people', 'PersonsApiController');

    // Boards
    Route::apiResource('boards', 'BoardsApiController');

    // Addresses
    Route::apiResource('addresses', 'AddressesApiController');

    // Courses
    Route::apiResource('courses', 'CoursesApiController');

    // Faculties
    Route::apiResource('faculties', 'FacultiesApiController');

    // Degrees
    Route::apiResource('degrees', 'DegreesApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentsApiController');

    // Centres
    Route::apiResource('centres', 'CentresApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusesApiController');

    // Priorities
    Route::apiResource('priorities', 'PrioritiesApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Tickets
    Route::post('tickets/media', 'TicketsApiController@storeMedia')->name('tickets.storeMedia');
    Route::apiResource('tickets', 'TicketsApiController');

    // Comments
    Route::apiResource('comments', 'CommentsApiController');

    // Halls
    Route::apiResource('halls', 'HallsApiController');

    // Hostels
    Route::apiResource('hostels', 'HostelsApiController');

    // Qualifications
    Route::apiResource('qualifications', 'QualificationsApiController');

    // Qualification Levels
    Route::apiResource('qualification-levels', 'QualificationLevelsApiController');

    // Phones
    Route::apiResource('phones', 'PhonesApiController');

    // Paper Types
    Route::apiResource('paper-types', 'PaperTypesApiController');

    // Papers
    Route::apiResource('papers', 'PapersApiController');

    // Enrolments
    Route::apiResource('enrolments', 'EnrolmentsApiController');

    // Students
    Route::apiResource('students', 'StudentsApiController');

    // Employees
    Route::apiResource('employees', 'EmployeesApiController');

    // Designations
    Route::apiResource('designations', 'DesignationsApiController');

    // Nominees
    Route::apiResource('nominees', 'NomineesApiController');

    // Family Members
    Route::apiResource('family-members', 'FamilyMembersApiController');
});
