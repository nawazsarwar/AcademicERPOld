<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPaperRequest;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Models\Department;
use App\Models\Paper;
use App\Models\PaperType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PapersController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::with(['paper_type', 'administrable'])->get();

        return view('frontend.papers.index', compact('papers'));
    }

    public function create()
    {
        abort_if(Gate::denies('paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_types = PaperType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.papers.create', compact('administrables', 'paper_types'));
    }

    public function store(StorePaperRequest $request)
    {
        $paper = Paper::create($request->all());

        return redirect()->route('frontend.papers.index');
    }

    public function edit(Paper $paper)
    {
        abort_if(Gate::denies('paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_types = PaperType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paper->load('paper_type', 'administrable');

        return view('frontend.papers.edit', compact('administrables', 'paper', 'paper_types'));
    }

    public function update(UpdatePaperRequest $request, Paper $paper)
    {
        $paper->update($request->all());

        return redirect()->route('frontend.papers.index');
    }

    public function show(Paper $paper)
    {
        abort_if(Gate::denies('paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->load('paper_type', 'administrable');

        return view('frontend.papers.show', compact('paper'));
    }

    public function destroy(Paper $paper)
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaperRequest $request)
    {
        Paper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
