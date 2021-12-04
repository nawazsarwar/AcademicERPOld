<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyQualificationRequest;
use App\Http\Requests\StoreQualificationRequest;
use App\Http\Requests\UpdateQualificationRequest;
use App\Models\Board;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QualificationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Qualification::with(['user', 'qualification_level', 'board'])->select(sprintf('%s.*', (new Qualification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qualification_show';
                $editGate = 'qualification_edit';
                $deleteGate = 'qualification_delete';
                $crudRoutePart = 'qualifications';

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

            $table->addColumn('qualification_level_name', function ($row) {
                return $row->qualification_level ? $row->qualification_level->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->editColumn('roll_no', function ($row) {
                return $row->roll_no ? $row->roll_no : '';
            });
            $table->addColumn('board_name', function ($row) {
                return $row->board ? $row->board->name : '';
            });

            $table->editColumn('result', function ($row) {
                return $row->result ? $row->result : '';
            });
            $table->editColumn('percentage', function ($row) {
                return $row->percentage ? $row->percentage : '';
            });
            $table->editColumn('cdn_url', function ($row) {
                return $row->cdn_url ? $row->cdn_url : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'qualification_level', 'board']);

            return $table->make(true);
        }

        return view('admin.qualifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qualification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.qualifications.create', compact('users', 'qualification_levels', 'boards'));
    }

    public function store(StoreQualificationRequest $request)
    {
        $qualification = Qualification::create($request->all());

        return redirect()->route('admin.qualifications.index');
    }

    public function edit(Qualification $qualification)
    {
        abort_if(Gate::denies('qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification->load('user', 'qualification_level', 'board');

        return view('admin.qualifications.edit', compact('users', 'qualification_levels', 'boards', 'qualification'));
    }

    public function update(UpdateQualificationRequest $request, Qualification $qualification)
    {
        $qualification->update($request->all());

        return redirect()->route('admin.qualifications.index');
    }

    public function show(Qualification $qualification)
    {
        abort_if(Gate::denies('qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualification->load('user', 'qualification_level', 'board');

        return view('admin.qualifications.show', compact('qualification'));
    }

    public function destroy(Qualification $qualification)
    {
        abort_if(Gate::denies('qualification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualification->delete();

        return back();
    }

    public function massDestroy(MassDestroyQualificationRequest $request)
    {
        Qualification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
