<?php

use App\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNameColumnToUsersTable extends Migration
{
    public function up()
    {
    	$this->schema->table('users', function (Blueprint $table) {
    		$table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
    	});
    }

    public function down()
    {
    	$this->schema->table('users', function (Blueprint $table) {
    		$table->dropColumn('firstname', 'lastname');
    	});
    }
}
