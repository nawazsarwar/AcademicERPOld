<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExaminationMarkRequest;
use App\Http\Requests\StoreExaminationMarkRequest;
use App\Http\Requests\UpdateExaminationMarkRequest;
use App\Models\AcademicSession;
use App\Models\ExaminationMark;
use App\Models\ExamRegistration;
use App\Models\Paper;
use App\Models\Student;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExaminationMarksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('examination_mark_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationMarks = ExaminationMark::with(['student', 'academic_session', 'registration', 'paper', 'entered_by', 'verified_by'])->get();

        return view('frontend.examinationMarks.index', compact('examinationMarks'));
    }

    public function create()
    {
        abort_if(Gate::denies('examination_mark_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('faculty_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entered_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.examinationMarks.create', compact('academic_sessions', 'entered_bies', 'papers', 'registrations', 'students', 'verified_bies'));
    }

    public function store(StoreExaminationMarkRequest $request)
    {
        $examinationMark = ExaminationMark::create($request->all());

        return redirect()->route('frontend.examination-marks.index');
    }

    public function edit(ExaminationMark $examinationMark)
    {
        abort_if(Gate::denies('examination_mark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('faculty_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entered_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examinationMark->load('student', 'academic_session', 'registration', 'paper', 'entered_by', 'verified_by');

        return view('frontend.examinationMarks.edit', compact('academic_sessions', 'entered_bies', 'examinationMark', 'papers', 'registrations', 'students', 'verified_bies'));
    }

    public function update(UpdateExaminationMarkRequest $request, ExaminationMark $examinationMark)
    {
        $examinationMark->update($request->all());

        return redirect()->route('frontend.examination-marks.index');
    }

    public function show(ExaminationMark $examinationMark)
    {
        abort_if(Gate::denies('examination_mark_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationMark->load('student', 'academic_session', 'registration', 'paper', 'entered_by', 'verified_by');

        return view('frontend.examinationMarks.show', compact('examinationMark'));
    }

    public function destroy(ExaminationMark $examinationMark)
    {
        abort_if(Gate::denies('examination_mark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationMark->delete();

        return back();
    }

    public function massDestroy(MassDestroyExaminationMarkRequest $request)
    {
        ExaminationMark::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
