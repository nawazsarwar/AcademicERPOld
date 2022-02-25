<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class OrganizationalEmailsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('organizational_email_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrganizationalEmail::with(['user'])->select(sprintf('%s.*', (new OrganizationalEmail())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'organizational_email_show';
                $editGate = 'organizational_email_edit';
                $deleteGate = 'organizational_email_delete';
                $crudRoutePart = 'organizational-emails';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? OrganizationalEmail::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('alias', function ($row) {
                return $row->alias ? $row->alias : '';
            });
            $table->editColumn('first_password', function ($row) {
                return $row->first_password ? $row->first_password : '';
            });
            $table->editColumn('avatar_url', function ($row) {
                return $row->avatar_url ? $row->avatar_url : '';
            });
            $table->editColumn('recovery_email', function ($row) {
                return $row->recovery_email ? $row->recovery_email : '';
            });
            $table->editColumn('recovery_phone', function ($row) {
                return $row->recovery_phone ? $row->recovery_phone : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? $row->gender : '';
            });
            $table->editColumn('office_365', function ($row) {
                return $row->office_365 ? $row->office_365 : '';
            });
            $table->editColumn('office_365_uid', function ($row) {
                return $row->office_365_uid ? $row->office_365_uid : '';
            });
            $table->editColumn('office_365_object_uid', function ($row) {
                return $row->office_365_object_uid ? $row->office_365_object_uid : '';
            });

            $table->editColumn('gsuite', function ($row) {
                return $row->gsuite ? $row->gsuite : '';
            });
            $table->editColumn('gsuite_uid', function ($row) {
                return $row->gsuite_uid ? $row->gsuite_uid : '';
            });

            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.organizationalEmails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organizational_email_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.organizationalEmails.create', compact('users'));
    }

    public function store(StoreOrganizationalEmailRequest $request)
    {
        $organizationalEmail = OrganizationalEmail::create($request->all());

        return redirect()->route('admin.organizational-emails.index');
    }

    public function edit(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizationalEmail->load('user');

        return view('admin.organizationalEmails.edit', compact('organizationalEmail', 'users'));
    }

    public function update(UpdateOrganizationalEmailRequest $request, OrganizationalEmail $organizationalEmail)
    {
        $organizationalEmail->update($request->all());

        return redirect()->route('admin.organizational-emails.index');
    }

    public function show(OrganizationalEmail $organizationalEmail)
    {
        abort_if(Gate::denies('organizational_email_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationalEmail->load('user');

        return view('admin.organizationalEmails.show', compact('organizationalEmail'));
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
