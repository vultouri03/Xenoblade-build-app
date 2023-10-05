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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
            $table->string('class');
            $table->text('gem_1');
            $table->text('gem_2');
            $table->text('gem_3');
            $table->integer('level');
            $table->text('accessory_1');
            $table->text('accessory_2');
            $table->text('accessory_3');
            $table->text('art_1');
            $table->text('art_2');
            $table->text('art_3');
            $table->text('master_art_1');
            $table->text('master_art_2');
            $table->text('master_art_3');
            $table->text('master_skill_1');
            $table->text('master_skill_2');
            $table->text('master_skill_3');
            $table->bigInteger('build_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
