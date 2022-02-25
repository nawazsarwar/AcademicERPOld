<?php

namespace App\Http\Controllers\Frontend;

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

class AcademicQualificationsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('academic_qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicQualifications = AcademicQualification::with(['user', 'qualification_level', 'board', 'media'])->get();

        return view('frontend.academicQualifications.index', compact('academicQualifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_qualification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.academicQualifications.create', compact('boards', 'qualification_levels', 'users'));
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

        return redirect()->route('frontend.academic-qualifications.index');
    }

    public function edit(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualification_levels = QualificationLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academicQualification->load('user', 'qualification_level', 'board');

        return view('frontend.academicQualifications.edit', compact('academicQualification', 'boards', 'qualification_levels', 'users'));
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

        return redirect()->route('frontend.academic-qualifications.index');
    }

    public function show(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicQualification->load('user', 'qualification_level', 'board');

        return view('frontend.academicQualifications.show', compact('academicQualification'));
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
