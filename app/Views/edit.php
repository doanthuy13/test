<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Tên Khóa học </h3><input type="text" name="name" value="<?= $edit['name'] ?>"> 
        <h3>Hình ảnh thu nhỏ</h3>
        <img src="public/image/<?=$edit['thumbnail']?>" style="width: 50px; height: 50px;">
        <input type="file" name="cover_image" id="" >
        <h3>Giảng viên</h3><input type="text" name="instructor" value="<?= $edit['instructor']?>" >
        <h3>Thời gian khóa học </h3><input type="text" name="duration" value="<?= $edit['duration']?>" >
        <h3>Giá khóa học </h3><input type="date" name="price" value="<?= $edit['price']?>" >   
        <br><br>
        <input type="submit" value="Sửa tin tức" name="btn_edit">
    </form>
</body>
</html>
