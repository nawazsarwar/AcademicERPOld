<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPersonRequest;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Country;
use App\Models\Person;
use App\Models\Province;
use App\Models\Religion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PersonsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('person_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Person::with(['religion', 'nationality', 'domicile_province', 'verified_by', 'user'])->select(sprintf('%s.*', (new Person())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'person_show';
                $editGate = 'person_edit';
                $deleteGate = 'person_delete';
                $crudRoutePart = 'people';

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
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('middle_name', function ($row) {
                return $row->middle_name ? $row->middle_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('fathers_first_name', function ($row) {
                return $row->fathers_first_name ? $row->fathers_first_name : '';
            });
            $table->editColumn('fathers_middle_name', function ($row) {
                return $row->fathers_middle_name ? $row->fathers_middle_name : '';
            });
            $table->editColumn('fathers_last_name', function ($row) {
                return $row->fathers_last_name ? $row->fathers_last_name : '';
            });
            $table->editColumn('mothers_first_name', function ($row) {
                return $row->mothers_first_name ? $row->mothers_first_name : '';
            });
            $table->editColumn('mothers_middle_name', function ($row) {
                return $row->mothers_middle_name ? $row->mothers_middle_name : '';
            });
            $table->editColumn('mothers_last_name', function ($row) {
                return $row->mothers_last_name ? $row->mothers_last_name : '';
            });

            $table->editColumn('gender', function ($row) {
                return $row->gender ? Person::GENDER_SELECT[$row->gender] : '';
            });
            $table->editColumn('blood_group', function ($row) {
                return $row->blood_group ? $row->blood_group : '';
            });
            $table->editColumn('disability', function ($row) {
                return $row->disability ? Person::DISABILITY_SELECT[$row->disability] : '';
            });
            $table->editColumn('disability_type', function ($row) {
                return $row->disability_type ? Person::DISABILITY_TYPE_SELECT[$row->disability_type] : '';
            });
            $table->editColumn('aadhaar_no', function ($row) {
                return $row->aadhaar_no ? $row->aadhaar_no : '';
            });
            $table->addColumn('religion_name', function ($row) {
                return $row->religion ? $row->religion->name : '';
            });

            $table->editColumn('caste', function ($row) {
                return $row->caste ? Person::CASTE_SELECT[$row->caste] : '';
            });
            $table->editColumn('sub_caste', function ($row) {
                return $row->sub_caste ? $row->sub_caste : '';
            });
            $table->addColumn('nationality_name', function ($row) {
                return $row->nationality ? $row->nationality->name : '';
            });

            $table->addColumn('domicile_province_name', function ($row) {
                return $row->domicile_province ? $row->domicile_province->name : '';
            });

            $table->editColumn('identity_marks', function ($row) {
                return $row->identity_marks ? $row->identity_marks : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });
            $table->editColumn('verified', function ($row) {
                return $row->verified ? $row->verified : '';
            });
            $table->addColumn('verified_by_name', function ($row) {
                return $row->verified_by ? $row->verified_by->name : '';
            });

            $table->addColumn('user_username', function ($row) {
                return $row->user ? $row->user->username : '';
            });

            $table->editColumn('dob_proof', function ($row) {
                return $row->dob_proof ? $row->dob_proof : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? Person::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });
            $table->editColumn('spouse_name', function ($row) {
                return $row->spouse_name ? $row->spouse_name : '';
            });
            $table->editColumn('pan_no', function ($row) {
                return $row->pan_no ? $row->pan_no : '';
            });
            $table->editColumn('passport_no', function ($row) {
                return $row->passport_no ? $row->passport_no : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'religion', 'nationality', 'domicile_province', 'verified_by', 'user']);

            return $table->make(true);
        }

        return view('admin.people.index');
    }

    public function create()
    {
        abort_if(Gate::denies('person_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $religions = Religion::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $domicile_provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.people.create', compact('religions', 'nationalities', 'domicile_provinces', 'verified_bies', 'users'));
    }

    public function store(StorePersonRequest $request)
    {
        $person = Person::create($request->all());

        return redirect()->route('admin.people.index');
    }

    public function edit(Person $person)
    {
        abort_if(Gate::denies('person_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $religions = Religion::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $domicile_provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $person->load('religion', 'nationality', 'domicile_province', 'verified_by', 'user');

        return view('admin.people.edit', compact('religions', 'nationalities', 'domicile_provinces', 'verified_bies', 'users', 'person'));
    }

    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->update($request->all());

        return redirect()->route('admin.people.index');
    }

    public function show(Person $person)
    {
        abort_if(Gate::denies('person_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person->load('religion', 'nationality', 'domicile_province', 'verified_by', 'user');

        return view('admin.people.show', compact('person'));
    }

    public function destroy(Person $person)
    {
        abort_if(Gate::denies('person_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonRequest $request)
    {
        Person::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
