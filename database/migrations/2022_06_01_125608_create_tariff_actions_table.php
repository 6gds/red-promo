<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tariff_id')->references('id')->on('tariffs')->cascadeOnDelete();
            $table->foreignId('action_id')->references('id')->on('actions')->cascadeOnDelete();
            $table->longText('info');
            $table->boolean('a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_actions');
    }
};
