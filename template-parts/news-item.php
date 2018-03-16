<div class="news__container accordion-item <?php $c++; if($c==1){echo $class;} ?>" data-accordion-item >
  <a href="#" class="accordion-title" style="width:100%;">
    <div class="news__container__meta">
      <p class="date"><?php the_date('d.'.'m.'.'Y'); ?></p>
      <h1 class="title"><?php the_title(); ?></h1>
    </div>
  </a>
<?php $newsGallery = get_field('news_gallery');
      $bigImg = imgRender($newsGallery[0], 'fp-medium');
      $smallImgTop = imgRender($newsGallery[1], 'fp-small');
      $smallImgBottom = imgRender($newsGallery[2], 'fp-small');
      $text = get_field('news_text');

      ?>
      <div class="accordion-content" data-tab-content >
        <div class="leftright" >
        <div class="news__container__left">
          <div class="news__container__left__img-frame">
            <div class="news__container__left__img-frame__img" data-interchange="[<?php echo $newsGallery[0]['sizes']['fp-small'] ?>, small], [<?php echo $newsGallery[0]['sizes']['fp-medium'] ?>, medium], [<?php echo $newsGallery[0]['sizes']['fp-large'] ?>, large], [<?php echo $newsGallery[0]['sizes']['fp-large'] ?>, xlarge], [<?php echo $newsGallery[0]['sizes']['fp-retina'] ?>, xxlarge]">
            </div>
          </div>
        </div>

        <?php $smallImg = get_sub_field('img_block_sub_1');
              $newsExcerpt = get_sub_field('text_block_sub_1');?>
        <div class="news__container__right">
          <div class="news__container__right__frame">
              <div class="news__container__right__frame__img-small" data-interchange="[<?php echo $newsGallery[1]['sizes']['fp-small'] ?>, small], [<?php echo $newsGallery[1]['sizes']['fp-medium'] ?>, medium], [<?php echo $newsGallery[1]['sizes']['fp-large'] ?>, large], [<?php echo $newsGallery[1]['sizes']['fp-large'] ?>, xlarge], [<?php echo $newsGallery[1]['sizes']['fp-retina'] ?>, xxlarge]"></div>
          </div>

        <?php $smallImg2 = get_sub_field('img_block_sub_2'); ?>
          <div class="news__container__right__frame">
            <div class="news__container__right__frame__img-small" data-interchange="[<?php echo $newsGallery[2]['sizes']['fp-small'] ?>, small], [<?php echo $newsGallery[2]['sizes']['fp-medium'] ?>, medium], [<?php echo $newsGallery[0]['sizes']['fp-large'] ?>, large], [<?php echo $newsGallery[2]['sizes']['fp-large'] ?>, xlarge], [<?php echo $newsGallery[2]['sizes']['fp-retina'] ?>, xxlarge]"></div>
          </div>
        </div>
      </div>
      <div class="news__container__text">
        <?php echo $text; ?>
      </div>
      <div class="news__container__links">
        <?php
            if(!empty(get_field('link_to_project'))): $linkToProject = get_field('link_to_project');
          ?>
          <a class="project-link" href="<?php echo $linkToProject; ?>">See project<img src="<?php echo get_stylesheet_directory_uri(). '/assets/images/icons/nextArrow.svg'?>" alt=""/></a>

        <?php endif; if(!empty(get_field('pdf_files'))): $pdfDownLoad = get_field('pdf_files'); ?>
            <a class="pdf-link" href="<?php echo $pdfDownLoad['url']; ?>" target="_blank">DOWNLOAD PRESENTATION <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/icons/prevArrow.svg'?>" alt=""/></a>

        <?php  endif; if(!empty(get_field('projcet_external_link'))): $externall = get_field('projcet_external_link'); $externallNice = get_field('nice_link_text'); ?>

              <a class="external-link" href="<?php echo $externall; ?>" target="_blank"><?php if(empty($externallNice)){echo $externall;}else{echo $externallNice; }  ?></a>

        <?php endif; ?>
      </div>

  </div>

</div>
