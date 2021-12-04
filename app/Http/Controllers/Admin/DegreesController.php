<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDegreeRequest;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Models\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DegreesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Degree::query()->select(sprintf('%s.*', (new Degree())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'degree_show';
                $editGate = 'degree_edit';
                $deleteGate = 'degree_delete';
                $crudRoutePart = 'degrees';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.degrees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('degree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.degrees.create');
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());

        return redirect()->route('admin.degrees.index');
    }

    public function edit(Degree $degree)
    {
        abort_if(Gate::denies('degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.degrees.edit', compact('degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());

        return redirect()->route('admin.degrees.index');
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('degree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.degrees.show', compact('degree'));
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

        return back();
    }

    public function massDestroy(MassDestroyDegreeRequest $request)
    {
        Degree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
