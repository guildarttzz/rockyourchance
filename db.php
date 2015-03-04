<?php

session_start();

define('DBHOST', 'localhost');
define('DBNAME', 'rock');
define('DBUSER', 'root');
define('DBPASSWORD', '');

Database::_init();

if(!is_null(Database::_lastError())){
    if(isset($_messages)){
        add_error($_messages, Database::_lastError()->getMessage());
    }
}