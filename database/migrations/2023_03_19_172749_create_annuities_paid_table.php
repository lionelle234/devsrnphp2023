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
        Schema::create('annuities_paid', function (Blueprint $table) {
            $table->unsignedBigInteger('associates_id');
            $table->unsignedBigInteger('annuities_id');

            $table->foreign('associates_id')->references('id')->on('associates')->onDelete('cascade');
            $table->foreign('annuities_id')->references('id')->on('annuities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuities_paid');
    }
};
