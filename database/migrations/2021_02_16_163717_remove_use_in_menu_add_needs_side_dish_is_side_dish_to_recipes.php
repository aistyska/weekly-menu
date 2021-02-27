<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUseInMenuAddNeedsSideDishIsSideDishToRecipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('use_in_menu');
            $table->boolean('needs_side_dish')->default(false);
            $table->boolean('is_side_dish')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->boolean('use_in_menu')->default(true);
            $table->dropColumn(['needs_side_dish', 'is_side_dish']);
        });
    }
}
