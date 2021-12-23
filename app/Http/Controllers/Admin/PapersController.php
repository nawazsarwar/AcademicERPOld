<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPaperRequest;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Models\Department;
use App\Models\Paper;
use App\Models\PaperType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PapersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Paper::with(['paper_type', 'administrable'])->select(sprintf('%s.*', (new Paper())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'paper_show';
                $editGate = 'paper_edit';
                $deleteGate = 'paper_delete';
                $crudRoutePart = 'papers';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('paper_type_name', function ($row) {
                return $row->paper_type ? $row->paper_type->name : '';
            });

            $table->editColumn('paper_type.name', function ($row) {
                return $row->paper_type ? (is_string($row->paper_type) ? $row->paper_type : $row->paper_type->name) : '';
            });
            $table->editColumn('fraction', function ($row) {
                return $row->fraction ? $row->fraction : '';
            });
            $table->editColumn('teaching_status', function ($row) {
                return $row->teaching_status ? Paper::TEACHING_STATUS_SELECT[$row->teaching_status] : '';
            });
            $table->editColumn('credits', function ($row) {
                return $row->credits ? $row->credits : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->addColumn('administrable_name', function ($row) {
                return $row->administrable ? $row->administrable->name : '';
            });

            $table->editColumn('administrable_type', function ($row) {
                return $row->administrable_type ? $row->administrable_type : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'paper_type', 'administrable']);

            return $table->make(true);
        }

        return view('admin.papers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_types = PaperType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.papers.create', compact('administrables', 'paper_types'));
    }

    public function store(StorePaperRequest $request)
    {
        $paper = Paper::create($request->all());

        return redirect()->route('admin.papers.index');
    }

    public function edit(Paper $paper)
    {
        abort_if(Gate::denies('paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_types = PaperType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paper->load('paper_type', 'administrable');

        return view('admin.papers.edit', compact('administrables', 'paper', 'paper_types'));
    }

    public function update(UpdatePaperRequest $request, Paper $paper)
    {
        $paper->update($request->all());

        return redirect()->route('admin.papers.index');
    }

    public function show(Paper $paper)
    {
        abort_if(Gate::denies('paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->load('paper_type', 'administrable');

        return view('admin.papers.show', compact('paper'));
    }

    public function destroy(Paper $paper)
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaperRequest $request)
    {
        Paper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
