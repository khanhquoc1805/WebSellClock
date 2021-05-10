<!DOCTYPE html>

<html class="no-js">
<?php echo view("header.php") ?>


<section id="home" class="home-page-content page-content">
    <section class="homepage-slider">
        <div class="container-fluid">
            <div class="row">
                <section class="homepage-slider">
                    <div class="homeCarousel flexslider" data-animation="fade" data-slideshowspeed="4000">
                        <ul class="slides">
                            <li class="flex-active-slide" style="
                                        width: 100%;
                                        float: left;
                                        margin-right: -100%;
                                        position: relative;
                                        opacity: 1;
                                        display: block;
                                        z-index: 2;
                                    ">
                                <a href=""><img src="slide2.jpg" alt="" draggable="false" /></a>
                            </li>
                            <li style="
                                        width: 100%;
                                        float: left;
                                        margin-right: -100%;
                                        position: relative;
                                        opacity: 0;
                                        display: block;
                                        z-index: 1;
                                    ">
                                <a href=""><img src="./hinhnen.jpg" alt="" draggable="false" /></a>
                            </li>
                        </ul>
                        <ul class="flex-direction-nav">
                            <li class="flex-nav-prev">
                                <a class="flex-prev" href="">Previous</a>
                            </li>
                            <li class="flex-nav-next">
                                <a class="flex-next" href="">Next</a>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </section>
    

    <section class="products-section" id="dhnam">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghonam">Đồng Hồ Nam</span>
                </h2>
            </div>

            <div class="product-items product-items-4" data-itemsheight="400">
                <div id="carousel-sellers" class="carousel slide">
                    <?php $temp1=0; ?>
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'Nam') && $temp1 < 8): ?>
                    <?php $temp1 = $temp1 + 1; ?>
                    <div class="product-item" data-catalogid="18" data-ajaxcart="1"
                        data-addcart-callback="addcart_callback" style="height: 400px">
                        <div class="img" style="height:277px !important">
                            <img src="<?php echo $dsdongho[$i]['image'] ?>" alt="Wireless Headphones"
                                    class="img-responsive" style="width: 100% !important; height: 100% !important"/>
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem"><button type="button" class="btn btn-default btn-lg" id="btnxemthemdhnam" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Xem Tất Cả</button></div>
        </div>
    </section>



    <section class="products-section hidden" id="dhnamdaydu">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghonam">Đồng Hồ Nam</span>
                </h2>
            </div>

            <div class="product-items product-items-4">
                <div id="carousel-sellers" class="carousel slide">
                    
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'Nam')): ?>
                    
                    <div class="product-item"
                        style="height: 400px !important">
                        <div class="img" style="height: 277px !important">
                            
                                <img src="<?php echo $dsdongho[$i]['image'] ?>" alt="Wireless Headphones"
                                    class="img-responsive" style="width: 100% !important; height: 100% !important"/>
                            
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem" id="dhnamthugon"><button type="button" class="btn btn-default btn-lg" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Thu Gọn</button></div>
        </div>
    </section>

    <div class="block-strengths-1">
        <div style="display: flex; margin-left: 1.5em">
            <div style="width:6em;">
                <svg x="0px" y="0px" viewBox="0 0 185.19 185.19" style="enable-background:new 0 0 185.19 185.19;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:#100F15;}
                    </style>
                        <g>
                            <g>
                                <path class="st0" d="M164.01,151.54c13.23-16.01,21.18-36.55,21.18-58.95c0-51.14-41.46-92.6-92.6-92.6S0,41.46,0,92.6    c0,51.14,41.46,92.6,92.6,92.6c11.28,0,22.09-2.02,32.09-5.72l-10.66-6.75c-6.84,1.83-14.02,2.8-21.43,2.8    c-45.8,0-82.93-37.13-82.93-82.93c0-45.8,37.13-82.94,82.93-82.94s82.93,37.14,82.93,82.94c0,13.62-3.29,26.47-9.1,37.81    C166.15,135.56,165.5,143.12,164.01,151.54z"></path>
                                <g>
                                    <g>
                                        <path class="st0" d="M58.81,101.63l0.03-0.01c-0.01,0-0.02-0.01-0.03-0.01C58.82,101.61,58.81,101.62,58.81,101.63"></path>
                                        <path class="st0" d="M100.2,116.28l5.64,5.19c0.32,0.29,0.82,0.21,1.02-0.17l24.55-44.5c0.16-0.3,0.08-0.67-0.21-0.86l-6.22-4.2      c-0.18-0.13-0.41-0.15-0.61-0.07l-3.77,1.49l2.09,1.31c0,0-4.19,16.84-22.56,40.93C99.92,115.67,99.95,116.06,100.2,116.28"></path>
                                        <path class="st0" d="M102.23,108.92c-0.17,0.24-0.26,0.37-0.26,0.37S102.28,109.32,102.23,108.92"></path>
                                        <path class="st0" d="M59.88,68.03c0,0,1.54,9.49,2.95,12.22c0.16,0.31,0.32,0.54,0.47,0.65c1.5,1.1,2.7,1.41,2.87,4.21      c0.02,0.4,0.08,0.94,0.14,1.54c0.43,3.58,1.59,9.92,2.42,10.24c1.98,0.75,5.63-1.75,5.63-1.75L76,98.9l1.63-0.34l0.65,3.12      c0,0,2.34-1.63,3.57,0.81c1.22,2.43,1.7,7.43,6.03,5.81c4.33-1.62,6.66-8.05,11.16-3.48c2.49,2.53,3.11,3.63,3.18,4.11      c2.02-2.91,15.25-22.22,18.15-33.94c0,0-4.05-8.49-5.32-18.56c-1.26-10.07-5.81-27.31-27.81-24.59      c-17.79,2.21-28.53,13.78-33.75,23.94C48.26,65.95,55.56,67.67,59.88,68.03"></path>
                                        <path class="st0" d="M83.72,122.8c0,0-2.77-5.87-5.87-7.79c-3.1-1.93-7.17-4.85-9.71-8.35c-2.54-3.51-5.58-7.32-6.03-3.43      c-0.25,2.21,0.48,4.19,1.31,5.62l-0.74-0.92l-2.38-6.14c0.05-0.01,0.11-0.02,0.17-0.04c2.38-0.93,2.09-7.41-0.66-14.49      c-2.76-7.08-6.92-12.07-9.31-11.14c-0.48,0.19-0.86,0.62-1.12,1.22c2.38,1.05,5.47,5.35,7.66,10.99      c2.2,5.64,2.82,10.9,1.78,13.27c0.01,0,0.02,0.01,0.03,0.01l-0.03,0.01c0-0.01,0.01-0.02,0.01-0.03      c-2.37-1.05-5.46-5.35-7.66-10.99c-2.2-5.64-2.82-10.89-1.78-13.27c-0.6-0.27-1.16-0.33-1.64-0.14      c-2.39,0.93-2.09,7.42,0.66,14.49c2.75,7.08,6.92,12.06,9.31,11.13c0.03-0.01,0.06-0.04,0.08-0.05l2.9,7.45      c0,0-3.26-1.65-4.67-0.96c-1.32,0.64-2.5,3.63-1.55,4.94c0.96,1.31,1.59,1.46,1.59,1.46s-1.76,0.21-2.4,0.75      c-0.63,0.54-2.38,3.45-0.57,4.71c1.8,1.25,1.79,1.11,1.79,1.11s-1.53,2.14-0.97,3.57c0.55,1.43,2.88,2.76,3.11,2.67      c0,0-0.18,2.86,1.33,3.88c1.51,1.02,3.64,2.91,12.98,3.33c1.41-0.1,4.7,0.41,4.7,0.41l-0.73,3.27l4.4,2.22l0.05,1l9.78-16.17      L83.72,122.8z"></path>
                                        <path class="st0" d="M160.16,103.84c-0.2-3.9-5.26-9.08-7.5-11.02c-0.12-0.1-0.24-0.19-0.37-0.28l-17.34-10.88      c-1.48-0.93-3.43-0.42-4.28,1.11l-22.6,40.99l-0.26,0.48c-0.63,1.15-0.46,2.57,0.44,3.53l16.95,18.19l0.16,0.17l3.63,3.89      l-2.23-1.34l-3.12-1.87l-5.99-3.59l-23.14-13.9c-1.44-0.86-3.3-0.4-4.17,1.03l-7.57,12.52c-0.83,1.37-0.46,3.14,0.85,4.06      l3.98,2.8l29.5,20.73l8.23,5.78l10.55,7.41c0.56,0.39,1.22,0.58,1.9,0.55l13.92-0.68c1.41-0.07,2.6-1.11,2.84-2.51l4.87-27.62      l0.86-4.87l1.68-9.55c0.42-2.37,0.54-4.77,0.35-7.16L160.16,103.84z"></path>
                                    </g>
                                    <g>
                                        <rect x="90.48" y="17.49" class="st0" width="3.37" height="8.99"></rect>
                                        <rect x="90.48" y="158.56" class="st0" width="3.37" height="8.99"></rect>
                                    </g>
                                    <g>
                                        <rect x="55.21" y="26.94" transform="matrix(0.866 -0.5 0.5 0.866 -8.0923 32.6582)" class="st0" width="3.37" height="8.99"></rect>
                                    </g>
                                    <g>
                                        <rect x="29.39" y="52.75" transform="matrix(0.5 -0.866 0.866 0.5 -34.0389 55.5372)" class="st0" width="3.37" height="8.99"></rect>
                                    </g>
                                    <g>
                                        <rect x="17.13" y="90.83" class="st0" width="8.99" height="3.37"></rect>
                                        <rect x="158.21" y="90.83" class="st0" width="8.99" height="3.37"></rect>
                                    </g>
                                    <g>
                                        <rect x="26.58" y="126.1" transform="matrix(0.866 -0.5 0.5 0.866 -59.7277 32.6582)" class="st0" width="8.99" height="3.37"></rect>
                                        <rect x="148.76" y="55.56" transform="matrix(0.866 -0.5 0.5 0.866 -8.0923 84.2937)" class="st0" width="8.99" height="3.37"></rect>
                                    </g>
                                    <g>
                                        
                                            <rect x="52.4" y="151.92" transform="matrix(0.5 -0.866 0.866 0.5 -104.5743 126.0726)" class="st0" width="8.99" height="3.37"></rect>
                                        
                                            <rect x="122.94" y="29.75" transform="matrix(0.5 -0.866 0.866 0.5 36.4964 126.0726)" class="st0" width="8.99" height="3.37"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">CHUYÊN GIA THẨM ĐỊNH <br>Đồng Hồ Thật Giả</span>
        </div>


        <div style="display: flex">
            <div style="width:5em">
                <svg x="0px" y="0px" viewBox="0 0 140.41 216.39" style="enable-background:new 0 0 140.41 216.39;" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path d="M116.76,40.08l-4.32,14.57l18.43-7.69v106.41c0,9.5-5.06,18.28-13.29,23.04l-47.37,27.34l-47.38-27.34     c-8.23-4.75-13.29-13.53-13.29-23.04V46.96l50.61,21.13l2.92-11.55L0,30.21v127.88c0,11,5.87,21.15,15.39,26.65l54.82,31.65     l54.81-31.65c9.52-5.5,15.39-15.65,15.39-26.65V30.21L116.76,40.08z"></path>
                            </g>
                        </g>
                        <g>
                            <path d="M71.68,197.34l-36.02-19.88L72.31,40.47H42.42L121.66,0L71.68,197.34z"></path>
                        </g>
                    </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">ĐƠN VỊ SỐ 1 VỀ<br>Bảo hành, Hậu mãi</span>
            

        </div>
        
        <div style="display: flex">
            <div style="width:6em">
                <svg x="0px" y="0px" viewBox="0 0 181.9 167.98" style="enable-background:new 0 0 181.9 167.98;" xml:space="preserve">
                    <g>
                        <path d="M101.68,28.7c-7.97,0.81-14.57,3.7-19.78,8.69c-5.22,4.98-8.4,11.6-9.53,19.85c-1.24,8.73,0.08,15.44,3.95,20.14   c3.86,4.7,10.28,8.9,19.25,12.6c4.13,2.37,6.84,4.67,8.15,6.9s1.67,5.46,1.1,9.68c-0.57,3.89-1.87,7.04-3.91,9.43   c-2.04,2.39-4.74,3.59-8.11,3.59c-3.89,0-6.78-1.27-8.65-3.81c-1.88-2.54-2.34-7.03-1.39-13.49h-20   c-1.47,10.15,0.02,17.86,4.48,23.13c4.46,5.27,10.51,8.37,18.15,9.32l-1.51,11.11c3.37,0.74,6.78,1.21,10.2,1.39l1.7-12.43   c8.02-0.81,14.57-3.62,19.68-8.43c5.1-4.82,8.25-11.47,9.43-19.96c1.23-8.68-0.1-15.49-3.98-20.43c-3.89-4.93-10.22-9.11-19-12.52   c-4.27-2.66-7.06-5.05-8.36-7.19c-1.31-2.13-1.67-5.12-1.1-8.97c0.57-3.94,1.78-7.12,3.63-9.54c1.85-2.42,4.36-3.63,7.54-3.63   c3.23,0,5.54,1.35,6.94,4.05c1.4,2.71,1.72,6.81,0.96,12.31h20c1.19-8.73-0.01-15.84-3.59-21.35c-3.58-5.51-8.91-8.9-15.98-10.18   l0.94-6.53c-3.27-0.83-6.63-1.42-10.06-1.71L101.68,28.7z"></path>
                        <path d="M33.11,63.9c0.09-0.28,0.17-0.57,0.27-0.85c2.89-9.14,7.58-17.44,13.94-24.66c1.57-1.78,4.84-4.47,4.98-4.58   c23.49-21.59,58.39-24.18,84.77-6.2c14.55,9.91,24.59,24.91,28.28,42.24c1.73,8.15,1.98,16.45,0.73,24.68   c-0.43,2.86-1.09,5.82-1.95,8.79l-0.14,0.48c-0.21,0.73-0.43,1.46-0.67,2.18c-0.13,0.39-0.28,0.8-0.44,1.2l-0.22,0.59   c-0.35,0.94-0.72,1.86-1.1,2.77c-3.23,7.63-7.75,14.54-13.45,20.55c-13.08,13.79-30.67,21.38-49.53,21.38   c-2.05,0-4.08-0.09-6.09-0.28c-3.43-0.31-6.78-0.92-10.06-1.73c-25.15-6.19-45.43-26.46-50.85-52.73l-0.61-2.98h18.3L24.62,70.05   L0,94.77h15.5l0.32,2.11c3.41,23.06,16.31,43.74,35.38,56.74c34.35,23.4,81.28,17.67,109.16-13.34v0c0,0,3.33-4.09,4.98-6.31   c3.71-4.96,6.86-10.33,9.37-15.95c0.53-1.2,1.05-2.41,1.53-3.63c0.34-0.87,0.66-1.74,0.97-2.62c0.65-1.85,1.27-3.72,1.78-5.61   l0.17-0.67c0.65-2.44,1.19-4.88,1.62-7.29l0.34-2.95c0.36-2.69,0.59-5.43,0.68-8.12l0.09-1.03l-0.08-1.36   c0.01-3.7-0.19-7.27-0.61-10.77L181,70.51C174.71,30.41,139.27,0,98.57,0C72.38,0,48.19,12.09,32.2,33.17   c-3.77,4.97-6.93,10.18-9.38,15.48c-1.36,2.94-2.59,6.2-3.79,9.98c-0.36,1.15-0.69,2.27-1,3.36l6.58-6.61L33.11,63.9z"></path>
                    </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">ĐỀN GẤP 10 <br>Nếu Phát Hiện Giả</span>
            
        </div>
        




    </div>

    <section class="products-section" id="dhnu">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghonu">Đồng Hồ Nữ</span>
                </h2>
            </div>

            <div class="product-items product-items-4" data-itemsheight="400">
                <div id="carousel-sellers" class="carousel slide">
                    <?php $temp=0; ?>
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'Nữ') && $temp < 8): ?>
                    <?php $temp = $temp + 1; ?>
                    <div class="product-item"
                        style="height: 400px">
                        <div class="img" style="height: 277px">
                            
                                <img src="<?php echo $dsdongho[$i]['image'] ?>" alt="Wireless Headphones"
                                    class="img-responsive" style="width: 100% !important; height: 100% !important" />
                            
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem" id="dhnuxemthem"><button type="button" class="btn btn-default btn-lg" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Xem Tất Cả</button></div>
        </div>
    </section>





    <section class="products-section hidden" id="dhnudaydu">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghonu">Đồng Hồ Nữ</span>
                </h2>
            </div>

            <div class="product-items product-items-4">
                <div id="carousel-sellers" class="carousel slide">
                    
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'Nữ')): ?>
                    <div class="product-item" 
                        style="height: 400px">
                        <div class="img" style="height: 277px ">
                        
                                <img src="<?php echo $dsdongho[$i]['image'] ?>" alt="Wireless Headphones"
                                    class="img-responsive" class="img-responsive" style="width: 100% !important; height: 100% !important"/>
                            
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem" id="dhnuthugon"><button type="button" class="btn btn-default btn-lg" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Thu Gọn</button></div>
        </div>
    </section>


    <div class="block-strengths-1">
        <div style="display: flex; margin-left: 1.5em">
            <div style="width:6em;">
                <svg x="0px" y="0px" viewBox="0 0 186.61 160.29" style="enable-background:new 0 0 186.61 160.29;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M92.34,145.82c-30.88,0-57.83-22.02-64.09-52.35l-0.59-2.85H47.1L23.55,66.99L0,90.63h13.17l0.31,2    c6.04,38.57,39.94,67.66,78.86,67.66c36.62,0,67.9-24.54,77.11-59.38l-6.4,6.42l-8.1-8.13    C146.65,126.85,121.47,145.82,92.34,145.82"></path>
                            <path d="M171.2,67.66C165.17,29.09,131.26,0,92.34,0C55.12,0,22.93,26.14,14.61,61.93l8.94-8.97l6.63,6.66    c8.77-26.78,33.78-45.15,62.17-45.15c30.88,0,57.83,22.02,64.08,52.35l0.59,2.85h-17.5l23.55,23.64l23.55-23.64h-15.09    L171.2,67.66z"></path>
                        </g>
                        <g>
                            <path d="M86.79,157.04l-26.78-7.88l24.54-92.43H63.02l57.09-29.16L86.79,157.04z"></path>
                        </g>
                    </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">CHUYÊN GIA THẨM ĐỊNH <br>Đồng Hồ Thật Giả</span>
        </div>


        <div style="display: flex">
            <div style="width:8em">
                <svg x="0px" y="0px" viewBox="0 0 277.1 146.9" style="enable-background:new 0 0 277.1 146.9;" xml:space="preserve">
                    <style type="text/css">
                        .th1{fill:none;stroke:#000000;stroke-width:9;stroke-linecap:round;stroke-miterlimit:10;}
                        .th2{fill:#100F15;}
                    </style>
                    <g>
                        <path class="th1" d="M137.3,106.7h50.3c6,0,10.8-4.8,10.8-10.8V15.3c0-6-4.8-10.8-10.8-10.8H58.2c-6,0-10.8,4.8-10.8,10.8v5.5"></path>
                        <path class="th1" d="M198.8,27.4h37.8c4.7,0,9,2.6,11.2,6.7l24.9,46.9v33.7c0,3.9-3.2,7.1-7.1,7.1h-19.7"></path>
                        <path class="th1" d="M48.4,108.6v8c0,3.7,3,6.7,6.7,6.7h30.3"></path>
                        <line class="th1" x1="127.8" y1="122.8" x2="202.1" y2="122.8"></line>
                        <path class="th1" d="M250.2,45.1H224v30.3c0,6.1,4.9,11,11,11h37.6"></path>
                        <circle class="th1" cx="222.9" cy="122.2" r="20.2"></circle>
                        <circle class="th1" cx="222.9" cy="122.2" r="6.6"></circle>
                        <circle class="th1" cx="106.7" cy="122.2" r="20.2"></circle>
                        <circle class="th1" cx="106.7" cy="122.2" r="6.6"></circle>
                        <g>
                            <g>
                                <path d="M103.9,48.1H91.8l-2.7,13.3h-7.6l6.6-33.1H110l-1.2,5.9H94.6l-1.6,8h12.1L103.9,48.1z"></path>
                                <path d="M115.6,48.7l-2.5,12.7h-7.6l6.6-33.1h12c3.4,0,6,0.9,7.8,2.7c1.9,1.8,2.5,4.2,1.9,7.2c-0.4,1.8-1.1,3.4-2.2,4.6     c-1.1,1.2-2.5,2.2-4.4,2.9c1.7,0.6,2.9,1.6,3.5,3c0.6,1.4,0.7,3,0.4,4.9l-0.4,2.1c-0.2,0.9-0.3,1.9-0.2,3c0,1.1,0.3,1.9,0.8,2.3     l-0.1,0.5h-7.8c-0.5-0.5-0.7-1.3-0.6-2.4c0.1-1.2,0.2-2.3,0.4-3.4l0.4-2c0.3-1.7,0.2-2.9-0.3-3.7c-0.5-0.8-1.5-1.2-3-1.2H115.6z      M116.8,42.8h4.5c1.2,0,2.2-0.4,3.1-1.1c0.9-0.7,1.5-1.7,1.7-3c0.3-1.4,0.1-2.5-0.4-3.3c-0.6-0.8-1.5-1.2-2.8-1.2h-4.4     L116.8,42.8z"></path>
                                <path d="M156.5,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L156.5,47.2z"></path>
                                <path d="M181.3,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L181.3,47.2z"></path>
                            </g>
                            <g>
                                <path d="M97.8,66.1c-1.4-1.3-3.4-2-5.9-2c-2.4,0-4.5,0.6-6.2,1.7c-1.7,1.1-2.8,2.7-3.2,4.8c-0.4,2,0,3.6,1.3,4.9     c1.3,1.3,3.2,2.4,5.9,3.4c1.4,0.6,2.4,1.2,2.8,1.6c0.5,0.5,0.6,1.2,0.4,2.2c-0.1,0.6-0.5,1.1-1.1,1.5c-0.4,0.3-0.9,0.5-1.4,0.5     c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.4,0c-0.2,0-0.4,0-0.7,0H81c0.3,1,0.8,1.9,1.8,2.5c1.7,1.2,3.8,1.8,6.2,1.8     c2.5,0,4.6-0.5,6.3-1.6c1.7-1.1,2.8-2.7,3.2-4.8c0.4-2.1,0.1-3.8-1-5.1c-1.1-1.3-2.9-2.4-5.3-3.2c-1.8-0.7-3-1.3-3.6-1.7     c-0.5-0.4-0.7-1.1-0.5-2c0.1-0.6,0.5-1,1.1-1.5c0.6-0.4,1.2-0.6,1.9-0.6c1,0,1.7,0.3,2.2,0.9c0.5,0.6,0.7,1.4,0.5,2.3h5.4l0-0.1     C99.7,69.2,99.3,67.4,97.8,66.1z"></path>
                                <path d="M118.6,88.7h-5.6l2-9.8h-7.9l-2,9.8h-5.6l4.9-24.3h5.6l-2,10.2h7.9l2-10.2h5.6L118.6,88.7z"></path>
                                <path d="M128,88.7h-5.6l4.9-24.3h5.6L128,88.7z"></path>
                                <path d="M139.1,80.4l-1.7,8.3h-5.6l4.9-24.3h9.3c2.5,0,4.5,0.7,5.9,2.2c1.4,1.5,1.8,3.4,1.4,5.7c-0.5,2.5-1.7,4.5-3.5,5.9     c-1.8,1.4-4.1,2.1-6.9,2.1H139.1z M140,76h3.8c1,0,1.9-0.3,2.6-1c0.7-0.7,1.2-1.5,1.4-2.6c0.2-1.1,0.1-2-0.3-2.7     c-0.4-0.7-1.2-1-2.3-1h-3.7L140,76z"></path>
                                <path d="M90.4,84.7L90.4,84.7l-0.2,0C90.3,84.7,90.3,84.7,90.4,84.7z"></path>
                            </g>
                            <g>
                                <path class="th2" d="M49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7s12.9,28.7,28.7,28.7C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5      M49.1,82.3C35.3,82.3,24,71,24,57.2c0-13.8,11.3-25.1,25.1-25.1c13.8,0,25.1,11.3,25.1,25.1C74.2,71,62.9,82.3,49.1,82.3"></path>
                                <polygon class="th2" points="62.7,82.3 52.9,72.6 28.7,96.7 12.4,96.7 56.3,52.8 85.8,82.3    "></polygon>
                                <path class="th2" d="M49.1,85.9C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7S33.3,85.9,49.1,85.9      M49.1,32.1c13.8,0,25.1,11.3,25.1,25.1c0,13.8-11.3,25.1-25.1,25.1C35.3,82.3,24,71,24,57.2C24,43.4,35.3,32.1,49.1,32.1"></path>
                                <polygon class="th2" points="35.6,32.1 45.4,41.8 69.5,17.7 85.8,17.7 41.9,61.6 12.4,32.1    "></polygon>
                            </g>
                        </g>
                        <line class="th1" x1="4.5" y1="106.7" x2="76.8" y2="106.7"></line>
                    </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">ĐƠN VỊ SỐ 1 VỀ<br>Bảo hành, Hậu mãi</span>
            

        </div>
        
        <div style="display: flex">
            <div style="width:6em">
                <svg x="0px" y="0px" viewBox="0 0 198.9 199.07" style="enable-background:new 0 0 198.9 199.07;" xml:space="preserve">
                    <g>
                        <path d="M50.53,47.99l-1.71-6.38l2.6,1.57c7.04-4.38,14.67-7.54,22.72-9.42l4.32-17.55h25.94l4.32,17.55   c8.05,1.87,15.68,5.04,22.72,9.42l15.47-9.36l3.28,3.28l-26.79,26.79l-0.93-0.65c-9.14-6.4-19.87-9.78-31.04-9.78   c-11.32,0-21.83,3.49-30.53,9.45L48.25,50.26L50.53,47.99z"></path>
                        <path d="M26.97,67.63l-1.21-2l5.63,1.51l2.27-2.27l12.72,12.72c-5.76,8.61-9.13,18.94-9.13,30.06c0,11.17,3.38,21.9,9.78,31.04   c3.61,5.15,8.04,9.6,13.17,13.23c9.18,6.49,19.98,9.91,31.22,9.91c29.88,0,54.18-24.3,54.18-54.18c0-11.25-3.43-22.05-9.91-31.22   l-0.66-0.93l26.77-26.77l3.44,3.44l-9.37,15.47c4.38,7.04,7.54,14.67,9.42,22.72l17.55,4.32v25.94l-17.55,4.32   c-1.88,8.05-5.04,15.69-9.42,22.72l9.37,15.47l-18.34,18.34l-15.47-9.36c-7.04,4.38-14.67,7.55-22.72,9.42l-4.32,17.55H78.46   l-4.31-17.55c-8.05-1.87-15.68-5.04-22.72-9.42l-15.47,9.36l-18.34-18.34l9.37-15.47c-4.38-7.04-7.54-14.67-9.42-22.72L0,120.61   V94.67l17.55-4.32C19.43,82.3,22.59,74.67,26.97,67.63"></path>
                        <path d="M4.95,31.7l14.53,14.53c0.76,0.76,1.99,0.76,2.75,0l7.4-7.4c0.76-0.76,0.76-1.99,0-2.75L15.1,21.56l3.22-3.21l22.64,6.07   l6.07,22.64l-3.22,3.22l42.46,42.46c1.62-0.56,3.35-0.88,5.16-0.88c2.45,0,4.76,0.57,6.82,1.57L167,24.66l-2.72-2.72l4.64-17.31   L186.23,0l3.3,3.3l-11.12,11.12c-0.58,0.58-0.58,1.52,0,2.1l3.97,3.97c0.58,0.58,1.52,0.58,2.1,0L195.6,9.36l3.3,3.3l-4.64,17.31   l-17.31,4.64l-2.72-2.72l-68.69,68.69c1.06,2.12,1.68,4.51,1.68,7.05c0,8.72-7.07,15.79-15.79,15.79   c-8.72,0-15.79-7.07-15.79-15.79c0-1.59,0.24-3.12,0.68-4.57L33.66,60.41l-3.21,3.21L7.81,57.56L1.74,34.92L4.95,31.7z"></path>
                    </g>
                </svg>
            </div>
            <span style="font-size: 20px; text-transform: uppercase; font-style: italic; margin-left: 1em; margin-top:0.8em">ĐỀN GẤP 10 <br>Nếu Phát Hiện Giả</span>
            
        </div>
        




    </div>

    <section class="products-section" id="dhcd">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghocapdoi">Đồng Hồ Cặp Đôi</span>
                </h2>
            </div>

            <div class="product-items product-items-4">
                <div id="carousel-sellers" class="carousel slide">
                    <?php $temp2=0; ?>
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'cd') && $temp2 < 8): ?>
                    <?php $temp2 = $temp2 + 1; ?>
                    <div class="product-item"
                        style="height: 400px">
                        <div class="img" style="height: 277px">
                            
                                <img src="<?php echo $dsdongho[$i]['image'] ?>" alt=""
                                    class="img-responsive" style="width: 100% !important; height: 100% !important"/>
                           
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem" id="dhcdxemthem"><button type="button" class="btn btn-default btn-lg" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Xem Tất Cả</button></div>
        </div>
    </section>





    <section class="products-section hidden" id="dhcddaydu">
        <div class="container">
            <div class="row">
                <h2 class="header-specials">
                    <span style="color: red" id="donghocapdoi">Đồng Hồ Cặp Đôi</span>
                </h2>
            </div>

            <div class="product-items product-items-4">
                <div id="carousel-sellers" class="carousel slide">
                    
                    <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                    <?php if (($dsdongho[$i]['phai'] === 'cd')): ?>
                   
                    <div class="product-item"
                        style="height: 400px">
                        <div class="img" style="height: 277px">
                            
                                <img src="<?php echo $dsdongho[$i]['image'] ?>" alt=""
                                    class="img-responsive" style="width: 100% !important; height: 100% !important"/>
                            
                            <button class="quickview" data-toggle="modal" data-idhanghoa=<?= $dsdongho[$i]['idhanghoa'] ?>>
                                Quick View
                            </button>
                        </div>
                        <div class="name">
                            <a href="">
                                <?php  echo $dsdongho[$i]['tenhanghoa'] ?>
                            </a>
                        </div>
                        <div class="price">
                            <span class="sale-price">
                                <?php  echo number_format($dsdongho[$i]['gia'],0,"",".") ?> VND 
                            </span>
                            <span class="on-sale-badge">Sale</span>
                        </div>
                        <div class="status">
                            <span class="availability">In Stock.</span>
                        </div>
                        <div class="action">
                            <a href="" class="add-to-cart btn btn-default"
                                data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>">
                                <span class="buyitlink-text">Add To Cart</span>
                                <span class="ajaxcart-loader icon-spin2 animate-spin"></span>
                                <span class="ajaxcart-added icon-ok"></span>
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="xemthem" id="dhcdthugon"><button type="button" class="btn btn-default btn-lg" style="width:35%; border-color: black; background-color: #fff; color: black;"><i></i>Thu Gọn</button></div>
        </div>
    </section>




    

    
