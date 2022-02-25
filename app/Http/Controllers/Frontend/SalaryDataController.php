<?php

namespace App\Http\Controllers\Frontend;

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

class SalaryDataController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('salary_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryDatas = SalaryData::with(['user'])->get();

        return view('frontend.salaryDatas.index', compact('salaryDatas'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.salaryDatas.create', compact('users'));
    }

    public function store(StoreSalaryDataRequest $request)
    {
        $salaryData = SalaryData::create($request->all());

        return redirect()->route('frontend.salary-datas.index');
    }

    public function edit(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaryData->load('user');

        return view('frontend.salaryDatas.edit', compact('salaryData', 'users'));
    }

    public function update(UpdateSalaryDataRequest $request, SalaryData $salaryData)
    {
        $salaryData->update($request->all());

        return redirect()->route('frontend.salary-datas.index');
    }

    public function show(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryData->load('user');

        return view('frontend.salaryDatas.show', compact('salaryData'));
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
