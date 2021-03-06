<html>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>KQ Watch</title>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"
        />
        <link
            rel="stylesheet"
            href="../main.css/bootstrap.css"
            type="text/css"
        />
        <link rel="StyleSheet" href="../main.css/core.css" type="text/css" />
        <link
            rel="stylesheet"
            href="../main.css/flexslider.css"
            type="text/css"
            media="screen"
        />
        <link href="../main.css/css.css " rel="stylesheet" type="text/css" />
        <link href="../main.css/css1.css" rel="stylesheet" />
        <link rel="StyleSheet" href="../main.css/default.css" type="text/css" />


        
    </head>

    <body>
        <section class="header-navigation sticky-jump">
            <div class="navbar-header hidden-xs clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 animated fadeInLeft">
                            <nav
                                id="menulinks-outer"
                                class="menulinks hidden-sm row"
                            >
                                <ul id="menulinks" class="nav navbar-nav">
                                    <li>
                                        <a href="/" class="menu" target="_self"
                                            >Home</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Citizen</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Bently</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Casio</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Orient</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Festina</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Ogival</a
                                        >
                                    </li>
                                    <li>
                                        <a href="" class="menu" target="_self"
                                            >Michael-Kors</a
                                        >
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-6 col-xs-12 animated fadeInRight">
                            <a
                                href="/khachhang/giohang"
                                class="top_links pull-right hidden-sm"
                            ><img src="../cart.png" style="width: 20px; height: 20px" alt="">
                                Cart <span class=""></span>
                                
                            </a>

                            <?php if (!isset($_COOKIE['dadangnhap'])): ?>
                            <a
                                href="/KhachHang/dangnhap"
                                class="top_links pull-right hidden-sm"
                            ><img src="/login.png" style="width: 20px; height: 20px" alt="">
                                <span class=""></span> Log In
                                
                            </a>
                            <?php else: ?>
                            <a
                                href="/KhachHang/dangxuat"
                                class="top_links pull-right hidden-sm"
                            ><img src="../logout.png" style="width: 20px; height: 20px" alt="">
                                <span class=""></span> Log Out
                            </a>
                            <a href="/KhachHang/myaccount">
                            
                                <span class="sr-only">My Account</span>
                            </a>
                            <?php endif;?>
                            <a
                                href="/KhachHang/myaccount"
                                class="top_links pull-right hidden-sm"
                            ><img src="../myaccount.png" style="width: 20px; height: 20px" alt="">
                                <span class=""></span> My Account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <header class="site-header">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xs-3 visible-xs text-center head-mobile-nav"
                        >
                            <a
                                href="#"
                                id="mobile-menu-trigger"
                            >
                                <span class="icon-menu"></span>
                                <div>Menu</div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="row">
                                <div class="logo">
                                    <a href="" title="Sample Store"
                                        ><img
                                            src="../logo.jpg"
                                            alt="Sample Store"
                                    /></a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-6 col-md-6 col-sm-4 custom_mid hidden-xs"
                        >
                            <div class="row">
                                <div id="FRAME_SEARCH">
                                    <div id="searchBox" class="searchBox">
                                        <form
                                            method="get"
                                            name="searchForm"
                                            action="#"
                                        >
                                            <div class="search-form">
                                                <input
                                                    type="text"
                                                    id="searchlight"
                                                    name="keyword"
                                                    value=""
                                                    placeholder="Search"
                                                    class="search-text form-control"
                                                />
                                                <button
                                                    type="submit"
                                                    class="search-submit btn btn-default"
                                                >
                                                    <span
                                                class="material-icons"><img src="/search1.jpg" style="width: 45px; height: 34px" alt=""></span>
                                                </button>
                                            </div>
                                            <div
                                                class="searchlight-balloon"
                                                style="
                                                    position: absolute;
                                                    z-index: 1005;
                                                    top: 34px;
                                                    display: none;
                                                    left: 0px;
                                                "
                                            >
                                                <div
                                                    class="searchlight-results-wrapper"
                                                    style="height: 100%"
                                                ></div>
                                            </div>
                                        </form>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-lg-3 col-md-3 col-sm-4 custom_mid hidden-xs"
                        >
                            <div class="row">
                                <button
                                    type="button"
                                    id="mobile-menu-trigger2"
                                    class="pull-right btn btn-default visible-sm"
                                >
                                    <span class="icon-menu"></span> Menu
                                    <span class="sr-only"
                                        >Toggle navigation</span
                                    >
                                </button>
                                <div class="slogan hidden-sm">
                                    Questions?
                                    <span class="hidden-md">Call Us</span>
                                    <a href="tel:555.555.5555"
                                        ><img src="/call.jpg"  style= "width: 30px; height: 30px "alt="">
                                        079.420.5472</a
                                    >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div
                            class="col-xs-3 visible-xs text-center head-mobile-nav"
                        >
                            <a
                                href=""
                                class="pull-right"
                                data-toggle="modal"
                                data-target="#searchModal"
                            >
                                <span class="sr-only">Search</span>
                                <span class="icon-search"></span>
                                <div>Search</div>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <section id="caTnaV" class="categoriesNav navbar-wrapper hidden-xs">
                <a
                    href=""
                    class="sticky-ads abs-right2"
                    data-toggle="modal"
                    data-target="#searchModal"
                >
                    <span class="icon-search"></span>
                </a>
                <a
                    href=""
                    class="sticky-ads abs-right"
                >
                    <span class="icon-basket"></span>
                </a>
                <div class="container">
                    <nav
                        id="categories-outer"
                        class="categories navbar-collapse collapse"
                    >
                        <ul id="categories" class="nav navbar-nav">
                            <li class="">
                                <a href="/" style="color:#da1f26 !important; font-size:16px">Home</a>
                            </li>
                            <li class="">
                                <a href="#donghonam" style="color:#da1f26 !important; font-size:16px">?????ng h??? nam</a>
                            </li>
                            <li class="">
                                <a href="#donghonu" style="color:#da1f26 !important; font-size:16px">?????ng h??? n???</a>
                            </li>
                            <li class="">
                                <a href="#donghocapdoi" style="color:#da1f26 !important; font-size:16px"; font-size:16px>c???p ????i</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
        </section>
    </body>
</html>
