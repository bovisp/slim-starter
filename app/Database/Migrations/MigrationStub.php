<?php

use $useClassName;
use Illuminate\Database\Schema\Blueprint;

class $className extends $baseClassName
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
