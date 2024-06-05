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
        Schema::table('projects', function (Blueprint $table) {
            //creo la colonna
            $table->unsignedBigInteger('type_id');
            // creo il vincolo
            $table->foreign('type_id')->references('id')->on('types');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //droppo il vincolo
            $table->dropForeign('projects_type_id_foreign');
            //droppo la colonna
            $table->dropColumn('type_id');
        });
    }
};
