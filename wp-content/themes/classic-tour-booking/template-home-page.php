<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Tour Booking
 */

get_header(); ?>

<div id="content">
  <?php
    $classic_tour_booking_hidcatslide = get_theme_mod('classic_tour_booking_hide_categorysec', false);
    $classic_tour_booking_slidersection = get_theme_mod('classic_tour_booking_slidersection');

    if ($classic_tour_booking_hidcatslide && $classic_tour_booking_slidersection) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_tour_booking_slidersection',false) ) { ?>
          <?php $classic_tour_booking_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_tour_booking_slidersection',false)));
            while( $classic_tour_booking_queryvar->have_posts() ) : $classic_tour_booking_queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt=""/>
                <?php } ?>
                <div class="slider-box">
                  <?php if(get_theme_mod('classic_tour_booking_slider_top_text') != ''){ ?>
                    <p class="slider-text mb-lg-3 mb-0"><?php echo esc_html(get_theme_mod('classic_tour_booking_slider_top_text')); ?></p>
                  <?php }?>
                  <h1 class="my-3 slider-title">
                    <a href="href=<?php the_permalink(); ?>">
                      <?php 
                        $title = get_the_title();
                        $words = explode(' ', $title);
                        $last_word_index = count($words) - 1; 
                        $last_word = $words[$last_word_index]; 
                        unset($words[$last_word_index]); 
                        $remaining_words = implode(' ', $words);
                        echo esc_html($remaining_words); 
                        echo ' <span style="color: #c34100;">' . esc_html($last_word) . '</span>'; 
                      ?>
                    </a>
                  </h1>
                  <div class="shop-now mt-4">
                    <?php 
                    $classic_tour_booking_button_text = get_theme_mod('classic_tour_booking_button_text', 'Read More');
                    $classic_tour_booking_button_link_slider = get_theme_mod('classic_tour_booking_button_link_slider', ''); 
                    if (empty($classic_tour_booking_button_link_slider)) {
                        $classic_tour_booking_button_link_slider = get_permalink();
                    }
                    if ($classic_tour_booking_button_text || !empty($classic_tour_booking_button_link_slider)) { ?>
                      <?php if(get_theme_mod('classic_tour_booking_button_text','Read More') != ''){ ?>
                        <a href="<?php echo esc_url($classic_tour_booking_button_link_slider); ?>" class="button redmor">
                          <?php echo esc_html($classic_tour_booking_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_tour_booking_button_text); ?></span>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
                <div class="overlayer"></div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
  $classic_tour_booking_hidepageboxes = get_theme_mod('classic_tour_booking_disabled_pgboxes', false);
  $classic_tour_booking_blog_cat = get_theme_mod('classic_tour_booking_blog_cat');
  if ($classic_tour_booking_hidepageboxes && $classic_tour_booking_blog_cat) :
  ?>
    <section id="blog" class="my-5 pb-5">
      <div class="container">
        <div class="blog_bx text-center">
          <?php if (get_theme_mod('classic_tour_booking_headingtext_para') != "") : ?>
          <h2 class="mb-4 text-capitalize"><?php echo esc_html(get_theme_mod('classic_tour_booking_headingtext_para', 'classic-tour-booking')); ?></h2>
          <?php endif; ?>
        </div>
        <div class="owl-carousel serv m-0">
          <?php
          if (get_theme_mod('classic_tour_booking_blog_cat')) :
              $classic_tour_booking_queryvar = new WP_Query(
                  array(
                      'cat' => esc_attr(get_theme_mod('classic_tour_booking_blog_cat')),
                  )
              );
              while ($classic_tour_booking_queryvar->have_posts()) :
                  $classic_tour_booking_queryvar->the_post();
          ?>
          <div class="main-serv m-0">
            <div class="blog-content position-relative">
              <?php if (has_post_thumbnail()) : ?>
              <div class="blog-image mx-4 position-relative">
                <?php the_post_thumbnail('full'); ?>
                <div class="post-overlay"></div>
              <?php else : ?>
              <div class="blog-image mx-4 post-color">
              <?php endif; ?>
                <div class="post-details">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php
                  $classic_tour_booking_trimexcerpt = get_the_excerpt();
                  $classic_tour_booking_shortexcerpt = wp_trim_words($classic_tour_booking_trimexcerpt, $classic_tour_booking_num_words = 5);
                  echo '<p class="mt-2">' . esc_html($classic_tour_booking_shortexcerpt) . '</p>';
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

</div>

<?php get_footer(); ?>