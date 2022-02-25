<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExamRegistrationRequest;
use App\Http\Requests\StoreExamRegistrationRequest;
use App\Http\Requests\UpdateExamRegistrationRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\ExamRegistration;
use App\Models\Hall;
use App\Models\Hostel;
use App\Models\Student;
use App\Models\User;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExamRegistrationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exam_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examRegistrations = ExamRegistration::with(['student', 'course', 'subsidiary_one', 'subsidiary_two', 'academic_session', 'hall', 'hostel', 'verification_status', 'verified_by'])->get();

        return view('frontend.examRegistrations.index', compact('examRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('exam_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('guardian_mobile_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsidiary_ones = Course::pluck('internal_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsidiary_twos = Course::pluck('internal_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.examRegistrations.create', compact('academic_sessions', 'courses', 'halls', 'hostels', 'students', 'subsidiary_ones', 'subsidiary_twos', 'verification_statuses', 'verified_bies'));
    }

    public function store(StoreExamRegistrationRequest $request)
    {
        $examRegistration = ExamRegistration::create($request->all());

        return redirect()->route('frontend.exam-registrations.index');
    }

    public function edit(ExamRegistration $examRegistration)
    {
        abort_if(Gate::denies('exam_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('guardian_mobile_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsidiary_ones = Course::pluck('internal_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsidiary_twos = Course::pluck('internal_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examRegistration->load('student', 'course', 'subsidiary_one', 'subsidiary_two', 'academic_session', 'hall', 'hostel', 'verification_status', 'verified_by');

        return view('frontend.examRegistrations.edit', compact('academic_sessions', 'courses', 'examRegistration', 'halls', 'hostels', 'students', 'subsidiary_ones', 'subsidiary_twos', 'verification_statuses', 'verified_bies'));
    }

    public function update(UpdateExamRegistrationRequest $request, ExamRegistration $examRegistration)
    {
        $examRegistration->update($request->all());

        return redirect()->route('frontend.exam-registrations.index');
    }

    public function show(ExamRegistration $examRegistration)
    {
        abort_if(Gate::denies('exam_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examRegistration->load('student', 'course', 'subsidiary_one', 'subsidiary_two', 'academic_session', 'hall', 'hostel', 'verification_status', 'verified_by');

        return view('frontend.examRegistrations.show', compact('examRegistration'));
    }

    public function destroy(ExamRegistration $examRegistration)
    {
        abort_if(Gate::denies('exam_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyExamRegistrationRequest $request)
    {
        ExamRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
