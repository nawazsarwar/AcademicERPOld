<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWebsiteRequest;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsitesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websites = Website::all();

        return view('admin.websites.index', compact('websites'));
    }

    public function create()
    {
        abort_if(Gate::denies('website_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.create');
    }

    public function store(StoreWebsiteRequest $request)
    {
        $website = Website::create($request->all());

        return redirect()->route('admin.websites.index');
    }

    public function edit(Website $website)
    {
        abort_if(Gate::denies('website_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.edit', compact('website'));
    }

    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->all());

        return redirect()->route('admin.websites.index');
    }

    public function show(Website $website)
    {
        abort_if(Gate::denies('website_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websites.show', compact('website'));
    }

    public function destroy(Website $website)
    {
        abort_if(Gate::denies('website_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $website->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsiteRequest $request)
    {
        Website::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
