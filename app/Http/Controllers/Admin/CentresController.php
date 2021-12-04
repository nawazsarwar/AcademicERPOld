<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCentreRequest;
use App\Http\Requests\StoreCentreRequest;
use App\Http\Requests\UpdateCentreRequest;
use App\Models\Centre;
use App\Models\Faculty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CentresController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('centre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Centre::with(['faculty'])->select(sprintf('%s.*', (new Centre())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'centre_show';
                $editGate = 'centre_edit';
                $deleteGate = 'centre_delete';
                $crudRoutePart = 'centres';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->addColumn('faculty_name', function ($row) {
                return $row->faculty ? $row->faculty->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'faculty']);

            return $table->make(true);
        }

        return view('admin.centres.index');
    }

    public function create()
    {
        abort_if(Gate::denies('centre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.centres.create', compact('faculties'));
    }

    public function store(StoreCentreRequest $request)
    {
        $centre = Centre::create($request->all());

        return redirect()->route('admin.centres.index');
    }

    public function edit(Centre $centre)
    {
        abort_if(Gate::denies('centre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->load('faculty');

        return view('admin.centres.edit', compact('centre'));
    }

    public function update(UpdateCentreRequest $request, Centre $centre)
    {
        $centre->update($request->all());

        return redirect()->route('admin.centres.index');
    }

    public function show(Centre $centre)
    {
        abort_if(Gate::denies('centre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->load('faculty');

        return view('admin.centres.show', compact('centre'));
    }

    public function destroy(Centre $centre)
    {
        abort_if(Gate::denies('centre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->delete();

        return back();
    }

    public function massDestroy(MassDestroyCentreRequest $request)
    {
        Centre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
