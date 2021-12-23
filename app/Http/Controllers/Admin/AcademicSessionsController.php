<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAcademicSessionRequest;
use App\Http\Requests\StoreAcademicSessionRequest;
use App\Http\Requests\UpdateAcademicSessionRequest;
use App\Models\AcademicSession;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcademicSessionsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('academic_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AcademicSession::query()->select(sprintf('%s.*', (new AcademicSession())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'academic_session_show';
                $editGate = 'academic_session_edit';
                $deleteGate = 'academic_session_delete';
                $crudRoutePart = 'academic-sessions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('sequence', function ($row) {
                return $row->sequence ? $row->sequence : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.academicSessions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('academic_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicSessions.create');
    }

    public function store(StoreAcademicSessionRequest $request)
    {
        $academicSession = AcademicSession::create($request->all());

        return redirect()->route('admin.academic-sessions.index');
    }

    public function edit(AcademicSession $academicSession)
    {
        abort_if(Gate::denies('academic_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicSessions.edit', compact('academicSession'));
    }

    public function update(UpdateAcademicSessionRequest $request, AcademicSession $academicSession)
    {
        $academicSession->update($request->all());

        return redirect()->route('admin.academic-sessions.index');
    }

    public function show(AcademicSession $academicSession)
    {
        abort_if(Gate::denies('academic_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academicSessions.show', compact('academicSession'));
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
