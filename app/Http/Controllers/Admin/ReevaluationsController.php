<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReevaluationRequest;
use App\Http\Requests\StoreReevaluationRequest;
use App\Http\Requests\UpdateReevaluationRequest;
use App\Models\Course;
use App\Models\ExamRegistration;
use App\Models\Reevaluation;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReevaluationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reevaluation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluations = Reevaluation::with(['exam_registration', 'student', 'course'])->get();

        return view('admin.reevaluations.index', compact('reevaluations'));
    }

    public function create()
    {
        abort_if(Gate::denies('reevaluation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam_registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reevaluations.create', compact('courses', 'exam_registrations', 'students'));
    }

    public function store(StoreReevaluationRequest $request)
    {
        $reevaluation = Reevaluation::create($request->all());

        return redirect()->route('admin.reevaluations.index');
    }

    public function edit(Reevaluation $reevaluation)
    {
        abort_if(Gate::denies('reevaluation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exam_registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reevaluation->load('exam_registration', 'student', 'course');

        return view('admin.reevaluations.edit', compact('courses', 'exam_registrations', 'reevaluation', 'students'));
    }

    public function update(UpdateReevaluationRequest $request, Reevaluation $reevaluation)
    {
        $reevaluation->update($request->all());

        return redirect()->route('admin.reevaluations.index');
    }

    public function show(Reevaluation $reevaluation)
    {
        abort_if(Gate::denies('reevaluation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluation->load('exam_registration', 'student', 'course');

        return view('admin.reevaluations.show', compact('reevaluation'));
    }

    public function destroy(Reevaluation $reevaluation)
    {
        abort_if(Gate::denies('reevaluation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluation->delete();

        return back();
    }

    public function massDestroy(MassDestroyReevaluationRequest $request)
    {
        Reevaluation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
