<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('controllers_office_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/students*") ? "menu-open" : "" }} {{ request()->is("admin/degrees*") ? "menu-open" : "" }} {{ request()->is("admin/courses*") ? "menu-open" : "" }} {{ request()->is("admin/papers*") ? "menu-open" : "" }} {{ request()->is("admin/enrolments*") ? "menu-open" : "" }} {{ request()->is("admin/boards*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.controllersOffice.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('student_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.students.index") }}" class="nav-link {{ request()->is("admin/students") || request()->is("admin/students/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-graduate">

                                        </i>
                                        <p>
                                            {{ trans('cruds.student.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('degree_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.degrees.index") }}" class="nav-link {{ request()->is("admin/degrees") || request()->is("admin/degrees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-graduation-cap">

                                        </i>
                                        <p>
                                            {{ trans('cruds.degree.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.course.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('paper_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.papers.index") }}" class="nav-link {{ request()->is("admin/papers") || request()->is("admin/papers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paper.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('enrolment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.enrolments.index") }}" class="nav-link {{ request()->is("admin/enrolments") || request()->is("admin/enrolments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-fingerprint">

                                        </i>
                                        <p>
                                            {{ trans('cruds.enrolment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('board_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.boards.index") }}" class="nav-link {{ request()->is("admin/boards") || request()->is("admin/boards/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.board.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('examination_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/registration-forms*") ? "menu-open" : "" }} {{ request()->is("admin/exam-registrations*") ? "menu-open" : "" }} {{ request()->is("admin/papers-registrations*") ? "menu-open" : "" }} {{ request()->is("admin/course-students*") ? "menu-open" : "" }} {{ request()->is("admin/examination-schedules*") ? "menu-open" : "" }} {{ request()->is("admin/examiners*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.examination.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('registration_form_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.registration-forms.index") }}" class="nav-link {{ request()->is("admin/registration-forms") || request()->is("admin/registration-forms/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.registrationForm.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('exam_registration_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.exam-registrations.index") }}" class="nav-link {{ request()->is("admin/exam-registrations") || request()->is("admin/exam-registrations/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.examRegistration.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('papers_registration_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.papers-registrations.index") }}" class="nav-link {{ request()->is("admin/papers-registrations") || request()->is("admin/papers-registrations/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.papersRegistration.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('course_student_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.course-students.index") }}" class="nav-link {{ request()->is("admin/course-students") || request()->is("admin/course-students/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.courseStudent.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('examination_schedule_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.examination-schedules.index") }}" class="nav-link {{ request()->is("admin/examination-schedules") || request()->is("admin/examination-schedules/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.examinationSchedule.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('examiner_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.examiners.index") }}" class="nav-link {{ request()->is("admin/examiners") || request()->is("admin/examiners/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.examiner.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('setting_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/academic-sessions*") ? "menu-open" : "" }} {{ request()->is("admin/paper-types*") ? "menu-open" : "" }} {{ request()->is("admin/qualification-levels*") ? "menu-open" : "" }} {{ request()->is("admin/course-levels*") ? "menu-open" : "" }} {{ request()->is("admin/programme-delivery-modes*") ? "menu-open" : "" }} {{ request()->is("admin/admission-entrance-types*") ? "menu-open" : "" }} {{ request()->is("admin/programme-duration-types*") ? "menu-open" : "" }} {{ request()->is("admin/answer-scripts*") ? "menu-open" : "" }} {{ request()->is("admin/course-papers*") ? "menu-open" : "" }} {{ request()->is("admin/course-academic-sessions*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.setting.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('academic_session_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.academic-sessions.index") }}" class="nav-link {{ request()->is("admin/academic-sessions") || request()->is("admin/academic-sessions/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-sellsy">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.academicSession.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('paper_type_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.paper-types.index") }}" class="nav-link {{ request()->is("admin/paper-types") || request()->is("admin/paper-types/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.paperType.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('qualification_level_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.qualification-levels.index") }}" class="nav-link {{ request()->is("admin/qualification-levels") || request()->is("admin/qualification-levels/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.qualificationLevel.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('course_level_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.course-levels.index") }}" class="nav-link {{ request()->is("admin/course-levels") || request()->is("admin/course-levels/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.courseLevel.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('programme_delivery_mode_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.programme-delivery-modes.index") }}" class="nav-link {{ request()->is("admin/programme-delivery-modes") || request()->is("admin/programme-delivery-modes/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.programmeDeliveryMode.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('admission_entrance_type_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.admission-entrance-types.index") }}" class="nav-link {{ request()->is("admin/admission-entrance-types") || request()->is("admin/admission-entrance-types/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.admissionEntranceType.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('programme_duration_type_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.programme-duration-types.index") }}" class="nav-link {{ request()->is("admin/programme-duration-types") || request()->is("admin/programme-duration-types/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.programmeDurationType.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('answer_script_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.answer-scripts.index") }}" class="nav-link {{ request()->is("admin/answer-scripts") || request()->is("admin/answer-scripts/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.answerScript.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('course_paper_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.course-papers.index") }}" class="nav-link {{ request()->is("admin/course-papers") || request()->is("admin/course-papers/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon far fa-file-alt">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.coursePaper.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('course_academic_session_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.course-academic-sessions.index") }}" class="nav-link {{ request()->is("admin/course-academic-sessions") || request()->is("admin/course-academic-sessions/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.courseAcademicSession.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('admission_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/student-admissions*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fas fa-sign-in-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.admission.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('student_admission_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.student-admissions.index") }}" class="nav-link {{ request()->is("admin/student-admissions") || request()->is("admin/student-admissions/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.studentAdmission.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('research_unit_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/research-scholars*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle" href="#">
                                        <i class="fa-fw nav-icon fab fa-researchgate">

                                        </i>
                                        <p>
                                            {{ trans('cruds.researchUnit.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('research_scholar_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.research-scholars.index") }}" class="nav-link {{ request()->is("admin/research-scholars") || request()->is("admin/research-scholars/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.researchScholar.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('demographic_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/people*") ? "menu-open" : "" }} {{ request()->is("admin/addresses*") ? "menu-open" : "" }} {{ request()->is("admin/phones*") ? "menu-open" : "" }} {{ request()->is("admin/biometrics*") ? "menu-open" : "" }} {{ request()->is("admin/academic-qualifications*") ? "menu-open" : "" }} {{ request()->is("admin/work-experiences*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-user-astronaut">

                            </i>
                            <p>
                                {{ trans('cruds.demographic.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('person_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.people.index") }}" class="nav-link {{ request()->is("admin/people") || request()->is("admin/people/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.person.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('address_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.addresses.index") }}" class="nav-link {{ request()->is("admin/addresses") || request()->is("admin/addresses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.address.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('phone_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.phones.index") }}" class="nav-link {{ request()->is("admin/phones") || request()->is("admin/phones/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-phone">

                                        </i>
                                        <p>
                                            {{ trans('cruds.phone.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('biometric_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.biometrics.index") }}" class="nav-link {{ request()->is("admin/biometrics") || request()->is("admin/biometrics/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-fingerprint">

                                        </i>
                                        <p>
                                            {{ trans('cruds.biometric.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('academic_qualification_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.academic-qualifications.index") }}" class="nav-link {{ request()->is("admin/academic-qualifications") || request()->is("admin/academic-qualifications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.academicQualification.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('work_experience_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.work-experiences.index") }}" class="nav-link {{ request()->is("admin/work-experiences") || request()->is("admin/work-experiences/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.workExperience.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('registrars_office_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/campuses*") ? "menu-open" : "" }} {{ request()->is("admin/faculties*") ? "menu-open" : "" }} {{ request()->is("admin/departments*") ? "menu-open" : "" }} {{ request()->is("admin/centres*") ? "menu-open" : "" }} {{ request()->is("admin/employees*") ? "menu-open" : "" }} {{ request()->is("admin/designations*") ? "menu-open" : "" }} {{ request()->is("admin/nominees*") ? "menu-open" : "" }} {{ request()->is("admin/family-members*") ? "menu-open" : "" }} {{ request()->is("admin/employment-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/designation-types*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.registrarsOffice.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('campus_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.campuses.index") }}" class="nav-link {{ request()->is("admin/campuses") || request()->is("admin/campuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.campus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faculty_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faculties.index") }}" class="nav-link {{ request()->is("admin/faculties") || request()->is("admin/faculties/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-school">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faculty.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-school">

                                        </i>
                                        <p>
                                            {{ trans('cruds.department.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('centre_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.centres.index") }}" class="nav-link {{ request()->is("admin/centres") || request()->is("admin/centres/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hospital">

                                        </i>
                                        <p>
                                            {{ trans('cruds.centre.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('employee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employees.index") }}" class="nav-link {{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('designation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.designations.index") }}" class="nav-link {{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.designation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('nominee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.nominees.index") }}" class="nav-link {{ request()->is("admin/nominees") || request()->is("admin/nominees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.nominee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('family_member_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.family-members.index") }}" class="nav-link {{ request()->is("admin/family-members") || request()->is("admin/family-members/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.familyMember.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('employment_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employment-statuses.index") }}" class="nav-link {{ request()->is("admin/employment-statuses") || request()->is("admin/employment-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employmentStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('designation_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.designation-types.index") }}" class="nav-link {{ request()->is("admin/designation-types") || request()->is("admin/designation-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.designationType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('system_configuration_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/countries*") ? "menu-open" : "" }} {{ request()->is("admin/provinces*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }} {{ request()->is("admin/postal-codes*") ? "menu-open" : "" }} {{ request()->is("admin/religions*") ? "menu-open" : "" }} {{ request()->is("admin/castes*") ? "menu-open" : "" }} {{ request()->is("admin/blood-groups*") ? "menu-open" : "" }} {{ request()->is("admin/verification-statuses*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.systemConfiguration.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('country_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.countries.index") }}" class="nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.country.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('province_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.provinces.index") }}" class="nav-link {{ request()->is("admin/provinces") || request()->is("admin/provinces/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.province.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.city.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('postal_code_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.postal-codes.index") }}" class="nav-link {{ request()->is("admin/postal-codes") || request()->is("admin/postal-codes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-code-branch">

                                        </i>
                                        <p>
                                            {{ trans('cruds.postalCode.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('religion_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.religions.index") }}" class="nav-link {{ request()->is("admin/religions") || request()->is("admin/religions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.religion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('caste_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.castes.index") }}" class="nav-link {{ request()->is("admin/castes") || request()->is("admin/castes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.caste.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('blood_group_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blood-groups.index") }}" class="nav-link {{ request()->is("admin/blood-groups") || request()->is("admin/blood-groups/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bloodGroup.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('verification_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.verification-statuses.index") }}" class="nav-link {{ request()->is("admin/verification-statuses") || request()->is("admin/verification-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.verificationStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('dean_students_welfare_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/halls*") ? "menu-open" : "" }} {{ request()->is("admin/hostels*") ? "menu-open" : "" }} {{ request()->is("admin/hostel-rooms*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.deanStudentsWelfare.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('hall_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.halls.index") }}" class="nav-link {{ request()->is("admin/halls") || request()->is("admin/halls/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hotel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hall.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hostel_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hostels.index") }}" class="nav-link {{ request()->is("admin/hostels") || request()->is("admin/hostels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bed">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hostel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hostel_room_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hostel-rooms.index") }}" class="nav-link {{ request()->is("admin/hostel-rooms") || request()->is("admin/hostel-rooms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hospital">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hostelRoom.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/organizational-emails*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }} {{ request()->is("admin/computer-centre-datas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('organizational_email_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.organizational-emails.index") }}" class="nav-link {{ request()->is("admin/organizational-emails") || request()->is("admin/organizational-emails/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.organizationalEmail.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('computer_centre_data_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.computer-centre-datas.index") }}" class="nav-link {{ request()->is("admin/computer-centre-datas") || request()->is("admin/computer-centre-datas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.computerCentreData.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('asset_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/asset-categories*") ? "menu-open" : "" }} {{ request()->is("admin/asset-locations*") ? "menu-open" : "" }} {{ request()->is("admin/asset-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/assets*") ? "menu-open" : "" }} {{ request()->is("admin/assets-histories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.assetManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('asset_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-categories.index") }}" class="nav-link {{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_location_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-locations.index") }}" class="nav-link {{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetLocation.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.asset-statuses.index") }}" class="nav-link {{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('asset_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assets.index") }}" class="nav-link {{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.asset.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assets_history_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assets-histories.index") }}" class="nav-link {{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assetsHistory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('support_centre_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/support-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/support-priorities*") ? "menu-open" : "" }} {{ request()->is("admin/support-categories*") ? "menu-open" : "" }} {{ request()->is("admin/support-tickets*") ? "menu-open" : "" }} {{ request()->is("admin/support-comments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.supportCentre.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('support_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.support-statuses.index") }}" class="nav-link {{ request()->is("admin/support-statuses") || request()->is("admin/support-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supportStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('support_priority_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.support-priorities.index") }}" class="nav-link {{ request()->is("admin/support-priorities") || request()->is("admin/support-priorities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supportPriority.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('support_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.support-categories.index") }}" class="nav-link {{ request()->is("admin/support-categories") || request()->is("admin/support-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supportCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('support_ticket_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.support-tickets.index") }}" class="nav-link {{ request()->is("admin/support-tickets") || request()->is("admin/support-tickets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-question-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supportTicket.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('support_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.support-comments.index") }}" class="nav-link {{ request()->is("admin/support-comments") || request()->is("admin/support-comments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comment">

                                        </i>
                                        <p>
                                            {{ trans('cruds.supportComment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('finance_office_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/admission-charges*") ? "menu-open" : "" }} {{ request()->is("admin/continuation-charges*") ? "menu-open" : "" }} {{ request()->is("admin/salary-datas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                            </i>
                            <p>
                                {{ trans('cruds.financeOffice.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admission_charge_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.admission-charges.index") }}" class="nav-link {{ request()->is("admin/admission-charges") || request()->is("admin/admission-charges/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.admissionCharge.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('continuation_charge_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.continuation-charges.index") }}" class="nav-link {{ request()->is("admin/continuation-charges") || request()->is("admin/continuation-charges/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.continuationCharge.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('salary_data_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.salary-datas.index") }}" class="nav-link {{ request()->is("admin/salary-datas") || request()->is("admin/salary-datas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salaryData.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>