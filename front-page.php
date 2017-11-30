<?php
/**
 * The template for displaying the home pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avenue
 */

get_header(); 

$tyros_options      = tyros_get_options();
$alternate_blog     = isset( $tyros_options['blog_layout_style'] ) ? $tyros_options['blog_layout_style'] : 'carousel';

?>

<div id="primary" class="content-area">

    <main id="main" class="site-main">
        
        <div class="container">
            
            <div class="row">
                
                <div class="col-sm-12 boxed-wrap">
                    
                    <?php if ( $tyros_options['tyros_slider_bool'] == 'yes' ) { do_action( 'tyros_slider' ); } ?>

                    <?php if ( $tyros_options['tyros_post_slider_cta_bool'] == 'yes' ) { do_action( 'tyros_callout_banner' ); } ?>
                    
                    <?php if ( $tyros_options['tyros_cta_bool'] == 'yes' ) { do_action( 'tyros_cta_trio' ); } ?>
                    
                    <?php do_action( 'tyros_free_widget_areas' ); ?>

                    <?php do_action( 'tyros_pro_widget_areas' ); ?>
                    
                </div>
                    
                <div class="col-sm-12">
                
                    <?php if ( isset( $tyros_options['tyros_frontpage_content_bool'] ) && $tyros_options['tyros_frontpage_content_bool'] == 'yes' ) : ?>
        
                        <?php if ( get_option( 'show_on_front' ) == 'posts' ) : ?>

                            <?php if ( $alternate_blog == 'masonry' && function_exists('tyros_strap_pl') && tyros_strap_pl() ) : ?>

                                <div class="col-sm-12">

                                    <div id="tyros-alt-blog-wrap">

                                        <div id="masonry-blog-wrapper">

                                            <div class="grid-sizer"></div>
                                            <div class="gutter-sizer"></div>

                            <?php elseif ( $alternate_blog == 'alternate' ) : ?>

                                <div id="tyros-main-blog-wrap" class="row">
                                    
                            <?php else : ?>
                                    
                                <div id="tyros-carousel-blog-wrap" class="owl-carousel owl-theme">

                            <?php endif; ?>

                        <?php endif; ?>
                                    
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php

                            if ( 'posts' == get_option( 'show_on_front' ) ) {

                                if ( $alternate_blog == 'masonry' && function_exists('tyros_strap_pl') && tyros_strap_pl() ) { 
                                    get_template_part('template-parts/content', 'posts-masonry' );
                                } elseif ( $alternate_blog == 'alternate' ) {  
                                    get_template_part('template-parts/content', 'posts-alt' );
                                } else {
                                    get_template_part('template-parts/content', 'posts' );
                                }

                            } else {
                                
                                get_template_part('template-parts/content', 'home');
                                
                            }                

                            // If comments are open or we have at least one comment, load up the comment template
                            if (comments_open() || '0' != get_comments_number()) :
                                comments_template();
                            endif;

                            ?>

                        <?php endwhile; // end of the loop.   ?>
                    
                        <?php if ( get_option( 'show_on_front' ) == 'posts' ) : ?>

                            <?php if ( $alternate_blog == 'masonry' && function_exists('tyros_strap_pl') && tyros_strap_pl() ) : ?>

                                        </div>

                                    </div>

                                </div>

                            <?php else : ?>
                                    
                                </div>

                            <?php endif; ?>

                        <?php endif; ?>
                                
                        <div class="pagination-links">
                            <?php echo the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
                        </div>

                    <?php endif; ?>
                
                </div>
                
            </div>
                
        </div>

    </main>
    
</div>

<?php get_footer();
