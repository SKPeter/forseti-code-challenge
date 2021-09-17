<?php
// Just insert the database name, user and password where shown.

define('DB_NAME', 'insert_database_name_here');
define('DB_USERNAME', 'insert_user_here');
define('DB_PASSWORD', 'insert_password_here');

$pdo = new PDO("mysql:dbname=".DB_NAME.";host=localhost", DB_USERNAME, DB_PASSWORD);
