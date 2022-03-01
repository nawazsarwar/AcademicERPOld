<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReevaluationPaperRequest;
use App\Http\Requests\StoreReevaluationPaperRequest;
use App\Http\Requests\UpdateReevaluationPaperRequest;
use App\Models\ExaminationMark;
use App\Models\Paper;
use App\Models\Reevaluation;
use App\Models\ReevaluationPaper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReevaluationPapersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reevaluation_paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluationPapers = ReevaluationPaper::with(['reevaluation', 'examination_mark', 'paper'])->get();

        return view('admin.reevaluationPapers.index', compact('reevaluationPapers'));
    }

    public function create()
    {
        abort_if(Gate::denies('reevaluation_paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluations = Reevaluation::pluck('examination_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examination_marks = ExaminationMark::pluck('sessional', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reevaluationPapers.create', compact('examination_marks', 'papers', 'reevaluations'));
    }

    public function store(StoreReevaluationPaperRequest $request)
    {
        $reevaluationPaper = ReevaluationPaper::create($request->all());

        return redirect()->route('admin.reevaluation-papers.index');
    }

    public function edit(ReevaluationPaper $reevaluationPaper)
    {
        abort_if(Gate::denies('reevaluation_paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluations = Reevaluation::pluck('examination_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examination_marks = ExaminationMark::pluck('sessional', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reevaluationPaper->load('reevaluation', 'examination_mark', 'paper');

        return view('admin.reevaluationPapers.edit', compact('examination_marks', 'papers', 'reevaluationPaper', 'reevaluations'));
    }

    public function update(UpdateReevaluationPaperRequest $request, ReevaluationPaper $reevaluationPaper)
    {
        $reevaluationPaper->update($request->all());

        return redirect()->route('admin.reevaluation-papers.index');
    }

    public function show(ReevaluationPaper $reevaluationPaper)
    {
        abort_if(Gate::denies('reevaluation_paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluationPaper->load('reevaluation', 'examination_mark', 'paper');

        return view('admin.reevaluationPapers.show', compact('reevaluationPaper'));
    }

    public function destroy(ReevaluationPaper $reevaluationPaper)
    {
        abort_if(Gate::denies('reevaluation_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reevaluationPaper->delete();

        return back();
    }

    public function massDestroy(MassDestroyReevaluationPaperRequest $request)
    {
        ReevaluationPaper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
