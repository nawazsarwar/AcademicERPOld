<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBiometricRequest;
use App\Http\Requests\StoreBiometricRequest;
use App\Http\Requests\UpdateBiometricRequest;
use App\Models\Biometric;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BiometricsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('biometric_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biometrics = Biometric::with(['user', 'media'])->get();

        return view('frontend.biometrics.index', compact('biometrics'));
    }

    public function create()
    {
        abort_if(Gate::denies('biometric_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.biometrics.create', compact('users'));
    }

    public function store(StoreBiometricRequest $request)
    {
        $biometric = Biometric::create($request->all());

        if ($request->input('name', false)) {
            $biometric->addMedia(storage_path('tmp/uploads/' . basename($request->input('name'))))->toMediaCollection('name');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $biometric->id]);
        }

        return redirect()->route('frontend.biometrics.index');
    }

    public function edit(Biometric $biometric)
    {
        abort_if(Gate::denies('biometric_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $biometric->load('user');

        return view('frontend.biometrics.edit', compact('biometric', 'users'));
    }

    public function update(UpdateBiometricRequest $request, Biometric $biometric)
    {
        $biometric->update($request->all());

        if ($request->input('name', false)) {
            if (!$biometric->name || $request->input('name') !== $biometric->name->file_name) {
                if ($biometric->name) {
                    $biometric->name->delete();
                }
                $biometric->addMedia(storage_path('tmp/uploads/' . basename($request->input('name'))))->toMediaCollection('name');
            }
        } elseif ($biometric->name) {
            $biometric->name->delete();
        }

        return redirect()->route('frontend.biometrics.index');
    }

    public function show(Biometric $biometric)
    {
        abort_if(Gate::denies('biometric_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biometric->load('user');

        return view('frontend.biometrics.show', compact('biometric'));
    }

    public function destroy(Biometric $biometric)
    {
        abort_if(Gate::denies('biometric_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biometric->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiometricRequest $request)
    {
        Biometric::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('biometric_create') && Gate::denies('biometric_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Biometric();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
