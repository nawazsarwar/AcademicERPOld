<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHallStudentRequest;
use App\Http\Requests\StoreHallStudentRequest;
use App\Http\Requests\UpdateHallStudentRequest;
use App\Models\Hall;
use App\Models\HallStudent;
use App\Models\Hostel;
use App\Models\Student;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HallStudentController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('hall_student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hallStudents = HallStudent::with(['hall', 'hostel', 'student', 'allotted_by'])->get();

        return view('admin.hallStudents.index', compact('hallStudents'));
    }

    public function create()
    {
        abort_if(Gate::denies('hall_student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostels = Hostel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allotted_bies = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hallStudents.create', compact('allotted_bies', 'halls', 'hostels', 'students'));
    }

    public function store(StoreHallStudentRequest $request)
    {
        $hallStudent = HallStudent::create($request->all());

        return redirect()->route('admin.hall-students.index');
    }

    public function edit(HallStudent $hallStudent)
    {
        abort_if(Gate::denies('hall_student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostels = Hostel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::pluck('enrolment_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allotted_bies = User::pluck('username', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hallStudent->load('hall', 'hostel', 'student', 'allotted_by');

        return view('admin.hallStudents.edit', compact('allotted_bies', 'hallStudent', 'halls', 'hostels', 'students'));
    }

    public function update(UpdateHallStudentRequest $request, HallStudent $hallStudent)
    {
        $hallStudent->update($request->all());

        return redirect()->route('admin.hall-students.index');
    }

    public function show(HallStudent $hallStudent)
    {
        abort_if(Gate::denies('hall_student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hallStudent->load('hall', 'hostel', 'student', 'allotted_by');

        return view('admin.hallStudents.show', compact('hallStudent'));
    }

    public function destroy(HallStudent $hallStudent)
    {
        abort_if(Gate::denies('hall_student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hallStudent->delete();

        return back();
    }

    public function massDestroy(MassDestroyHallStudentRequest $request)
    {
        HallStudent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
