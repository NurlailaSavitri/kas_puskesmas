<?php
require_once(__DIR__ . '/../vendor/autoload.php');
ORM::configure('mysql:host=localhost;dbname=kas_puskesmas');
ORM::configure('username','root');
ORM::configure('password','');

//nantinya dapat digunakan untuk melihat hasil query
ORM::configure('logging',true);



