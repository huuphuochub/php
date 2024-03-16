<?php
class DatabaseQuery
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    protected function executeSelectQuery($query, $params = [], $single = false)
    {
        $stmt = $this->db->prepare($query);

        foreach ($params as $key => $value) {
            $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($key, $value, $dataType);
        }


        $stmt->execute();
        return $single ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function executeAuthQueryLog($query, $params = [], $returnSingle = false) {
        $stmt = $this->db->prepare($query);
    
        $index = 1;
        foreach ($params as $value) {
            $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($index, $value, $dataType);
            $index++;
        }
    
        $stmt->execute();
    
        if ($returnSingle) {
            return $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng cho truy vấn SELECT
        } else {
            return $stmt->rowCount(); // Sử dụng cho truy vấn INSERT
        }
    }
    protected function executeAuthQuery($query, $params = [], $returnSingle = false) {
        $stmt = $this->db->prepare($query);
    
        foreach ($params as $key => &$value) {
            $dataType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindParam($key, $value, $dataType);
        }
    
        $stmt->execute();
    
        if ($returnSingle) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return $stmt->rowCount();
        }
    }
    
    
    
    
    
}
?>