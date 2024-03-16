<?php
include($_SERVER['DOCUMENT_ROOT'] . '/PRO1014-N6-1 (3)/config/database.php');

if(isset($_POST['xoauser'])){
    $id_user = $_POST['id_user'];
    $sql_xoa_khach_hang = "DELETE FROM users WHERE id = :id_user";
    $stmt = $db->prepare($sql_xoa_khach_hang);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
   
    header('Location:../../index.php?action=taikhoannguoidung&query=lietke');

}
?>