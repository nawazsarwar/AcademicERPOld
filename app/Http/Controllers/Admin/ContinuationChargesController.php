<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class ContinuationChargesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('continuation_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContinuationCharge::with(['course'])->select(sprintf('%s.*', (new ContinuationCharge())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'continuation_charge_show';
                $editGate = 'continuation_charge_edit';
                $deleteGate = 'continuation_charge_delete';
                $crudRoutePart = 'continuation-charges';

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
            $table->addColumn('course_title', function ($row) {
                return $row->course ? $row->course->title : '';
            });

            $table->editColumn('course.code', function ($row) {
                return $row->course ? (is_string($row->course) ? $row->course : $row->course->code) : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('nr_total', function ($row) {
                return $row->nr_total ? $row->nr_total : '';
            });
            $table->editColumn('nr_first_installment', function ($row) {
                return $row->nr_first_installment ? $row->nr_first_installment : '';
            });
            $table->editColumn('nr_second_installment', function ($row) {
                return $row->nr_second_installment ? $row->nr_second_installment : '';
            });
            $table->editColumn('resident_total', function ($row) {
                return $row->resident_total ? $row->resident_total : '';
            });
            $table->editColumn('resident_first_installment', function ($row) {
                return $row->resident_first_installment ? $row->resident_first_installment : '';
            });
            $table->editColumn('resident_second_installment', function ($row) {
                return $row->resident_second_installment ? $row->resident_second_installment : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course']);

            return $table->make(true);
        }

        return view('admin.continuationCharges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('continuation_charge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.continuationCharges.create', compact('courses'));
    }

    public function store(StoreContinuationChargeRequest $request)
    {
        $continuationCharge = ContinuationCharge::create($request->all());

        return redirect()->route('admin.continuation-charges.index');
    }

    public function edit(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $continuationCharge->load('course');

        return view('admin.continuationCharges.edit', compact('continuationCharge', 'courses'));
    }

    public function update(UpdateContinuationChargeRequest $request, ContinuationCharge $continuationCharge)
    {
        $continuationCharge->update($request->all());

        return redirect()->route('admin.continuation-charges.index');
    }

    public function show(ContinuationCharge $continuationCharge)
    {
        abort_if(Gate::denies('continuation_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $continuationCharge->load('course');

        return view('admin.continuationCharges.show', compact('continuationCharge'));
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
