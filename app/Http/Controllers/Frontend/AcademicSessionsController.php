<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAcademicSessionRequest;
use App\Http\Requests\StoreAcademicSessionRequest;
use App\Http\Requests\UpdateAcademicSessionRequest;
use App\Models\AcademicSession;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicSessionsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('academic_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicSessions = AcademicSession::all();

        return view('frontend.academicSessions.index', compact('academicSessions'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.academicSessions.create');
    }

    public function store(StoreAcademicSessionRequest $request)
    {
        $academicSession = AcademicSession::create($request->all());

        return redirect()->route('frontend.academic-sessions.index');
    }

    public function edit(AcademicSession $academicSession)
    {
        abort_if(Gate::denies('academic_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.academicSessions.edit', compact('academicSession'));
    }

    public function update(UpdateAcademicSessionRequest $request, AcademicSession $academicSession)
    {
        $academicSession->update($request->all());

        return redirect()->route('frontend.academic-sessions.index');
    }

    public function show(AcademicSession $academicSession)
    {
        abort_if(Gate::denies('academic_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.academicSessions.show', compact('academicSession'));
    }

    public function destroy(AcademicSession $academicSession)
    {
        abort_if(Gate::denies('academic_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicSession->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcademicSessionRequest $request)
    {
        AcademicSession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
