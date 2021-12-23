<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAcademicQualificationRequest;
use App\Http\Requests\StoreAcademicQualificationRequest;
use App\Http\Requests\UpdateAcademicQualificationRequest;
use App\Models\AcademicQualification;
use App\Models\Board;
use App\Models\QualificationLevel;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcademicQualificationsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('academic_qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AcademicQualification::with(['user', 'qualification_level', 'board'])->select(sprintf('%s.*', (new AcademicQualification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'academic_qualification_show';
                $editGate = 'academic_qualification_edit';
                $deleteGate = 'academic_qualification_delete';
                $crudRoutePart = 'academic-qualifications';

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
                return $row->result ? AcademicQualification::RESULT_SELECT[$row->result] : '';
            });
            $table->editColumn('grading_type', function ($row) {
                return $row->grading_type ? AcademicQualification::GRADING_TYPE_SELECT[$row->grading_type] : '';
            });
            $table->editColumn('grade', function ($row) {
                return $row->grade ? $row->grade : '';
            });
            $table->editColumn('certificate', function ($row) {
                return $row->certificate ? '<a href="' . $row->certificate->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
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

            $table->rawColumns(['actions', 'placeholder', 'user', 'qualification_level', 'board', 'certificate']);

            return $table->make(true);
        }

        return view('admin.academicQualifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('academic_qualification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.academicQualifications.create', compact('boards', 'qualification_levels', 'users'));
    }

    public function store(StoreAcademicQualificationRequest $request)
    {
        $academicQualification = AcademicQualification::create($request->all());

        if ($request->input('certificate', false)) {
            $academicQualification->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $academicQualification->id]);
        }

        return redirect()->route('admin.academic-qualifications.index');
    }

    public function edit(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academicQualification->load('user', 'qualification_level', 'board');

        return view('admin.academicQualifications.edit', compact('academicQualification', 'boards', 'qualification_levels', 'users'));
    }

    public function update(UpdateAcademicQualificationRequest $request, AcademicQualification $academicQualification)
    {
        $academicQualification->update($request->all());

        if ($request->input('certificate', false)) {
            if (!$academicQualification->certificate || $request->input('certificate') !== $academicQualification->certificate->file_name) {
                if ($academicQualification->certificate) {
                    $academicQualification->certificate->delete();
                }
                $academicQualification->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
            }
        } elseif ($academicQualification->certificate) {
            $academicQualification->certificate->delete();
        }

        return redirect()->route('admin.academic-qualifications.index');
    }

    public function show(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicQualification->load('user', 'qualification_level', 'board');

        return view('admin.academicQualifications.show', compact('academicQualification'));
    }

    public function destroy(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicQualification->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcademicQualificationRequest $request)
    {
        AcademicQualification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('academic_qualification_create') && Gate::denies('academic_qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AcademicQualification();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
