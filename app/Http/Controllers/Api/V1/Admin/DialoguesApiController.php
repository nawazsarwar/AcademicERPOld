<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDialogueRequest;
use App\Http\Requests\UpdateDialogueRequest;
use App\Http\Resources\Admin\DialogueResource;
use App\Models\Dialogue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DialoguesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dialogue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DialogueResource(Dialogue::with(['merchant', 'transaction'])->get());
    }

    public function store(StoreDialogueRequest $request)
    {
        $dialogue = Dialogue::create($request->all());

        return (new DialogueResource($dialogue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DialogueResource($dialogue->load(['merchant', 'transaction']));
    }

    public function update(UpdateDialogueRequest $request, Dialogue $dialogue)
    {
        $dialogue->update($request->all());

        return (new DialogueResource($dialogue))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
