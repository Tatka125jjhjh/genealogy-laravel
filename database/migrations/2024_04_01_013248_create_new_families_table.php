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
        Schema::create('new_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->text('description')->nullable();
            $table->integer('is_active')->nullable();
            $table->foreignId('type_id')->constrained('types')->nullable();
            $table->foreignId('husband_id')->constrained('persons')->nullable();
            $table->foreignId('wife_id')->constrained('persons')->nullable();
            $table->string('chan')->nullable();
            $table->string('nchi')->nullable();
            $table->string('rin')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_families');
    }
};
