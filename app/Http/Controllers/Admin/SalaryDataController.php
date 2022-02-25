<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalaryDataRequest;
use App\Http\Requests\StoreSalaryDataRequest;
use App\Http\Requests\UpdateSalaryDataRequest;
use App\Models\SalaryData;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalaryDataController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('salary_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalaryData::with(['user'])->select(sprintf('%s.*', (new SalaryData())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'salary_data_show';
                $editGate = 'salary_data_edit';
                $deleteGate = 'salary_data_delete';
                $crudRoutePart = 'salary-datas';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('ecode', function ($row) {
                return $row->ecode ? $row->ecode : '';
            });
            $table->editColumn('emp_name', function ($row) {
                return $row->emp_name ? $row->emp_name : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('middle_name', function ($row) {
                return $row->middle_name ? $row->middle_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('pay_grade', function ($row) {
                return $row->pay_grade ? $row->pay_grade : '';
            });
            $table->editColumn('basic', function ($row) {
                return $row->basic ? $row->basic : '';
            });
            $table->editColumn('pan_no', function ($row) {
                return $row->pan_no ? $row->pan_no : '';
            });
            $table->editColumn('desig_name', function ($row) {
                return $row->desig_name ? $row->desig_name : '';
            });
            $table->editColumn('dept_name', function ($row) {
                return $row->dept_name ? $row->dept_name : '';
            });
            $table->editColumn('emp_status', function ($row) {
                return $row->emp_status ? $row->emp_status : '';
            });
            $table->editColumn('date_of_join', function ($row) {
                return $row->date_of_join ? $row->date_of_join : '';
            });
            $table->editColumn('sex', function ($row) {
                return $row->sex ? $row->sex : '';
            });
            $table->editColumn('date_of_birth', function ($row) {
                return $row->date_of_birth ? $row->date_of_birth : '';
            });
            $table->editColumn('retire_date', function ($row) {
                return $row->retire_date ? $row->retire_date : '';
            });
            $table->editColumn('pf_type', function ($row) {
                return $row->pf_type ? $row->pf_type : '';
            });
            $table->editColumn('emp_grop', function ($row) {
                return $row->emp_grop ? $row->emp_grop : '';
            });
            $table->editColumn('leave', function ($row) {
                return $row->leave ? $row->leave : '';
            });
            $table->editColumn('designation_category', function ($row) {
                return $row->designation_category ? $row->designation_category : '';
            });
            $table->editColumn('exists_cc', function ($row) {
                return $row->exists_cc ? $row->exists_cc : '';
            });

            $table->editColumn('salary_month', function ($row) {
                return $row->salary_month ? $row->salary_month : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.salaryDatas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('salary_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salaryDatas.create', compact('users'));
    }

    public function store(StoreSalaryDataRequest $request)
    {
        $salaryData = SalaryData::create($request->all());

        return redirect()->route('admin.salary-datas.index');
    }

    public function edit(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaryData->load('user');

        return view('admin.salaryDatas.edit', compact('salaryData', 'users'));
    }

    public function update(UpdateSalaryDataRequest $request, SalaryData $salaryData)
    {
        $salaryData->update($request->all());

        return redirect()->route('admin.salary-datas.index');
    }

    public function show(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryData->load('user');

        return view('admin.salaryDatas.show', compact('salaryData'));
    }

    public function destroy(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryData->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryDataRequest $request)
    {
        SalaryData::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
