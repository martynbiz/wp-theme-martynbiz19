<?php get_header(); ?>

<section class="grid-container u-padding-y">
    <div class="grid-x grid-padding-x">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="small-12 medium-8 cell">
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-single box-style'); ?> role="article" itemscope itemtype="http://schema.org/Article">
                    <?php if ( ! has_post_thumbnail() ): ?>
                        <div class="post__header">
                            <h2 class="post__title">
                                <?php the_title(); ?>
                            </h2>
                        </div>
                    <?php endif; ?>
                    <div class="post__image">
                        <!-- <img src="http://www.triplethreatracing.org/wp-content/uploads/2016/05/placeholder-3.png" alt=""> -->
                        <?php //echo wp_get_attachment_image( $post->ID, 'post-image' ); ?>
                    </div>
                    <div class="post__body" itemprop="articleBody" data-type-cleanup="true">
                        <?php the_content('Continue reading &rarr;'); ?>
                    </div>
                    <div class="post__date">
                        <time class="post-date" datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished">
                            <?php the_time(__('F j, Y')); ?>
                        </time>
                    </div>
                </article>
            </div>
        <?php endwhile; endif; ?>
        <div class="small-12 medium-4 cell">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
