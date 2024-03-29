<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientsRenameAgeAttr extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('patients', function (Blueprint $table) {
			$table->renameColumn('age', 'birth_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('patients', function (Blueprint $table) {
			$table->renameColumn('birth_date', 'age');
		});
	}
}
