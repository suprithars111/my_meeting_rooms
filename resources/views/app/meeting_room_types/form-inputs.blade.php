@php $editing = isset($meetingRoomType) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $meetingRoomType->name : '')) }}"
            maxlength="190"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="icon"
            label="Icon"
            value="{{ old('icon', ($editing ? $meetingRoomType->icon : '')) }}"
            maxlength="190"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
