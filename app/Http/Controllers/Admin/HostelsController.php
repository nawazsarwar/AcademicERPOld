<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHostelRequest;
use App\Http\Requests\StoreHostelRequest;
use App\Http\Requests\UpdateHostelRequest;
use App\Models\Hall;
use App\Models\Hostel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HostelsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hostel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hostel::with(['hall'])->select(sprintf('%s.*', (new Hostel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hostel_show';
                $editGate = 'hostel_edit';
                $deleteGate = 'hostel_delete';
                $crudRoutePart = 'hostels';

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
            $table->addColumn('hall_code', function ($row) {
                return $row->hall ? $row->hall->code : '';
            });

            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('residential_status', function ($row) {
                return $row->residential_status ? $row->residential_status : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hall']);

            return $table->make(true);
        }

        return view('admin.hostels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hostel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hostels.create', compact('halls'));
    }

    public function store(StoreHostelRequest $request)
    {
        $hostel = Hostel::create($request->all());

        return redirect()->route('admin.hostels.index');
    }

    public function edit(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostel->load('hall');

        return view('admin.hostels.edit', compact('halls', 'hostel'));
    }

    public function update(UpdateHostelRequest $request, Hostel $hostel)
    {
        $hostel->update($request->all());

        return redirect()->route('admin.hostels.index');
    }

    public function show(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostel->load('hall');

        return view('admin.hostels.show', compact('hostel'));
    }

    public function destroy(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostel->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostelRequest $request)
    {
        Hostel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
