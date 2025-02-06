<?php
// Hàm kết nối CSDL
function ConnectDB()
{
    $host       ='localhost';
    $dbname     = 'courses';

    // Kết nối đến CSDL
    try {
        // Tạo kết nối bằng PDO
        $conn = new PDO(
            "mysql:host=$host; dbname=$dbname",
           'root',""
        );

        // Thiết lập cơ chế lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cài đặt chế độ hiển thị dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
        // echo "Kết nối thành công";
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
    }
}