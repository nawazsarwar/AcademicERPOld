<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStudentAdmissionRequest;
use App\Http\Requests\StoreStudentAdmissionRequest;
use App\Http\Requests\UpdateStudentAdmissionRequest;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\StudentAdmission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentAdmissionsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('student_admission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentAdmissions = StudentAdmission::with(['course', 'enrolment'])->get();

        return view('frontend.studentAdmissions.index', compact('studentAdmissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_admission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolments = Enrolment::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.studentAdmissions.create', compact('courses', 'enrolments'));
    }

    public function store(StoreStudentAdmissionRequest $request)
    {
        $studentAdmission = StudentAdmission::create($request->all());

        return redirect()->route('frontend.student-admissions.index');
    }

    public function edit(StudentAdmission $studentAdmission)
    {
        abort_if(Gate::denies('student_admission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolments = Enrolment::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $studentAdmission->load('course', 'enrolment');

        return view('frontend.studentAdmissions.edit', compact('courses', 'enrolments', 'studentAdmission'));
    }

    public function update(UpdateStudentAdmissionRequest $request, StudentAdmission $studentAdmission)
    {
        $studentAdmission->update($request->all());

        return redirect()->route('frontend.student-admissions.index');
    }

    public function show(StudentAdmission $studentAdmission)
    {
        abort_if(Gate::denies('student_admission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentAdmission->load('course', 'enrolment');

        return view('frontend.studentAdmissions.show', compact('studentAdmission'));
    }

    public function destroy(StudentAdmission $studentAdmission)
    {
        abort_if(Gate::denies('student_admission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentAdmission->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentAdmissionRequest $request)
    {
        StudentAdmission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
