<?php echo view("header.php") ?>

<link rel="stylesheet" href="../main.css/myaccount.css" />
<section id="loginAccount" class="loginAccount-page-content page-content">
    <section class="breadcrumnb" aria-label="breadcrumb" role="main">
        <div class="container">
            <ol"
                class="clearfix"
            >
                <li
                >
                    <meta itemprop="position" content="1" />
                    <a href="/" itemprop="item"
                        ><span itemprop="name">Home</span></a
                    >
                </li>
                <li
                    itemprop="itemListElement"
                    itemscope=""
                    itemtype="http://schema.org/ListItem"
                >
                    <meta itemprop="position" content="2" />
                    <span itemprop="name">My Account</span>
                </li>
            </ol>
        </div>
    </section>

    <section class="page_header" aria-label="page title" role="main">
        <div class="container">
            <h1 class="page_heading">My Account</h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="content-area col-lg-12">
                <div class="beta-col col-lg-6 col-md-6">
                    <div class="header">
                        <h2 class="headerTitle">New Customers</h2>
                    </div>
                    <div class="createNewAccount pad10">
                        <div class="height" style="min-height: 137px">
                            <div class="loginField">
                                <div>
                                    If you don't have an account, please proceed
                                    by clicking the following button to continue
                                    first-time registration.
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="submit-button">
                            <button
                                type="button"
                                onclick="window.location='/KhachHang/dangki'"
                                class="btn btn-primary"
                            >
                                <i
                                    class="icon-pencil"
                                ></i>
                                Create Account
                            </button>
                        </div>
                    </div>
                </div>
                <div class="alpha-col col-lg-6 col-md-6">
                    <div class="header">
                        <h2 class="headerTitle">Returning Customers</h2>
                    </div>
                    <div class="myaccountLogin pad10">
                        <form
                            name="myaccountLogin"
                            action="/KhachHang/dangnhap"
                            class="bt-flabels js-flabels"
                            method="post"
                            id="frmForm"
                        >
                            <input type="hidden" name="catalogid" value="0" />
                            <div class="height" style="min-height: 137px">
                                <div class="loginField">
                                    <div>Please log in to your account.</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="loginField">
                                    <label for="email" class="validation-field">
                                        <span class="hidden">Email:</span>
                                        <input
                                            type="text"
                                            name="taikhoan"
                                            id="loginEmail"
                                            value=""
                                            placeholder="Email"
                                            size="30"
                                            tabindex="1"
                                            class="form-control txtBoxStyle"
                                            aria-label="login email"
                                            aria-required="true"
                                            aria-invalid="true"
                                        />
                                        <span
                                            class="required-indicator"
                                            role="presentation"
                                        ></span>
                                    </label>
                                </div>
                                <div class="loginField">
                                    <label
                                        for="matkhau"
                                        class="validation-field"
                                    >
                                        <span class="hidden">Password:</span>
                                        <input
                                            type="password"
                                            name="matkhau"
                                            id="loginpassword"
                                            autocomplete="off"
                                            placeholder="Password"
                                            size="12"
                                            tabindex="2"
                                            class="form-control txtBoxStyle"
                                            aria-label="password"
                                            aria-required="true"
                                            aria-invalid="true"
                                            title="password"
                                        />
                                        <span
                                            class="required-indicator"
                                            role="presentation"
                                        ></span>
                                    </label>
                                </div>
                            </div>
                            <div class="loginField">
                                <div class="submit-button">
                                    <button
                                        type="submit"
                                        id="submitted"
                                        name="submitted"
                                        class="btn btn-primary"
                                    >
                                        <i
                                            class="icon-login"
                                            role="presentation"
                                            aria-label="login icon"
                                        ></i>
                                        Log in to my account
                                    </button>
                                </div>
                            </div>
                            <div class="loginField">
                                <button
                                    type="button"
                                    class="btn btn-default btn-lg"
                                >
                                    <i
                                        class="icon-cw"

                                    ></i
                                    >Reset my password
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
