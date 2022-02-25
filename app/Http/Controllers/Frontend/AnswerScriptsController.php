<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAnswerScriptRequest;
use App\Http\Requests\StoreAnswerScriptRequest;
use App\Http\Requests\UpdateAnswerScriptRequest;
use App\Models\AnswerScript;
use App\Models\Paper;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AnswerScriptsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('answer_script_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answerScripts = AnswerScript::with(['user', 'paper', 'media'])->get();

        return view('frontend.answerScripts.index', compact('answerScripts'));
    }

    public function create()
    {
        abort_if(Gate::denies('answer_script_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.answerScripts.create', compact('papers', 'users'));
    }

    public function store(StoreAnswerScriptRequest $request)
    {
        $answerScript = AnswerScript::create($request->all());

        if ($request->input('photo_path', false)) {
            $answerScript->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_path'))))->toMediaCollection('photo_path');
        }

        if ($request->input('file_name', false)) {
            $answerScript->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_name'))))->toMediaCollection('file_name');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $answerScript->id]);
        }

        return redirect()->route('frontend.answer-scripts.index');
    }

    public function edit(AnswerScript $answerScript)
    {
        abort_if(Gate::denies('answer_script_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $answerScript->load('user', 'paper');

        return view('frontend.answerScripts.edit', compact('answerScript', 'papers', 'users'));
    }

    public function update(UpdateAnswerScriptRequest $request, AnswerScript $answerScript)
    {
        $answerScript->update($request->all());

        if ($request->input('photo_path', false)) {
            if (!$answerScript->photo_path || $request->input('photo_path') !== $answerScript->photo_path->file_name) {
                if ($answerScript->photo_path) {
                    $answerScript->photo_path->delete();
                }
                $answerScript->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo_path'))))->toMediaCollection('photo_path');
            }
        } elseif ($answerScript->photo_path) {
            $answerScript->photo_path->delete();
        }

        if ($request->input('file_name', false)) {
            if (!$answerScript->file_name || $request->input('file_name') !== $answerScript->file_name->file_name) {
                if ($answerScript->file_name) {
                    $answerScript->file_name->delete();
                }
                $answerScript->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_name'))))->toMediaCollection('file_name');
            }
        } elseif ($answerScript->file_name) {
            $answerScript->file_name->delete();
        }

        return redirect()->route('frontend.answer-scripts.index');
    }

    public function show(AnswerScript $answerScript)
    {
        abort_if(Gate::denies('answer_script_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answerScript->load('user', 'paper');

        return view('frontend.answerScripts.show', compact('answerScript'));
    }

    public function destroy(AnswerScript $answerScript)
    {
        abort_if(Gate::denies('answer_script_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answerScript->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnswerScriptRequest $request)
    {
        AnswerScript::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('answer_script_create') && Gate::denies('answer_script_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AnswerScript();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
