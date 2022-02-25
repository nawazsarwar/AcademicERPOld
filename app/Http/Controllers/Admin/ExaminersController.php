<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyExaminerRequest;
use App\Http\Requests\StoreExaminerRequest;
use App\Http\Requests\UpdateExaminerRequest;
use App\Models\Examiner;
use App\Models\Paper;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ExaminersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('examiner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examiners = Examiner::with(['paper', 'media'])->get();

        return view('admin.examiners.index', compact('examiners'));
    }

    public function create()
    {
        abort_if(Gate::denies('examiner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.examiners.create', compact('papers'));
    }

    public function store(StoreExaminerRequest $request)
    {
        $examiner = Examiner::create($request->all());

        if ($request->input('answerscripts_file', false)) {
            $examiner->addMedia(storage_path('tmp/uploads/' . basename($request->input('answerscripts_file'))))->toMediaCollection('answerscripts_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $examiner->id]);
        }

        return redirect()->route('admin.examiners.index');
    }

    public function edit(Examiner $examiner)
    {
        abort_if(Gate::denies('examiner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $examiner->load('paper');

        return view('admin.examiners.edit', compact('examiner', 'papers'));
    }

    public function update(UpdateExaminerRequest $request, Examiner $examiner)
    {
        $examiner->update($request->all());

        if ($request->input('answerscripts_file', false)) {
            if (!$examiner->answerscripts_file || $request->input('answerscripts_file') !== $examiner->answerscripts_file->file_name) {
                if ($examiner->answerscripts_file) {
                    $examiner->answerscripts_file->delete();
                }
                $examiner->addMedia(storage_path('tmp/uploads/' . basename($request->input('answerscripts_file'))))->toMediaCollection('answerscripts_file');
            }
        } elseif ($examiner->answerscripts_file) {
            $examiner->answerscripts_file->delete();
        }

        return redirect()->route('admin.examiners.index');
    }

    public function show(Examiner $examiner)
    {
        abort_if(Gate::denies('examiner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examiner->load('paper');

        return view('admin.examiners.show', compact('examiner'));
    }

    public function destroy(Examiner $examiner)
    {
        abort_if(Gate::denies('examiner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examiner->delete();

        return back();
    }

    public function massDestroy(MassDestroyExaminerRequest $request)
    {
        Examiner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('examiner_create') && Gate::denies('examiner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Examiner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
