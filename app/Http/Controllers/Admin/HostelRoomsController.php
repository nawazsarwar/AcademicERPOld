<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHostelRoomRequest;
use App\Http\Requests\StoreHostelRoomRequest;
use App\Http\Requests\UpdateHostelRoomRequest;
use App\Models\Hostel;
use App\Models\HostelRoom;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HostelRoomsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('hostel_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HostelRoom::with(['hostel'])->select(sprintf('%s.*', (new HostelRoom())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hostel_room_show';
                $editGate = 'hostel_room_edit';
                $deleteGate = 'hostel_room_delete';
                $crudRoutePart = 'hostel-rooms';

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
            $table->addColumn('hostel_code', function ($row) {
                return $row->hostel ? $row->hostel->code : '';
            });

            $table->editColumn('hostel.name', function ($row) {
                return $row->hostel ? (is_string($row->hostel) ? $row->hostel : $row->hostel->name) : '';
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('vacancy', function ($row) {
                return $row->vacancy ? $row->vacancy : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'hostel']);

            return $table->make(true);
        }

        return view('admin.hostelRooms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hostel_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hostelRooms.create', compact('hostels'));
    }

    public function store(StoreHostelRoomRequest $request)
    {
        $hostelRoom = HostelRoom::create($request->all());

        return redirect()->route('admin.hostel-rooms.index');
    }

    public function edit(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostelRoom->load('hostel');

        return view('admin.hostelRooms.edit', compact('hostelRoom', 'hostels'));
    }

    public function update(UpdateHostelRoomRequest $request, HostelRoom $hostelRoom)
    {
        $hostelRoom->update($request->all());

        return redirect()->route('admin.hostel-rooms.index');
    }

    public function show(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostelRoom->load('hostel');

        return view('admin.hostelRooms.show', compact('hostelRoom'));
    }

    public function destroy(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostelRoom->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostelRoomRequest $request)
    {
        HostelRoom::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
