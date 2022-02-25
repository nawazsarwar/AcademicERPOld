<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryDataRequest;
use App\Http\Requests\UpdateSalaryDataRequest;
use App\Http\Resources\Admin\SalaryDataResource;
use App\Models\SalaryData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryDataResource(SalaryData::with(['user'])->get());
    }

    public function store(StoreSalaryDataRequest $request)
    {
        $salaryData = SalaryData::create($request->all());

        return (new SalaryDataResource($salaryData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalaryDataResource($salaryData->load(['user']));
    }

    public function update(UpdateSalaryDataRequest $request, SalaryData $salaryData)
    {
        $salaryData->update($request->all());

        return (new SalaryDataResource($salaryData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SalaryData $salaryData)
    {
        abort_if(Gate::denies('salary_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaryData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
