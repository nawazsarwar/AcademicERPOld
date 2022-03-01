<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequestRequest;
use App\Http\Requests\StoreUserRequestRequest;
use App\Http\Requests\UpdateUserRequestRequest;
use App\Models\User;
use App\Models\UserRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRequestsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRequests = UserRequest::with(['user'])->get();

        return view('frontend.userRequests.index', compact('userRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userRequests.create', compact('users'));
    }

    public function store(StoreUserRequestRequest $request)
    {
        $userRequest = UserRequest::create($request->all());

        return redirect()->route('frontend.user-requests.index');
    }

    public function edit(UserRequest $userRequest)
    {
        abort_if(Gate::denies('user_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userRequest->load('user');

        return view('frontend.userRequests.edit', compact('userRequest', 'users'));
    }

    public function update(UpdateUserRequestRequest $request, UserRequest $userRequest)
    {
        $userRequest->update($request->all());

        return redirect()->route('frontend.user-requests.index');
    }

    public function show(UserRequest $userRequest)
    {
        abort_if(Gate::denies('user_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRequest->load('user');

        return view('frontend.userRequests.show', compact('userRequest'));
    }

    public function destroy(UserRequest $userRequest)
    {
        abort_if(Gate::denies('user_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequestRequest $request)
    {
        UserRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
