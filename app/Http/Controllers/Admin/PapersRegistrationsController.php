<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPapersRegistrationRequest;
use App\Http\Requests\StorePapersRegistrationRequest;
use App\Http\Requests\UpdatePapersRegistrationRequest;
use App\Models\ExamRegistration;
use App\Models\Paper;
use App\Models\PapersRegistration;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PapersRegistrationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('papers_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PapersRegistration::with(['paper', 'registration', 'student'])->select(sprintf('%s.*', (new PapersRegistration())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'papers_registration_show';
                $editGate = 'papers_registration_edit';
                $deleteGate = 'papers_registration_delete';
                $crudRoutePart = 'papers-registrations';

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
            $table->addColumn('paper_code', function ($row) {
                return $row->paper ? $row->paper->code : '';
            });

            $table->addColumn('registration_type', function ($row) {
                return $row->registration ? $row->registration->type : '';
            });

            $table->addColumn('student_guardian_mobile_no', function ($row) {
                return $row->student ? $row->student->guardian_mobile_no : '';
            });

            $table->editColumn('registration_mode', function ($row) {
                return $row->registration_mode ? PapersRegistration::REGISTRATION_MODE_RADIO[$row->registration_mode] : '';
            });
            $table->editColumn('profile', function ($row) {
                return $row->profile ? $row->profile : '';
            });
            $table->editColumn('faculty', function ($row) {
                return $row->faculty ? $row->faculty : '';
            });
            $table->editColumn('department', function ($row) {
                return $row->department ? $row->department : '';
            });
            $table->editColumn('department_code', function ($row) {
                return $row->department_code ? $row->department_code : '';
            });
            $table->editColumn('paper_code', function ($row) {
                return $row->paper_code ? $row->paper_code : '';
            });
            $table->editColumn('paper_title', function ($row) {
                return $row->paper_title ? $row->paper_title : '';
            });
            $table->editColumn('fraction', function ($row) {
                return $row->fraction ? $row->fraction : '';
            });
            $table->editColumn('credits', function ($row) {
                return $row->credits ? $row->credits : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'paper', 'registration', 'student']);

            return $table->make(true);
        }

        return view('admin.papersRegistrations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('papers_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('guardian_mobile_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.papersRegistrations.create', compact('papers', 'registrations', 'students'));
    }

    public function store(StorePapersRegistrationRequest $request)
    {
        $papersRegistration = PapersRegistration::create($request->all());

        return redirect()->route('admin.papers-registrations.index');
    }

    public function edit(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papers = Paper::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registrations = ExamRegistration::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('guardian_mobile_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $papersRegistration->load('paper', 'registration', 'student');

        return view('admin.papersRegistrations.edit', compact('papers', 'papersRegistration', 'registrations', 'students'));
    }

    public function update(UpdatePapersRegistrationRequest $request, PapersRegistration $papersRegistration)
    {
        $papersRegistration->update($request->all());

        return redirect()->route('admin.papers-registrations.index');
    }

    public function show(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistration->load('paper', 'registration', 'student');

        return view('admin.papersRegistrations.show', compact('papersRegistration'));
    }

    public function destroy(PapersRegistration $papersRegistration)
    {
        abort_if(Gate::denies('papers_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $papersRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyPapersRegistrationRequest $request)
    {
        PapersRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
