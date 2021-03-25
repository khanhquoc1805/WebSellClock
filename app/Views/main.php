<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
	<title>Quoc's watch</title>
</head>
<body>
	<div id="tieude">
		<tr>
			<th><a href="/dongho/donghonam" class="tieude">Đồng Hồ Nam</a></th>
			<th><a href="" class="tieude">Đồng Hồ Nữ</a></th>
			<th><a href="" class="tieude">Đồng Hồ Cặp</a></th>
		</tr>
	</div>
	<div id="donghonam">
		<h2>ĐỒNG HỒ NAM</h2>
	</div>
	<div class="dsdongho">
		<?php for ($i = 0; $i < count($dsdongho); $i++): ?>
			<?php if ($dsdongho[$i]['madongho'][0] !== 'n'): ?>
			<div class='khunghinh'>
				<img class="khungsanpham"src="<?php echo $dsdongho[$i]['image'] ?>" alt="">
				<h3>
					<a class="tendongho" href="/dongho/info/<?php echo $dsdongho[$i]['madongho'] ?>">
						<?php echo $dsdongho[$i]['tendongho'] ?>
					</a>
				</h3>
				<p class="gia"><?php echo $dsdongho[$i]['gia'] ?> đ</p>
				<button type="button" class="btn btn-danger">Mua Ngay</button>
			</div>
			<?php endif;?>
		<?php endfor;?>
	</div>
	<img src="https://www.donghotot.com.vn/Data/upload/images/Adv/Banner_Home/Banner_LuxuryCollection(1).jpg"alt="">
	<div id="donghonu">
		<h2>ĐỒNG HỒ NỮ</h2>
	</div>
	<div class="dsdongho">
		<?php for ($i = 0; $i < count($dsdongho); $i++): ?>
			<?php if ($dsdongho[$i]['madongho'][0] === 'n'): ?>
			<div class="khunghinh">
				<img class="khungsanpham" src="<?php echo $dsdongho[$i]['image'] ?>" alt="">
				<h3>
					<a href="/dongho/info/<?php echo $dsdongho[$i]['madongho'] ?>">
						<?php echo $dsdongho[$i]['tendongho'] ?>
					</a>
				</h3>
				<p class="gia"><?php echo $dsdongho[$i]['gia'] ?> đ</p>
				<button type="button" class="btn btn-danger">Mua Ngay</button>	
			</div>
			<?php endif;?>
		<?php endfor;?>
	</div>
	<img id="banner1" src="hinhnen3.jpg" alt="">

	<footer>
		<div id="foot1">
			<div class="foot11">1900 1080 <br> TỨ VẤN BÁN HÀNG</div>
			<div class="foot11">0939 534 770 <br> HỖ TRỢ DỊCH VỤ</div>
			<div class="foot11">079 999 9779 <br>
			 TƯ VẤN KỸ THUẬT</div>
		</div>
		<div class="foot2">
			<div class="foot21">MỘT ĐỔI 1 TRONG VÒNG 30 NGÀY NẾU LÀ LỖI NHÀ SẢN XUẤT</div>
		</div>
		<div class="foot2">
			<div class="foot21">FREESHIP TOÀN QUỐC</div>
		</div>
		<div class="foot2">
			<div class="foot21">BẢO HÀNH 5 NĂM</div>
		</div>
	</footer>
</body>


</html>