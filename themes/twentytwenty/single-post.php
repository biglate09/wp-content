<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= the_title()?></title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #headder{
      background: #262145;
    }
  </style>
  <!-- Set up your HTML -->
  <section class="relative w-full">
    <div class="lg:pl-12 pl-4 lg:pr-12 pr-4 lg:pb-10 pb-6 pt-28 text-center" style="background-color: #262145;">
      <div class="flex flex-wrap justify-center mb-6">
        <?php foreach(get_the_category() as $category):?>
          <a href="/category/<?= $category->slug?>"class="select-none rounded-full text-center lg:w-44 w-32 p-2 m-1 lg:text-base text-sm" style="color:#262145;background-color:#FEDA52;"><?= $category->cat_name ?></a>
        <?php endforeach;?>
      </div>
      <div class="text-white lg:text-3xl text-xl mx-auto"><?= the_title()?></div>
      <div class="flex justify-center mt-2">
        <a href="" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
        <a href="" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
        <a href="" class="mx-2"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
      </div>
    </div>
    <div class="relative">
      <img class="object-cover w-full h-full" src="<?php get_the_post_thumbnail_url() ? the_post_thumbnail_url() : 'wp-content/themes/twentytwenty/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'?>" />
    </div>
  </section>

  <section class="w-full bg-white lg:p-20 px-4 py-8" style="color: #062241;">
    <div class="flex lg:flex-row flex-col lg:gap-28">
      <div class="flex-1 text-base flex flex-col gap-4"><?= the_content()?></div>
      <div class="lg:w-1/4 flex flex-col gap-8 lg:mt-0 mt-16 lg:block hidden">
        <?php include 'truefriend-sponsored.php'; ?>
      </div>
    </div>
  </section>

  <div class="w-full flex lg:flex-row flex-col lg:px-20 px-8 py-10 justify-between items-center" style="background-color: #F2F2F2; color: #062241;">
    <span class="text-xl">Share this article</span>
    <div class="flex items-center justify-center flex-wrap gap-4 lg:pr-20 lg:mt-0 mt-8">
      <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
      <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
      <div class="relative bg-white rounded-full lg:w-80 w-full pl-4 pr-12 py-3 shadow-lg">
        <img class="w-6 h-6 cursor-pointer absolute right-0 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt="" onclick="copyToClipboard('<?= the_permalink();?>')">
        <div class="truncate"><?= the_permalink()?></div>
      </div>
    </div>
  </div>
  <section class="bg-white lg:pt-20 lg:pb-8 lg:px-0 lg:mx-8 border-b pl-4 py-16 pr-0">
    <div class="flex items-center justify-between mb-4">
      <span class="text-2xl font-semibold">Related Content</span>
      <div class="gap-10 lg:flex hidden">
        <img class="w-2 h-4 cursor-pointer toTheLeft" src="<?= get_theme_file_uri() ?>/assets/images/left.png" referTo="relatedSlider" />
        <img class="w-2 h-4 cursor-pointer toTheRight" src="<?= get_theme_file_uri() ?>/assets/images/right.png" referTo="relatedSlider"/>
      </div>
    </div>
    <!-- grid grid-cols-3 gap-4  -->
    <div id="relatedSlider" class="owl-carousel">
      <?php $related = get_posts( array( 'category__in' => wp_get_post_categories(get_the_ID()), 'numberposts' => 5, 'post__not_in' => array(get_the_ID()) ) );
        if( $related ) foreach( $related as $post ):
        setup_postdata($post); ?>
        <a href="<?= the_permalink() ?>" class="block">
          <div style="height:250px;" class="mb-2">
              <img class="object-cover w-full h-full rounded" src="<?php get_the_post_thumbnail_url() ? the_post_thumbnail_url() : 'wp-content/themes/twentytwenty/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260' ?>" />
          </div>
          <span class="text-sm"><?= the_title()?></span>
        </a>
      <?php endforeach;wp_reset_postdata(); ?>
    </div>
  </section>
  <?php include 'truefriend-restaurant101.php';?>
  <div class="lg:hidden py-8 px-4">
    <?php include 'truefriend-sponsored.php'; ?>
  </div>
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script>
    const copyToClipboard = str => {
      const el = document.createElement('textarea');
        el.value = str;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    };

    $(document).ready(function() {
      $("#relatedSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.3 : 3,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 2,
        margin: 20,
        dots: false,
      });
      $(".toTheLeft").click(function() {
        let carousel = $(this).attr('referTo')
          $(`#${carousel}`).trigger('prev.owl.carousel');
      });

      $(".toTheRight").click(function() {
          let carousel = $(this).attr('referTo')
          $(`#${carousel}`).trigger('next.owl.carousel');
      });

      $(".tab-button").click(function() {
          $(".tab-button").removeClass('tab-button-active')
          $(this).addClass('tab-button-active')
      })
    })
    </script>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>
