<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AccessPress Store
 */
get_header();

global $post;
$single_page_layout = esc_attr( get_post_meta($post->ID, 'accesspress_store_sidebar_layout', true) );
if (empty($single_page_layout)) {
    $single_page_layout = esc_attr( get_theme_mod('single_page_layout','right-sidebar') );
}
if (is_page('cart') || is_page('checkout')) {
    $single_page_layout = "no-sidebar";
}
$breadcrumb = intval( get_theme_mod('breadcrumb_options_page','1') );
$archive_bread = esc_url( get_theme_mod('breadcrumb_page_image') );
if($archive_bread){
    $bread_archive = $archive_bread;
}else{
  $bread_archive = esc_url ( get_template_directory_uri().'/images/about-us-bg.jpg' );
}
if($breadcrumb == '1') :
?>

<?php endif; ?>
<div class="inner">
    <main id="main" class="site-main clearfix <?php echo $single_page_layout; ?>">
        
            <div class="ak-container">
                <?php echo do_shortcode('[metaslider id="59"]'); ?>
            </div>

            <div id="primary" class="content-area">
               <?php if (get_theme_mod( 'boxes_active_state', 'disable' ) === 'enable' ) : ?>
                <section class="row ak-container">
                    <div class="container boxes-container clr">
                      <div class="col-box">
                        <div class="block">
                          <img src="<?php echo esc_url( get_theme_mod( 'customizer_setting_one' ) ); ?>" alt="Product 1">
                          <h3><?php echo get_theme_mod('box1_heading','Box 1 Heading'); ?></h3>
                          <p><?php echo get_theme_mod('box1_text','Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'); ?></p>
                            <div class="block-link">
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                      </div>
                      <div class="col-box">
                        <div class="block">
                            <?php if(!empty(esc_url( get_theme_mod( 'customizer_setting_two' )))): ?>
                                <img src="<?php echo esc_url( get_theme_mod( 'customizer_setting_two' ) ); ?>" alt="Product 1">
                            <?php endif;?>
                            
                          <h3><?php echo get_theme_mod('box2_heading','Box 2 Heading'); ?></h3>
                          <p><?php echo get_theme_mod('box2_text','Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'); ?></p>
                            <div class="block-link">
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                      </div>
                      
                      <!-- TODO: add  <div class="block-link"> and style it-->
                    
                      <div class="col-box">
                        <div class="block">
                          <img src="<?php echo esc_url( get_theme_mod( 'customizer_setting_three' ) ); ?>" alt="Product 1">
                          <h3><?php echo get_theme_mod('box3_heading','Box 3 Heading'); ?></h3>
                          <p><?php echo get_theme_mod('box3_text','Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'); ?></p>
                            <div class="block-link">
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                      </div>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('promo-widget-1')): ?>
                <section id="promo-section1">
                    <div class="ak-container">
                        <div class="promo-wrap1">
                            <div class="promo-product1 clearfix">
                                <?php dynamic_sidebar('promo-widget-1'); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (is_active_sidebar('product-widget-1')): ?>
            <!-- This is Product 1 Section !-->
            <section id="product1" class="prod1-slider">
                <div class="ak-container">
                    <?php dynamic_sidebar('product-widget-1'); ?>
                </div>
            </section>
            <?php endif; ?>
            
            <section id="promo-section2">
            <div class="ak-container">
                <div class="promo-wrap2">
                    <?php if (is_active_sidebar('promo-widget-2')): ?>
                        <div class="promo-product2">
                            <?php dynamic_sidebar('promo-widget-2'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            </section>
            
            <?php if (is_active_sidebar('product-widget-2')): ?>
            <!-- This is Product 2 Section !-->
            <section id="product2" class="prod2-slider">
                <div class="ak-container">
                    <?php dynamic_sidebar('product-widget-2'); ?>
                </div>
            </section>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('cta-video')): ?>
            <section id="ap-cta-video" class="cta-video-section-wrap">
                <div class="cta-overlay">
                    <div class="ak-container">
                        <div class="cta-vid-wrap">
                            <?php dynamic_sidebar('cta-video') ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('product-widget-3')): ?>
            <section class="ap-cat-list clear">
                <div class="ak-container">
                    <div class="cat-list-wrap">
                        <?php dynamic_sidebar('product-widget-3') ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('promo-widget-3')): ?>
            <section id="promo-section3">
                <div class="ak-container">
                    <div class="promo-wrap3">
                        <div class="promo-product2">
                            <?php dynamic_sidebar('promo-widget-3'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'youtube_videos' ) ) : ?>
                <div class="ak-container clr">
            	    <?php dynamic_sidebar( 'youtube_videos' ); ?>
            	</div>
            <?php endif; ?>
            
            </div><!-- #primary -->
            <?php // esc_html_e( get_theme_mod( 'bootstrap_theme_name' ) ); ?>
            </br>
            <?php // esc_html_e( get_theme_mod( 'themeslug_radio_setting_id' ) ); ?>
            </br>
            
            <?php
                if ($single_page_layout == 'both-sidebar' || $single_page_layout == 'left-sidebar'):
                    get_sidebar('left');
                endif;
            ?>

        <?php if ($single_page_layout == 'both-sidebar'): ?>
            </div>
        <?php endif; ?>

            <?php
                if ($single_page_layout == 'both-sidebar' || $single_page_layout == 'right-sidebar'):
                    get_sidebar('right');
                endif;
            ?>
    </main>
</div>
<?php get_footer();