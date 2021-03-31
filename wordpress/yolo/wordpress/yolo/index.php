<?php  get_header(); ?>
    <main class="main">
        <!-- 猎豹 Cheetah -->
        <div class="cheetah">
            <div class="post w720">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="item">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <time>/ <?php the_time('Y年n月j日') ?> /</time>
                        <div class="category"><?php the_category(''); ?></div>                        
                    </div>
                <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </main>
<?php get_footer(); ?>