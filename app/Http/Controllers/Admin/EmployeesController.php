<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\Person;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployeesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employee::with(['employment_status', 'person'])->select(sprintf('%s.*', (new Employee())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'employee_show';
                $editGate = 'employee_edit';
                $deleteGate = 'employee_delete';
                $crudRoutePart = 'employees';

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
            $table->editColumn('employee_no', function ($row) {
                return $row->employee_no ? $row->employee_no : '';
            });
            $table->editColumn('service_book_no', function ($row) {
                return $row->service_book_no ? $row->service_book_no : '';
            });
            $table->editColumn('application_no', function ($row) {
                return $row->application_no ? $row->application_no : '';
            });
            $table->editColumn('highest_qualification', function ($row) {
                return $row->highest_qualification ? $row->highest_qualification : '';
            });
            $table->addColumn('employment_status_title', function ($row) {
                return $row->employment_status ? $row->employment_status->title : '';
            });

            $table->editColumn('group', function ($row) {
                return $row->group ? Employee::GROUP_SELECT[$row->group] : '';
            });
            $table->editColumn('retirement_scheme', function ($row) {
                return $row->retirement_scheme ? Employee::RETIREMENT_SCHEME_SELECT[$row->retirement_scheme] : '';
            });
            $table->editColumn('employment_type', function ($row) {
                return $row->employment_type ? Employee::EMPLOYMENT_TYPE_SELECT[$row->employment_type] : '';
            });
            $table->editColumn('leave_account_no', function ($row) {
                return $row->leave_account_no ? $row->leave_account_no : '';
            });
            $table->editColumn('pf_account_no', function ($row) {
                return $row->pf_account_no ? $row->pf_account_no : '';
            });
            $table->editColumn('personal_file_no', function ($row) {
                return $row->personal_file_no ? $row->personal_file_no : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->addColumn('person_first_name', function ($row) {
                return $row->person ? $row->person->first_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'employment_status', 'person']);

            return $table->make(true);
        }

        return view('admin.employees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employment_statuses = EmploymentStatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employees.create', compact('employment_statuses', 'people'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        return redirect()->route('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employment_statuses = EmploymentStatus::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employee->load('employment_status', 'person');

        return view('admin.employees.edit', compact('employee', 'employment_statuses', 'people'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('admin.employees.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('employment_status', 'person');

        return view('admin.employees.show', compact('employee'));
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
