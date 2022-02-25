<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPhoneRequest;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Models\Country;
use App\Models\Phone;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PhonesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('phone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Phone::with(['user', 'dialing_code'])->select(sprintf('%s.*', (new Phone())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'phone_show';
                $editGate = 'phone_edit';
                $deleteGate = 'phone_delete';
                $crudRoutePart = 'phones';

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

            $table->addColumn('dialing_code_dialing_code', function ($row) {
                return $row->dialing_code ? $row->dialing_code->dialing_code : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'dialing_code']);

            return $table->make(true);
        }

        return view('admin.phones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('phone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dialing_codes = Country::pluck('dialing_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.phones.create', compact('dialing_codes', 'users'));
    }

    public function store(StorePhoneRequest $request)
    {
        $phone = Phone::create($request->all());

        return redirect()->route('admin.phones.index');
    }

    public function edit(Phone $phone)
    {
        abort_if(Gate::denies('phone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dialing_codes = Country::pluck('dialing_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phone->load('user', 'dialing_code');

        return view('admin.phones.edit', compact('dialing_codes', 'phone', 'users'));
    }

    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $phone->update($request->all());

        return redirect()->route('admin.phones.index');
    }

    public function show(Phone $phone)
    {
        abort_if(Gate::denies('phone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phone->load('user', 'dialing_code');

        return view('admin.phones.show', compact('phone'));
    }

    public function destroy(Phone $phone)
    {
        abort_if(Gate::denies('phone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phone->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhoneRequest $request)
    {
        Phone::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
