<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingRoom extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'meeting_room_type_id',
        'organisation_id',
        'name',
        'profile_image',
        'link',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'meeting_rooms';

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function meetingRoomType()
    {
        return $this->belongsTo(MeetingRoomType::class);
    }
}
