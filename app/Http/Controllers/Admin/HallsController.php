<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHallRequest;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Campus;
use App\Models\Hall;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HallsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hall::with(['campus'])->select(sprintf('%s.*', (new Hall())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hall_show';
                $editGate = 'hall_edit';
                $deleteGate = 'hall_delete';
                $crudRoutePart = 'halls';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Hall::GENDER_SELECT[$row->gender] : '';
            });
            $table->addColumn('campus_name', function ($row) {
                return $row->campus ? $row->campus->name : '';
            });

            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'campus']);

            return $table->make(true);
        }

        return view('admin.halls.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hall_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.halls.create', compact('campuses'));
    }

    public function store(StoreHallRequest $request)
    {
        $hall = Hall::create($request->all());

        return redirect()->route('admin.halls.index');
    }

    public function edit(Hall $hall)
    {
        abort_if(Gate::denies('hall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hall->load('campus');

        return view('admin.halls.edit', compact('campuses', 'hall'));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->all());

        return redirect()->route('admin.halls.index');
    }

    public function show(Hall $hall)
    {
        abort_if(Gate::denies('hall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hall->load('campus', 'hallHostels');

        return view('admin.halls.show', compact('hall'));
    }

    public function destroy(Hall $hall)
    {
        abort_if(Gate::denies('hall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hall->delete();

        return back();
    }

    public function massDestroy(MassDestroyHallRequest $request)
    {
        Hall::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
