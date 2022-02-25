<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVerificationStatusRequest;
use App\Http\Requests\StoreVerificationStatusRequest;
use App\Http\Requests\UpdateVerificationStatusRequest;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificationStatusesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('verification_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verificationStatuses = VerificationStatus::all();

        return view('admin.verificationStatuses.index', compact('verificationStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('verification_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verificationStatuses.create');
    }

    public function store(StoreVerificationStatusRequest $request)
    {
        $verificationStatus = VerificationStatus::create($request->all());

        return redirect()->route('admin.verification-statuses.index');
    }

    public function edit(VerificationStatus $verificationStatus)
    {
        abort_if(Gate::denies('verification_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verificationStatuses.edit', compact('verificationStatus'));
    }

    public function update(UpdateVerificationStatusRequest $request, VerificationStatus $verificationStatus)
    {
        $verificationStatus->update($request->all());

        return redirect()->route('admin.verification-statuses.index');
    }

    public function show(VerificationStatus $verificationStatus)
    {
        abort_if(Gate::denies('verification_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verificationStatuses.show', compact('verificationStatus'));
    }

    public function destroy(VerificationStatus $verificationStatus)
    {
        abort_if(Gate::denies('verification_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verificationStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerificationStatusRequest $request)
    {
        VerificationStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
