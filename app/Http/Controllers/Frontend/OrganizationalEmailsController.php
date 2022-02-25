<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOrganizationalEmailRequest;
use App\Http\Requests\StoreOrganizationalEmailRequest;
use App\Http\Requests\UpdateOrganizationalEmailRequest;
use App\Models\OrganizationalEmail;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationalEmailsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('organizational_email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationalEmails = OrganizationalEmail::with(['user'])->get();

        return view('frontend.organizationalEmails.index', compact('organizationalEmails'));
    }

    public function create()
    {
        abort_if(Gate::denies('organizational_email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.organizationalEmails.create', compact('users'));
    }

    public function store(StoreOrganizationalEmailRequest $request)
    {
        $organizationalEmail = OrganizationalEmail::create($request->all());

        return redirect()->route('frontend.organizational-emails.index');
    }

    public function edit(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizationalEmail->load('user');

        return view('frontend.organizationalEmails.edit', compact('organizationalEmail', 'users'));
    }

    public function update(UpdateOrganizationalEmailRequest $request, OrganizationalEmail $organizationalEmail)
    {
        $organizationalEmail->update($request->all());

        return redirect()->route('frontend.organizational-emails.index');
    }

    public function show(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationalEmail->load('user');

        return view('frontend.organizationalEmails.show', compact('organizationalEmail'));
    }

    public function destroy(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationalEmail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizationalEmailRequest $request)
    {
        OrganizationalEmail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
