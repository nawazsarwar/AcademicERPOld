<?php

namespace App\Http\Controllers\Frontend;

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

class HostelRoomsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('hostel_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostelRooms = HostelRoom::with(['hostel'])->get();

        return view('frontend.hostelRooms.index', compact('hostelRooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('hostel_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.hostelRooms.create', compact('hostels'));
    }

    public function store(StoreHostelRoomRequest $request)
    {
        $hostelRoom = HostelRoom::create($request->all());

        return redirect()->route('frontend.hostel-rooms.index');
    }

    public function edit(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostels = Hostel::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostelRoom->load('hostel');

        return view('frontend.hostelRooms.edit', compact('hostelRoom', 'hostels'));
    }

    public function update(UpdateHostelRoomRequest $request, HostelRoom $hostelRoom)
    {
        $hostelRoom->update($request->all());

        return redirect()->route('frontend.hostel-rooms.index');
    }

    public function show(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostelRoom->load('hostel');

        return view('frontend.hostelRooms.show', compact('hostelRoom'));
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
