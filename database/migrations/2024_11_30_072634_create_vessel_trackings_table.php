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
        Schema::create('vessel_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_port_id');
            $table->unsignedBigInteger('destination_port_id');
            $table->string('rot_number');
            $table->string('vessel_name')->nullable();
            $table->string('voy_number')->nullable();
            $table->unsignedBigInteger('terminal_id')->nullable();
            $table->date('eta_jea')->nullable();
            $table->date('eta_kict')->nullable();
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
        Schema::dropIfExists('container_trackings');
    }
};
