<?php

header('Content-Type: application/json');

include "connect.php";

if (

isset($_FILES['file'])

) {

    $firebase_uid =
    $_POST['firebase_uid'];

    $imageName =
    time() .
    "_" .
    $_FILES['file']['name'];

    $tmpName =
    $_FILES['file']['tmp_name'];

    $path =
    "uploads/" .
    $imageName;

    if (

    move_uploaded_file(
        $tmpName,
        $path
    )

    ) {

        $stmt =
        $con->prepare(

        "INSERT INTO images

        (

        firebase_uid,
        image_path

        )

        VALUES (?,?)"
        );

        $stmt->execute([

        $firebase_uid,
        $path
        ]);

        echo json_encode([

            "status" => true,

            "path" => $path
        ]);

    } else {

        echo json_encode([

            "status" => false
        ]);
    }
}