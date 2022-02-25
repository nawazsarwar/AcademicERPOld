<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyResearchScholarRequest;
use App\Http\Requests\StoreResearchScholarRequest;
use App\Http\Requests\UpdateResearchScholarRequest;
use App\Models\Employee;
use App\Models\ExamRegistration;
use App\Models\ResearchScholar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResearchScholarsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('research_scholar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $researchScholars = ResearchScholar::with(['registration', 'supervisor'])->get();

        return view('admin.researchScholars.index', compact('researchScholars'));
    }

    public function create()
    {
        abort_if(Gate::denies('research_scholar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supervisors = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.researchScholars.create', compact('registrations', 'supervisors'));
    }

    public function store(StoreResearchScholarRequest $request)
    {
        $researchScholar = ResearchScholar::create($request->all());

        return redirect()->route('admin.research-scholars.index');
    }

    public function edit(ResearchScholar $researchScholar)
    {
        abort_if(Gate::denies('research_scholar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supervisors = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $researchScholar->load('registration', 'supervisor');

        return view('admin.researchScholars.edit', compact('registrations', 'researchScholar', 'supervisors'));
    }

    public function update(UpdateResearchScholarRequest $request, ResearchScholar $researchScholar)
    {
        $researchScholar->update($request->all());

        return redirect()->route('admin.research-scholars.index');
    }

    public function show(ResearchScholar $researchScholar)
    {
        abort_if(Gate::denies('research_scholar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $researchScholar->load('registration', 'supervisor');

        return view('admin.researchScholars.show', compact('researchScholar'));
    }

    public function destroy(ResearchScholar $researchScholar)
    {
        abort_if(Gate::denies('research_scholar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $researchScholar->delete();

        return back();
    }

    public function massDestroy(MassDestroyResearchScholarRequest $request)
    {
        ResearchScholar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
