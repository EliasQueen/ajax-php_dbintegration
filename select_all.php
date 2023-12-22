<?php
include("database.php");

$db = new DB();

$stmt = $db->getCon()->prepare("SELECT * FROM table_name;");

$stmt -> execute();
$result = $stmt -> get_result();

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
}
?>