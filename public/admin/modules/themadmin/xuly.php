<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');
if (isset($_POST['dangky'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $matkhau = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = 1; 
    $registration_time = $_POST["registration_time"];
    $registration_time_integer = intval($registration_time);


    $sql_dangky = "INSERT INTO users (name, email, password, created_at, role) VALUES (:name, :email, :matkhau, :registration_time, :role)";
    $stmt = $db->prepare($sql_dangky);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':matkhau', $matkhau, PDO::PARAM_STR);
    $stmt->bindParam(':registration_time', $registration_time_integer, PDO::PARAM_INT);

    $stmt->bindParam(':role', $role, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: ../../index.php");
        $_SESSION['dangky'] = $name;
    }
}
?>
