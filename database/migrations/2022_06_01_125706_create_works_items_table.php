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
        Schema::create('works_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->references('id')->on('works')->cascadeOnDelete();
            $table->foreignId('item_id')->references('id')->on('items')->cascadeOnDelete();
            $table->string('value');
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
        Schema::dropIfExists('work_items');
    }
};
