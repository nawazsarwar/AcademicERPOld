<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostelRoomRequest;
use App\Http\Requests\UpdateHostelRoomRequest;
use App\Http\Resources\Admin\HostelRoomResource;
use App\Models\HostelRoom;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HostelRoomsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hostel_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HostelRoomResource(HostelRoom::with(['hostel'])->get());
    }

    public function store(StoreHostelRoomRequest $request)
    {
        $hostelRoom = HostelRoom::create($request->all());

        return (new HostelRoomResource($hostelRoom))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HostelRoomResource($hostelRoom->load(['hostel']));
    }

    public function update(UpdateHostelRoomRequest $request, HostelRoom $hostelRoom)
    {
        $hostelRoom->update($request->all());

        return (new HostelRoomResource($hostelRoom))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HostelRoom $hostelRoom)
    {
        abort_if(Gate::denies('hostel_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostelRoom->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
