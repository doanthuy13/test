<?php
abstract class BaseModel {
    protected $conn;

    // Phương thức kết nối CSDL, có thể sẽ được override trong các lớp kế thừa
    abstract protected function connectDB();

    // Phương thức trả về kết nối
    public function getConnection() {
        if (!$this->conn) {
            $this->conn = $this->connectDB();
        }
        return $this->conn;
    }
}
?>