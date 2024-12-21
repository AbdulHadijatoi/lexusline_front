<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('container_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_port_id');
            $table->unsignedBigInteger('destination_port_id');
            $table->string('container_number');
            $table->string('bl_number');
            $table->string('date');
            $table->text('container_details');
            $table->text('bl_details');            
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('origin_port_id')->references('id')->on('ports')->onDelete('cascade');
            $table->foreign('destination_port_id')->references('id')->on('ports')->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_details');
    }
};
