<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bartender_event', function (Blueprint $table) {
            $table->foreignId('bartender_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->timestamps();

            $table->index(['bartender_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bartender_event');
    }
};
