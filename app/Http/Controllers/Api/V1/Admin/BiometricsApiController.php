<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBiometricRequest;
use App\Http\Requests\UpdateBiometricRequest;
use App\Http\Resources\Admin\BiometricResource;
use App\Models\Biometric;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BiometricsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('biometric_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BiometricResource(Biometric::with(['user'])->get());
    }

    public function store(StoreBiometricRequest $request)
    {
        $biometric = Biometric::create($request->all());

        if ($request->input('name', false)) {
            $biometric->addMedia(storage_path('tmp/uploads/' . basename($request->input('name'))))->toMediaCollection('name');
        }

        return (new BiometricResource($biometric))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Biometric $biometric)
    {
        abort_if(Gate::denies('biometric_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BiometricResource($biometric->load(['user']));
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

        return (new BiometricResource($biometric))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Biometric $biometric)
    {
        abort_if(Gate::denies('biometric_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biometric->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
