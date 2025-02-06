<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            padding: 4px 20px;  /* Căn chỉnh padding cho các ô trong bảng */
        }
    </style>
</head>
<body>
<h1>Khóa học online </h1><br>
<a href="?act=add">Thêm sản phẩm</a>
<table class="table" border=1>
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên khóa học</th>
      <th scope="col">Hình ảnh thu nhỏ </th>
      <th scope="col">Giảng viên </th>
      <th scope="col">Thời gian khóa học </th>
      <th scope="col">Giá khóa học</th>
      <th scope="col">Sửa </th>
      <th scope="col">Xóa </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($courses as $key => $course) : ?>
    <tr>
      <th><?= $key + 1 ?></th>
      <td><?= $course['name'] ?></td>
      <td>
        <img src="public/image/<?= $course['thumbnail'] ?>" alt="" style="width: 100px; height: 100px;">
      </td>
      <td><?= $course['instructor'] ?></td>
      <td><?= $course['duration'] ?></td>
      <td><?= $course['price'] ?></td>
      <td><a href="?act=edit&id=<?php echo $course['id'] ?>">Sửa</a></td>
      <td><a onclick="return confirm('Bạn có muốn xóa không ?')" href="?act=delete&id=<?php echo $course['id'] ?>">Xóa</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>
