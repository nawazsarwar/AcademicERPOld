<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNotificableRequest;
use App\Http\Requests\StoreNotificableRequest;
use App\Http\Requests\UpdateNotificableRequest;
use App\Models\Notificable;
use App\Models\Notification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notificable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificables = Notificable::with(['notification'])->get();

        return view('admin.notificables.index', compact('notificables'));
    }

    public function create()
    {
        abort_if(Gate::denies('notificable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::pluck('mode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notificables.create', compact('notifications'));
    }

    public function store(StoreNotificableRequest $request)
    {
        $notificable = Notificable::create($request->all());

        return redirect()->route('admin.notificables.index');
    }

    public function edit(Notificable $notificable)
    {
        abort_if(Gate::denies('notificable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::pluck('mode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notificable->load('notification');

        return view('admin.notificables.edit', compact('notificable', 'notifications'));
    }

    public function update(UpdateNotificableRequest $request, Notificable $notificable)
    {
        $notificable->update($request->all());

        return redirect()->route('admin.notificables.index');
    }

    public function show(Notificable $notificable)
    {
        abort_if(Gate::denies('notificable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificable->load('notification');

        return view('admin.notificables.show', compact('notificable'));
    }

    public function destroy(Notificable $notificable)
    {
        abort_if(Gate::denies('notificable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notificable->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotificableRequest $request)
    {
        Notificable::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
