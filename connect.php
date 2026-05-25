<?php

$host = "localhost";

$dbname = "lawyer_system";

$user = "root";

$pass = "";

try {

$con = new PDO(

"mysql:host=$host;dbname=$dbname",

$user,

$pass
);

$con->setAttribute(

PDO::ATTR_ERRMODE,

PDO::ERRMODE_EXCEPTION
);

} catch(PDOException $e) {

echo $e->getMessage();
}