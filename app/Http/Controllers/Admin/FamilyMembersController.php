<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class FamilyMembersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('family_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FamilyMember::with(['employee'])->select(sprintf('%s.*', (new FamilyMember())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'family_member_show';
                $editGate = 'family_member_edit';
                $deleteGate = 'family_member_delete';
                $crudRoutePart = 'family-members';

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
            $table->addColumn('employee_employee_no', function ($row) {
                return $row->employee ? $row->employee->employee_no : '';
            });

            $table->editColumn('submission_date', function ($row) {
                return $row->submission_date ? $row->submission_date : '';
            });
            $table->editColumn('family_member_name', function ($row) {
                return $row->family_member_name ? $row->family_member_name : '';
            });

            $table->editColumn('relationship', function ($row) {
                return $row->relationship ? $row->relationship : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? FamilyMember::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? $row->marital_status : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'employee']);

            return $table->make(true);
        }

        return view('admin.familyMembers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('family_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.familyMembers.create', compact('employees'));
    }

    public function store(StoreFamilyMemberRequest $request)
    {
        $familyMember = FamilyMember::create($request->all());

        return redirect()->route('admin.family-members.index');
    }

    public function edit(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $familyMember->load('employee');

        return view('admin.familyMembers.edit', compact('employees', 'familyMember'));
    }

    public function update(UpdateFamilyMemberRequest $request, FamilyMember $familyMember)
    {
        $familyMember->update($request->all());

        return redirect()->route('admin.family-members.index');
    }

    public function show(FamilyMember $familyMember)
    {
        abort_if(Gate::denies('family_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $familyMember->load('employee');

        return view('admin.familyMembers.show', compact('familyMember'));
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
