<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\AdmissionEntranceType;
use App\Models\Campus;
use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Degree;
use App\Models\Department;
use App\Models\ProgrammeDeliveryMode;
use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Course::with(['degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable'])->select(sprintf('%s.*', (new Course())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_show';
                $editGate = 'course_edit';
                $deleteGate = 'course_delete';
                $crudRoutePart = 'courses';

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
            $table->addColumn('degree_name', function ($row) {
                return $row->degree ? $row->degree->name : '';
            });

            $table->addColumn('campus_name', function ($row) {
                return $row->campus ? $row->campus->name : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('title_hindi', function ($row) {
                return $row->title_hindi ? $row->title_hindi : '';
            });
            $table->editColumn('title_urdu', function ($row) {
                return $row->title_urdu ? $row->title_urdu : '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('course_code', function ($row) {
                return $row->course_code ? $row->course_code : '';
            });
            $table->editColumn('internal_code', function ($row) {
                return $row->internal_code ? $row->internal_code : '';
            });
            $table->addColumn('level_name', function ($row) {
                return $row->level ? $row->level->name : '';
            });

            $table->addColumn('entrance_type_title', function ($row) {
                return $row->entrance_type ? $row->entrance_type->title : '';
            });

            $table->addColumn('mode_title', function ($row) {
                return $row->mode ? $row->mode->title : '';
            });

            $table->addColumn('duration_type_title', function ($row) {
                return $row->duration_type ? $row->duration_type->title : '';
            });

            $table->editColumn('duration', function ($row) {
                return $row->duration ? $row->duration : '';
            });
            $table->editColumn('total_intake', function ($row) {
                return $row->total_intake ? $row->total_intake : '';
            });
            $table->editColumn('subsidiarizable', function ($row) {
                return $row->subsidiarizable ? Course::SUBSIDIARIZABLE_RADIO[$row->subsidiarizable] : '';
            });
            $table->editColumn('creditizable', function ($row) {
                return $row->creditizable ? Course::CREDITIZABLE_RADIO[$row->creditizable] : '';
            });
            $table->addColumn('administrable_name', function ($row) {
                return $row->administrable ? $row->administrable->name : '';
            });

            $table->editColumn('administrable_type', function ($row) {
                return $row->administrable_type ? $row->administrable_type : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable']);

            return $table->make(true);
        }

        return view('admin.courses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = CourseLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entrance_types = AdmissionEntranceType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modes = ProgrammeDeliveryMode::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courses.create', compact('administrables', 'campuses', 'degrees', 'duration_types', 'entrance_types', 'levels', 'modes'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = CourseLevel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entrance_types = AdmissionEntranceType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modes = ProgrammeDeliveryMode::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $duration_types = ProgrammeDurationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administrables = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable');

        return view('admin.courses.edit', compact('administrables', 'campuses', 'course', 'degrees', 'duration_types', 'entrance_types', 'levels', 'modes'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('degree', 'campus', 'level', 'entrance_type', 'mode', 'duration_type', 'administrable');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
