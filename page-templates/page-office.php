<?php
/*
Template Name: Office
*/
get_header();
$theH2 = get_field('heading');
$getImg = get_field('office_img');
$setImg = $getImg;
$img = $setImg['sizes']['fp-large'];
$mainText = get_field('main_text');
?>


<article class="row office" id="page-full-width" role="main">

  <div class="office__flexContainer">
    <div class="office__flexContainer__img" data-interchange="[<?php echo $setImg['sizes']['fp-small'] ?>, small], [<?php echo $setImg['sizes']['fp-large'] ?>, large], [<?php echo $setImg['sizes']['fp-large'] ?>, xlarge], [<?php echo $setImg['sizes']['fp-retina'] ?>, xxlarge]"></div>
    <main>
      <h2 class="office__h2"><?php echo $theH2; ?></h2>
      <?php echo $mainText; ?>
      <p class="founders">Partners</p>
      <?php if( have_rows('founders') ): ?>
        <?php while( have_rows('founders') ): the_row();
              $name = get_sub_field('name');
              $edu = get_sub_field('education');
              $email = get_sub_field('email');
              $phone = get_sub_field('phone_number');
        ?>
        <div class="info">
            <p class="name"><?php echo $name; ?> <i class="education"><?php echo $edu; ?></i></p> <a class="email" href="mailto:<?php echo $email ;?>"><?php echo $email; ?></a> | <a class="tel" href="tel:<?php echo '+'.$phone; ?>">+<?php echo $phone; ?></a>
        </div>



        <?php endwhile; ?>



      <?php endif; ?>

      <?php if( have_rows('team') ): ?>
        <p class="founders">Team</p>
        <?php while( have_rows('team') ): the_row();
              $name = get_sub_field('name');
              $edu = get_sub_field('education');
              $email = get_sub_field('email');
              $phone = get_sub_field('phone_number');
        ?>
        <div class="info">
            <p class="name"><?php echo $name; ?> <i class="education"><?php echo $edu; ?></i></p> <a class="email" href="mailto:<?php echo $email ;?>"><?php echo $email; ?></a> | <a class="tel" href="tel:<?php echo '+'.$phone; ?>">+<?php echo $phone; ?></a>
        </div>



        <?php endwhile; ?>



      <?php endif; ?>
        <p class="founders">Contact</p>
        <div class="info">
          <p><?php echo get_field('address', 'option')?></p>
          <a class="email" href="mailto:<?php echo get_field('office_email', 'option'); ?>"><?php echo get_field('office_email', 'option');?></a> <span>|</span>
          <a class="tel" href="tel:<?php echo get_field('land_line', 'option'); ?>">tel: <?php echo get_field('land_line', 'option'); ?></a>
        </div>
    </main>
  </div>

<?php do_action( 'foundationpress_after_content' ); ?>

</article>

<?php get_footer();
