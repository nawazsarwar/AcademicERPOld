<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaperTypeRequest;
use App\Http\Requests\StorePaperTypeRequest;
use App\Http\Requests\UpdatePaperTypeRequest;
use App\Models\PaperType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaperTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paper_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperTypes = PaperType::all();

        return view('admin.paperTypes.index', compact('paperTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('paper_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paperTypes.create');
    }

    public function store(StorePaperTypeRequest $request)
    {
        $paperType = PaperType::create($request->all());

        return redirect()->route('admin.paper-types.index');
    }

    public function edit(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paperTypes.edit', compact('paperType'));
    }

    public function update(UpdatePaperTypeRequest $request, PaperType $paperType)
    {
        $paperType->update($request->all());

        return redirect()->route('admin.paper-types.index');
    }

    public function show(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperType->load('paperTypePapers');

        return view('admin.paperTypes.show', compact('paperType'));
    }

    public function destroy(PaperType $paperType)
    {
        abort_if(Gate::denies('paper_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paperType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaperTypeRequest $request)
    {
        PaperType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
