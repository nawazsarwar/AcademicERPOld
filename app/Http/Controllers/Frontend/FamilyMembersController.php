<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFamilyMemberRequest;
use App\Http\Requests\StoreFamilyMemberRequest;
use App\Http\Requests\UpdateFamilyMemberRequest;
use App\Models\Employee;
use App\Models\FamilyMember;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FamilyMembersController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('family_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familyMembers = FamilyMember::with(['employee'])->get();

        return view('frontend.familyMembers.index', compact('familyMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('family_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.familyMembers.create', compact('employees'));
    }

    public function store(StoreFamilyMemberRequest $request)
    {
        $familyMember = FamilyMember::create($request->all());

        return redirect()->route('frontend.family-members.index');
    }

    public function edit(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $familyMember->load('employee');

        return view('frontend.familyMembers.edit', compact('employees', 'familyMember'));
    }

    public function update(UpdateFamilyMemberRequest $request, FamilyMember $familyMember)
    {
        $familyMember->update($request->all());

        return redirect()->route('frontend.family-members.index');
    }

    public function show(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familyMember->load('employee');

        return view('frontend.familyMembers.show', compact('familyMember'));
    }

    public function destroy(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familyMember->delete();

        return back();
    }

    public function massDestroy(MassDestroyFamilyMemberRequest $request)
    {
        FamilyMember::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
