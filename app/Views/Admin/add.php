<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="../admin.css">
	<title>Quoc's watch - Add product</title>
</head>
<body>
    <?php if (isset($ketqua)): ?>
        <div class="alert alert-primary">
            Đã thêm thành công.
        </div>
    <?php endif; ?>
    <form action="/admin/add_product" method="post">
        Mã sản phẩm: <input class="form-control" type="text" name="masanpham"><br />
        Tên sản phẩm: <input class="form-control" type="text" name="tensanpham"><br />
        Giá: <input class="form-control" type="number" name="gia"><br />
        Link hình ảnh: <input class="form-control" type="text" name="hinhanh">
        <button class="btn btn-danger" type="submit">Xong</button>
    </form>
</body>
</html>