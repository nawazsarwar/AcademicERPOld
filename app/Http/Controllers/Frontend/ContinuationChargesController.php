<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyContinuationChargeRequest;
use App\Http\Requests\StoreContinuationChargeRequest;
use App\Http\Requests\UpdateContinuationChargeRequest;
use App\Models\ContinuationCharge;
use App\Models\Course;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContinuationChargesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('continuation_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $continuationCharges = ContinuationCharge::with(['course'])->get();

        return view('frontend.continuationCharges.index', compact('continuationCharges'));
    }

    public function create()
    {
        abort_if(Gate::denies('continuation_charge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.continuationCharges.create', compact('courses'));
    }

    public function store(StoreContinuationChargeRequest $request)
    {
        $continuationCharge = ContinuationCharge::create($request->all());

        return redirect()->route('frontend.continuation-charges.index');
    }

    public function edit(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $continuationCharge->load('course');

        return view('frontend.continuationCharges.edit', compact('continuationCharge', 'courses'));
    }

    public function update(UpdateContinuationChargeRequest $request, ContinuationCharge $continuationCharge)
    {
        $continuationCharge->update($request->all());

        return redirect()->route('frontend.continuation-charges.index');
    }

    public function show(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $continuationCharge->load('course');

        return view('frontend.continuationCharges.show', compact('continuationCharge'));
    }

    public function destroy(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $continuationCharge->delete();

        return back();
    }

    public function massDestroy(MassDestroyContinuationChargeRequest $request)
    {
        ContinuationCharge::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
