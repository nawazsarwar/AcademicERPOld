<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAddressRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Person;
use App\Models\PostalCode;
use App\Models\Province;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::with(['country', 'province', 'postal_code', 'person', 'user'])->get();

        return view('frontend.addresses.index', compact('addresses'));
    }

    public function create()
    {
        abort_if(Gate::denies('address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $postal_codes = PostalCode::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.addresses.create', compact('countries', 'people', 'postal_codes', 'provinces', 'users'));
    }

    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());

        return redirect()->route('frontend.addresses.index');
    }

    public function edit(Address $address)
    {
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $postal_codes = PostalCode::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address->load('country', 'province', 'postal_code', 'person', 'user');

        return view('frontend.addresses.edit', compact('address', 'countries', 'people', 'postal_codes', 'provinces', 'users'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());

        return redirect()->route('frontend.addresses.index');
    }

    public function show(Address $address)
    {
        abort_if(Gate::denies('address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->load('country', 'province', 'postal_code', 'person', 'user');

        return view('frontend.addresses.show', compact('address'));
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
