<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilyMemberRequest;
use App\Http\Requests\UpdateFamilyMemberRequest;
use App\Http\Resources\Admin\FamilyMemberResource;
use App\Models\FamilyMember;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FamilyMembersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('family_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FamilyMemberResource(FamilyMember::with(['employee'])->get());
    }

    public function store(StoreFamilyMemberRequest $request)
    {
        $familyMember = FamilyMember::create($request->all());

        return (new FamilyMemberResource($familyMember))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FamilyMemberResource($familyMember->load(['employee']));
    }

    public function update(UpdateFamilyMemberRequest $request, FamilyMember $familyMember)
    {
        $familyMember->update($request->all());

        return (new FamilyMemberResource($familyMember))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familyMember->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
