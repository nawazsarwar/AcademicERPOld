<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyExaminationScheduleRequest;
use App\Http\Requests\StoreExaminationScheduleRequest;
use App\Http\Requests\UpdateExaminationScheduleRequest;
use App\Models\AcademicSession;
use App\Models\ExaminationSchedule;
use App\Models\Paper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExaminationSchedulesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('examination_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationSchedules = ExaminationSchedule::with(['academic_session', 'paper'])->get();

        return view('frontend.examinationSchedules.index', compact('examinationSchedules'));
    }

    public function create()
    {
        abort_if(Gate::denies('examination_schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.examinationSchedules.create', compact('academic_sessions', 'papers'));
    }

    public function store(StoreExaminationScheduleRequest $request)
    {
        $examinationSchedule = ExaminationSchedule::create($request->all());

        return redirect()->route('frontend.examination-schedules.index');
    }

    public function edit(ExaminationSchedule $examinationSchedule)
    {
        abort_if(Gate::denies('examination_schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academic_sessions = AcademicSession::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examinationSchedule->load('academic_session', 'paper');

        return view('frontend.examinationSchedules.edit', compact('academic_sessions', 'examinationSchedule', 'papers'));
    }

    public function update(UpdateExaminationScheduleRequest $request, ExaminationSchedule $examinationSchedule)
    {
        $examinationSchedule->update($request->all());

        return redirect()->route('frontend.examination-schedules.index');
    }

    public function show(ExaminationSchedule $examinationSchedule)
    {
        abort_if(Gate::denies('examination_schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationSchedule->load('academic_session', 'paper');

        return view('frontend.examinationSchedules.show', compact('examinationSchedule'));
    }

    public function destroy(ExaminationSchedule $examinationSchedule)
    {
        abort_if(Gate::denies('examination_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examinationSchedule->delete();

        return back();
    }

    public function massDestroy(MassDestroyExaminationScheduleRequest $request)
    {
        ExaminationSchedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