</section>



<div class="container" style="
            padding-left: 10px;
            padding-right: 10px;
            width: 1170px;
            max-width: 100%;
            box-sizing: border-box;
            margin: 0px auto;
        ">
    <div class="" id="block_id_132">
        <div class="block-body-colllection">
            <div class="collection-1 cls" style="display:flex; position: relative">
                <div class="item-special item-cl" style="position: absolution; top: 0">

                    <img class="lazy" alt="Đồng hồ dành cho nam"
                        src="./images/banner/bst-dong-ho-cho-nam_1562154973.jpg" style="display: inline-block" />

                    <div class="name-collection"
                        style="position: absolute; top: 0; display: flex; justify-content: center; height: 100%; align-items: center; width: 67%;">
                        <a style="padding: 1em 2em; background-color: #ca2929bf; color: #fff; text-decoration:none"
                            href="#donghonam" class="linkloaidongho">ĐỒNG HỒ DÀNH CHO NAM</a>
                    </div>
                </div>
                <div class="item-normal item-cl" style="position: relative">
                    <div class="item-normal-ct" style="position: absolution;  top: 0; bottom: 0">

                        <img class="lazy" alt="Đồng hồ dành cho nữ" src="/images/banner/bst-danh-cho-nu_1562151982.jpg"
                            style="display: inline-block" />
                        <div class="name-collection"
                            style="position: absolute; display: flex; justify-content: center; top: 0; height: 50%; width: 100%; align-items: center">
                            <a style="padding: 1em 2em; background-color: #ca2929bf; color: #fff; text-decoration:none"
                                href="#donghonu" class="linkloaidongho1">ĐỒNG HỒ DÀNH CHO NỮ</a>

                        </div>
                    </div>

                    <div class="item-normal-ct" style="position: absolution;  bottom: 0">
                        <img class="lazy" alt="Đồng hồ cặp đôi"
                                src="./images/banner/dong-ho-cap-doi_1593660350.jpg"
                                style="display: inline-block" />
                        <div class="name-collection"
                            style="position: absolute; display: flex; justify-content: center; bottom: 0; height: 50%; width: 100%; align-items: center">>
                            <a  style="padding: 1em 2em; background-color: #ca2929bf; color: #fff; text-decoration:none"
                                    href="#donghocapdoi " class="linkloaidongho"
                                    >ĐỒNG HỒ CẶP ĐÔI</a
                                >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php echo view("footer.php") ?>



