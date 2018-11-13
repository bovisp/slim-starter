<?php

$container['database'] = function () {
	return new PDO('mysql:host=localhost;dbname=slim-app', 'root', '');
};