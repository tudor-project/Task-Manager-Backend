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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('priority')->nullable();
            $table->boolean('status')->default(false);
//            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
//            $table->foreignId('project_id')->constrained('projects', 'id')->onDelete('cascade');

            $table->integer('user_id')->default(1);
            $table->foreignId('project_id')->constrained('projects', 'id')->onDelete('cascade');
            //TODO modifica mzfk


            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
