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
    Schema::create('review', function (Blueprint $table) {
    $table->id();
    $table->tinyInteger('nota')->unsigned()->check('nota <= 5');
    $table->text('texto')->nullable();
    $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
    $table->foreignId('livro_id')->constrained('livro')->onDelete('cascade');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
