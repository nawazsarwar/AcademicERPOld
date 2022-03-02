<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEnrolmentRequest;
use App\Http\Requests\StoreEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;
use App\Models\Enrolment;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnrolmentsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('enrolment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolments = Enrolment::with(['student'])->get();

        return view('frontend.enrolments.index', compact('enrolments'));
    }

    public function create()
    {
        abort_if(Gate::denies('enrolment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.enrolments.create', compact('students'));
    }

    public function store(StoreEnrolmentRequest $request)
    {
        $enrolment = Enrolment::create($request->all());

        return redirect()->route('frontend.enrolments.index');
    }

    public function edit(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolment->load('student');

        return view('frontend.enrolments.edit', compact('enrolment', 'students'));
    }

    public function update(UpdateEnrolmentRequest $request, Enrolment $enrolment)
    {
        $enrolment->update($request->all());

        return redirect()->route('frontend.enrolments.index');
    }

    public function show(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolment->load('student');

        return view('frontend.enrolments.show', compact('enrolment'));
    }

    public function destroy(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnrolmentRequest $request)
    {
        Enrolment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
