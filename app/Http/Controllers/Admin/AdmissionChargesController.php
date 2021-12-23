<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAdmissionChargeRequest;
use App\Http\Requests\StoreAdmissionChargeRequest;
use App\Http\Requests\UpdateAdmissionChargeRequest;
use App\Models\AdmissionCharge;
use App\Models\Course;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdmissionChargesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('admission_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AdmissionCharge::with(['course'])->select(sprintf('%s.*', (new AdmissionCharge())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'admission_charge_show';
                $editGate = 'admission_charge_edit';
                $deleteGate = 'admission_charge_delete';
                $crudRoutePart = 'admission-charges';

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
            $table->addColumn('course_name', function ($row) {
                return $row->course ? $row->course->name : '';
            });

            $table->editColumn('course.code', function ($row) {
                return $row->course ? (is_string($row->course) ? $row->course : $row->course->code) : '';
            });
            $table->editColumn('boys_nr_external', function ($row) {
                return $row->boys_nr_external ? $row->boys_nr_external : '';
            });
            $table->editColumn('boys_nr_internal', function ($row) {
                return $row->boys_nr_internal ? $row->boys_nr_internal : '';
            });
            $table->editColumn('boys_resident_external', function ($row) {
                return $row->boys_resident_external ? $row->boys_resident_external : '';
            });
            $table->editColumn('boys_resident_internal', function ($row) {
                return $row->boys_resident_internal ? $row->boys_resident_internal : '';
            });
            $table->editColumn('girls_nr_external', function ($row) {
                return $row->girls_nr_external ? $row->girls_nr_external : '';
            });
            $table->editColumn('girls_nr_internal', function ($row) {
                return $row->girls_nr_internal ? $row->girls_nr_internal : '';
            });
            $table->editColumn('girls_resident_external', function ($row) {
                return $row->girls_resident_external ? $row->girls_resident_external : '';
            });
            $table->editColumn('girls_resident_internal', function ($row) {
                return $row->girls_resident_internal ? $row->girls_resident_internal : '';
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

        return view('admin.admissionCharges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('admission_charge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.admissionCharges.create', compact('courses'));
    }

    public function store(StoreAdmissionChargeRequest $request)
    {
        $admissionCharge = AdmissionCharge::create($request->all());

        return redirect()->route('admin.admission-charges.index');
    }

    public function edit(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admissionCharge->load('course');

        return view('admin.admissionCharges.edit', compact('admissionCharge', 'courses'));
    }

    public function update(UpdateAdmissionChargeRequest $request, AdmissionCharge $admissionCharge)
    {
        $admissionCharge->update($request->all());

        return redirect()->route('admin.admission-charges.index');
    }

    public function show(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharge->load('course');

        return view('admin.admissionCharges.show', compact('admissionCharge'));
    }

    public function destroy(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharge->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdmissionChargeRequest $request)
    {
        AdmissionCharge::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
