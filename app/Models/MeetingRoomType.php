<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingRoomType extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'icon'];

    protected $searchableFields = ['*'];

    protected $table = 'meeting_room_types';

    public function meetingRooms()
    {
        return $this->hasMany(MeetingRoom::class);
    }
}
