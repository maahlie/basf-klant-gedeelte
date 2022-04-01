<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "basf_db");

if (!$conn) {
	echo "Connection failed!";
	exit();
}

$sql = "SELECT * FROM news WHERE id > (SELECT COUNT(*) - 5 FROM news);"; //SELECT MAX(id) - 7 FROM news
$res = mysqli_query($conn,  $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Responsive News Card Slider</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
  <link rel="stylesheet" href="../../dist/css/news.css">

</head>

<body>
  <div class="wrapper">

    <div class="background">
      <!-- <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt=""> -->
    </div>
    <div class="item-bg"></div>

    <div class="news-slider">
      <div class="news-slider__wrp swiper-wrapper">

        <?php
        $maanden = ["jan", "feb", "mrt", "apr", "mei", "jun", "jul", "aug", "sep", "okt", "nov", "dec"];
        if (mysqli_num_rows($res) > 0) {
          while ($images = mysqli_fetch_assoc($res)) {  ?>
          <div class="news-slider__item swiper-slide">
            <a href="#" class="news__item">
              <div class="news-date">
                <span class="news-date__title"><?php echo date("d",strtotime($images['date'])) ?></span>
                <?php $getmonth = date("m",strtotime($images['date']));?>
                <span class="news-date__txt"><?php echo $maanden[$getmonth-1] ?></span>
              </div>
              <div class="news__title">
              <?=$images['title']?>
              </div>

              <p class="news__txt" style="height: 90px;">
              <?=$images['text']?>
              </p>

              <div class="news__img">
                <img src="../../news_images/<?=$images['image']?>" alt="news">
              </div>
            </a>
          </div>
        <?php } }else{?>
          <div class="news-slider__item swiper-slide">
          <a href="#" class="news__item">
            <div class="news-date">
              <span class="news-date__title"><?php echo date("j") ?></span>
              <?php $getmonth = date("n");?>
              <span class="news-date__txt"><?php echo $maanden[$getmonth-1] ?></span>
            </div>
            <div class="news__title">
            Geen verslagen gevonden!
            </div>

            <p class="news__txt" style="height: 90px;">
            Er zijn geen artikelen tot nu toe of er is een fout opgetreden!
            </p>

            <div class="news__img">
              <img src="../../assets/images/news.jpg" alt="news">
            </div>
          </a>
        </div>
        <?php
        }
        ?>

      </div>

      <div class="news-slider__ctr">

        <div class="news-slider__arrows">
          <button class="news-slider__arrow news-slider-prev">
            <span class="icon-font">
              <svg class="icon icon-arrow-left">
                <use xlink:href="#icon-arrow-left"></use>
              </svg>
            </span>
          </button>
          <button class="news-slider__arrow news-slider-next">
            <span class="icon-font">
              <svg class="icon icon-arrow-right">
                <use xlink:href="#icon-arrow-right"></use>
              </svg>
            </span>
          </button>
        </div>

        <div class="news-slider__pagination"></div>

      </div>

    </div>

  </div>

  <svg hidden="hidden">
    <defs>
      <symbol id="icon-arrow-left" viewBox="0 0 32 32">
        <title>arrow-left</title>
        <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
      </symbol>
      <symbol id="icon-arrow-right" viewBox="0 0 32 32">
        <title>arrow-right</title>
        <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
      </symbol>
    </defs>
  </svg>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script>
  <script src="../../dist/js/news.js"></script>
</body>

</html>