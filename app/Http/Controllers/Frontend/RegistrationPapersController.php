<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRegistrationPaperRequest;
use App\Http\Requests\StoreRegistrationPaperRequest;
use App\Http\Requests\UpdateRegistrationPaperRequest;
use App\Models\ExamRegistration;
use App\Models\Paper;
use App\Models\RegistrationPaper;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationPapersController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('registration_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationPapers = RegistrationPaper::with(['paper', 'registration', 'student'])->get();

        return view('frontend.registrationPapers.index', compact('registrationPapers'));
    }

    public function create()
    {
        abort_if(Gate::denies('registration_paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.registrationPapers.create', compact('papers', 'registrations', 'students'));
    }

    public function store(StoreRegistrationPaperRequest $request)
    {
        $registrationPaper = RegistrationPaper::create($request->all());

        return redirect()->route('frontend.registration-papers.index');
    }

    public function edit(RegistrationPaper $registrationPaper)
    {
        abort_if(Gate::denies('registration_paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrationPaper->load('paper', 'registration', 'student');

        return view('frontend.registrationPapers.edit', compact('papers', 'registrationPaper', 'registrations', 'students'));
    }

    public function update(UpdateRegistrationPaperRequest $request, RegistrationPaper $registrationPaper)
    {
        $registrationPaper->update($request->all());

        return redirect()->route('frontend.registration-papers.index');
    }

    public function show(RegistrationPaper $registrationPaper)
    {
        abort_if(Gate::denies('registration_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationPaper->load('paper', 'registration', 'student');

        return view('frontend.registrationPapers.show', compact('registrationPaper'));
    }

    public function destroy(RegistrationPaper $registrationPaper)
    {
        abort_if(Gate::denies('registration_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationPaper->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistrationPaperRequest $request)
    {
        RegistrationPaper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
