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