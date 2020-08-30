<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_hospital_lite_above_slider' ); ?>

  <?php if( get_theme_mod( 'vw_hospital_lite_slider_hide_show') != '') { ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_hospital_lite_slider_speed',3000)) ?>"> 
        <?php $vw_hospital_lite_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_hospital_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_hospital_lite_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_hospital_lite_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_hospital_lite_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_hospital_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_hospital_lite_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_hospital_lite_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">              
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_hospital_lite_slider_button_text',__('READ MORE','vw-hospital-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_hospital_lite_slider_button_text',__('READ MORE','vw-hospital-lite')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-hospital-lite' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-hospital-lite' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php } ?>

  <?php do_action( 'vw_hospital_lite_below_slider' ); ?>

  <?php if( get_theme_mod('vw_hospital_lite_sec1_title') != ''){ ?>
    <section class="services">    
      <div class="container">
        <?php if( get_theme_mod('vw_hospital_lite_sec1_title') != ''){ ?>     
          <h2><?php echo esc_html(get_theme_mod('vw_hospital_lite_sec1_title','vw-hospital-lite')); ?></h2><hr>
        <?php }?>
        <div class="row">
    			<?php $vw_hospital_lite_service_page = array();
    			for ( $count = 0; $count <= 3; $count++ ) {
    				$mod = intval( get_theme_mod( 'vw_hospital_lite_servicesettings' . $count ));
    				if ( 'page-none-selected' != $mod ) {
    				  $vw_hospital_lite_service_page[] = $mod;
    				}
    			}
    			if( !empty($vw_hospital_lite_service_page) ) :
    			  $args = array(
    			    'post_type' => 'page',
    			    'post__in' => $vw_hospital_lite_service_page,
    			    'orderby' => 'post__in'
    			  );
    			  $query = new WP_Query( $args );
    			  if ( $query->have_posts() ) :
    			    $count = 0;
    					while ( $query->have_posts() ) : $query->the_post(); ?>
    						<div class="col-lg-3 col-md-6">
    							<div class="service-main-box">
  							    <div class="box-image">
  						        <?php the_post_thumbnail(); ?>
  							    </div>
  							    <div class="box-content text-center">
  						        <h3><?php the_title(); ?></h3>
  						        <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_hospital_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_hospital_lite_service_excerpt_number','30')))); ?>
  						        <div class="clearfix"></div>
                      <?php if( get_theme_mod('vw_hospital_lite_services_button_text','READ MORE') != ''){ ?>
  						          <a class="r_button"  href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_hospital_lite_services_button_text',__('READ MORE','vw-hospital-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_hospital_lite_services_button_text',__('READ MORE','vw-hospital-lite')));?></span></a>
                      <?php } ?>
  							    </div>
    							</div>
    						</div>
    					<?php $count++; endwhile; 
    					wp_reset_postdata();?>
    			  <?php else : ?>
    			      <div class="no-postfound"></div>
    			  <?php endif;
    			endif;?>
    		    <div class="clearfix"></div>
    		</div>
    	</div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_hospital_lite_our_services' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>