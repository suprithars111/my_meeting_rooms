<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToMeetingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_rooms', function (Blueprint $table) {
            $table
                ->foreign('meeting_room_type_id')
                ->references('id')
                ->on('meeting_room_types');

            $table
                ->foreign('organisation_id')
                ->references('id')
                ->on('organisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_rooms', function (Blueprint $table) {
            $table->dropForeign(['meeting_room_type_id']);
            $table->dropForeign(['organisation_id']);
        });
    }
}
