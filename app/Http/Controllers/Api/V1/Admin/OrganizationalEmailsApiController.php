<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationalEmailRequest;
use App\Http\Requests\UpdateOrganizationalEmailRequest;
use App\Http\Resources\Admin\OrganizationalEmailResource;
use App\Models\OrganizationalEmail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationalEmailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organizational_email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationalEmailResource(OrganizationalEmail::with(['user'])->get());
    }

    public function store(StoreOrganizationalEmailRequest $request)
    {
        $organizationalEmail = OrganizationalEmail::create($request->all());

        return (new OrganizationalEmailResource($organizationalEmail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationalEmailResource($organizationalEmail->load(['user']));
    }

    public function update(UpdateOrganizationalEmailRequest $request, OrganizationalEmail $organizationalEmail)
    {
        $organizationalEmail->update($request->all());

        return (new OrganizationalEmailResource($organizationalEmail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationalEmail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
