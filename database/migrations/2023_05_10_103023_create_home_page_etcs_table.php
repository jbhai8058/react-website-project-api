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
        Schema::create('home_page_etcs', function (Blueprint $table) {
            $table->id();
            $table->string('home_title');
            $table->string('home_subtitle');
            $table->text('tect_description');
            $table->string('happy_client');
            $table->string('complete_prjects');
            $table->string('hour_of_support');
            $table->text('vider_description');
            $table->string('video_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_etcs');
    }
};
