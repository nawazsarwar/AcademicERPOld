<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAcademicQualificationRequest;
use App\Http\Requests\UpdateAcademicQualificationRequest;
use App\Http\Resources\Admin\AcademicQualificationResource;
use App\Models\AcademicQualification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicQualificationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('academic_qualification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcademicQualificationResource(AcademicQualification::with(['user', 'qualification_level', 'board'])->get());
    }

    public function store(StoreAcademicQualificationRequest $request)
    {
        $academicQualification = AcademicQualification::create($request->all());

        if ($request->input('certificate', false)) {
            $academicQualification->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        return (new AcademicQualificationResource($academicQualification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcademicQualificationResource($academicQualification->load(['user', 'qualification_level', 'board']));
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

        return (new AcademicQualificationResource($academicQualification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AcademicQualification $academicQualification)
    {
        abort_if(Gate::denies('academic_qualification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicQualification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
