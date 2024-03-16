<?php
require_once '../app/core/DatabaseQuery.php';

// BannerModel kế thừa từ DatabaseQuery để sử dụng các phương thức truy vấn chung
class BannerModel extends DatabaseQuery {

 
    public function getAllBanners() {
        $query = "SELECT * FROM banners";
        // Trực tiếp sử dụng query() vì không có tham số nào cần ràng buộc
        return $this->executeSelectQuery($query);
    }

  
    public function getBannersByType($type) {
        $query = "SELECT * FROM banners WHERE type = :type";
        // Sử dụng phương thức executeSelectQuery để thực thi truy vấn với các tham số
        return $this->executeSelectQuery($query, [':type' => $type]);
    }
}
?>
    


<!-- public function __construct($db) {
        $this->db = $db;
    } -->