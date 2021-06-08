<?php

namespace App\Http\Controllers;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use App\Models\MeetingRoomType;
use App\Http\Requests\MeetingRoomStoreRequest;
use App\Http\Requests\MeetingRoomUpdateRequest;

class MeetingRoomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', MeetingRoom::class);

        $search = $request->get('search', '');

        $meetingRooms = MeetingRoom::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.meeting_rooms.index',
            compact('meetingRooms', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', MeetingRoom::class);

        $meetingRoomTypes = MeetingRoomType::pluck('name', 'id');

        return view('app.meeting_rooms.create', compact('meetingRoomTypes'));
    }

    /**
     * @param \App\Http\Requests\MeetingRoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRoomStoreRequest $request)
    {
        $this->authorize('create', MeetingRoom::class);

        $validated = $request->validated();

        $meetingRoom = MeetingRoom::create($validated);

        return redirect()
            ->route('meeting-rooms.edit', $meetingRoom)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MeetingRoom $meetingRoom
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MeetingRoom $meetingRoom)
    {
        $this->authorize('view', $meetingRoom);

        return view('app.meeting_rooms.show', compact('meetingRoom'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MeetingRoom $meetingRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MeetingRoom $meetingRoom)
    {
        $this->authorize('update', $meetingRoom);

        $meetingRoomTypes = MeetingRoomType::pluck('name', 'id');

        return view(
            'app.meeting_rooms.edit',
            compact('meetingRoom', 'meetingRoomTypes')
        );
    }

    /**
     * @param \App\Http\Requests\MeetingRoomUpdateRequest $request
     * @param \App\Models\MeetingRoom $meetingRoom
     * @return \Illuminate\Http\Response
     */
    public function update(
        MeetingRoomUpdateRequest $request,
        MeetingRoom $meetingRoom
    ) {
        $this->authorize('update', $meetingRoom);

        $validated = $request->validated();

        $meetingRoom->update($validated);

        return redirect()
            ->route('meeting-rooms.edit', $meetingRoom)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MeetingRoom $meetingRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MeetingRoom $meetingRoom)
    {
        $this->authorize('delete', $meetingRoom);

        $meetingRoom->delete();

        return redirect()
            ->route('meeting-rooms.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
