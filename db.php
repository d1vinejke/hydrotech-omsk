<?php
require 'libs/rb.php';
header('Content-Type: text/html; charset=utf-8');
R::setup( 'mysql:host=127.0.0.1;dbname=','', '' );

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}

session_start();