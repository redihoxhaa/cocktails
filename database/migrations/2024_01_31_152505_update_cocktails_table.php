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
        Schema::table('cocktails', function (Blueprint $table) {
            $table->string('name', 50)->change();
            $table->renameColumn('alcohol', 'is_alcoholic');
            $table->float('alcohol_grade', 3, 1)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cocktails', function (Blueprint $table) {
            //
        });
    }
};
