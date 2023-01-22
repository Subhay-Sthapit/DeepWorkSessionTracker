<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeepWorkSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('deep_work_sessions')) {
            Schema::create('deep_work_sessions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->dateTime("planned_start_time");
                $table->dateTime("planned_end_time");
                $table->dateTime("actual_start_time")->nullable();
                $table->dateTime("actual_end_time")->nullable();
                $table->double('duration')->nullable();
                $table->string('status');
                $table->string('session_name');
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
