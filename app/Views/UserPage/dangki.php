<?php echo view("header") ?>


<link rel="stylesheet" href="../main.css/dangki.css">

<h2 class="page_heading">Create new account</h2>

<section id="registration0" class="registration-page-content page-content">
  <div class="container">
    <div class="row">
      <div class="content-area col-lg-12">
        <form
          action="/KhachHang/dangki"
          method="post"
          id="registration_form"
        >
          <input type="hidden" name="view_cart" value="0" />
          <input type="hidden" name="catalogid" value="0" />
          <div class="row">
            <div class="accountRegForm accountRegForm-col col-lg-12">
              <div class="header">
                <h3 class="page_heading">New Customers</h3>
              </div>
              <div class="row">
                <div class="loginField col-lg-12">
                  <label for="email" class="validation-field">
                    <input
                      type="email"
                      size="25"
                      name="taikhoan"
                      maxlength="100"
                      tabindex="1"
                      class="form-control txtBoxStyle"
                      placeholder="Email"
                    />
                    <span class="required-indicator"></span>
                  </label>
                </div>
                <div class="loginField col-lg-12">
                  <label for="pass" class="validation-field">
                    <input
                      type="password"
                      size="12"
                      name="matkhau"
                      maxlength="16"
                      tabindex="2"
                      class="form-control txtBoxStyle"
                      placeholder="Password"
                    />

                    <span class="required-indicator"></span>
                  </label>
                </div>

                <input type="hidden" name="discount" value="0" />
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="accountRegForm accountRegForm-col col-lg-12">
              <div class="header">
                <h3 class="page_heading">Customer Information</h3>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="loginField col-sm-6">
                      <label for="shipping_firstname" class="validation-field">
                        <input
                          name="tenkh"
                          type="text"
                          id="shipping_firstname"
                          maxlength="100"
                          size="15"
                          tabindex="4"
                          class="form-control txtBoxStyle"
                          placeholder="First Name"
                        />

                        <span class="required-indicator"></span>
                      </label>
                    </div>
                    <div class="loginField col-sm-6">
                      <label for="shipping_lastname" class="validation-field">
                        <input
                          name="hokh"
                          type="text"
                          id="shipping_lastname"
                          maxlength="100"
                          size="15"
                          tabindex="5"
                          class="form-control txtBoxStyle"
                          placeholder="Last Name"
                        />

                        <span class="required-indicator"></span>
                      </label>
                    </div>
                    <div class="loginField col-xs-12">
                      <select name="gioitinh" class="form-select form-control" aria-label="Default select example">
                        <option selected value="1">Male</option>
                        <option value="0">Female</option>
                      </select>
                    </div>
                    <div class="loginField col-sm-8">
                      <label for="shipping_address" class="validation-field">
                        <input
                          name="diachi"
                          type="text"
                          id="shipping_address"
                          maxlength="255"
                          size="25"
                          tabindex="8"
                          class="form-control txtBoxStyle"
                          placeholder="Address"
                        />

                        <span class="required-indicator"></span>
                      </label>
                    </div>
                    <div class="loginField col-xs-12">
                      <label for="shipping_phone" class="validation-field">
                        <input
                          name="sdt"
                          type="text"
                          id="shipping_phone"
                          maxlength="50"
                          size="25"
                          tabindex="14"
                          class="form-control txtBoxStyle"
                          placeholder="Phone"
                        />
                        <span class="required-indicator"></span>
                      </label>
                    </div>
              </div>
            </div>
          </div>
              <div class="submit-button text-right">
                <button
                  type="button"
                  class="btn btn-primary"
                  onclick="document.querySelector('#registration_form').submit()";
                >
                  Register
                </button>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
