<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPapersRegistrationRequest;
use App\Http\Requests\StorePapersRegistrationRequest;
use App\Http\Requests\UpdatePapersRegistrationRequest;
use App\Models\ExamRegistration;
use App\Models\Paper;
use App\Models\PapersRegistration;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PapersRegistrationsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('papers_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistrations = PapersRegistration::with(['paper', 'registration', 'student'])->get();

        return view('frontend.papersRegistrations.index', compact('papersRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('papers_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.papersRegistrations.create', compact('papers', 'registrations', 'students'));
    }

    public function store(StorePapersRegistrationRequest $request)
    {
        $papersRegistration = PapersRegistration::create($request->all());

        return redirect()->route('frontend.papers-registrations.index');
    }

    public function edit(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papersRegistration->load('paper', 'registration', 'student');

        return view('frontend.papersRegistrations.edit', compact('papers', 'papersRegistration', 'registrations', 'students'));
    }

    public function update(UpdatePapersRegistrationRequest $request, PapersRegistration $papersRegistration)
    {
        $papersRegistration->update($request->all());

        return redirect()->route('frontend.papers-registrations.index');
    }

    public function show(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistration->load('paper', 'registration', 'student');

        return view('frontend.papersRegistrations.show', compact('papersRegistration'));
    }

    public function destroy(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyPapersRegistrationRequest $request)
    {
        PapersRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
