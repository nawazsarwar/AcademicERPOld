<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRegistrationFormRequest;
use App\Http\Requests\StoreRegistrationFormRequest;
use App\Http\Requests\UpdateRegistrationFormRequest;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\ProgrammeDurationType;
use App\Models\RegistrationForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationFormsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('registration_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationForms = RegistrationForm::with(['course', 'academic_session', 'programme_duration_type'])->get();

        return view('admin.registrationForms.index', compact('registrationForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('registration_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programme_duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.registrationForms.create', compact('academic_sessions', 'courses', 'programme_duration_types'));
    }

    public function store(StoreRegistrationFormRequest $request)
    {
        $registrationForm = RegistrationForm::create($request->all());

        return redirect()->route('admin.registration-forms.index');
    }

    public function edit(RegistrationForm $registrationForm)
    {
        abort_if(Gate::denies('registration_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programme_duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrationForm->load('course', 'academic_session', 'programme_duration_type');

        return view('admin.registrationForms.edit', compact('academic_sessions', 'courses', 'programme_duration_types', 'registrationForm'));
    }

    public function update(UpdateRegistrationFormRequest $request, RegistrationForm $registrationForm)
    {
        $registrationForm->update($request->all());

        return redirect()->route('admin.registration-forms.index');
    }

    public function show(RegistrationForm $registrationForm)
    {
        abort_if(Gate::denies('registration_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationForm->load('course', 'academic_session', 'programme_duration_type');

        return view('admin.registrationForms.show', compact('registrationForm'));
    }

    public function destroy(RegistrationForm $registrationForm)
    {
        abort_if(Gate::denies('registration_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrationForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistrationFormRequest $request)
    {
        RegistrationForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
