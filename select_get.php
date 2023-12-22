<?php
include("database.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $db = new DB();
    
    $stmt = $db->getCon()->prepare("SELECT * FROM table_name WHERE id = ?;");
    # 'i' for integer, 's' for string
    $stmt -> bind_param("i", $id);

    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    }
} else {
    echo "Action not recognized";
}
?>