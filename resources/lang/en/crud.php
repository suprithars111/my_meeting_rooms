<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'profile_image' => 'Profile Image',
            'password' => 'Password',
        ],
    ],

    'meeting_room_types' => [
        'name' => 'Meeting Room Types',
        'index_title' => 'MeetingRoomTypes List',
        'new_title' => 'New Meeting room type',
        'create_title' => 'Create MeetingRoomType',
        'edit_title' => 'Edit MeetingRoomType',
        'show_title' => 'Show MeetingRoomType',
        'inputs' => [
            'name' => 'Name',
            'icon' => 'Icon',
        ],
    ],

    'organisations' => [
        'name' => 'Organisations',
        'index_title' => 'Organisations List',
        'new_title' => 'New Organisation',
        'create_title' => 'Create Organisation',
        'edit_title' => 'Edit Organisation',
        'show_title' => 'Show Organisation',
        'inputs' => [
            'user_id' => 'User',
            'name' => 'Name',
            'slug' => 'Slug',
        ],
    ],

    'meeting_rooms' => [
        'name' => 'Meeting Rooms',
        'index_title' => 'MeetingRooms List',
        'new_title' => 'New Meeting room',
        'create_title' => 'Create MeetingRoom',
        'edit_title' => 'Edit MeetingRoom',
        'show_title' => 'Show MeetingRoom',
        'inputs' => [
            'meeting_room_type_id' => 'Meeting Room Type',
            'name' => 'Name',
            'profile_image' => 'Profile Image',
            'link' => 'Link',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
