<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddressRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Person;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddressesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Address::with(['person'])->select(sprintf('%s.*', (new Address())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'address_show';
                $editGate = 'address_edit';
                $deleteGate = 'address_delete';
                $crudRoutePart = 'addresses';

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
            $table->addColumn('person_first_name', function ($row) {
                return $row->person ? $row->person->first_name : '';
            });

            $table->editColumn('person.middle_name', function ($row) {
                return $row->person ? (is_string($row->person) ? $row->person : $row->person->middle_name) : '';
            });
            $table->editColumn('person.last_name', function ($row) {
                return $row->person ? (is_string($row->person) ? $row->person : $row->person->last_name) : '';
            });
            $table->editColumn('house_no', function ($row) {
                return $row->house_no ? $row->house_no : '';
            });
            $table->editColumn('street', function ($row) {
                return $row->street ? $row->street : '';
            });
            $table->editColumn('landmark', function ($row) {
                return $row->landmark ? $row->landmark : '';
            });
            $table->editColumn('locality', function ($row) {
                return $row->locality ? $row->locality : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });
            $table->editColumn('district', function ($row) {
                return $row->district ? $row->district : '';
            });
            $table->editColumn('province', function ($row) {
                return $row->province ? $row->province : '';
            });
            $table->editColumn('pincode', function ($row) {
                return $row->pincode ? $row->pincode : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'person']);

            return $table->make(true);
        }

        return view('admin.addresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addresses.create', compact('people'));
    }

    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());

        return redirect()->route('admin.addresses.index');
    }

    public function edit(Address $address)
    {
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address->load('person');

        return view('admin.addresses.edit', compact('people', 'address'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());

        return redirect()->route('admin.addresses.index');
    }

    public function show(Address $address)
    {
        abort_if(Gate::denies('address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->load('person');

        return view('admin.addresses.show', compact('address'));
    }

    public function destroy(Address $address)
    {
        abort_if(Gate::denies('address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddressRequest $request)
    {
        Address::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
