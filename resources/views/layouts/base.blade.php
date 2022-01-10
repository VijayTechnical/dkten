<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://dkten.com/template/front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/plugins/bootstrap-select/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="https://dkten.com/template/front/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/modal/css/sm.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/rateit/rateit.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/theme.css') }}">
    <link href="https://dkten.com/template/front/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">
    <link href="https://dkten.com/template/front/plugins/smedia/custom-1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900" rel="stylesheet"
        type="text/css">
    <script src="https://dkten.com/template/front/plugins/jquery/jquery-1.11.1.min.js"></script>
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
        rel="stylesheet">
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
    </script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <title>Dkten!</title>
    @livewireStyles
</head>

<body>
    <!-- top-bar starts -->
    <div class="top-bar">
        <div id="c" class="container-fluid">
            <div class="row">
                <div class="col-md-2 mb-vw-hdn">
                    <div class="top-bar-left text-center">
                        <span class="dk_top"><a href="https://dkten.com/">dkten.com </a></span>
                    </div>
                </div>

                <div class="col-md-7 text-center mb-vw-hdn">
                    You can use Dkten app on your mobile, install it free on your Android or iOS device. <a
                        class="dk_top_link" href="#"> <strong>Download Dkten app</strong></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 lg-vw-hdn mb-vw-shw"><a class="dk_top_link"
                        href="#"><strong>Download Dkten app</strong></a></div>
                <div class="col-md-3 col-sm-6 col-xs-6 text-right">
                    <div class="ribbonsocial">
                        <span class="ribbonpara">Link With Us: </span>
                        <span class="ribbonlinks">
                            <a href="https://www.facebook.com/DK-TEN-108691891258650/" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/dkten10" target="_blank"><i
                                    class="fab fa-instagram "></i></a>
                            <a href="https://www.youtube.com/channel/UC8toL2nKg0jXwefxS4Rcz_w" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top bar ends here -->

    <!-- top header starts  -->
    <div class="row align-items-center">
        <div class="col-xl-2 col-lg-2">
            <div class="logo">
                <a href="https://dkten.com/">
                    <img src="https://dkten.com/uploads/logo.png" class=""
                        alt="DKten - Online Shopping In Nepal | Best Deals, Combo Offers">
                </a>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 header-search mt-4">
            <form action="https://dkten.com/home/text_search/" method="post" accept-charset="UTF-8">
                <input type="hidden" name="csrf_test_name" value="25dd71b9af4cbdc71013cea89fdc0c09">
                <div class="d-flex position-relative">
                    <div class="flex-grow-1">
                        <input class="form-control ui-autocomplete-input" type="text" name="query" id="tags"
                            accept-charset="utf-8" placeholder="What Are You Looking For?" autocomplete="off">
                        <input class="form-control" type="hidden" name="category" value="0">
                        <input class="form-control" type="hidden" name="type" value="product">
                    </div>
                    <button class="shrc_btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="col-xl-4 col-lg-4">
            <div class="header-action header-action-flex">
                <a class=" fa fa-bars cls-tgl-prt menu-toggle-close btn"></a>
                <div class="languageselect">
                    <img src="https://dkten.com/uploads/USA.png" alt="USA">
                    <i class="fa fa-caret-down"></i>
                    <div class="languagediv">
                        <p>Change Language</p>
                        <div class="form-check">
                            <a class="set_langs" data-href="https://dkten.com/home/set_language/english">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="english" checked="">
                                <label class="form-check-label" for="exampleRadios1">English</label>
                            </a>
                        </div>

                        <div class="form-check">
                            <a class="set_langs" data-href="https://dkten.com/home/set_language/lang_7">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="lang_7">
                                <label class="form-check-label" for="exampleRadios1">Nepali</label>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sign-in">
                    <div class="midsignin">
                        <div class="midsigninlabel">
                            <p>Hello, Sign In</p>
                            <p style="font-weight: 600">My Account <i class="fa fa-caret-down"></i></p>
                        </div>
                        <div class="midsignbox">
                            <div class="midsignboxlogin">
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                            <p style="text-align: center; margin: 6px">New to Dkten?</p>
                            <div class="midsignboxregister">
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="same-style-2 same-style-2-white same-style-2-font-inc header-cart">
                    <a class="cart-active" href="#" data-toggle="modal" data-target="#popup-cart">
                        <div class="cartimagewithspans">
                            <i style="color:grey;" class="fa fa-shopping-cart" aria-hidden="true"> </i><span
                                class="pro-count black"> <span class="cart_num">0</span></span>
                        </div>
                        <div class="realmycart">
                            <p>My Cart</p>
                        </div>
                    </a>
                </div>

                <div class="returnsorders"><a href="https://dkten.com/home/profile?a=r">Returns &amp; Orders</a></div>

            </div>
        </div>
    </div>
    <!--  top bar ends -->


    <!-- Navigation -->


    <nav class="navigation closed clearfix">
        <ul class="nav sf-menu">
            <li>
                <a href="#">All Categories </a>
                <ul class="allcatdk">
                    <li class="catsdropdownow"><a class="allcat_drop"> Lol </a>
                        <ul class="allcatdk listdk" style="    width: 200px; height:100%;"></ul>
                    </li>

                    <li class="catsdropdownow"><a class="allcat_drop"> Men’s Collection</a>
                        <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                            <li class="catsdropdownextnow">
                                <a href="https://dkten.com/home/category/30/119">Clothing</a>
                            </li>
                            <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?16">Jacket, Coat, Sweater &
                                        Hoodie</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?13">Pants & Shorts</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?231">Sports & Swim Wear</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?232">Inner Wear</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?216">Party & Event Wear</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?227">Sleep Wear</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?226">Jeans</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?218">Shirts</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?222">Cultural Dress</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?270">Trouser</a>
                                </li>
                                <li class="catsdropdownextnow">
                                    <a href="https://dkten.com/home/category/30/119?271">T-Shirt</a>
                                </li>
                            </ul>

                            <!--brand nav-->
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/30/120">Shoes </a>
                    </li>
                    <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?17">Sneakers</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?18">Sports Shoe</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?19">Loafers</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?20">Formal Shoe</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?21">Chelsea Boots</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?22">Boat Shoe</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?23">Long Boots</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?24">Dingo Boots</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?25">Oxford Shoe</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?26">Canvas Shoe</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?27">Sandals</a>
                        </li>
                        <li class="catsdropdownextnow">
                            <a href="https://dkten.com/home/category/30/120?89">Lace Ups</a>
                        </li>
                    </ul>

                    <!--brand nav-->
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/30/121"> Watches</a>
            </li>

            <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?210">Digital Watches</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?212">Chronograph Watches</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?29">Smart Watches</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?204">Casual Watches</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?205">Smart Watches</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?207">Metal Band Watches </a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/121?214">Sports Watches</a>
                </li>
            </ul>

            <!--brand nav-->
            </li>
            <li class="catsdropdownextnow"></li>
            </a>
            <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?34">Caps & Hats</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?36">Scarves</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?37">Bow & Ties</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?41">Umbrella</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?42">Wallets & Card Cases</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?100">Sunglasses</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?68">Jewelery</a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?274">Belts & Suspender </a>
                </li>
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/30/122?275">Gloves & Mittens</a>
                </li>
            </ul>

            <!--brand nav-->
            </li>
        </ul>
        </li>

        <li class="catsdropdownow"><a class="allcat_drop"> Women’s Collection</a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/29/124">Clothing</a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?70">Pant & Shorts </a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?71">Jacket, Coat & Hoodie</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?72">Jump Suits & Rompers</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?219">Sports & Swim Wear</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?215">Party & Event Wear</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?225">Jeans</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?224">Inner Wear</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?282">Kurti Set</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?223">Sleep Wear</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?221">Cultural Dress</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?276">Dresses & Skirts </a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?279">Trouser</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?280">Shirts</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?281">T-Shirt</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?283">Saree</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/29/124?284">T-Shirt</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/29/125"> Shoes </a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?81">Sneakers</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?82">Sports Shoe</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?83">Long Boots</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?84">Ankle Boots</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?85">Wedge Heels</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?86">Pencil Heels</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?87">Mules</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?88">Lace Ups</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?90">Sandals</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?91">Winter Boots</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/125?92">Boat Shoe</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/29/126"> Watches </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?211">Chonograph Watches</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?203">Casual Watches</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?209">Digital Watches</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?206">Smart Watches</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?94">Smart Watches</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?208">Metal Band Watches </a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/126?213">Sports Watches</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/29/127">Jewelry</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/127?109">Necklace/Chain</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/127?110">Rings</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/127?111">Bracelets</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/127?112">Ear Rings & Studs</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/29/127?113">Bangle & Wrist Band</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/29/128">Women S Accessories </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?99">Sunglasses</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?102">Gloves & Shocks</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?103">Head Gear & Neck
                    Warmer</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?104">Scarf & Shawl</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?105">Key Rings & Key
                    Chain</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?106">Umbrella</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?107">Arms Warmer</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?108">Hair Pin/Ribbon &
                    Bands</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/29/128?278">Belt & Slim Belts</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Gift’s & Stationery Items </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/1/140">Books </a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?126">Wellness/Healthy Living Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?122">Self Helps Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?117">History Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?118">Children Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?119">Loksewa Tayari Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?120">Bridge Course Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?121">Biography</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?123">Philosophy & Religion Books </a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?124">Linguistic Books</a>
                    </li>
                    <li class="catsdropdownextnow">
                        <a href="https://dkten.com/home/category/1/140?125">Novels/Literature</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/1/5">Antique Items</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/1/5?233">Wooden Antique</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/1/5?236">Stone Antique</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/1/5?237">Metal Antique</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/1/115">Painting & Arts </a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/1/115?234">Painting</a>
            </li>
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/1/115?235">Arts</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow">
            <a class="allcat_drop"> Bags & Luggage </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/4/142">Sport S Bags</a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/142?239">Backpack</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/142?238">Hand/Side
                            Bag</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/141">School Backpack</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/141?134">Boy’s School Bags</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/141?135">Girl’s School Bags</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/34">Laptop S Bags</a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow">
                <a href="https://dkten.com/home/category/4/34?240">Men’s Laptop Bag</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/34?241">Women’s Laptop Bags</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/35">Travel Bags </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/35?242">Porter Bags</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/36">Duffle Bags </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/36?243">Luggage Duffle</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/36?244">Mini Duffle</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/39">Backpack</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/39?130">Men’s Backpack</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/39?131">Women’s Backpack</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/40">Suitcases </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/40?245">Plastic Suitcase</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/40?246">Cotton Suitcase</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/143">Office Bags</a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/143?132">Men’s Office Bags</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/143?133">Women’s Office Bags</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/4/144">Kid S Bags</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/144?247">Toddlers</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/4/144?248">Kids</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>

        <li class="catsdropdownow"><a class="allcat_drop"> Beauty & Health Care</a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/5/170">Men S Grooming</a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?55">Shaving & Hair
                            Removal</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?56">Fragrances</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?57">Hair Care &
                            Styling</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?58">Skin & Body
                            Care</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?60">Bath
                            Products</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/170?61">Foods &
                            Nutrition’s</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/5/169">Women S Grooming</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?46">Foots & Hands Nail
                    Care</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?47">Fragrances</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?48">Skin & Body Care</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?49">Make Up Sets</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?50">Hair Care & Styling</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?51">Hair Removal</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?52">Bath Products</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?53">Beauty Tools &
                    Accessories</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/5/169?54">Foods & Nutrition’s</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/5/172">Health Care Items </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Weeding -Ceremony Supplies </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/16/85">Ceremony Supplies </a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/85?62">Birthday
                            Supplies</a>


                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/85?63">Festival
                            Supplies</a>


                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/85?64">Baby Shower
                            Supplies</a>


                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/85?65">Weaning Ceremony
                            Supplies </a>


                    </li>


                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/16/88">Wedding Supplies </a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/88?66">Bride Accessories</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/16/88?67">Bridegroom
                    Accessories</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Home & Office Appliances </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/17/151">Vacuum - Cleaning Appliances </a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/151?254">Vacuum
                            Cleaners</a>
                    </li>


                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/152">Heating & Cooling Appliances </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/152?249">Heater</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/152?250">Fan</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/153">Kitchen Appliances </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a
                    href="https://dkten.com/home/category/17/153?166">Mixer-Grinder-Juicer</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/153?167">Toaster & Sandwich
                    Maker</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/153?168">Electric Kettles</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/153?169">Rice Cooker</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/153?170">Oven</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/113">Indoor Lights </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/113?251">Festival Lights</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/113?252">Wall Lights</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/154">Garment Accessories </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/154?253">Handmade Carpet</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/155">Audio & Video Appliances </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/155?255">Home Theater</a>
                /li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/156">Décor Accessories </a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/156?256">Wall
                    Paper/Sticker/Mular</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/157">Bath Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/157?257">Bath Sponge</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/161">Garden Tool S & Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/161?259">Gardening Tools</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/17/162">Pet S Care Accessories</a>
        </li>

        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/17/162?258">Pet Dog
                    Accessories</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Consumer Electronics & Accessories </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/18/135">Mobile Phone Accessories</a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?148">Charger</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?149">Battery</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?150">Memory
                            Card</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?151">Power Bank</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?152">Headsets &
                            Earphone</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?153">Selfie Stick &
                            Gimbal</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?154">Mobile Cover &
                            Cases</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/135?155">VR Glass
                            Box</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/18/136">Desktop -Television & Accessories
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/136?260">Desktop Computer</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/136?261">Television</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/136?267">Computer-TV
                    Accessories</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/18/130">Mobile Phone
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?138">Apple Iphone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?139">Oppo Mobile Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?140">Huawei Mobile
                    Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?141">Vivo Mobile Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?142">Sony Mobile Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?143">Nokia Mobile Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?144">Motorola Mobile
                    Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?145">MI (Xiaomi) Mobile
                    Phone</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?146">Gionee</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/130?147">HTC Mobile Phone</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/18/131">Laptops - Tablets & Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/131?162"> Apple Macbook</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/131?163">Samsung Laptop</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/131?164">Dell Laptop</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/131?165">Lenovo Laptop</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/131?266">Laptop Accessories</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/18/134">Camera
                </i>
            </a>
            <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/134?156">DSLR Camera</a>
                </li>
                <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/134?157">GoPro</a>
                </li>
                <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/134?158">Security
                        Camera</a>
                </li>
                <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/18/134?265">Camera
                        Accessories</a>
                </li>
            </ul>

            <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Baby & Kid’s Collection </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/23/166">Travel Gear</a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/23/164">Toddlers & Toys</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/23/165">Clothing & Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/23/163">Baby Care</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        <li class="catsdropdownow"><a class="allcat_drop"> Sports Fitness & Outdoor </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/21/149">Sport S Accessories </a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/21/149?127">Cricket</a>
                    </li>
                    <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/21/149?128">Football</a>
                    </li>
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/148">Cycling & Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/21/148?268">Bicycles</a>
            </li>
            <li class="catsdropdownextnow"> <a href="https://dkten.com/home/category/21/148?269">Cycling
                    Accessories</a>
            </li>
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/80">Sport S Clothing
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/146">Footwear & Accessories</a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/147">Supplements </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/108">Fitness Equipment S </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/21/145">Camping & Hiking Accessories
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>

        <li class="catsdropdownow"><a class="allcat_drop"> Machinery Parts & Accessories </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
            </ul>
        <li class="catsdropdownow"><a class="allcat_drop"> Households Essential </a>
            <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                <li class="catsdropdownextnow">
                    <a href="https://dkten.com/home/category/26/167">Puja Samagri </a>
                </li>
                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                </ul>

                <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/26/110">Home Essentials </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        <li class="catsdropdownextnow">
            <a href="https://dkten.com/home/category/26/111">Home Cleaning Supplies </a>
        </li>
        <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
        </ul>

        <!--brand nav-->
        </li>
        </ul>
        </li>
        </ul>
        </li>



        <li class="hidden-lg hidden-md ">

            <a href="https://dkten.com/home/all_category">

                All Sub Categories
            </a>

        </li>

        <li class="hidden-sm hidden-xs ">

            <a href="#eservice">

                Eservice
            </a>



        </li>




        <li>

            <a href="https://dkten.com/home/all_mall/">

                Shopping Mall
            </a>

        </li>

        <li>

            <a href="#">

                Flights Holiday
            </a>

        </li>



        <li>

            <a href="https://dkten.com/home/vendor_logup/registration">

                Sell On Dkten
            </a>

        </li>

        <li>

            <a href="https://dkten.com/home/profile?a=t">

                Track My Order
            </a>

        </li>

        <li>

            <a href="https://dkten.com/home/reffer">

                Reffer And Earn
            </a>

        </li>







        <li>

            <a href="https://dkten.com/home/contact">

                Helpline
            </a>

        </li>






        </ul>

    </nav>

    <!-- /Navigation -->

    </div>

    </div>
    </div>

    </header>




    </div>

    <!-- HEADER -->


    <script type="text/javascript">
        $(document).ready(function() {

            $('.set_langs').on('click', function() {

                var lang_url = $(this).data('href');

                $.ajax({
                    url: lang_url,
                    success: function(result) {

                        location.reload();



                    }
                });

            });

            $('.top-bar-right').load('https://dkten.com/home/top_bar_right');

        });
    </script>

    <script>
        ! function(e, t) {
            "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define &&
                define.amd ? define("darkmode-js", [], t) : "object" == typeof exports ? exports["darkmode-js"] = t() : e[
                    "darkmode-js"] = t()
        }("undefined" != typeof self ? self : this, (function() {
            return function(e) {
                var t = {};

                function n(o) {
                    if (t[o]) return t[o].exports;
                    var r = t[o] = {
                        i: o,
                        l: !1,
                        exports: {}
                    };
                    return e[o].call(r.exports, r, r.exports, n), r.l = !0, r.exports
                }
                return n.m = e, n.c = t, n.d = function(e, t, o) {
                    n.o(e, t) || Object.defineProperty(e, t, {
                        enumerable: !0,
                        get: o
                    })
                }, n.r = function(e) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol
                        .toStringTag, {
                            value: "Module"
                        }), Object.defineProperty(e, "__esModule", {
                        value: !0
                    })
                }, n.t = function(e, t) {
                    if (1 & t && (e = n(e)), 8 & t) return e;
                    if (4 & t && "object" == typeof e && e && e.__esModule) return e;
                    var o = Object.create(null);
                    if (n.r(o), Object.defineProperty(o, "default", {
                            enumerable: !0,
                            value: e
                        }), 2 & t && "string" != typeof e)
                        for (var r in e) n.d(o, r, function(t) {
                            return e[t]
                        }.bind(null, r));
                    return o
                }, n.n = function(e) {
                    var t = e && e.__esModule ? function() {
                        return e.default
                    } : function() {
                        return e
                    };
                    return n.d(t, "a", t), t
                }, n.o = function(e, t) {
                    return Object.prototype.hasOwnProperty.call(e, t)
                }, n.p = "", n(n.s = 0)
            }([function(e, t, n) {
                "use strict";
                Object.defineProperty(t, "__esModule", {
                    value: !0
                }), t.default = void 0;
                var o = function(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e)
                            if (Object.prototype.hasOwnProperty.call(e, n)) {
                                var o = Object.defineProperty && Object.getOwnPropertyDescriptor ?
                                    Object.getOwnPropertyDescriptor(e, n) : {};
                                o.get || o.set ? Object.defineProperty(t, n, o) : t[n] = e[n]
                            } return t.default = e, t
                }(n(1));
                var r = o.default;
                t.default = r, o.IS_BROWSER && function(e) {
                    e.Darkmode = o.default
                }(window), e.exports = t.default
            }, function(e, t, n) {
                "use strict";

                function o(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o
                            .writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                Object.defineProperty(t, "__esModule", {
                    value: !0
                }), t.default = t.IS_BROWSER = void 0;
                var r = "undefined" != typeof window;
                t.IS_BROWSER = r;
                var a = function() {
                    function e(t) {
                        if (function(e, t) {
                                if (!(e instanceof t)) throw new TypeError(
                                    "Cannot call a class as a function")
                            }(this, e), r) {
                            t = Object.assign({}, {
                                bottom: "32px",
                                left: "32px",

                                time: "0.3s",
                                mixColor: "#fff",
                                backgroundColor: "#fff",
                                buttonColorDark: "#100f2c",
                                buttonColorLight: "#fff",
                                label: "🌓",
                                saveInCookies: !0,
                                autoMatchOsTheme: !0
                            }, t);
                            var n =
                                "\n      .darkmode-layer {\n        position: fixed;\n        pointer-events: none;\n        background: "
                                .concat(t.mixColor, ";\n        transition: all ").concat(t.time,
                                    " ease;\n        mix-blend-mode: difference;\n      }\n\n      .darkmode-layer--button {\n        width: 2.9rem;\n        height: 2.9rem;\n        border-radius: 50%;\n        right: "
                                ).concat(t.right, ";\n        bottom: ").concat(t.bottom,
                                    ";\n        left: ").concat(t.left,
                                    ";\n      }\n\n      .darkmode-layer--simple {\n        width: 100%;\n        height: 100%;\n        top: 0;\n        left: 0;\n        transform: scale(1) !important;\n      }\n\n      .darkmode-layer--expanded {\n        transform: scale(100);\n        border-radius: 0;\n      }\n\n      .darkmode-layer--no-transition {\n        transition: none;\n      }\n\n      .darkmode-toggle {\n        background: "
                                ).concat(t.buttonColorDark,
                                    ";\n        width: 3rem;\n        height: 3rem;\n        position: fixed;\n        border-radius: 50%;\n        border:none;\n        right: "
                                ).concat(t.right, ";\n        bottom: ").concat(t.bottom,
                                    ";\n        left: ").concat(t.left,
                                    ";\n        cursor: pointer;\n        transition: all 0.5s ease;\n        display: flex;\n        justify-content: center;\n        align-items: center;\n      }\n\n      .darkmode-toggle--white {\n        background: "
                                ).concat(t.buttonColorLight,
                                    ";\n      }\n\n      .darkmode-toggle--inactive {\n        display: none;\n      }\n\n      .darkmode-background {\n        background: "
                                ).concat(t.backgroundColor,
                                    ";\n        position: fixed;\n        pointer-events: none;\n        z-index: -10;\n        width: 100%;\n        height: 100%;\n        top: 0;\n        left: 0;\n      }\n\n      img, .darkmode-ignore {\n        isolation: isolate;\n        display: inline-block;\n      }\n\n      @media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {\n        .darkmode-toggle {display: none !important}\n      }\n\n      @supports (-ms-ime-align:auto), (-ms-accelerator:true) {\n        .darkmode-toggle {display: none !important}\n      }\n    "
                                ),
                                o = document.createElement("div"),
                                a = document.createElement("button"),
                                i = document.createElement("div");
                            a.innerHTML = t.label, a.classList.add("darkmode-toggle--inactive"), o
                                .classList.add("darkmode-layer"), i.classList.add(
                                    "darkmode-background");
                            var d = "true" === window.localStorage.getItem("darkmode"),
                                s = t.autoMatchOsTheme && window.matchMedia(
                                    "(prefers-color-scheme: dark)").matches,
                                l = null === window.localStorage.getItem("darkmode");
                            (!0 === d && t.saveInCookies || l && s) && (o.classList.add(
                                "darkmode-layer--expanded", "darkmode-layer--simple",
                                "darkmode-layer--no-transition"), a.classList.add(
                                "darkmode-toggle--white"), document.body.classList.add(
                                "darkmode--activated")), document.body.insertBefore(a, document.body
                                    .firstChild), document.body.insertBefore(o, document.body
                                    .firstChild), document.body.insertBefore(i, document.body
                                    .firstChild), this.addStyle(n), this.button = a, this.layer = o,
                                this.saveInCookies = t.saveInCookies, this.time = t.time
                        }
                    }
                    var t, n, a;
                    return t = e, (n = [{
                        key: "addStyle",
                        value: function(e) {
                            var t = document.createElement("link");
                            t.setAttribute("rel", "stylesheet"), t.setAttribute(
                                    "type", "text/css"), t.setAttribute("href",
                                    "data:text/css;charset=UTF-8," +
                                    encodeURIComponent(e)), document.head
                                .appendChild(t)
                        }
                    }, {
                        key: "showWidget",
                        value: function() {
                            var e = this;
                            if (r) {
                                var t = this.button,
                                    n = this.layer,
                                    o = 1e3 * parseFloat(this.time);
                                t.classList.add("darkmode-toggle"), t.classList
                                    .remove("darkmode-toggle--inactive"), t
                                    .setAttribute("aria-label",
                                        "Activate dark mode"), t.setAttribute(
                                        "aria-checked", "false"), t.setAttribute(
                                        "role", "checkbox"), n.classList.add(
                                        "darkmode-layer--button"), t
                                    .addEventListener("click", (function() {
                                        var r = e.isActivated();
                                        r ? (n.classList.remove(
                                                    "darkmode-layer--simple"
                                                ), t.setAttribute(
                                                    "disabled", !0),
                                                setTimeout((function() {
                                                    n.classList
                                                        .remove(
                                                            "darkmode-layer--no-transition"
                                                        ), n
                                                        .classList
                                                        .remove(
                                                            "darkmode-layer--expanded"
                                                        ), t
                                                        .removeAttribute(
                                                            "disabled"
                                                        )
                                                }), 1)) : (n.classList.add(
                                                    "darkmode-layer--expanded"
                                                ), t.setAttribute(
                                                    "disabled", !0),
                                                setTimeout((function() {
                                                    n.classList.add(
                                                            "darkmode-layer--no-transition"
                                                        ), n
                                                        .classList
                                                        .add(
                                                            "darkmode-layer--simple"
                                                        ), t
                                                        .removeAttribute(
                                                            "disabled"
                                                        )
                                                }), o)), t.classList.toggle(
                                                "darkmode-toggle--white"),
                                            document.body.classList.toggle(
                                                "darkmode--activated"),
                                            window.localStorage.setItem(
                                                "darkmode", !r)
                                    }))
                            }
                        }
                    }, {
                        key: "toggle",
                        value: function() {
                            if (r) {
                                var e = this.layer,
                                    t = this.isActivated(),
                                    n = this.button;
                                e.classList.toggle("darkmode-layer--simple"),
                                    document.body.classList.toggle(
                                        "darkmode--activated"), window.localStorage
                                    .setItem("darkmode", !t), n.setAttribute(
                                        "aria-label", "De-activate dark mode"), n
                                    .setAttribute("aria-checked", "true")
                            }
                        }
                    }, {
                        key: "isActivated",
                        value: function() {
                            return r ? document.body.classList.contains(
                                "darkmode--activated") : null
                        }
                    }]) && o(t.prototype, n), a && o(t, a), e
                }();
                t.default = a
            }])
        }));
    </script>
    <!-- /HEADER -->
    {{ $slot }}
    <!-- FOOTER -->

    <!-- Messenger Chat Plugin Code -->

    <style>
        body {
            /* THIS PART IS EXCLUSIVLY MENTIONED IN FOOTER */
            font-size: 12px;
            background: #fff;
        }

        .navigation {
            /* THIS PART IS EXCLUSIVLY MENTIONED IN FOOTER */
            position: relative;
            text-align: left;
            line-height: 0;
        }

        .footer1-widgets {
            background: #f5f5f5;
            color: #666;
        }

        .footer1-widgets .col-md-3 {
            height: 285px;

        }

        .footer1-meta {
            background-color: #003893;
        }

        .app-footer img {
            width: 120px;
        }

        .qr-code img {
            width: 135px;
        }

        .row.foot-bar {
            background: #003893;
            color: #eee;
            padding: 13px 0px 0px;
        }

        h3.footer-title {
            text-transform: uppercase;
            font-size: 17px;
            margin: 20px 0px;
            text-decoration: underline;
            line-height: 17px;
        }

        .footer-widget li {
            line-height: 25px;
            font-size: 14px;
        }

        .footer1-widgets .container {
            padding: 20px 15px 0px 15px;
        }

        .footer1-widgets {
            padding: 0px 0 0px;
        }

        .footer1-widgets .fa {
            padding: 3px;
            border-radius: 2px;
            font-size: 17px;

        }

        .footer1-widgets .fa-facebook {
            font-size: 20px;
            color: white;
            background: #3B5998;

        }

        .footer1-widgets .fa-instagram {
            font-size: 20px;
            color: white;
            background: #2C6A93;
        }

        .footer1-widgets .fa-youtube {
            font-size: 20px;
            color: white;
            background: #C31A1E;
        }

        .footer1-widgets .fa-map-marker-alt,
        .footer1-widgets .fa-envelope {
            color: red;

        }

        .footer-widget h3.footer-title {

            color: #111111;
        }

        .footer-widget .footer-info-list ul li a {
            color: grey;

        }

        .footer-widget .footer-info-list ul li a:hover {
            color: rgb(25, 25, 155);
        }

    </style>

    <footer class="footer1">

        <div class="footer1-widgets">

            <div class="container">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 class="footer-title">Recognize Us</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="">About Dkten</a></li>
                                    <li><a href="">Contact Us</a></li>
                                    <li><a href="">Careers</a></li>
                                    <li><a href="">Mission &amp; Vision</a></li>
                                    <li><a href="">Legal Information</a></li>
                                    <li><a href="">Terms of Use</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 class="footer-title">Earn With Us</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="">Sell On Dkten</a></li>
                                    <li><a href="">Travel &amp; Tours</a></li>
                                    <li><a href="">Easy E-Service</a></li>
                                    <li><a href="">Employee Aid</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget mb-40 ">
                            <h3 class="footer-title">We Support You</h3>
                            <div class="footer-info-list">
                                <ul>

                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">Shipping</a></li>
                                    <li><a href="">Return, Cancellation &amp; Refund</a></li>


                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="footer-widget mb-40 ">
                            <h3 class="footer-title">We Are Available On</h3>
                            <div class="downloadappimages">
                                <div class="app-footer">
                                    <img src="https://cdn.sastodeal.com/logo/default/Sastodeal_App_on_Playstore.png">
                                    <img src="https://cdn.sastodeal.com/logo/default/Sastodeal_App_on_ios_store.png">
                                    <img src="https://dkten.com/uploads/qrcode_www.dkten.com.png">
                                </div>

                                <div class="qr-code">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="border-top: 1px solid #ccc;">
                <div class="row  foot-bar" style="padding-bottom:15px;">
                    <div class="col-md-2  new-address-section">
                        <p><i class="fas fa-map-marker-alt"></i> <b>Head Office: </b>Belbari, Morang</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5 new-address-section">
                                <p><i class="fas fa-map-marker-alt"></i> <b>Corporate Office:</b> Chabahil
                                    Saraswotinagar, Kathmandu</p>
                            </div>
                            <div class="col-md-5 new-address-section">
                                <p><i class="fas fa-map-marker-alt"></i> <b>Hub center:</b> Dharan bhanuchowk, Sunsari
                            </div>
                            <div class="col-md-2 new-address-section">
                                <p><i class="fas fa-envelope"></i> info@dkten.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 ">
                        <div class="new-address-section mg-tp-20-ftr">
                            <span class="fin-us-footer-title"><b>Find us on: </b></span>

                            <a href="https://www.facebook.com/DK-TEN-108691891258650/" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/dkten10" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UC8toL2nKg0jXwefxS4Rcz_w" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                            <!-- <a href="https://www.tiktok.com/@dkten0?" target="_blank"><img src="http://demo.dkten.com/assets/images/tik-tok.svg" class="fa fa-tiktok"></a> -->
                        </div>
                    </div>
                </div>

            </div>




        </div>


        </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                var availableTags = [{
                        label: "Men's Genuine Leather Biker Jacket Brown",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Genuine Leather Biker Jacket Brown"
                    }, {
                        label: "Skinny Jeans",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Skinny Jeans"
                    }, {
                        label: "Black Fitting Jeans",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Black Fitting Jeans"
                    }, {
                        label: "Dustproof Windcheater ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Dustproof Windcheater "
                    }, {
                        label: "Jeans Shirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Jeans Shirt"
                    }, {
                        label: "Baseball Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Jacket"
                    }, {
                        label: "Straight Fit Jeans Pant",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Straight Fit Jeans Pant"
                    }, {
                        label: "Body size T-Shirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Body size T-Shirt"
                    }, {
                        label: "Baseball Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Jacket"
                    }, {
                        label: "What If ?",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/What If ?"
                    }, {
                        label: "Baseball Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Jacket"
                    }, {
                        label: "MusclePharm Essentials Omega-3 Fish Oil",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/MusclePharm Essentials Omega-3 Fish Oil"
                    }, {
                        label: "Baseball Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Jacket"
                    }, {
                        label: "Bags",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Bags"
                    }, {
                        label: "Party Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Party Shoe"
                    }, {
                        label: "Chelsea Boots",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Chelsea Boots"
                    }, {
                        label: "Baseball Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Jacket"
                    }, {
                        label: " MusclePharm Combat 100% Whey, Muscle-Building  Whey Protein Powder",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/ MusclePharm Combat 100% Whey, Muscle-Building  Whey Protein Powder"
                    }, {
                        label: "Onepice Dress",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Onepice Dress"
                    }, {
                        label: "3 Inspiration Books Combo Offer",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/3 Inspiration Books Combo Offer"
                    }, {
                        label: "Religious Books",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Religious Books"
                    }, {
                        label: "Ladies Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Ladies Shoe"
                    }, {
                        label: "T-Shirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/T-Shirt"
                    }, {
                        label: "Coat",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Coat"
                    }, {
                        label: "Travel Bags",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Travel Bags"
                    }, {
                        label: "School Backpack",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/School Backpack"
                    }, {
                        label: "Virjeans - Stretchy Ripped Design Biker Denim Jeans",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Virjeans - Stretchy Ripped Design Biker Denim Jeans"
                    }, {
                        label: "Sunglasses",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sunglasses"
                    }, {
                        label: "Blue Kurti Set for Women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Blue Kurti Set for Women"
                    }, {
                        label: "Anti Blue Light Glasses",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Anti Blue Light Glasses"
                    }, {
                        label: "Anti blue light ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Anti blue light "
                    }, {
                        label: "P&S Women's Printed Kurti Set",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/P&S Women's Printed Kurti Set"
                    }, {
                        label: "P&S Fashion Dark Green Printed Kurti Set For Women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/P&S Fashion Dark Green Printed Kurti Set For Women"
                    }, {
                        label: "P&S Printed Pink Kurti With White Skirt & Shawl Set For Women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/P&S Printed Pink Kurti With White Skirt & Shawl Set For Women"
                    }, {
                        label: "Grey Kurti Set for Women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Grey Kurti Set for Women"
                    }, {
                        label: "Light Pink Kurti Set",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Light Pink Kurti Set"
                    }, {
                        label: "Polarized UV Protection Sports Fishing Driving Sunglasses for Men Al-Mg Metal Frame",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Polarized UV Protection Sports Fishing Driving Sunglasses for Men Al-Mg Metal Frame"
                    }, {
                        label: "Baseball  Sawor Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball  Sawor Jacket"
                    }, {
                        label: "Sports Shoes ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sports Shoes "
                    }, {
                        label: "Sneaker Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sneaker Shoe"
                    }, {
                        label: "Casual Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Casual Shoe"
                    }, {
                        label: "Baseball Polyester Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baseball Polyester Jacket"
                    }, {
                        label: "Oversize Cotton Tshirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Oversize Cotton Tshirt"
                    }, {
                        label: "Oversize Summer Tshirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Oversize Summer Tshirt"
                    }, {
                        label: "Laptop Bags",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Laptop Bags"
                    }, {
                        label: "Travel Bags",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Travel Bags"
                    }, {
                        label: "Loafer Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Loafer Shoe"
                    }, {
                        label: "Loafer Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Loafer Shoe"
                    }, {
                        label: "Sports Shoe",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sports Shoe"
                    }, {
                        label: "Open Back Loafer",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Open Back Loafer"
                    }, {
                        label: "A MAN CALLED OVE",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/A MAN CALLED OVE"
                    }, {
                        label: "Think and Grow Rich",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Think and Grow Rich"
                    }, {
                        label: "Deep Work",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Deep Work"
                    }, {
                        label: "Elon Musk",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Elon Musk"
                    }, {
                        label: "Water Brush Pen",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Water Brush Pen"
                    }, {
                        label: "Wooden Nib holder pen",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Wooden Nib holder pen"
                    }, {
                        label: "Sexy 2pcs Silk Night dress for women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sexy 2pcs Silk Night dress for women"
                    }, {
                        label: "Half Cup Padded wired Bra",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Half Cup Padded wired Bra"
                    }, {
                        label: "Business Books",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Business Books"
                    }, {
                        label: "Share Knowledge Books",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Share Knowledge Books"
                    }, {
                        label: "Sexy Lace Night Dress",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sexy Lace Night Dress"
                    }, {
                        label: "Wire free push up Bra",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Wire free push up Bra"
                    }, {
                        label: "15 Pcs Makeup Brush Set",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/15 Pcs Makeup Brush Set"
                    }, {
                        label: "Nude Eye Shadow Makeup Palette",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Nude Eye Shadow Makeup Palette"
                    }, {
                        label: "Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Jacket"
                    }, {
                        label: " Jeans pant",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/ Jeans pant"
                    }, {
                        label: "Polo T-Shirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Polo T-Shirt"
                    }, {
                        label: "Half T-Shirt",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Half T-Shirt"
                    }, {
                        label: "Geemy GM 6008 Professional Hair Clipper Rechargeable Hair Trimmer",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Geemy GM 6008 Professional Hair Clipper Rechargeable Hair Trimmer"
                    }, {
                        label: "Shorts for Men",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Shorts for Men"
                    }, {
                        label: "Women Party Wallet",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Women Party Wallet"
                    }, {
                        label: "Leather Backpack",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Leather Backpack"
                    }, {
                        label: "4 wheeler Kids motor",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/4 wheeler Kids motor"
                    }, {
                        label: "Kids ride on Vespa Scooter",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids ride on Vespa Scooter"
                    }, {
                        label: "Kids  Ride on Lamborghini Car",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids  Ride on Lamborghini Car"
                    }, {
                        label: "Kids Dress",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids Dress"
                    }, {
                        label: "Kids Part wear",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids Part wear"
                    }, {
                        label: "Waterproof HD  Sports action Camera with Wi-Fi",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Waterproof HD  Sports action Camera with Wi-Fi"
                    }, {
                        label: "Kids T-Shirt  & Jumpsuit half pant outfit sets",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids T-Shirt  & Jumpsuit half pant outfit sets"
                    }, {
                        label: "Kids Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Kids Jacket"
                    }, {
                        label: "Chiffon Saree",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Chiffon Saree"
                    }, {
                        label: "Indian Tunic Tops Crepe Kurti Set with Dupatta",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Indian Tunic Tops Crepe Kurti Set with Dupatta"
                    }, {
                        label: "Straight Long Kurti Set",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Straight Long Kurti Set"
                    }, {
                        label: "Unisex Bathrobe Pajama",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Unisex Bathrobe Pajama"
                    }, {
                        label: "Lovebirds Coffee mug set",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Lovebirds Coffee mug set"
                    }, {
                        label: "Sticky Bra Strapless invisible backless",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Sticky Bra Strapless invisible backless"
                    }, {
                        label: "Ceramic Coffee Cup",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Ceramic Coffee Cup"
                    }, {
                        label: "Portable Multi-purpose Table",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Portable Multi-purpose Table"
                    }, {
                        label: "Hair Curler and Straightener 2 in 1",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Hair Curler and Straightener 2 in 1"
                    }, {
                        label: "Lightening Gaming Heavy Bass Headphone",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Lightening Gaming Heavy Bass Headphone"
                    }, {
                        label: "8 digits Price Gun",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/8 digits Price Gun"
                    }, {
                        label: "Rechargeable Hair Trimmer",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Rechargeable Hair Trimmer"
                    }, {
                        label: "Mobile Zoom Lens with Tripod",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Mobile Zoom Lens with Tripod"
                    }, {
                        label: "Bluetooth Smart watch for android & IOS phone with support sim card",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Bluetooth Smart watch for android & IOS phone with support sim card"
                    }, {
                        label: "Huawei Honor Smart watch",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Huawei Honor Smart watch"
                    }, {
                        label: "Anti- Theft Backpack",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Anti- Theft Backpack"
                    }, {
                        label: "Anti- Theft Backpack with IPhone Cable",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Anti- Theft Backpack with IPhone Cable"
                    }, {
                        label: "Half pant / Shorts ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Half pant / Shorts "
                    }, {
                        label: "Drying cloth stand",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Drying cloth stand"
                    }, {
                        label: "Soft Toy Bull dog",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Soft Toy Bull dog"
                    }, {
                        label: " Men's Leather Jacket Double Belt  Crummy Motorcycle Zip Slim Fit Biker Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/ Men's Leather Jacket Double Belt  Crummy Motorcycle Zip Slim Fit Biker Jacket"
                    }, {
                        label: "Men's Genuine Brown Leather Jacket ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Genuine Brown Leather Jacket "
                    }, {
                        label: "Men's Genuine Slim fit Leather Brown Jacket ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Genuine Slim fit Leather Brown Jacket "
                    }, {
                        label: "Men's Genuine Long Slim Fit Leather Jacket ",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Genuine Long Slim Fit Leather Jacket "
                    }, {
                        label: "Men's Leather Jacket Double Belt Crummy Motorcycle Zip Slim Fit Biker Jacket",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Leather Jacket Double Belt Crummy Motorcycle Zip Slim Fit Biker Jacket"
                    }, {
                        label: "Indian Fashion Tunic Tops Cotton Kurti Pant Set With Dupatta for Women",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Indian Fashion Tunic Tops Cotton Kurti Pant Set With Dupatta for Women"
                    }, {
                        label: "Squirrel Baby Scooter",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Squirrel Baby Scooter"
                    }, {
                        label: "Baby Canopy handle Tricycle",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Baby Canopy handle Tricycle"
                    }, {
                        label: "Men's Casual Fashion Trouser",
                        value: "https://www.dkten.com/home/category/0/0-0/0/0/Men's Casual Fashion Trouser"
                    }, {
                        label: "Gvendor",
                        value: "https://www.dkten.com/home/all_vendor/23"
                    }, {
                        label: "LABIM MALL",
                        value: "https://www.dkten.com/home/all_vendor/24"
                    }, {
                        label: "Delivery Service",
                        value: "https://www.dkten.com/home/all_vendor/25"
                    }, {
                        label: "RB Complex",
                        value: "https://www.dkten.com/home/all_vendor/26"
                    }, {
                        label: "test",
                        value: "https://www.dkten.com/home/all_vendor/34"
                    }, {
                        label: "KL TOWER",
                        value: "https://www.dkten.com/home/all_vendor/35"
                    }, {
                        label: "CTC MALL",
                        value: "https://www.dkten.com/home/all_vendor/37"
                    }, {
                        label: "CIVIL MALL",
                        value: "https://www.dkten.com/home/all_vendor/38"
                    }, {
                        label: "RISING MALL",
                        value: "https://www.dkten.com/home/all_vendor/39"
                    }, {
                        label: "LOTSE MALL",
                        value: "https://www.dkten.com/home/all_vendor/40"
                    }, {
                        label: "EYEPLEX MALL",
                        value: "https://www.dkten.com/home/all_vendor/41"
                    }, {
                        label: "BISHAL BAZZAR",
                        value: "https://www.dkten.com/home/all_vendor/42"
                    }, {
                        label: "BISHWO JYOTI MALL",
                        value: "https://www.dkten.com/home/all_vendor/43"
                    }, {
                        label: "BUDDHA MALL",
                        value: "https://www.dkten.com/home/all_vendor/44"
                    }, {
                        label: "CHABAHIL PLAZA",
                        value: "https://www.dkten.com/home/all_vendor/45"
                    }, {
                        label: "CITY CENTER",
                        value: "https://www.dkten.com/home/all_vendor/46"
                    }, {
                        label: "KANTIPUR MALL",
                        value: "https://www.dkten.com/home/all_vendor/47"
                    }, {
                        label: "KATHMANDU MALL",
                        value: "https://www.dkten.com/home/all_vendor/48"
                    }, {
                        label: "PEOPLES PLAZA",
                        value: "https://www.dkten.com/home/all_vendor/49"
                    }, {
                        label: "RANJANA TRADE CENTER",
                        value: "https://www.dkten.com/home/all_vendor/50"
                    }, {
                        label: "STAR MALL",
                        value: "https://www.dkten.com/home/all_vendor/51"
                    }, {
                        label: "WORLD TRADE CENTER",
                        value: "https://www.dkten.com/home/all_vendor/52"
                    }, {
                        label: "PARK PLAZA, Khicchapokari, Kathmandu",
                        value: "https://www.dkten.com/home/all_vendor/53"
                    }, {
                        label: "TAMRAKAR COMPLEX, Newroad, Kathmandu",
                        value: "https://www.dkten.com/home/all_vendor/54"
                    }, {
                        label: "MAYALU CENTER, Durbarmarg, Kathmandu",
                        value: "https://www.dkten.com/home/all_vendor/55"
                    }, {
                        label: "CHINA TOWN SHOPPING CENTER, Sundhara, Kathmandu",
                        value: "https://www.dkten.com/home/all_vendor/56"
                    }, {
                        label: "ARYAL COMPLEX, Maitidevi, Kathmandu",
                        value: "https://www.dkten.com/home/all_vendor/57"
                    }, {
                        label: "aa",
                        value: "https://www.dkten.com/home/all_vendor/58"
                    },
                    {
                        label: "Qfx",
                        value: "https://www.dkten.com/home/vendor_profile/24/Qfx"
                    }, {
                        label: "Labin Mall Suresh",
                        value: "https://www.dkten.com/home/vendor_profile/25/Labin Mall Suresh"
                    }, {
                        label: "SMALL PICKUP VAN",
                        value: "https://www.dkten.com/home/vendor_profile/26/SMALL PICKUP VAN"
                    }, {
                        label: "abc ",
                        value: "https://www.dkten.com/home/vendor_profile/27/abc "
                    }, {
                        label: "Test 001",
                        value: "https://www.dkten.com/home/vendor_profile/28/Test 001"
                    }, {
                        label: "Oh La La",
                        value: "https://www.dkten.com/home/vendor_profile/29/Oh La La"
                    }, {
                        label: "Sunil Maharjan",
                        value: "https://www.dkten.com/home/vendor_profile/30/Sunil Maharjan"
                    }, {
                        label: "Sunil Maharjan",
                        value: "https://www.dkten.com/home/vendor_profile/31/Sunil Maharjan"
                    }, {
                        label: "R.S.A TRISHA",
                        value: "https://www.dkten.com/home/vendor_profile/32/R.S.A TRISHA"
                    }, {
                        label: "GIFT HOUSE",
                        value: "https://www.dkten.com/home/vendor_profile/33/GIFT HOUSE"
                    }, {
                        label: "SMRITI",
                        value: "https://www.dkten.com/home/vendor_profile/34/SMRITI"
                    }, {
                        label: "SHREEMAN SHREEMATI",
                        value: "https://www.dkten.com/home/vendor_profile/35/SHREEMAN SHREEMATI"
                    }, {
                        label: "MAHALAS",
                        value: "https://www.dkten.com/home/vendor_profile/36/MAHALAS"
                    }, {
                        label: "SHREE READYMADE STORE",
                        value: "https://www.dkten.com/home/vendor_profile/37/SHREE READYMADE STORE"
                    }, {
                        label: "SHOE FIELD",
                        value: "https://www.dkten.com/home/vendor_profile/38/SHOE FIELD"
                    }, {
                        label: "GULSAN COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/39/GULSAN COLLECTION"
                    }, {
                        label: "ANKIT STORE",
                        value: "https://www.dkten.com/home/vendor_profile/40/ANKIT STORE"
                    }, {
                        label: "BI. OM STORE",
                        value: "https://www.dkten.com/home/vendor_profile/41/BI. OM STORE"
                    }, {
                        label: "SATYAM STORE",
                        value: "https://www.dkten.com/home/vendor_profile/42/SATYAM STORE"
                    }, {
                        label: "LOVE CRAFT",
                        value: "https://www.dkten.com/home/vendor_profile/43/LOVE CRAFT"
                    }, {
                        label: "JAGDAMBA TIMES",
                        value: "https://www.dkten.com/home/vendor_profile/44/JAGDAMBA TIMES"
                    }, {
                        label: "KRISH STORE",
                        value: "https://www.dkten.com/home/vendor_profile/45/KRISH STORE"
                    }, {
                        label: "GOGG PLUS",
                        value: "https://www.dkten.com/home/vendor_profile/46/GOGG PLUS"
                    }, {
                        label: "Oh La La",
                        value: "https://www.dkten.com/home/vendor_profile/47/Oh La La"
                    }, {
                        label: "PASHUPATI EMPORIUM",
                        value: "https://www.dkten.com/home/vendor_profile/48/PASHUPATI EMPORIUM"
                    }, {
                        label: "ARIC TIMES",
                        value: "https://www.dkten.com/home/vendor_profile/49/ARIC TIMES"
                    }, {
                        label: "ASHOKS",
                        value: "https://www.dkten.com/home/vendor_profile/50/ASHOKS"
                    }, {
                        label: "MAN PRASAND",
                        value: "https://www.dkten.com/home/vendor_profile/51/MAN PRASAND"
                    }, {
                        label: "LOVE LITE",
                        value: "https://www.dkten.com/home/vendor_profile/52/LOVE LITE"
                    }, {
                        label: "BASEMAN ",
                        value: "https://www.dkten.com/home/vendor_profile/53/BASEMAN "
                    }, {
                        label: "GAMEHOLIC",
                        value: "https://www.dkten.com/home/vendor_profile/54/GAMEHOLIC"
                    }, {
                        label: "NANDAN",
                        value: "https://www.dkten.com/home/vendor_profile/55/NANDAN"
                    }, {
                        label: "COS, GUYZ & DOOLS",
                        value: "https://www.dkten.com/home/vendor_profile/56/COS, GUYZ & DOOLS"
                    }, {
                        label: "NIDI COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/57/NIDI COLLECTION"
                    }, {
                        label: "SBR TRASE",
                        value: "https://www.dkten.com/home/vendor_profile/58/SBR TRASE"
                    }, {
                        label: "STYLE HUNT",
                        value: "https://www.dkten.com/home/vendor_profile/59/STYLE HUNT"
                    }, {
                        label: "ORANGE BOOM",
                        value: "https://www.dkten.com/home/vendor_profile/60/ORANGE BOOM"
                    }, {
                        label: "NEW GIRLS WEAR",
                        value: "https://www.dkten.com/home/vendor_profile/61/NEW GIRLS WEAR"
                    }, {
                        label: "COLOUR",
                        value: "https://www.dkten.com/home/vendor_profile/62/COLOUR"
                    }, {
                        label: "BLUE BELL",
                        value: "https://www.dkten.com/home/vendor_profile/63/BLUE BELL"
                    }, {
                        label: "HOC",
                        value: "https://www.dkten.com/home/vendor_profile/64/HOC"
                    }, {
                        label: "D&D ENTERPRISES",
                        value: "https://www.dkten.com/home/vendor_profile/65/D&D ENTERPRISES"
                    }, {
                        label: "RB Complex - Newroad, Kathmandu",
                        value: "https://www.dkten.com/home/vendor_profile/66/RB Complex - Newroad, Kathmandu"
                    }, {
                        label: "STEPS",
                        value: "https://www.dkten.com/home/vendor_profile/67/STEPS"
                    }, {
                        label: "BELA",
                        value: "https://www.dkten.com/home/vendor_profile/68/BELA"
                    }, {
                        label: "MUST WEAR CENTER",
                        value: "https://www.dkten.com/home/vendor_profile/69/MUST WEAR CENTER"
                    }, {
                        label: "TAKEOVER",
                        value: "https://www.dkten.com/home/vendor_profile/70/TAKEOVER"
                    }, {
                        label: "SAMAGRI",
                        value: "https://www.dkten.com/home/vendor_profile/71/SAMAGRI"
                    }, {
                        label: "RONAK TRADERS",
                        value: "https://www.dkten.com/home/vendor_profile/72/RONAK TRADERS"
                    }, {
                        label: "MELINA STORE",
                        value: "https://www.dkten.com/home/vendor_profile/73/MELINA STORE"
                    }, {
                        label: "BINA LUGGAGE HOUSE",
                        value: "https://www.dkten.com/home/vendor_profile/74/BINA LUGGAGE HOUSE"
                    }, {
                        label: "TROJAN WEAR",
                        value: "https://www.dkten.com/home/vendor_profile/75/TROJAN WEAR"
                    }, {
                        label: "METRO COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/76/METRO COLLECTION"
                    }, {
                        label: "B&B IMPEX",
                        value: "https://www.dkten.com/home/vendor_profile/77/B&B IMPEX"
                    }, {
                        label: "ANUSKA EMPORIUM",
                        value: "https://www.dkten.com/home/vendor_profile/78/ANUSKA EMPORIUM"
                    }, {
                        label: "KUX BUSINESS LINK",
                        value: "https://www.dkten.com/home/vendor_profile/79/KUX BUSINESS LINK"
                    }, {
                        label: "LAFA OPTICAL",
                        value: "https://www.dkten.com/home/vendor_profile/80/LAFA OPTICAL"
                    }, {
                        label: "ARS COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/81/ARS COLLECTION"
                    }, {
                        label: "RAHUL TRADE",
                        value: "https://www.dkten.com/home/vendor_profile/82/RAHUL TRADE"
                    }, {
                        label: "JEANS PALACE",
                        value: "https://www.dkten.com/home/vendor_profile/83/JEANS PALACE"
                    }, {
                        label: "YEARCORN",
                        value: "https://www.dkten.com/home/vendor_profile/84/YEARCORN"
                    }, {
                        label: "YASH IMPEX",
                        value: "https://www.dkten.com/home/vendor_profile/85/YASH IMPEX"
                    }, {
                        label: "G.S.S READYMADE",
                        value: "https://www.dkten.com/home/vendor_profile/86/G.S.S READYMADE"
                    }, {
                        label: "ORIGIN",
                        value: "https://www.dkten.com/home/vendor_profile/87/ORIGIN"
                    }, {
                        label: "THAI KOREAN COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/88/THAI KOREAN COLLECTION"
                    }, {
                        label: "POLITE STORE",
                        value: "https://www.dkten.com/home/vendor_profile/89/POLITE STORE"
                    }, {
                        label: "GOG HOUSE",
                        value: "https://www.dkten.com/home/vendor_profile/90/GOG HOUSE"
                    }, {
                        label: "CITI FASHION",
                        value: "https://www.dkten.com/home/vendor_profile/91/CITI FASHION"
                    }, {
                        label: "RB SPORTS",
                        value: "https://www.dkten.com/home/vendor_profile/92/RB SPORTS"
                    }, {
                        label: "JEANS BAR",
                        value: "https://www.dkten.com/home/vendor_profile/93/JEANS BAR"
                    }, {
                        label: "FLASH LIGHT",
                        value: "https://www.dkten.com/home/vendor_profile/94/FLASH LIGHT"
                    }, {
                        label: "AYUSHMA IMPEX",
                        value: "https://www.dkten.com/home/vendor_profile/95/AYUSHMA IMPEX"
                    }, {
                        label: "MODERN WEAR",
                        value: "https://www.dkten.com/home/vendor_profile/96/MODERN WEAR"
                    }, {
                        label: "ANNAPURNA BAGS & COSMETIC",
                        value: "https://www.dkten.com/home/vendor_profile/97/ANNAPURNA BAGS & COSMETIC"
                    }, {
                        label: "FLORANCE",
                        value: "https://www.dkten.com/home/vendor_profile/98/FLORANCE"
                    }, {
                        label: "REAL FASHION",
                        value: "https://www.dkten.com/home/vendor_profile/99/REAL FASHION"
                    }, {
                        label: "SAHAS SPORTS",
                        value: "https://www.dkten.com/home/vendor_profile/100/SAHAS SPORTS"
                    }, {
                        label: "BIJULI SANSAR",
                        value: "https://www.dkten.com/home/vendor_profile/101/BIJULI SANSAR"
                    }, {
                        label: "S.B SHRESTHA TRADERS",
                        value: "https://www.dkten.com/home/vendor_profile/102/S.B SHRESTHA TRADERS"
                    }, {
                        label: "YOUWE HOME",
                        value: "https://www.dkten.com/home/vendor_profile/103/YOUWE HOME"
                    }, {
                        label: "KALIKA ENTERPRISES",
                        value: "https://www.dkten.com/home/vendor_profile/104/KALIKA ENTERPRISES"
                    }, {
                        label: "A&A READYMADE",
                        value: "https://www.dkten.com/home/vendor_profile/105/A&A READYMADE"
                    }, {
                        label: "LITTLE ONES",
                        value: "https://www.dkten.com/home/vendor_profile/106/LITTLE ONES"
                    }, {
                        label: "NEW FASHION COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/107/NEW FASHION COLLECTION"
                    }, {
                        label: "RANGOLI",
                        value: "https://www.dkten.com/home/vendor_profile/108/RANGOLI"
                    }, {
                        label: "SMART FIT",
                        value: "https://www.dkten.com/home/vendor_profile/109/SMART FIT"
                    }, {
                        label: "SAHARA BOUTIQUE",
                        value: "https://www.dkten.com/home/vendor_profile/110/SAHARA BOUTIQUE"
                    }, {
                        label: "OSA STATION",
                        value: "https://www.dkten.com/home/vendor_profile/111/OSA STATION"
                    }, {
                        label: "GORKHA MANAKAMANA STORE",
                        value: "https://www.dkten.com/home/vendor_profile/112/GORKHA MANAKAMANA STORE"
                    }, {
                        label: "HARMONY",
                        value: "https://www.dkten.com/home/vendor_profile/113/HARMONY"
                    }, {
                        label: "ARIHANT KITCHEN WEAR",
                        value: "https://www.dkten.com/home/vendor_profile/114/ARIHANT KITCHEN WEAR"
                    }, {
                        label: "CHASMA PASAL",
                        value: "https://www.dkten.com/home/vendor_profile/115/CHASMA PASAL"
                    }, {
                        label: "TANYA GIFT CENTER",
                        value: "https://www.dkten.com/home/vendor_profile/116/TANYA GIFT CENTER"
                    }, {
                        label: "CMG SHANGAI LUGGAGE HOME",
                        value: "https://www.dkten.com/home/vendor_profile/117/CMG SHANGAI LUGGAGE HOME"
                    }, {
                        label: "NEXT FASHION",
                        value: "https://www.dkten.com/home/vendor_profile/118/NEXT FASHION"
                    }, {
                        label: "RURU MAI GIFT CENTER",
                        value: "https://www.dkten.com/home/vendor_profile/119/RURU MAI GIFT CENTER"
                    }, {
                        label: "GUCCI COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/120/GUCCI COLLECTION"
                    }, {
                        label: "tert",
                        value: "https://www.dkten.com/home/vendor_profile/121/tert"
                    }, {
                        label: "test",
                        value: "https://www.dkten.com/home/vendor_profile/122/test"
                    }, {
                        label: "Siddhakali Optical",
                        value: "https://www.dkten.com/home/vendor_profile/124/Siddhakali Optical"
                    }, {
                        label: "aaa",
                        value: "https://www.dkten.com/home/vendor_profile/125/aaa"
                    }, {
                        label: "Aarambha Store",
                        value: "https://www.dkten.com/home/vendor_profile/126/Aarambha Store"
                    }, {
                        label: "P & S SWASTIK COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/127/P & S SWASTIK COLLECTION"
                    }, {
                        label: "Rapid Shoe",
                        value: "https://www.dkten.com/home/vendor_profile/128/Rapid Shoe"
                    }, {
                        label: "Laceitnepal",
                        value: "https://www.dkten.com/home/vendor_profile/129/Laceitnepal"
                    }, {
                        label: "Abhishek ",
                        value: "https://www.dkten.com/home/vendor_profile/131/Abhishek "
                    }, {
                        label: "BS COLLECTION",
                        value: "https://www.dkten.com/home/vendor_profile/132/BS COLLECTION"
                    }, {
                        label: "Harati Bags Suppliers",
                        value: "https://www.dkten.com/home/vendor_profile/133/Harati Bags Suppliers"
                    }, {
                        label: "AB Tech",
                        value: "https://www.dkten.com/home/vendor_profile/134/AB Tech"
                    }, {
                        label: "Himshikar Books & Stationery",
                        value: "https://www.dkten.com/home/vendor_profile/135/Himshikar Books & Stationery"
                    }, {
                        label: "Aroma Musical Center",
                        value: "https://www.dkten.com/home/vendor_profile/136/Aroma Musical Center"
                    }, {
                        label: "Prem Sagar Store",
                        value: "https://www.dkten.com/home/vendor_profile/137/Prem Sagar Store"
                    }, {
                        label: "Nepal Books Store",
                        value: "https://www.dkten.com/home/vendor_profile/138/Nepal Books Store"
                    }, {
                        label: "The Purple Arrow",
                        value: "https://www.dkten.com/home/vendor_profile/139/The Purple Arrow"
                    }, {
                        label: "Urban Basis",
                        value: "https://www.dkten.com/home/vendor_profile/140/Urban Basis"
                    }, {
                        label: "Neermal",
                        value: "https://www.dkten.com/home/vendor_profile/141/Neermal"
                    }, {
                        label: "D Beauty Zone",
                        value: "https://www.dkten.com/home/vendor_profile/142/D Beauty Zone"
                    }, {
                        label: "D Boutique Collection",
                        value: "https://www.dkten.com/home/vendor_profile/143/D Boutique Collection"
                    }, {
                        label: "prabin",
                        value: "https://www.dkten.com/home/vendor_profile/144/prabin"
                    }, {
                        label: "prabin",
                        value: "https://www.dkten.com/home/vendor_profile/145/prabin"
                    }, {
                        label: "prabin thapa",
                        value: "https://www.dkten.com/home/vendor_profile/146/prabin thapa"
                    }, {
                        label: "rohan sharma",
                        value: "https://www.dkten.com/home/vendor_profile/147/rohan sharma"
                    }, {
                        label: "rohan",
                        value: "https://www.dkten.com/home/vendor_profile/148/rohan"
                    }, {
                        label: "Toy Joy Kids Nepal",
                        value: "https://www.dkten.com/home/vendor_profile/149/Toy Joy Kids Nepal"
                    }, {
                        label: "MusclePharm House",
                        value: "https://www.dkten.com/home/vendor_profile/150/MusclePharm House"
                    }, {
                        label: "Srijana Fancy Collection",
                        value: "https://www.dkten.com/home/vendor_profile/151/Srijana Fancy Collection"
                    }, {
                        label: "Brand Shoe",
                        value: "https://www.dkten.com/home/vendor_profile/153/Brand Shoe"
                    }, {
                        label: "Sahara Nepal",
                        value: "https://www.dkten.com/home/vendor_profile/154/Sahara Nepal"
                    }, {
                        label: "The Blue Moon",
                        value: "https://www.dkten.com/home/vendor_profile/155/The Blue Moon"
                    }, {
                        label: "The Hangerrs Shop",
                        value: "https://www.dkten.com/home/vendor_profile/156/The Hangerrs Shop"
                    }, {
                        label: "Harati Bags Ason",
                        value: "https://www.dkten.com/home/vendor_profile/157/Harati Bags Ason"
                    }, {
                        label: "A-One Nepal Leather Craft",
                        value: "https://www.dkten.com/home/vendor_profile/158/A-One Nepal Leather Craft"
                    }, {
                        label: "Ninety6 Sports",
                        value: "https://www.dkten.com/home/vendor_profile/159/Ninety6 Sports"
                    },
                ];
                $("#tags").autocomplete({
                    source: availableTags,
                    select: function(event, ui) {
                        if (ui.item.value != '') {
                            window.location.href = ui.item.value;
                        }

                    }
                });
            });
        </script>
        <script>
            console.log(availableTags);
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- JS START -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://dkten.com/template/front/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://dkten.com/template/front/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>


    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({

            loop: true,
            dots: false,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 3,
                    loop: true
                },
                480: {
                    items: 3,
                    loop: true
                },
                769: {
                    items: 5,
                    loop: true
                }
            }
        });
    </script>

    </script>
    @livewireScripts

    <!-- JS END -->
</body>

</html>
