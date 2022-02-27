<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Enrolment;
use App\Models\Person;
use App\Models\Student;
use App\Models\User;
use App\Models\VerificationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Student::with(['person', 'enrolment', 'verification_status', 'verified_by'])->select(sprintf('%s.*', (new Student())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'student_show';
                $editGate = 'student_edit';
                $deleteGate = 'student_delete';
                $crudRoutePart = 'students';

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

            $table->addColumn('enrolment_number', function ($row) {
                return $row->enrolment ? $row->enrolment->number : '';
            });

            $table->editColumn('enrolment_no', function ($row) {
                return $row->enrolment_no ? $row->enrolment_no : '';
            });
            $table->editColumn('guardian_mobile_no', function ($row) {
                return $row->guardian_mobile_no ? $row->guardian_mobile_no : '';
            });
            $table->addColumn('verification_status_name', function ($row) {
                return $row->verification_status ? $row->verification_status->name : '';
            });

            $table->addColumn('verified_by_name', function ($row) {
                return $row->verified_by ? $row->verified_by->name : '';
            });

            $table->editColumn('verification_remark', function ($row) {
                return $row->verification_remark ? $row->verification_remark : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'person', 'enrolment', 'verification_status', 'verified_by']);

            return $table->make(true);
        }

        return view('admin.students.index');
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolments = Enrolment::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.students.create', compact('enrolments', 'people', 'verification_statuses', 'verified_bies'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());

        return redirect()->route('admin.students.index');
    }

    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrolments = Enrolment::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verification_statuses = VerificationStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $verified_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $student->load('person', 'enrolment', 'verification_status', 'verified_by');

        return view('admin.students.edit', compact('enrolments', 'people', 'student', 'verification_statuses', 'verified_bies'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->load('person', 'enrolment', 'verification_status', 'verified_by');

        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
