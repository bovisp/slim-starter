<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNameColumnToUsersTable extends Migration
{
    public function up()
    {
    	$this->schema->create('', function (Blueprint $table) {
    		$table->engine = 'InnoDB';

    		$table->increments('id');
            $table->timestamps();
    	});

    	$this->schema->table('', function (Blueprint $table) {
    		
    	});
    }

    public function down()
    {
    	$this->schema->drop('');

    	$this->schema->table('', function (Blueprint $table) {
    		
    	});
    }
}
