<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToUsers20190222 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
        Schema::table('users', function ($table) {
			$table->string('sur_name');
			$table->string('position');
			$table->string('division');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
	{
        Schema::table('users', function ($table) {
			$table->dropColumn('sur_name');
			$table->dropColumn('position');
			$table->dropColumn('division');
        });
    }
}
