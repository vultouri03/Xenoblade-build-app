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
        Schema::create('character', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
            $table->string('class');
            $table->text('gems');
            $table->integer('level');
            $table->text('accessories');
            $table->text('arts');
            $table->text('skills');
            $table->bigInteger('build_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character');
    }
};
