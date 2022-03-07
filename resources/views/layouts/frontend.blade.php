<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('controllers_office_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.controllersOffice.title') }}
                                        </a>
                                    @endcan
                                    @can('student_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.students.index') }}">
                                            {{ trans('cruds.student.title') }}
                                        </a>
                                    @endcan
                                    @can('degree_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.degrees.index') }}">
                                            {{ trans('cruds.degree.title') }}
                                        </a>
                                    @endcan
                                    @can('course_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.courses.index') }}">
                                            {{ trans('cruds.course.title') }}
                                        </a>
                                    @endcan
                                    @can('paper_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.papers.index') }}">
                                            {{ trans('cruds.paper.title') }}
                                        </a>
                                    @endcan
                                    @can('enrolment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.enrolments.index') }}">
                                            {{ trans('cruds.enrolment.title') }}
                                        </a>
                                    @endcan
                                    @can('board_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.boards.index') }}">
                                            {{ trans('cruds.board.title') }}
                                        </a>
                                    @endcan
                                    @can('admission_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.admission.title') }}
                                        </a>
                                    @endcan
                                    @can('student_admission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.student-admissions.index') }}">
                                            {{ trans('cruds.studentAdmission.title') }}
                                        </a>
                                    @endcan
                                    @can('examination_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.examination.title') }}
                                        </a>
                                    @endcan
                                    @can('course_student_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.course-students.index') }}">
                                            {{ trans('cruds.courseStudent.title') }}
                                        </a>
                                    @endcan
                                    @can('registration_form_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.registration-forms.index') }}">
                                            {{ trans('cruds.registrationForm.title') }}
                                        </a>
                                    @endcan
                                    @can('exam_registration_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.exam-registrations.index') }}">
                                            {{ trans('cruds.examRegistration.title') }}
                                        </a>
                                    @endcan
                                    @can('registration_paper_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.registration-papers.index') }}">
                                            {{ trans('cruds.registrationPaper.title') }}
                                        </a>
                                    @endcan
                                    @can('examination_schedule_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.examination-schedules.index') }}">
                                            {{ trans('cruds.examinationSchedule.title') }}
                                        </a>
                                    @endcan
                                    @can('examiner_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.examiners.index') }}">
                                            {{ trans('cruds.examiner.title') }}
                                        </a>
                                    @endcan
                                    @can('result_processing_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.resultProcessing.title') }}
                                        </a>
                                    @endcan
                                    @can('examination_mark_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.examination-marks.index') }}">
                                            {{ trans('cruds.examinationMark.title') }}
                                        </a>
                                    @endcan
                                    @can('reevaluation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.reevaluations.index') }}">
                                            {{ trans('cruds.reevaluation.title') }}
                                        </a>
                                    @endcan
                                    @can('reevaluation_paper_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.reevaluation-papers.index') }}">
                                            {{ trans('cruds.reevaluationPaper.title') }}
                                        </a>
                                    @endcan
                                    @can('research_unit_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.researchUnit.title') }}
                                        </a>
                                    @endcan
                                    @can('research_scholar_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.research-scholars.index') }}">
                                            {{ trans('cruds.researchScholar.title') }}
                                        </a>
                                    @endcan
                                    @can('setting_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.setting.title') }}
                                        </a>
                                    @endcan
                                    @can('academic_session_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.academic-sessions.index') }}">
                                            {{ trans('cruds.academicSession.title') }}
                                        </a>
                                    @endcan
                                    @can('paper_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.paper-types.index') }}">
                                            {{ trans('cruds.paperType.title') }}
                                        </a>
                                    @endcan
                                    @can('qualification_level_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.qualification-levels.index') }}">
                                            {{ trans('cruds.qualificationLevel.title') }}
                                        </a>
                                    @endcan
                                    @can('course_level_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.course-levels.index') }}">
                                            {{ trans('cruds.courseLevel.title') }}
                                        </a>
                                    @endcan
                                    @can('programme_delivery_mode_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.programme-delivery-modes.index') }}">
                                            {{ trans('cruds.programmeDeliveryMode.title') }}
                                        </a>
                                    @endcan
                                    @can('admission_entrance_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.admission-entrance-types.index') }}">
                                            {{ trans('cruds.admissionEntranceType.title') }}
                                        </a>
                                    @endcan
                                    @can('programme_duration_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.programme-duration-types.index') }}">
                                            {{ trans('cruds.programmeDurationType.title') }}
                                        </a>
                                    @endcan
                                    @can('answer_script_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.answer-scripts.index') }}">
                                            {{ trans('cruds.answerScript.title') }}
                                        </a>
                                    @endcan
                                    @can('course_paper_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.course-papers.index') }}">
                                            {{ trans('cruds.coursePaper.title') }}
                                        </a>
                                    @endcan
                                    @can('course_academic_session_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.course-academic-sessions.index') }}">
                                            {{ trans('cruds.courseAcademicSession.title') }}
                                        </a>
                                    @endcan
                                    @can('demographic_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.demographic.title') }}
                                        </a>
                                    @endcan
                                    @can('person_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.people.index') }}">
                                            {{ trans('cruds.person.title') }}
                                        </a>
                                    @endcan
                                    @can('address_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.addresses.index') }}">
                                            {{ trans('cruds.address.title') }}
                                        </a>
                                    @endcan
                                    @can('phone_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.phones.index') }}">
                                            {{ trans('cruds.phone.title') }}
                                        </a>
                                    @endcan
                                    @can('biometric_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.biometrics.index') }}">
                                            {{ trans('cruds.biometric.title') }}
                                        </a>
                                    @endcan
                                    @can('academic_qualification_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.academic-qualifications.index') }}">
                                            {{ trans('cruds.academicQualification.title') }}
                                        </a>
                                    @endcan
                                    @can('work_experience_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.work-experiences.index') }}">
                                            {{ trans('cruds.workExperience.title') }}
                                        </a>
                                    @endcan
                                    @can('order_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.orders.index') }}">
                                            {{ trans('cruds.order.title') }}
                                        </a>
                                    @endcan
                                    @can('communication_centre_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.communicationCentre.title') }}
                                        </a>
                                    @endcan
                                    @can('notification_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.notifications.index') }}">
                                            {{ trans('cruds.notification.title') }}
                                        </a>
                                    @endcan
                                    @can('notificable_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.notificables.index') }}">
                                            {{ trans('cruds.notificable.title') }}
                                        </a>
                                    @endcan
                                    @can('registrars_office_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.registrarsOffice.title') }}
                                        </a>
                                    @endcan
                                    @can('campus_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.campuses.index') }}">
                                            {{ trans('cruds.campus.title') }}
                                        </a>
                                    @endcan
                                    @can('faculty_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.faculties.index') }}">
                                            {{ trans('cruds.faculty.title') }}
                                        </a>
                                    @endcan
                                    @can('department_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.departments.index') }}">
                                            {{ trans('cruds.department.title') }}
                                        </a>
                                    @endcan
                                    @can('centre_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.centres.index') }}">
                                            {{ trans('cruds.centre.title') }}
                                        </a>
                                    @endcan
                                    @can('employee_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.employees.index') }}">
                                            {{ trans('cruds.employee.title') }}
                                        </a>
                                    @endcan
                                    @can('designation_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.designations.index') }}">
                                            {{ trans('cruds.designation.title') }}
                                        </a>
                                    @endcan
                                    @can('nominee_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.nominees.index') }}">
                                            {{ trans('cruds.nominee.title') }}
                                        </a>
                                    @endcan
                                    @can('family_member_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.family-members.index') }}">
                                            {{ trans('cruds.familyMember.title') }}
                                        </a>
                                    @endcan
                                    @can('employment_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.employment-statuses.index') }}">
                                            {{ trans('cruds.employmentStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('designation_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.designation-types.index') }}">
                                            {{ trans('cruds.designationType.title') }}
                                        </a>
                                    @endcan
                                    @can('career_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.career.title') }}
                                        </a>
                                    @endcan
                                    @can('advertisement_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.advertisements.index') }}">
                                            {{ trans('cruds.advertisement.title') }}
                                        </a>
                                    @endcan
                                    @can('old_post_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.old-post-types.index') }}">
                                            {{ trans('cruds.oldPostType.title') }}
                                        </a>
                                    @endcan
                                    @can('system_configuration_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.systemConfiguration.title') }}
                                        </a>
                                    @endcan
                                    @can('country_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.countries.index') }}">
                                            {{ trans('cruds.country.title') }}
                                        </a>
                                    @endcan
                                    @can('province_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.provinces.index') }}">
                                            {{ trans('cruds.province.title') }}
                                        </a>
                                    @endcan
                                    @can('city_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.cities.index') }}">
                                            {{ trans('cruds.city.title') }}
                                        </a>
                                    @endcan
                                    @can('postal_code_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.postal-codes.index') }}">
                                            {{ trans('cruds.postalCode.title') }}
                                        </a>
                                    @endcan
                                    @can('religion_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.religions.index') }}">
                                            {{ trans('cruds.religion.title') }}
                                        </a>
                                    @endcan
                                    @can('caste_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.castes.index') }}">
                                            {{ trans('cruds.caste.title') }}
                                        </a>
                                    @endcan
                                    @can('blood_group_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.blood-groups.index') }}">
                                            {{ trans('cruds.bloodGroup.title') }}
                                        </a>
                                    @endcan
                                    @can('verification_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.verification-statuses.index') }}">
                                            {{ trans('cruds.verificationStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('dean_students_welfare_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.deanStudentsWelfare.title') }}
                                        </a>
                                    @endcan
                                    @can('hall_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.halls.index') }}">
                                            {{ trans('cruds.hall.title') }}
                                        </a>
                                    @endcan
                                    @can('hostel_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hostels.index') }}">
                                            {{ trans('cruds.hostel.title') }}
                                        </a>
                                    @endcan
                                    @can('hostel_room_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hostel-rooms.index') }}">
                                            {{ trans('cruds.hostelRoom.title') }}
                                        </a>
                                    @endcan
                                    @can('hall_student_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hall-students.index') }}">
                                            {{ trans('cruds.hallStudent.title') }}
                                        </a>
                                    @endcan
                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('organizational_email_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.organizational-emails.index') }}">
                                            {{ trans('cruds.organizationalEmail.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('computer_centre_data_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.computer-centre-datas.index') }}">
                                            {{ trans('cruds.computerCentreData.title') }}
                                        </a>
                                    @endcan
                                    @can('user_request_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-requests.index') }}">
                                            {{ trans('cruds.userRequest.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.assetManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-categories.index') }}">
                                            {{ trans('cruds.assetCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_location_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-locations.index') }}">
                                            {{ trans('cruds.assetLocation.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.asset-statuses.index') }}">
                                            {{ trans('cruds.assetStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('asset_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.assets.index') }}">
                                            {{ trans('cruds.asset.title') }}
                                        </a>
                                    @endcan
                                    @can('assets_history_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.assets-histories.index') }}">
                                            {{ trans('cruds.assetsHistory.title') }}
                                        </a>
                                    @endcan
                                    @can('support_centre_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.supportCentre.title') }}
                                        </a>
                                    @endcan
                                    @can('support_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.support-statuses.index') }}">
                                            {{ trans('cruds.supportStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('support_priority_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.support-priorities.index') }}">
                                            {{ trans('cruds.supportPriority.title') }}
                                        </a>
                                    @endcan
                                    @can('support_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.support-categories.index') }}">
                                            {{ trans('cruds.supportCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('support_ticket_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.support-tickets.index') }}">
                                            {{ trans('cruds.supportTicket.title') }}
                                        </a>
                                    @endcan
                                    @can('support_comment_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.support-comments.index') }}">
                                            {{ trans('cruds.supportComment.title') }}
                                        </a>
                                    @endcan
                                    @can('finance_office_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.financeOffice.title') }}
                                        </a>
                                    @endcan
                                    @can('admission_charge_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.admission-charges.index') }}">
                                            {{ trans('cruds.admissionCharge.title') }}
                                        </a>
                                    @endcan
                                    @can('continuation_charge_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.continuation-charges.index') }}">
                                            {{ trans('cruds.continuationCharge.title') }}
                                        </a>
                                    @endcan
                                    @can('salary_data_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.salary-datas.index') }}">
                                            {{ trans('cruds.salaryData.title') }}
                                        </a>
                                    @endcan
                                    @can('receivable_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.receivables.index') }}">
                                            {{ trans('cruds.receivable.title') }}
                                        </a>
                                    @endcan
                                    @can('content_management_system_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.contentManagementSystem.title') }}
                                        </a>
                                    @endcan
                                    @can('website_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.websites.index') }}">
                                            {{ trans('cruds.website.title') }}
                                        </a>
                                    @endcan
                                    @can('content_page_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-pages.index') }}">
                                            {{ trans('cruds.contentPage.title') }}
                                        </a>
                                    @endcan
                                    @can('content_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-categories.index') }}">
                                            {{ trans('cruds.contentCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('content_tag_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-tags.index') }}">
                                            {{ trans('cruds.contentTag.title') }}
                                        </a>
                                    @endcan
                                    @can('pay_hub_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.payHub.title') }}
                                        </a>
                                    @endcan
                                    @can('client_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.clients.index') }}">
                                            {{ trans('cruds.client.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.merchants.index') }}">
                                            {{ trans('cruds.merchant.title') }}
                                        </a>
                                    @endcan
                                    @can('service_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.services.index') }}">
                                            {{ trans('cruds.service.title') }}
                                        </a>
                                    @endcan
                                    @can('transaction_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transactions.index') }}">
                                            {{ trans('cruds.transaction.title') }}
                                        </a>
                                    @endcan
                                    @can('dialogue_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.dialogues.index') }}">
                                            {{ trans('cruds.dialogue.title') }}
                                        </a>
                                    @endcan
                                    @can('university_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.university.title') }}
                                        </a>
                                    @endcan
                                    @can('organization_unit_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.organization-unit-types.index') }}">
                                            {{ trans('cruds.organizationUnitType.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>