<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSupportTicketRequest;
use App\Http\Requests\UpdateSupportTicketRequest;
use App\Http\Resources\Admin\SupportTicketResource;
use App\Models\SupportTicket;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportTicketsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('support_ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupportTicketResource(SupportTicket::with(['status', 'priority', 'category', 'user'])->get());
    }

    public function store(StoreSupportTicketRequest $request)
    {
        $supportTicket = SupportTicket::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $supportTicket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        return (new SupportTicketResource($supportTicket))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SupportTicket $supportTicket)
    {
        abort_if(Gate::denies('support_ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupportTicketResource($supportTicket->load(['status', 'priority', 'category', 'user']));
    }

    public function update(UpdateSupportTicketRequest $request, SupportTicket $supportTicket)
    {
        $supportTicket->update($request->all());

        if (count($supportTicket->attachments) > 0) {
            foreach ($supportTicket->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $supportTicket->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $supportTicket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return (new SupportTicketResource($supportTicket))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SupportTicket $supportTicket)
    {
        abort_if(Gate::denies('support_ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportTicket->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
