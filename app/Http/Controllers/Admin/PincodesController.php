<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPincodeRequest;
use App\Http\Requests\StorePincodeRequest;
use App\Http\Requests\UpdatePincodeRequest;
use App\Models\Pincode;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PincodesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pincode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pincode::with(['province'])->select(sprintf('%s.*', (new Pincode())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pincode_show';
                $editGate = 'pincode_edit';
                $deleteGate = 'pincode_delete';
                $crudRoutePart = 'pincodes';

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
            $table->editColumn('locality', function ($row) {
                return $row->locality ? $row->locality : '';
            });
            $table->editColumn('pincode', function ($row) {
                return $row->pincode ? $row->pincode : '';
            });
            $table->editColumn('sub_district', function ($row) {
                return $row->sub_district ? $row->sub_district : '';
            });
            $table->editColumn('district', function ($row) {
                return $row->district ? $row->district : '';
            });
            $table->addColumn('province_name', function ($row) {
                return $row->province ? $row->province->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'province']);

            return $table->make(true);
        }

        return view('admin.pincodes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pincode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pincodes.create', compact('provinces'));
    }

    public function store(StorePincodeRequest $request)
    {
        $pincode = Pincode::create($request->all());

        return redirect()->route('admin.pincodes.index');
    }

    public function edit(Pincode $pincode)
    {
        abort_if(Gate::denies('pincode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pincode->load('province');

        return view('admin.pincodes.edit', compact('provinces', 'pincode'));
    }

    public function update(UpdatePincodeRequest $request, Pincode $pincode)
    {
        $pincode->update($request->all());

        return redirect()->route('admin.pincodes.index');
    }

    public function show(Pincode $pincode)
    {
        abort_if(Gate::denies('pincode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pincode->load('province');

        return view('admin.pincodes.show', compact('pincode'));
    }

    public function destroy(Pincode $pincode)
    {
        abort_if(Gate::denies('pincode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pincode->delete();

        return back();
    }

    public function massDestroy(MassDestroyPincodeRequest $request)
    {
        Pincode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
