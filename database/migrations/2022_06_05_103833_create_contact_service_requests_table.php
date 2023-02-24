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
        Schema::create('contact_service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();;
            $table->foreignId('type_id')->references('id')->on('type_communications')->cascadeOnDelete();
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            $table->string('message');
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
        Schema::dropIfExists('contact_service_requests');
    }
};
