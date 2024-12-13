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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('task_title');
            $table->text('task_description');
            $table->date('task_start_date');
            $table->date('task_end_date');
            $table->enum('priority',['low','mid','high']);
            $table->boolean('is_task_near');
            $table->boolean('is_task_overdue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
