<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEnrolmentRequest;
use App\Http\Requests\StoreEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;
use App\Models\Enrolment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EnrolmentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('enrolment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Enrolment::query()->select(sprintf('%s.*', (new Enrolment())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'enrolment_show';
                $editGate = 'enrolment_edit';
                $deleteGate = 'enrolment_delete';
                $crudRoutePart = 'enrolments';

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
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.enrolments.index');
    }

    public function create()
    {
        abort_if(Gate::denies('enrolment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrolments.create');
    }

    public function store(StoreEnrolmentRequest $request)
    {
        $enrolment = Enrolment::create($request->all());

        return redirect()->route('admin.enrolments.index');
    }

    public function edit(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrolments.edit', compact('enrolment'));
    }

    public function update(UpdateEnrolmentRequest $request, Enrolment $enrolment)
    {
        $enrolment->update($request->all());

        return redirect()->route('admin.enrolments.index');
    }

    public function show(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.enrolments.show', compact('enrolment'));
    }

    public function destroy(Enrolment $enrolment)
    {
        abort_if(Gate::denies('enrolment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrolment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnrolmentRequest $request)
    {
        Enrolment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
