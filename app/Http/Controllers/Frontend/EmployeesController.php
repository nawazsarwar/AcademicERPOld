<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\Person;
use App\Models\User;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::with(['person', 'employment_status', 'verification_status', 'verified_by'])->get();

        return view('frontend.employees.index', compact('employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employment_statuses = EmploymentStatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.employees.create', compact('employment_statuses', 'people', 'verification_statuses', 'verified_bies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        return redirect()->route('frontend.employees.index');
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employment_statuses = EmploymentStatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employee->load('person', 'employment_status', 'verification_status', 'verified_by');

        return view('frontend.employees.edit', compact('employee', 'employment_statuses', 'people', 'verification_statuses', 'verified_bies'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('frontend.employees.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('person', 'employment_status', 'verification_status', 'verified_by');

        return view('frontend.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
