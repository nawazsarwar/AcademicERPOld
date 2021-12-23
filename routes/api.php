<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Campuses
    Route::apiResource('campuses', 'CampusesApiController');

    // Provinces
    Route::apiResource('provinces', 'ProvincesApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // Religions
    Route::apiResource('religions', 'ReligionsApiController');

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

    // Support Statuses
    Route::apiResource('support-statuses', 'SupportStatusesApiController');

    // Support Priorities
    Route::apiResource('support-priorities', 'SupportPrioritiesApiController');

    // Support Categories
    Route::apiResource('support-categories', 'SupportCategoriesApiController');

    // Support Tickets
    Route::post('support-tickets/media', 'SupportTicketsApiController@storeMedia')->name('support-tickets.storeMedia');
    Route::apiResource('support-tickets', 'SupportTicketsApiController');

    // Support Comments
    Route::apiResource('support-comments', 'SupportCommentsApiController');

    // Halls
    Route::apiResource('halls', 'HallsApiController');

    // Hostels
    Route::apiResource('hostels', 'HostelsApiController');

    // Academic Qualifications
    Route::post('academic-qualifications/media', 'AcademicQualificationsApiController@storeMedia')->name('academic-qualifications.storeMedia');
    Route::apiResource('academic-qualifications', 'AcademicQualificationsApiController');

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

    // Hostel Rooms
    Route::apiResource('hostel-rooms', 'HostelRoomsApiController');

    // Course Levels
    Route::apiResource('course-levels', 'CourseLevelsApiController');

    // Academic Sessions
    Route::apiResource('academic-sessions', 'AcademicSessionsApiController');

    // Postal Code
    Route::apiResource('postal-codes', 'PostalCodeApiController');

    // Admission Charges
    Route::apiResource('admission-charges', 'AdmissionChargesApiController');

    // Continuation Charges
    Route::apiResource('continuation-charges', 'ContinuationChargesApiController');

    // Programme Delivery Mode
    Route::apiResource('programme-delivery-modes', 'ProgrammeDeliveryModeApiController');

    // Admission Entrance Type
    Route::apiResource('admission-entrance-types', 'AdmissionEntranceTypeApiController');

    // Programme Duration Type
    Route::apiResource('programme-duration-types', 'ProgrammeDurationTypeApiController');

    // Registration Forms
    Route::apiResource('registration-forms', 'RegistrationFormsApiController');

    // Exam Registrations
    Route::apiResource('exam-registrations', 'ExamRegistrationsApiController');

    // Papers Registration
    Route::apiResource('papers-registrations', 'PapersRegistrationApiController');

    // Employment Status
    Route::apiResource('employment-statuses', 'EmploymentStatusApiController');

    // Castes
    Route::apiResource('castes', 'CastesApiController');

    // Designation Type
    Route::apiResource('designation-types', 'DesignationTypeApiController');

    // Biometrics
    Route::post('biometrics/media', 'BiometricsApiController@storeMedia')->name('biometrics.storeMedia');
    Route::apiResource('biometrics', 'BiometricsApiController');

    // Work Experiences
    Route::apiResource('work-experiences', 'WorkExperiencesApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');
});
