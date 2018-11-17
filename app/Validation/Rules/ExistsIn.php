<?php

namespace App\Validation\Rules;

use Illuminate\Database\Capsule\Manager as DB;
use Respect\Validation\Rules\AbstractRule;

class ExistsIn extends AbstractRule
{
	protected $table;
	protected $column;

	public function __construct($table, $column)
	{
		$this->table = $table;
		$this->column = $column;
	}

	public function validate($input)
	{
		return DB::table($this->table)
			->where($this->column, '=', $input)
			->exists();
	}
}