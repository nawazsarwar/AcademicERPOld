<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySupportTicketRequest;
use App\Http\Requests\StoreSupportTicketRequest;
use App\Http\Requests\UpdateSupportTicketRequest;
use App\Models\SupportCategory;
use App\Models\SupportPriority;
use App\Models\SupportStatus;
use App\Models\SupportTicket;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SupportTicketsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('support_ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportTickets = SupportTicket::with(['status', 'priority', 'category', 'user', 'media'])->get();

        return view('frontend.supportTickets.index', compact('supportTickets'));
    }

    public function create()
    {
        abort_if(Gate::denies('support_ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = SupportStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $priorities = SupportPriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = SupportCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.supportTickets.create', compact('categories', 'priorities', 'statuses', 'users'));
    }

    public function store(StoreSupportTicketRequest $request)
    {
        $supportTicket = SupportTicket::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $supportTicket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $supportTicket->id]);
        }

        return redirect()->route('frontend.support-tickets.index');
    }

    public function edit(SupportTicket $supportTicket)
    {
        abort_if(Gate::denies('support_ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = SupportStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $priorities = SupportPriority::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = SupportCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supportTicket->load('status', 'priority', 'category', 'user');

        return view('frontend.supportTickets.edit', compact('categories', 'priorities', 'statuses', 'supportTicket', 'users'));
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

        return redirect()->route('frontend.support-tickets.index');
    }

    public function show(SupportTicket $supportTicket)
    {
        abort_if(Gate::denies('support_ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportTicket->load('status', 'priority', 'category', 'user');

        return view('frontend.supportTickets.show', compact('supportTicket'));
    }

    public function destroy(SupportTicket $supportTicket)
    {
        abort_if(Gate::denies('support_ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportTicket->delete();

        return back();
    }

    public function massDestroy(MassDestroySupportTicketRequest $request)
    {
        SupportTicket::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('support_ticket_create') && Gate::denies('support_ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SupportTicket();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
