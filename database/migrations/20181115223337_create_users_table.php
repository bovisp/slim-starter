<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    public function up()
    {
    	$this->schema->create('users', function (Blueprint $table) {
    		$table->engine = 'InnoDB';

    		$table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamps();
    	});
    }

    public function down()
    {
    	$this->schema->drop('users');
    }
}
