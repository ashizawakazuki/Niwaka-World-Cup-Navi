<?php
// PDOに投げるためのDSN（データベースの住所みたいなもの）の定数を作っている
define('DB_HOST','db');
define('DB_NAME','niwaka');
define('DB_USER','user');
define('DB_PASSWORD','password');

define('DATA_SOURCE_NAME','mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8');
