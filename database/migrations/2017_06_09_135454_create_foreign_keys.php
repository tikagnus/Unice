<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('unices', function(Blueprint $table) {
			$table->foreign('unice_type_id')->references('unice_type_id')->on('map_unice_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('devices', function(Blueprint $table) {
			$table->foreign('unice_id')->references('id')->on('unices')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('devices', function(Blueprint $table) {
			$table->foreign('device_type_id')->references('device_type_id')->on('map_device_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('state_devices', function(Blueprint $table) {
			$table->foreign('device_id')->references('id')->on('devices')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('unices', function(Blueprint $table) {
			$table->dropForeign('unices_unice_type_id_foreign');
		});
		Schema::table('devices', function(Blueprint $table) {
			$table->dropForeign('devices_unice_id_foreign');
		});
		Schema::table('devices', function(Blueprint $table) {
			$table->dropForeign('devices_device_type_id_foreign');
		});
		Schema::table('state_devices', function(Blueprint $table) {
			$table->dropForeign('state_devices_device_id_foreign');
		});
	}
}