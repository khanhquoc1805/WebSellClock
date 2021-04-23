<!DOCTYPE html>

<html class="no-js">
    <?php echo view("header.php") ?>

    <section id="home" class="home-page-content page-content">
        <section class="homepage-slider">
            <div class="container-fluid">
                <div class="row">
                    <section class="homepage-slider">
                        <div
                            class="homeCarousel flexslider"
                            data-animation="fade"
                            data-slideshowspeed="4000"
                        >
                            <ul class="slides">
                                <li
                                    class="flex-active-slide"
                                    style="
                                        width: 100%;
                                        float: left;
                                        margin-right: -100%;
                                        position: relative;
                                        opacity: 1;
                                        display: block;
                                        z-index: 2;
                                    "
                                >
                                    <a href=""
                                        ><img
                                            src="slide2.jpg"
                                            alt=""
                                            draggable="false"
                                    /></a>
                                </li>
                                <li
                                    style="
                                        width: 100%;
                                        float: left;
                                        margin-right: -100%;
                                        position: relative;
                                        opacity: 0;
                                        display: block;
                                        z-index: 1;
                                    "
                                >
                                    <a href=""
                                        ><img
                                            src="./hinhnen.jpg"
                                            alt=""
                                            draggable="false"
                                    /></a>
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
        <section id="Promos" class="promo-banners hidden">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="">
                            <div class="promo-img">
                                <img
                                    src=""
                                    class="img-responsive img"
                                    alt="Women&#39;s Orthopedic Footwear"
                                />
                                <div class="btn btn-default">
                                    Women's Collection
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="">
                            <div class="promo-img">
                                <img
                                    src=""
                                    class="img-responsive img"
                                    alt="Men&#39;s Orthotic Shoes"
                                />
                                <div class="btn btn-default">
                                    Men's Collection
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="l">
                            <div class="promo-img">
                                <img
                                    src=""
                                    class="img-responsive img"
                                    alt="Laceless Shoes for Men and Women"
                                />
                                <div class="btn btn-default">
                                    Laceless Footwear
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="">
                            <div class="promo-img">
                                <img
                                    src=""
                                    class="img-responsive img"
                                    alt="Orthopedic Shoe Inserts"
                                />
                                <div class="btn btn-default">Shoe Inserts</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="products-section">
            <div class="container">
                <div class="row">
                    <h2 class="header-specials">
                        <span style="color: red" >Đồng Hồ Nam</span>
                    </h2>
                </div>

                <div
                    class="product-items product-items-4"
                    data-itemsheight="319"
                >
                    <div id="carousel-sellers" class="carousel slide">
                        <?php $temp1=0; ?>
                        <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                        <?php if (($dsdongho[$i]['phai'] === 'Nam') && $temp1 < 8): ?>
                        <?php $temp1 = $temp1 + 1; ?>
                        <div
                            class="product-item"
                            data-catalogid="18"
                            data-ajaxcart="1"
                            data-addcart-callback="addcart_callback"
                            style="height: 319px"
                        >
                            <div class="img">
                                <a href="#">
                                    <img
                                        src="<?php echo $dsdongho[$i]['image'] ?>"
                                        alt="Wireless Headphones"
                                        class="img-responsive"
                                    />
                                </a>
                                <button class="quickview" data-toggle="modal">
                                    Quick View
                                </button>
                            </div>
                            <div class="name">
                                <a href=""
                                    ><?php  echo $dsdongho[$i]['tenhanghoa'] ?></a
                                >
                            </div>
                            <div class="price">
                                <span class="sale-price"
                                    ><?php  echo $dsdongho[$i]['gia'] ?>đ</span
                                >
                                <span class="on-sale-badge">Sale</span>
                            </div>
                            <div class="status">
                                <span class="availability">In Stock.</span>
                            </div>
                            <div class="action">
                                <a
                                    href=""
                                    class="add-to-cart btn btn-default"
                                    data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>"
                                >
                                    <span class="buyitlink-text"
                                        >Add To Cart</span
                                    >
                                    <span
                                        class="ajaxcart-loader icon-spin2 animate-spin"
                                    ></span>
                                    <span class="ajaxcart-added icon-ok"></span>
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="products-section">
            <div class="container">
                <div class="row">
                    <h2 class="header-specials">
                        <span style="color: red">Đồng Hồ Nữ</span>
                    </h2>
                </div>

                <div
                    class="product-items product-items-4"
                    data-itemsheight="319"
                >
                    <div id="carousel-sellers" class="carousel slide">
                        <?php $temp=0; ?>
                        <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                        <?php if (($dsdongho[$i]['phai'] === 'Nữ') && $temp < 8): ?>
                        <?php $temp = $temp + 1; ?>
                        <div
                            class="product-item"
                            data-catalogid="18"
                            data-ajaxcart="1"
                            data-addcart-callback="addcart_callback"
                            style="height: 319px"
                        >
                            <div class="img">
                                <a href="#">
                                    <img
                                        src="<?php echo $dsdongho[$i]['image'] ?>"
                                        alt="Wireless Headphones"
                                        class="img-responsive"
                                    />
                                </a>
                                <button class="quickview" data-toggle="modal">
                                    Quick View
                                </button>
                            </div>
                            <div class="name">
                                <a href=""
                                    ><?php  echo $dsdongho[$i]['tenhanghoa'] ?></a
                                >
                            </div>
                            <div class="price">
                                <span class="sale-price"
                                    ><?php  echo $dsdongho[$i]['gia'] ?>đ</span
                                >
                                <span class="on-sale-badge">Sale</span>
                            </div>
                            <div class="status">
                                <span class="availability">In Stock.</span>
                            </div>
                            <div class="action">
                                <a
                                    href=""
                                    class="add-to-cart btn btn-default"
                                    data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>"
                                >
                                    <span class="buyitlink-text"
                                        >Add To Cart</span
                                    >
                                    <span
                                        class="ajaxcart-loader icon-spin2 animate-spin"
                                    ></span>
                                    <span class="ajaxcart-added icon-ok"></span>
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="promo-banners hidden">
            <div class="container-fluid">
                <div class="row">
                    <a href="">
                        <div class="promo-img">
                            <img
                                src=""
                                class="img-responsive img"
                                alt="Oasis Shoes - Serenity for Feet"
                            />
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </section>




    <section class="products-section">
            <div class="container">
                <div class="row">
                    <h2 class="header-specials">
                        <span style="color: red">Đồng Hồ Cặp Đôi</span>
                    </h2>
                </div>

                <div
                    class="product-items product-items-4"
                    data-itemsheight="319"
                >
                    <div id="carousel-sellers" class="carousel slide">
                        <?php $temp2=0; ?>
                        <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
                        <?php if (($dsdongho[$i]['phai'] === 'cd') && $temp2 < 8): ?>
                        <?php $temp2 = $temp2 + 1; ?>
                        <div
                            class="product-item"
                            data-catalogid="18"
                            data-ajaxcart="1"
                            data-addcart-callback="addcart_callback"
                            style="height: 319px"
                        >
                            <div class="img">
                                <a href="#">
                                    <img
                                        src="<?php echo $dsdongho[$i]['image'] ?>"
                                        alt="Wireless Headphones"
                                        class="img-responsive"
                                    />
                                </a>
                                <button class="quickview" data-toggle="modal">
                                    Quick View
                                </button>
                            </div>
                            <div class="name">
                                <a href=""
                                    ><?php  echo $dsdongho[$i]['tenhanghoa'] ?></a
                                >
                            </div>
                            <div class="price">
                                <span class="sale-price"
                                    ><?php  echo $dsdongho[$i]['gia'] ?>đ</span
                                >
                                <span class="on-sale-badge">Sale</span>
                            </div>
                            <div class="status">
                                <span class="availability">In Stock.</span>
                            </div>
                            <div class="action">
                                <a
                                    href=""
                                    class="add-to-cart btn btn-default"
                                    data-idhanghoa="<?php echo $dsdongho[$i]['idhanghoa'] ?>"
                                >
                                    <span class="buyitlink-text"
                                        >Add To Cart</span
                                    >
                                    <span
                                        class="ajaxcart-loader icon-spin2 animate-spin"
                                    ></span>
                                    <span class="ajaxcart-added icon-ok"></span>
                                </a>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="promo-banners hidden">
            <div class="container-fluid">
                <div class="row">
                    <a href="">
                        <div class="promo-img">
                            <img
                                src=""
                                class="img-responsive img"
                                alt="Oasis Shoes - Serenity for Feet"
                            />
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <div
        class="container"
        style="
            padding-left: 10px;
            padding-right: 10px;
            width: 1170px;
            max-width: 100%;
            box-sizing: border-box;
            margin: 0px auto;
        "
    >
        <div class="" id="block_id_132">
            <div class="block-body-colllection">
                <div class="collection-1 cls">
                    <div class="item-special item-cl">
                        <a
                            href="https://xwatch.vn/dong-ho-danh-cho-nam-ccl10.html"
                            ><img
                                class="lazy"
                                alt="Đồng hồ dành cho nam"
                                src="https://xwatch.vn/images/collection/category/large/bst-dong-ho-cho-nam_1562154973.jpg"
                                style="display: inline-block"
                        /></a>
                        <div class="name-collection">
                            <a
                                href="https://xwatch.vn/dong-ho-danh-cho-nam-ccl10.html"
                                >Đồng hồ dành cho nam</a
                            >
                        </div>
                    </div>
                    <div class="item-normal item-cl">
                        <div class="item-normal-ct">
                            <a
                                href="https://xwatch.vn/dong-ho-danh-cho-nu-ccl9.html"
                                ><img
                                    class="lazy"
                                    alt="Đồng hồ dành cho nữ"
                                    src="https://xwatch.vn/images/collection/category/resized/bst-danh-cho-nu_1562151982.jpg"
                                    style="display: inline-block"
                            /></a>
                            <div class="name-collection">
                                <a
                                    href="https://xwatch.vn/dong-ho-danh-cho-nu-ccl9.html"
                                    >Đồng hồ dành cho nữ</a
                                >
                            </div>
                        </div>

                        <div class="item-normal-ct">
                            <a
                                href="https://xwatch.vn/dong-ho-cap-doi-ccl11.html"
                                ><img
                                    class="lazy"
                                    alt="Đồng hồ cặp đôi"
                                    src="https://xwatch.vn/images/collection/category/resized/dong-ho-cap-doi_1593660350.jpg"
                                    style="display: inline-block"
                            /></a>
                            <div class="name-collection">
                                <a
                                    href="https://xwatch.vn/dong-ho-cap-doi-ccl11.html"
                                    >Đồng hồ cặp đôi</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>







    
    <div class="newsletter">thêm hình ở đây</div>
    <div class="alert alert-primary hidden" id="thongbao"></div>

    <link rel="stylesheet" href="../main.css/font.css" type="text/css" />
    <link rel="stylesheet" href="../main.css/animation.css" type="text/css" />
    <link
        rel="stylesheet"
        href="../main.css/animate.css"
        type="text/css"
        media="screen"
    />
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
                            notify(
                                "Thêm vào giỏ hàng thành công",
                                SUCCESS,
                                3000,
                                divThongBao
                            );
                        }
                    });
            };
        }


        const quickview = document.getElementsByClassName("quickview");
        for (let i = 0; i < addToCarts.length; ++i) {
            quickview[i].onclick = function (e) {
                document.location.href="/UserPage/chitiethanghoa.php";
            }
        }

    </script>
</html>
