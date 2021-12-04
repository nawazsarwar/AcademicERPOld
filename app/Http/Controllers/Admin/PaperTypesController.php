<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPaperTypeRequest;
use App\Http\Requests\StorePaperTypeRequest;
use App\Http\Requests\UpdatePaperTypeRequest;
use App\Models\PaperType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaperTypesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('paper_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PaperType::query()->select(sprintf('%s.*', (new PaperType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'paper_type_show';
                $editGate = 'paper_type_edit';
                $deleteGate = 'paper_type_delete';
                $crudRoutePart = 'paper-types';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
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

        return view('admin.paperTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('paper_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paperTypes.create');
    }

    public function store(StorePaperTypeRequest $request)
    {
        $paperType = PaperType::create($request->all());

        return redirect()->route('admin.paper-types.index');
    }

    public function edit(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paperTypes.edit', compact('paperType'));
    }

    public function update(UpdatePaperTypeRequest $request, PaperType $paperType)
    {
        $paperType->update($request->all());

        return redirect()->route('admin.paper-types.index');
    }

    public function show(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperType->load('paperTypePapers');

        return view('admin.paperTypes.show', compact('paperType'));
    }

    public function destroy(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaperTypeRequest $request)
    {
        PaperType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
