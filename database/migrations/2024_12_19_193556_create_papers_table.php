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
        Schema::create('papers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key referencing users table
            $table->string('title');
            $table->integer('publication_year')->nullable();
            $table->string('publisher')->nullable();
            $table->string('paper_link')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('name_of_conference')->nullable();
            $table->string('indexing')->nullable(); // e.g., Scopus, SCI
            $table->text('other_details')->nullable();
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
