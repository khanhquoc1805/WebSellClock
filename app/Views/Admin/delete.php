<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Quoc's watch - Admin: Delete product</title>
    <link rel="stylesheet" href="../delete.css">
</head>
<body>
	<?php if (isset($_GET['status'])): ?>
        <div class="alert alert-primary">
            Đã xóa thành công đồng hồ.
        </div>
    <?php endif; ?>
    <div class="dsdongho">
		<?php for ($i = 0; $i < count($dsdongho); $i++): ?>
			<div class="khunghinh">
				<img class="khungsanpham" src="<?php echo $dsdongho[$i]['image'] ?>" alt="">
				<h3>
					<a href="/dongho/info/<?php echo $dsdongho[$i]['madongho'] ?>">
						<?php echo $dsdongho[$i]['tendongho'] ?>
					</a>
				</h3>
				<p class="gia"><?php echo $dsdongho[$i]['gia'] ?> đ</p>
				<a href="/admin/delete_product/<?php echo $dsdongho[$i]['madongho'] ?>" type="button" class="btn btn-danger">Xóa</a>	
			</div>
		<?php endfor;?>
	</div>
</body>
</html>