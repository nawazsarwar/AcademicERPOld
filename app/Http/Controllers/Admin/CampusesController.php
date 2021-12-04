<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCampusRequest;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Models\Campus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CampusesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('campus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Campus::query()->select(sprintf('%s.*', (new Campus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'campus_show';
                $editGate = 'campus_edit';
                $deleteGate = 'campus_delete';
                $crudRoutePart = 'campuses';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.campuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.campuses.create');
    }

    public function store(StoreCampusRequest $request)
    {
        $campus = Campus::create($request->all());

        return redirect()->route('admin.campuses.index');
    }

    public function edit(Campus $campus)
    {
        abort_if(Gate::denies('campus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.campuses.edit', compact('campus'));
    }

    public function update(UpdateCampusRequest $request, Campus $campus)
    {
        $campus->update($request->all());

        return redirect()->route('admin.campuses.index');
    }

    public function show(Campus $campus)
    {
        abort_if(Gate::denies('campus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campus->load('campusHalls');

        return view('admin.campuses.show', compact('campus'));
    }

    public function destroy(Campus $campus)
    {
        abort_if(Gate::denies('campus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampusRequest $request)
    {
        Campus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
