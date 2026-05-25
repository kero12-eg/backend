<?php

header('Content-Type: application/json');

include "connect.php";

$firebase_uid =
$_POST['firebase_uid'];

$stmt =
$con->prepare(

"SELECT * FROM images

WHERE firebase_uid = ?

ORDER BY id DESC

LIMIT 1"
);

$stmt->execute([

$firebase_uid
]);

$data =
$stmt->fetch(
PDO::FETCH_ASSOC
);

echo json_encode($data);