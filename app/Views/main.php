<!DOCTYPE html>
<!-- saved from url=(0046)https://techsave-preview-com.3dcartstores.com/ -->
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
                                    <a
                                        href=""
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
                                    <a
                                        class="flex-prev"
                                        href=""
                                        >Previous</a
                                    >
                                </li>
                                <li class="flex-nav-next">
                                    <a
                                        class="flex-next"
                                        href=""
                                        >Next</a
                                    >
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
                        <a
                            href=""
                        >
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
                        <a
                            href=""
                        >
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
                        <a
                            href="l"
                        >
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
                        <a
                            href=""
                        >
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
                        <span>Featured Products</span>
                    </h2>
                </div>

                <div
                    class="product-items product-items-4"
                    data-itemsheight="319"
                >
                    <div id="carousel-sellers" class="carousel slide">
                        <?php for ($i = 0; $i < count($dsdongho); $i++): ?>
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
                                <a
                                    href=""
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

    <div class="newsletter">thêm hình ở đây</div>
    <div class="alert alert-primary hidden" id="thongbao">
        
    </div>

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
                            SUCCESS = "success"
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
        const divThongBao = document.getElementById('thongbao');
        for(let i = 0; i < addToCarts.length; ++i) {
            addToCarts[i].onclick = function(e) {
                e.preventDefault();
                const idhanghoa = this.getAttribute('data-idhanghoa');
                const formData = new FormData();
                formData.append('idhanghoa', idhanghoa);
                fetch("/khachhang/giohang", {
                    body: formData,
                    method: "POST"
                }).then(r => r.json()).then(j => {
                    if (j.status === "success") {
                        notify("Thêm vào giỏ hàng thành công", SUCCESS, 3000, divThongBao);
                    }
                });
            }
        }
        
    </script>
</html>
