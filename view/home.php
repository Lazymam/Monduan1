<?php
$html_dssp_new = showsp($dssp_new);
$html_dssp_best = showsp($dssp_best);
$html_dssp_view = showsp($dssp_view);
$html_dssp_cafe=showsp($dssp_cafe);
$html_dssp_tra=showsp($dssp_tra);
?>
<div class="containerfull">
  <style>
    * {
      box-sizing: border-box
    }

    body {
      font-family: Verdana, sans-serif;
      margin: 0
    }

    .mySlides {
      display: none
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

      .prev,
      .next,
      .text {
        font-size: 11px
      }
    }
  </style>
  </head>

  <body>

    <div class="slideshow-container">

      <div class="mySlides fade">

        <img src="layout/images/banner.webp" style="width:100%">
        <div class="text"></div>
      </div>

      <div class="mySlides fade">

        <img src="layout/images/banner.webp" style="width:100%">
        <div class="text"></div>
      </div>

      <div class="mySlides fade">

        <img src="layout/images/banner.webp" style="width:100%">
        <div class="text"></div>
      </div>

      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
</div>

<section class="containerfull">
  <div class="container">
    <h1>SẢN PHẨM HOT</h1><br>
    <div class="containerfull">
      <div class="box50 mr15">
        <img src="layout/images/banner2.webp" alt="">
      </div>
      <?= $html_dssp_best ?>
    </div>

    <div class="containerfull mr30">
      <h1>SẢN PHẨM MỚI</h1><br>
      <?= $html_dssp_new; ?>
    </div>

    <div class="containerfull mr30">
      <h1>SẢN PHẨM NHIỀU NGƯỜI XEM</h1><br>
      <?= $html_dssp_view ?>
    </div>

  </div>
</section>


<section class="containerfull bg1 padd50">
  <div class="container">
    <h1>DANH MỤC SẢN PHẨM HOT</h1>
    <div class="row">
      <h2>Cà phê</h2>
    </div>
    <div class="row">
    <?= $html_dssp_cafe ?>
      <!-- <div class="box25 mr15">
        <img src="layout/images/sp1.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp2.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp1.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp11.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div> -->
    </div>
    <div class="row">
      <h2>Trà</h2>
    </div>
    <div class="row">
    <?= $html_dssp_tra ?>
      <!-- <div class="box25 mr15">
        <img src="layout/images/sp1.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp2.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp10.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div>
      <div class="box25 mr15">
        <img src="layout/images/sp4.webp" alt="">
        <span class="price">$1000</span>
        <button>Đặt hàng</button>
      </div> -->

    </div>

  </div>
</section>