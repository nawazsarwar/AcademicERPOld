<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
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

    // Postal Codes
    Route::delete('postal-codes/destroy', 'PostalCodesController@massDestroy')->name('postal-codes.massDestroy');
    Route::post('postal-codes/parse-csv-import', 'PostalCodesController@parseCsvImport')->name('postal-codes.parseCsvImport');
    Route::post('postal-codes/process-csv-import', 'PostalCodesController@processCsvImport')->name('postal-codes.processCsvImport');
    Route::resource('postal-codes', 'PostalCodesController');

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

    // Programme Delivery Modes
    Route::delete('programme-delivery-modes/destroy', 'ProgrammeDeliveryModesController@massDestroy')->name('programme-delivery-modes.massDestroy');
    Route::resource('programme-delivery-modes', 'ProgrammeDeliveryModesController');

    // Admission Entrance Types
    Route::delete('admission-entrance-types/destroy', 'AdmissionEntranceTypesController@massDestroy')->name('admission-entrance-types.massDestroy');
    Route::resource('admission-entrance-types', 'AdmissionEntranceTypesController');

    // Programme Duration Types
    Route::delete('programme-duration-types/destroy', 'ProgrammeDurationTypesController@massDestroy')->name('programme-duration-types.massDestroy');
    Route::resource('programme-duration-types', 'ProgrammeDurationTypesController');

    // Registration Forms
    Route::delete('registration-forms/destroy', 'RegistrationFormsController@massDestroy')->name('registration-forms.massDestroy');
    Route::post('registration-forms/parse-csv-import', 'RegistrationFormsController@parseCsvImport')->name('registration-forms.parseCsvImport');
    Route::post('registration-forms/process-csv-import', 'RegistrationFormsController@processCsvImport')->name('registration-forms.processCsvImport');
    Route::resource('registration-forms', 'RegistrationFormsController');

    // Exam Registrations
    Route::delete('exam-registrations/destroy', 'ExamRegistrationsController@massDestroy')->name('exam-registrations.massDestroy');
    Route::resource('exam-registrations', 'ExamRegistrationsController');

    // Registration Papers
    Route::delete('registration-papers/destroy', 'RegistrationPapersController@massDestroy')->name('registration-papers.massDestroy');
    Route::post('registration-papers/parse-csv-import', 'RegistrationPapersController@parseCsvImport')->name('registration-papers.parseCsvImport');
    Route::post('registration-papers/process-csv-import', 'RegistrationPapersController@processCsvImport')->name('registration-papers.processCsvImport');
    Route::resource('registration-papers', 'RegistrationPapersController');

    // Employment Statuses
    Route::delete('employment-statuses/destroy', 'EmploymentStatusesController@massDestroy')->name('employment-statuses.massDestroy');
    Route::resource('employment-statuses', 'EmploymentStatusesController');

    // Castes
    Route::delete('castes/destroy', 'CastesController@massDestroy')->name('castes.massDestroy');
    Route::post('castes/parse-csv-import', 'CastesController@parseCsvImport')->name('castes.parseCsvImport');
    Route::post('castes/process-csv-import', 'CastesController@processCsvImport')->name('castes.processCsvImport');
    Route::resource('castes', 'CastesController');

    // Designation Types
    Route::delete('designation-types/destroy', 'DesignationTypesController@massDestroy')->name('designation-types.massDestroy');
    Route::resource('designation-types', 'DesignationTypesController');

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

    // Blood Groups
    Route::delete('blood-groups/destroy', 'BloodGroupsController@massDestroy')->name('blood-groups.massDestroy');
    Route::resource('blood-groups', 'BloodGroupsController');

    // Salary Data
    Route::delete('salary-datas/destroy', 'SalaryDataController@massDestroy')->name('salary-datas.massDestroy');
    Route::post('salary-datas/parse-csv-import', 'SalaryDataController@parseCsvImport')->name('salary-datas.parseCsvImport');
    Route::post('salary-datas/process-csv-import', 'SalaryDataController@processCsvImport')->name('salary-datas.processCsvImport');
    Route::resource('salary-datas', 'SalaryDataController');

    // Organizational Emails
    Route::delete('organizational-emails/destroy', 'OrganizationalEmailsController@massDestroy')->name('organizational-emails.massDestroy');
    Route::post('organizational-emails/parse-csv-import', 'OrganizationalEmailsController@parseCsvImport')->name('organizational-emails.parseCsvImport');
    Route::post('organizational-emails/process-csv-import', 'OrganizationalEmailsController@processCsvImport')->name('organizational-emails.processCsvImport');
    Route::resource('organizational-emails', 'OrganizationalEmailsController');

    // Computer Centre Data
    Route::delete('computer-centre-datas/destroy', 'ComputerCentreDataController@massDestroy')->name('computer-centre-datas.massDestroy');
    Route::resource('computer-centre-datas', 'ComputerCentreDataController');

    // Answer Scripts
    Route::delete('answer-scripts/destroy', 'AnswerScriptsController@massDestroy')->name('answer-scripts.massDestroy');
    Route::post('answer-scripts/media', 'AnswerScriptsController@storeMedia')->name('answer-scripts.storeMedia');
    Route::post('answer-scripts/ckmedia', 'AnswerScriptsController@storeCKEditorImages')->name('answer-scripts.storeCKEditorImages');
    Route::resource('answer-scripts', 'AnswerScriptsController');

    // Course Papers
    Route::delete('course-papers/destroy', 'CoursePapersController@massDestroy')->name('course-papers.massDestroy');
    Route::resource('course-papers', 'CoursePapersController');

    // Course Academic Sessions
    Route::delete('course-academic-sessions/destroy', 'CourseAcademicSessionsController@massDestroy')->name('course-academic-sessions.massDestroy');
    Route::post('course-academic-sessions/parse-csv-import', 'CourseAcademicSessionsController@parseCsvImport')->name('course-academic-sessions.parseCsvImport');
    Route::post('course-academic-sessions/process-csv-import', 'CourseAcademicSessionsController@processCsvImport')->name('course-academic-sessions.processCsvImport');
    Route::resource('course-academic-sessions', 'CourseAcademicSessionsController');

    // Course Student
    Route::delete('course-students/destroy', 'CourseStudentController@massDestroy')->name('course-students.massDestroy');
    Route::resource('course-students', 'CourseStudentController');

    // Verification Statuses
    Route::delete('verification-statuses/destroy', 'VerificationStatusesController@massDestroy')->name('verification-statuses.massDestroy');
    Route::resource('verification-statuses', 'VerificationStatusesController');

    // Examination Schedules
    Route::delete('examination-schedules/destroy', 'ExaminationSchedulesController@massDestroy')->name('examination-schedules.massDestroy');
    Route::post('examination-schedules/parse-csv-import', 'ExaminationSchedulesController@parseCsvImport')->name('examination-schedules.parseCsvImport');
    Route::post('examination-schedules/process-csv-import', 'ExaminationSchedulesController@processCsvImport')->name('examination-schedules.processCsvImport');
    Route::resource('examination-schedules', 'ExaminationSchedulesController');

    // Examiners
    Route::delete('examiners/destroy', 'ExaminersController@massDestroy')->name('examiners.massDestroy');
    Route::post('examiners/media', 'ExaminersController@storeMedia')->name('examiners.storeMedia');
    Route::post('examiners/ckmedia', 'ExaminersController@storeCKEditorImages')->name('examiners.storeCKEditorImages');
    Route::resource('examiners', 'ExaminersController');

    // Student Admissions
    Route::delete('student-admissions/destroy', 'StudentAdmissionsController@massDestroy')->name('student-admissions.massDestroy');
    Route::post('student-admissions/parse-csv-import', 'StudentAdmissionsController@parseCsvImport')->name('student-admissions.parseCsvImport');
    Route::post('student-admissions/process-csv-import', 'StudentAdmissionsController@processCsvImport')->name('student-admissions.processCsvImport');
    Route::resource('student-admissions', 'StudentAdmissionsController');

    // Research Scholars
    Route::delete('research-scholars/destroy', 'ResearchScholarsController@massDestroy')->name('research-scholars.massDestroy');
    Route::post('research-scholars/parse-csv-import', 'ResearchScholarsController@parseCsvImport')->name('research-scholars.parseCsvImport');
    Route::post('research-scholars/process-csv-import', 'ResearchScholarsController@processCsvImport')->name('research-scholars.processCsvImport');
    Route::resource('research-scholars', 'ResearchScholarsController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoriesController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoriesController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagsController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagsController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPagesController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPagesController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPagesController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPagesController');

    // Websites
    Route::delete('websites/destroy', 'WebsitesController@massDestroy')->name('websites.massDestroy');
    Route::resource('websites', 'WebsitesController');

    // Examination Marks
    Route::delete('examination-marks/destroy', 'ExaminationMarksController@massDestroy')->name('examination-marks.massDestroy');
    Route::resource('examination-marks', 'ExaminationMarksController');

    // Receivables
    Route::delete('receivables/destroy', 'ReceivablesController@massDestroy')->name('receivables.massDestroy');
    Route::post('receivables/parse-csv-import', 'ReceivablesController@parseCsvImport')->name('receivables.parseCsvImport');
    Route::post('receivables/process-csv-import', 'ReceivablesController@processCsvImport')->name('receivables.processCsvImport');
    Route::resource('receivables', 'ReceivablesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Merchants
    Route::delete('merchants/destroy', 'MerchantsController@massDestroy')->name('merchants.massDestroy');
    Route::resource('merchants', 'MerchantsController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Dialogues
    Route::delete('dialogues/destroy', 'DialoguesController@massDestroy')->name('dialogues.massDestroy');
    Route::resource('dialogues', 'DialoguesController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Hall Student
    Route::delete('hall-students/destroy', 'HallStudentController@massDestroy')->name('hall-students.massDestroy');
    Route::post('hall-students/parse-csv-import', 'HallStudentController@parseCsvImport')->name('hall-students.parseCsvImport');
    Route::post('hall-students/process-csv-import', 'HallStudentController@processCsvImport')->name('hall-students.processCsvImport');
    Route::resource('hall-students', 'HallStudentController');

    // User Requests
    Route::delete('user-requests/destroy', 'UserRequestsController@massDestroy')->name('user-requests.massDestroy');
    Route::resource('user-requests', 'UserRequestsController');

    // Reevaluation Papers
    Route::delete('reevaluation-papers/destroy', 'ReevaluationPapersController@massDestroy')->name('reevaluation-papers.massDestroy');
    Route::resource('reevaluation-papers', 'ReevaluationPapersController');

    // Reevaluations
    Route::delete('reevaluations/destroy', 'ReevaluationsController@massDestroy')->name('reevaluations.massDestroy');
    Route::resource('reevaluations', 'ReevaluationsController');

    // Notifications
    Route::delete('notifications/destroy', 'NotificationsController@massDestroy')->name('notifications.massDestroy');
    Route::resource('notifications', 'NotificationsController');

    // Notificable
    Route::delete('notificables/destroy', 'NotificableController@massDestroy')->name('notificables.massDestroy');
    Route::resource('notificables', 'NotificableController');

    // Advertisements
    Route::delete('advertisements/destroy', 'AdvertisementsController@massDestroy')->name('advertisements.massDestroy');
    Route::post('advertisements/media', 'AdvertisementsController@storeMedia')->name('advertisements.storeMedia');
    Route::post('advertisements/ckmedia', 'AdvertisementsController@storeCKEditorImages')->name('advertisements.storeCKEditorImages');
    Route::resource('advertisements', 'AdvertisementsController');

    // Post Types
    Route::delete('post-types/destroy', 'PostTypesController@massDestroy')->name('post-types.massDestroy');
    Route::resource('post-types', 'PostTypesController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::resource('posts', 'PostsController');

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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
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
    Route::resource('campuses', 'CampusesController');

    // Provinces
    Route::delete('provinces/destroy', 'ProvincesController@massDestroy')->name('provinces.massDestroy');
    Route::resource('provinces', 'ProvincesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Religions
    Route::delete('religions/destroy', 'ReligionsController@massDestroy')->name('religions.massDestroy');
    Route::resource('religions', 'ReligionsController');

    // Persons
    Route::delete('people/destroy', 'PersonsController@massDestroy')->name('people.massDestroy');
    Route::resource('people', 'PersonsController');

    // Boards
    Route::delete('boards/destroy', 'BoardsController@massDestroy')->name('boards.massDestroy');
    Route::resource('boards', 'BoardsController');

    // Addresses
    Route::delete('addresses/destroy', 'AddressesController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressesController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::resource('courses', 'CoursesController');

    // Faculties
    Route::delete('faculties/destroy', 'FacultiesController@massDestroy')->name('faculties.massDestroy');
    Route::resource('faculties', 'FacultiesController');

    // Degrees
    Route::delete('degrees/destroy', 'DegreesController@massDestroy')->name('degrees.massDestroy');
    Route::resource('degrees', 'DegreesController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentsController');

    // Centres
    Route::delete('centres/destroy', 'CentresController@massDestroy')->name('centres.massDestroy');
    Route::resource('centres', 'CentresController');

    // Support Statuses
    Route::delete('support-statuses/destroy', 'SupportStatusesController@massDestroy')->name('support-statuses.massDestroy');
    Route::resource('support-statuses', 'SupportStatusesController');

    // Support Priorities
    Route::delete('support-priorities/destroy', 'SupportPrioritiesController@massDestroy')->name('support-priorities.massDestroy');
    Route::resource('support-priorities', 'SupportPrioritiesController');

    // Support Categories
    Route::delete('support-categories/destroy', 'SupportCategoriesController@massDestroy')->name('support-categories.massDestroy');
    Route::resource('support-categories', 'SupportCategoriesController');

    // Support Tickets
    Route::delete('support-tickets/destroy', 'SupportTicketsController@massDestroy')->name('support-tickets.massDestroy');
    Route::post('support-tickets/media', 'SupportTicketsController@storeMedia')->name('support-tickets.storeMedia');
    Route::post('support-tickets/ckmedia', 'SupportTicketsController@storeCKEditorImages')->name('support-tickets.storeCKEditorImages');
    Route::resource('support-tickets', 'SupportTicketsController');

    // Support Comments
    Route::delete('support-comments/destroy', 'SupportCommentsController@massDestroy')->name('support-comments.massDestroy');
    Route::resource('support-comments', 'SupportCommentsController');

    // Halls
    Route::delete('halls/destroy', 'HallsController@massDestroy')->name('halls.massDestroy');
    Route::resource('halls', 'HallsController');

    // Hostels
    Route::delete('hostels/destroy', 'HostelsController@massDestroy')->name('hostels.massDestroy');
    Route::resource('hostels', 'HostelsController');

    // Academic Qualifications
    Route::delete('academic-qualifications/destroy', 'AcademicQualificationsController@massDestroy')->name('academic-qualifications.massDestroy');
    Route::post('academic-qualifications/media', 'AcademicQualificationsController@storeMedia')->name('academic-qualifications.storeMedia');
    Route::post('academic-qualifications/ckmedia', 'AcademicQualificationsController@storeCKEditorImages')->name('academic-qualifications.storeCKEditorImages');
    Route::resource('academic-qualifications', 'AcademicQualificationsController');

    // Qualification Levels
    Route::delete('qualification-levels/destroy', 'QualificationLevelsController@massDestroy')->name('qualification-levels.massDestroy');
    Route::resource('qualification-levels', 'QualificationLevelsController');

    // Phones
    Route::delete('phones/destroy', 'PhonesController@massDestroy')->name('phones.massDestroy');
    Route::resource('phones', 'PhonesController');

    // Paper Types
    Route::delete('paper-types/destroy', 'PaperTypesController@massDestroy')->name('paper-types.massDestroy');
    Route::resource('paper-types', 'PaperTypesController');

    // Papers
    Route::delete('papers/destroy', 'PapersController@massDestroy')->name('papers.massDestroy');
    Route::resource('papers', 'PapersController');

    // Enrolments
    Route::delete('enrolments/destroy', 'EnrolmentsController@massDestroy')->name('enrolments.massDestroy');
    Route::resource('enrolments', 'EnrolmentsController');

    // Students
    Route::delete('students/destroy', 'StudentsController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentsController');

    // Employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::resource('employees', 'EmployeesController');

    // Designations
    Route::delete('designations/destroy', 'DesignationsController@massDestroy')->name('designations.massDestroy');
    Route::resource('designations', 'DesignationsController');

    // Nominees
    Route::delete('nominees/destroy', 'NomineesController@massDestroy')->name('nominees.massDestroy');
    Route::resource('nominees', 'NomineesController');

    // Family Members
    Route::delete('family-members/destroy', 'FamilyMembersController@massDestroy')->name('family-members.massDestroy');
    Route::resource('family-members', 'FamilyMembersController');

    // Hostel Rooms
    Route::delete('hostel-rooms/destroy', 'HostelRoomsController@massDestroy')->name('hostel-rooms.massDestroy');
    Route::resource('hostel-rooms', 'HostelRoomsController');

    // Course Levels
    Route::delete('course-levels/destroy', 'CourseLevelsController@massDestroy')->name('course-levels.massDestroy');
    Route::resource('course-levels', 'CourseLevelsController');

    // Academic Sessions
    Route::delete('academic-sessions/destroy', 'AcademicSessionsController@massDestroy')->name('academic-sessions.massDestroy');
    Route::resource('academic-sessions', 'AcademicSessionsController');

    // Postal Codes
    Route::delete('postal-codes/destroy', 'PostalCodesController@massDestroy')->name('postal-codes.massDestroy');
    Route::resource('postal-codes', 'PostalCodesController');

    // Admission Charges
    Route::delete('admission-charges/destroy', 'AdmissionChargesController@massDestroy')->name('admission-charges.massDestroy');
    Route::resource('admission-charges', 'AdmissionChargesController');

    // Continuation Charges
    Route::delete('continuation-charges/destroy', 'ContinuationChargesController@massDestroy')->name('continuation-charges.massDestroy');
    Route::resource('continuation-charges', 'ContinuationChargesController');

    // Programme Delivery Modes
    Route::delete('programme-delivery-modes/destroy', 'ProgrammeDeliveryModesController@massDestroy')->name('programme-delivery-modes.massDestroy');
    Route::resource('programme-delivery-modes', 'ProgrammeDeliveryModesController');

    // Admission Entrance Types
    Route::delete('admission-entrance-types/destroy', 'AdmissionEntranceTypesController@massDestroy')->name('admission-entrance-types.massDestroy');
    Route::resource('admission-entrance-types', 'AdmissionEntranceTypesController');

    // Programme Duration Types
    Route::delete('programme-duration-types/destroy', 'ProgrammeDurationTypesController@massDestroy')->name('programme-duration-types.massDestroy');
    Route::resource('programme-duration-types', 'ProgrammeDurationTypesController');

    // Registration Forms
    Route::delete('registration-forms/destroy', 'RegistrationFormsController@massDestroy')->name('registration-forms.massDestroy');
    Route::resource('registration-forms', 'RegistrationFormsController');

    // Exam Registrations
    Route::delete('exam-registrations/destroy', 'ExamRegistrationsController@massDestroy')->name('exam-registrations.massDestroy');
    Route::resource('exam-registrations', 'ExamRegistrationsController');

    // Registration Papers
    Route::delete('registration-papers/destroy', 'RegistrationPapersController@massDestroy')->name('registration-papers.massDestroy');
    Route::resource('registration-papers', 'RegistrationPapersController');

    // Employment Statuses
    Route::delete('employment-statuses/destroy', 'EmploymentStatusesController@massDestroy')->name('employment-statuses.massDestroy');
    Route::resource('employment-statuses', 'EmploymentStatusesController');

    // Castes
    Route::delete('castes/destroy', 'CastesController@massDestroy')->name('castes.massDestroy');
    Route::resource('castes', 'CastesController');

    // Designation Types
    Route::delete('designation-types/destroy', 'DesignationTypesController@massDestroy')->name('designation-types.massDestroy');
    Route::resource('designation-types', 'DesignationTypesController');

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

    // Blood Groups
    Route::delete('blood-groups/destroy', 'BloodGroupsController@massDestroy')->name('blood-groups.massDestroy');
    Route::resource('blood-groups', 'BloodGroupsController');

    // Salary Data
    Route::delete('salary-datas/destroy', 'SalaryDataController@massDestroy')->name('salary-datas.massDestroy');
    Route::resource('salary-datas', 'SalaryDataController');

    // Organizational Emails
    Route::delete('organizational-emails/destroy', 'OrganizationalEmailsController@massDestroy')->name('organizational-emails.massDestroy');
    Route::resource('organizational-emails', 'OrganizationalEmailsController');

    // Computer Centre Data
    Route::delete('computer-centre-datas/destroy', 'ComputerCentreDataController@massDestroy')->name('computer-centre-datas.massDestroy');
    Route::resource('computer-centre-datas', 'ComputerCentreDataController');

    // Answer Scripts
    Route::delete('answer-scripts/destroy', 'AnswerScriptsController@massDestroy')->name('answer-scripts.massDestroy');
    Route::post('answer-scripts/media', 'AnswerScriptsController@storeMedia')->name('answer-scripts.storeMedia');
    Route::post('answer-scripts/ckmedia', 'AnswerScriptsController@storeCKEditorImages')->name('answer-scripts.storeCKEditorImages');
    Route::resource('answer-scripts', 'AnswerScriptsController');

    // Course Papers
    Route::delete('course-papers/destroy', 'CoursePapersController@massDestroy')->name('course-papers.massDestroy');
    Route::resource('course-papers', 'CoursePapersController');

    // Course Academic Sessions
    Route::delete('course-academic-sessions/destroy', 'CourseAcademicSessionsController@massDestroy')->name('course-academic-sessions.massDestroy');
    Route::resource('course-academic-sessions', 'CourseAcademicSessionsController');

    // Course Student
    Route::delete('course-students/destroy', 'CourseStudentController@massDestroy')->name('course-students.massDestroy');
    Route::resource('course-students', 'CourseStudentController');

    // Verification Statuses
    Route::delete('verification-statuses/destroy', 'VerificationStatusesController@massDestroy')->name('verification-statuses.massDestroy');
    Route::resource('verification-statuses', 'VerificationStatusesController');

    // Examination Schedules
    Route::delete('examination-schedules/destroy', 'ExaminationSchedulesController@massDestroy')->name('examination-schedules.massDestroy');
    Route::resource('examination-schedules', 'ExaminationSchedulesController');

    // Examiners
    Route::delete('examiners/destroy', 'ExaminersController@massDestroy')->name('examiners.massDestroy');
    Route::post('examiners/media', 'ExaminersController@storeMedia')->name('examiners.storeMedia');
    Route::post('examiners/ckmedia', 'ExaminersController@storeCKEditorImages')->name('examiners.storeCKEditorImages');
    Route::resource('examiners', 'ExaminersController');

    // Student Admissions
    Route::delete('student-admissions/destroy', 'StudentAdmissionsController@massDestroy')->name('student-admissions.massDestroy');
    Route::resource('student-admissions', 'StudentAdmissionsController');

    // Research Scholars
    Route::delete('research-scholars/destroy', 'ResearchScholarsController@massDestroy')->name('research-scholars.massDestroy');
    Route::resource('research-scholars', 'ResearchScholarsController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoriesController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoriesController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagsController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagsController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPagesController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPagesController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPagesController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPagesController');

    // Websites
    Route::delete('websites/destroy', 'WebsitesController@massDestroy')->name('websites.massDestroy');
    Route::resource('websites', 'WebsitesController');

    // Examination Marks
    Route::delete('examination-marks/destroy', 'ExaminationMarksController@massDestroy')->name('examination-marks.massDestroy');
    Route::resource('examination-marks', 'ExaminationMarksController');

    // Receivables
    Route::delete('receivables/destroy', 'ReceivablesController@massDestroy')->name('receivables.massDestroy');
    Route::resource('receivables', 'ReceivablesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Merchants
    Route::delete('merchants/destroy', 'MerchantsController@massDestroy')->name('merchants.massDestroy');
    Route::resource('merchants', 'MerchantsController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Dialogues
    Route::delete('dialogues/destroy', 'DialoguesController@massDestroy')->name('dialogues.massDestroy');
    Route::resource('dialogues', 'DialoguesController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Hall Student
    Route::delete('hall-students/destroy', 'HallStudentController@massDestroy')->name('hall-students.massDestroy');
    Route::resource('hall-students', 'HallStudentController');

    // User Requests
    Route::delete('user-requests/destroy', 'UserRequestsController@massDestroy')->name('user-requests.massDestroy');
    Route::resource('user-requests', 'UserRequestsController');

    // Reevaluation Papers
    Route::delete('reevaluation-papers/destroy', 'ReevaluationPapersController@massDestroy')->name('reevaluation-papers.massDestroy');
    Route::resource('reevaluation-papers', 'ReevaluationPapersController');

    // Reevaluations
    Route::delete('reevaluations/destroy', 'ReevaluationsController@massDestroy')->name('reevaluations.massDestroy');
    Route::resource('reevaluations', 'ReevaluationsController');

    // Notifications
    Route::delete('notifications/destroy', 'NotificationsController@massDestroy')->name('notifications.massDestroy');
    Route::resource('notifications', 'NotificationsController');

    // Notificable
    Route::delete('notificables/destroy', 'NotificableController@massDestroy')->name('notificables.massDestroy');
    Route::resource('notificables', 'NotificableController');

    // Advertisements
    Route::delete('advertisements/destroy', 'AdvertisementsController@massDestroy')->name('advertisements.massDestroy');
    Route::post('advertisements/media', 'AdvertisementsController@storeMedia')->name('advertisements.storeMedia');
    Route::post('advertisements/ckmedia', 'AdvertisementsController@storeCKEditorImages')->name('advertisements.storeCKEditorImages');
    Route::resource('advertisements', 'AdvertisementsController');

    // Post Types
    Route::delete('post-types/destroy', 'PostTypesController@massDestroy')->name('post-types.massDestroy');
    Route::resource('post-types', 'PostTypesController');

    // Posts
    Route::delete('posts/destroy', 'PostsController@massDestroy')->name('posts.massDestroy');
    Route::resource('posts', 'PostsController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
