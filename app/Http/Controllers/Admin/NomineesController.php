<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNomineeRequest;
use App\Http\Requests\StoreNomineeRequest;
use App\Http\Requests\UpdateNomineeRequest;
use App\Models\Employee;
use App\Models\Nominee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NomineesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('nominee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Nominee::with(['employee'])->select(sprintf('%s.*', (new Nominee())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'nominee_show';
                $editGate = 'nominee_edit';
                $deleteGate = 'nominee_delete';
                $crudRoutePart = 'nominees';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('relationship_employee', function ($row) {
                return $row->relationship_employee ? $row->relationship_employee : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->editColumn('witness_name_1', function ($row) {
                return $row->witness_name_1 ? $row->witness_name_1 : '';
            });
            $table->editColumn('designation_witness_1', function ($row) {
                return $row->designation_witness_1 ? $row->designation_witness_1 : '';
            });
            $table->editColumn('department_witness_1', function ($row) {
                return $row->department_witness_1 ? $row->department_witness_1 : '';
            });
            $table->editColumn('witness_name_2', function ($row) {
                return $row->witness_name_2 ? $row->witness_name_2 : '';
            });
            $table->editColumn('designation_witness_2', function ($row) {
                return $row->designation_witness_2 ? $row->designation_witness_2 : '';
            });
            $table->editColumn('department_witness_2', function ($row) {
                return $row->department_witness_2 ? $row->department_witness_2 : '';
            });
            $table->addColumn('employee_employee_no', function ($row) {
                return $row->employee ? $row->employee->employee_no : '';
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

        return view('admin.nominees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('nominee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nominees.create', compact('employees'));
    }

    public function store(StoreNomineeRequest $request)
    {
        $nominee = Nominee::create($request->all());

        return redirect()->route('admin.nominees.index');
    }

    public function edit(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nominee->load('employee');

        return view('admin.nominees.edit', compact('employees', 'nominee'));
    }

    public function update(UpdateNomineeRequest $request, Nominee $nominee)
    {
        $nominee->update($request->all());

        return redirect()->route('admin.nominees.index');
    }

    public function show(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominee->load('employee');

        return view('admin.nominees.show', compact('nominee'));
    }

    public function destroy(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominee->delete();

        return back();
    }

    public function massDestroy(MassDestroyNomineeRequest $request)
    {
        Nominee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