<div class="alert alert-primary hidden" id="thongbao"></div>

<link rel="stylesheet" href="../main.css/font.css" type="text/css" />
<link rel="stylesheet" href="../main.css/animation.css" type="text/css" />
<link rel="stylesheet" href="../main.css/animate.css" type="text/css" media="screen" />
<script>
    const ERROR = "error",
        SUCCESS = "success";
    function notify(msg, msgType, duration, element) {
        switch (msgType) {
            case ERROR:
                element.classList.remove("alert-success");
                element.classList.add("alert-danger");
                break;
            case SUCCESS:
                element.classList.remove("alert-danger");
                element.classList.add("alert-success");
                break;
        }

        element.innerText = msg;
        element.classList.remove("hidden");
        setTimeout(() => {
            element.classList.add("hidden");
        }, duration);
    }
    const addToCarts = document.getElementsByClassName("add-to-cart");
    const divThongBao = document.getElementById("thongbao");
    for (let i = 0; i < addToCarts.length; ++i) {
        addToCarts[i].onclick = function (e) {
            e.preventDefault();
            const idhanghoa = this.getAttribute("data-idhanghoa");
            const formData = new FormData();
            formData.append("idhanghoa", idhanghoa);
            fetch("/khachhang/giohang", {
                body: formData,
                method: "POST",
            })
                .then((r) => r.json())
                .then((j) => {
                    if (j.status === "success") {
                        alert("Thêm Vào Giỏ Hàng Thành Công");
                    }
                });
        };
    }


    const quickview = document.getElementsByClassName("quickview");
    for (let i = 0; i < quickview.length; ++i) {
        quickview[i].onclick = function (e) {
            document.location.href = "/KhachHang/chitiethanghoa?idhanghoa=" + this.getAttribute('data-idhanghoa');
        }
    }

    const btnxemthemdhn = document.querySelector('#btnxemthemdhnam');
    const dhnam = document.querySelector('#dhnam');
    const dhnamdaydu = document.querySelector('#dhnamdaydu');
    const btnthugondhn = document.querySelector('#dhnamthugon');

    btnxemthemdhn.onclick = function(){
        dhnam.classList.add("hidden");
        dhnamdaydu.classList.remove("hidden");
    }
    btnthugondhn.onclick = function(){
        dhnam.classList.remove("hidden");
        dhnamdaydu.classList.add("hidden");
    }


    const btndhnuxemthem = document.querySelector('#dhnuxemthem');
    const dhnu = document.querySelector('#dhnu');
    const btndhnuthugon = document.querySelector('#dhnuthugon');
    const dhnudaydu = document.querySelector('#dhnudaydu');
    btndhnuxemthem.onclick = function(){
        dhnu.classList.add("hidden");
        dhnudaydu.classList.remove("hidden");
    }
    btndhnuthugon.onclick = function(){
        dhnu.classList.remove("hidden");
        dhnudaydu.classList.add("hidden");
    }

    const btndhcdxemthem = document.querySelector('#dhcdxemthem');
    const dhcd = document.querySelector('#dhcd');
    const btndhcdthugon = document.querySelector('#dhcdthugon');
    const dhcddaydu = document.querySelector('#dhcddaydu');

    btndhcdxemthem.onclick = function(){
        dhcd.classList.add("hidden");
        dhcddaydu.classList.remove("hidden");
    }
    btndhcdthugon.onclick = function(){
        dhcd.classList.remove("hidden");
        dhcddaydu.classList.add("hidden");
    }





</script>

</html>