<?php get_header(); ?>

<section class="grid-container u-padding-y">
    <div class="grid-x grid-padding-x post-list-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="small-12 medium-6 large-4 cell post-list-item">
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-list box-style'); ?> itemscope itemtype="http://schema.org/Article">
                    <div class="post__header">
                        <h1 class="post__title">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </h1>
                    </div>
                    <div class="post__image">
                        <a href="<?php the_permalink() ?>">
                            <!-- <img src="http://www.triplethreatracing.org/wp-content/uploads/2016/05/placeholder-3.png" alt=""> -->
                            <?php the_post_thumbnail(); //echo wp_get_attachment_image( $post->ID, 'post-image' ); ?>
						</a>
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
    </div>
</section>

<?php get_footer(); ?>
