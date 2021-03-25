<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dongho['tendongho'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <style>
        .card-container {
            margin: 0 auto;
            width: 75vw;
            padding: 10px;
            height: 500px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .card {
            border: none;
        }

        .middle-card {
            margin: 0 8px;
        }

    </style>
</head>
<body>
    <h2>Thông tin đồng hồ</h2>
    <div class="card-container">
        <div class="left-card card">
            <img src="<?php echo $dongho['image'] ?>" alt="">
        </div>
        <div class="middle-card card">
            <h2><?php echo $dongho['tendongho'] ?></h2>
            <p>Giá: <?php echo $dongho['gia'] ?></p>
            <button style="width: 50%;" class="btn btn-primary">Mua ngay</button>
        </div>
        <div class="right-card card"></div>
    </div>    
</body>
</html>