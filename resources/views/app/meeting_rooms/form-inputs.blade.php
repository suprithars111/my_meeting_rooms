@php $editing = isset($meetingRoom) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select
            name="meeting_room_type_id"
            label="Meeting Room Type"
            required
        >
            @php $selected = old('meeting_room_type_id', ($editing ? $meetingRoom->meeting_room_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Meeting Room Type</option>
            @foreach($meetingRoomTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $meetingRoom->name : '')) }}"
            maxlength="190"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="profile_image"
            label="Profile Image"
            value="{{ old('profile_image', ($editing ? $meetingRoom->profile_image : '')) }}"
            maxlength="190"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="link"
            label="Link"
            value="{{ old('link', ($editing ? $meetingRoom->link : '')) }}"
            maxlength="190"
        ></x-inputs.text>
    </x-inputs.group>
</div>
