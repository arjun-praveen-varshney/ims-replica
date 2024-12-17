<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id(); // Auto Increment ID
            $table->string('company'); // Company Name
            $table->string('duration'); // Duration
            $table->string('description'); // Description
            $table->string('document_path'); // PDF Path
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User ID
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
