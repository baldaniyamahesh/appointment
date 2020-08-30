 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dentaris
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	}else{
		do_action( 'wp_body_open' ); 
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain"><?php _e( 'Skip to content', 'dentaris' ); ?></a>
<?php $hidetopbar = get_theme_mod('hide_topbar', '1'); ?>
<?php if($hidetopbar == ''){ ?>
<div class="header-top">
  <div class="head-top-inner">
     		<div class="top-left">
            	<span> <?php echo esc_attr(get_theme_mod('phone')); ?></span> 
            </div><!-- top-left -->
            <div class="top-right">
            	<a href="<?php echo esc_attr(esc_html('mailto:','dentaris').get_theme_mod('email')); ?>"><?php echo esc_attr(get_theme_mod('email')); ?></a>
            </div><!-- top-right --><div class="clear"></div>
  </div><!-- head-top-inner -->
</div><!--end header-top--> 
<?php } ?>


<div id="header">
	<div class="header-inner">
      <div class="logo">
           <?php dentaris_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_attr($description); ?></p>
					<?php endif; ?>
      </div><!-- logo -->                    
    <div class="header_right"> 
        		 <div class="toggle">
            <a class="toggleMenu" href="#">
                <?php esc_attr_e('Menu','dentaris'); ?>                
            </a>
    	</div><!-- toggle -->    
    <div class="sitenav">                   
   	 	<?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
    </div><!--.sitenav -->
        <div class="clear"></div>
    </div><!--header_right-->    
 <div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->

<?php $hidecnt = get_theme_mod('hide_contact', '1'); ?>
<?php if($hidecnt  == '') { ?>
<div class="header_contact">
	<div class="container">
    <?php if(get_theme_mod('address') != '') { ?>
    	<div class="head-box">        	
            	<i class="fa fa-map-marker"></i>           
            <div class="bx-text">
                <h5><?php echo esc_html(get_theme_mod('address')) ;?></h5>
            </div><!-- bx-text --><div class="clear"></div>
        </div><!-- head-box -->
    <?php } ?>
    
    <?php if(get_theme_mod('phone') != '') { ?>    
        <div class="head-box">        	
            	<i class="fa fa-mobile"></i>            
            <div class="bx-text">
            	<h5><?php echo esc_html(get_theme_mod('phone')); ?></h5>
            </div><!-- bx-text --><div class="clear"></div>
        </div><!-- head-box -->       
    <?php } ?>
    
    <?php if(get_theme_mod('timing') != '') { ?>    
        <div class="head-box">        	
            	<i class="fa fa-clock-o"></i>            
            <div class="bx-text">
            	<h5><?php echo esc_html(get_theme_mod('timing')); ?></h5>
            </div><!-- bx-text --><div class="clear"></div>
        </div><!-- head-box -->
    <?php } ?>
    
    <?php if(get_theme_mod('email') != '') { ?>
        <div class="head-box">        	
            	<i class="fa fa-calendar-o"></i>           
            <div class="bx-text">
                <h5><a href="<?php echo esc_attr(esc_html('mailto:','dentaris').get_theme_mod('email')); ?>"><?php echo esc_attr(get_theme_mod('email')); ?></a></h5>
            </div><!-- bx-text --><div class="clear"></div>
        </div><!-- head-box -->
   <?php } ?>
       
        <div class="clear"></div>
	</div><!--container-->
</div><!-- header_contact -->
<?php } ?>