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
        if (!Schema::hasColumn('fooditems', 'restaurent_id')) {
            Schema::table('fooditems', function (Blueprint $table) {
                $table->unsignedBigInteger('restaurent_id');
                $table->foreign('restaurent_id')->references('id')->on('restaurent');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fooditems', function (Blueprint $table) {
            $table->dropForeign(['restaurent_id']);
            $table->dropColumn('restaurent_id');
        });
    }
};
