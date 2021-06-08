<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Http\Requests\OrganisationStoreRequest;
use App\Http\Requests\OrganisationUpdateRequest;

class OrganisationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Organisation::class);

        $search = $request->get('search', '');

        $organisations = Organisation::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.organisations.index',
            compact('organisations', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Organisation::class);

        $users = User::pluck('name', 'id');

        return view('app.organisations.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\OrganisationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganisationStoreRequest $request)
    {
        $this->authorize('create', Organisation::class);

        $validated = $request->validated();

        $organisation = Organisation::create($validated);

        return redirect()
            ->route('organisations.edit', $organisation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Organisation $organisation)
    {
        $this->authorize('view', $organisation);

        return view('app.organisations.show', compact('organisation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Organisation $organisation)
    {
        $this->authorize('update', $organisation);

        $users = User::pluck('name', 'id');

        return view('app.organisations.edit', compact('organisation', 'users'));
    }

    /**
     * @param \App\Http\Requests\OrganisationUpdateRequest $request
     * @param \App\Models\Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(
        OrganisationUpdateRequest $request,
        Organisation $organisation
    ) {
        $this->authorize('update', $organisation);

        $validated = $request->validated();

        $organisation->update($validated);

        return redirect()
            ->route('organisations.edit', $organisation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Organisation $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Organisation $organisation)
    {
        $this->authorize('delete', $organisation);

        $organisation->delete();

        return redirect()
            ->route('organisations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
