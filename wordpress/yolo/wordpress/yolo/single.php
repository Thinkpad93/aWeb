<?php  get_header(); ?>
    <main class="main">
        <!-- 狼 wolf -->
        <?php  while ( have_posts() ) : the_post(); ?>
            <div class="wolf">
            <article class="page w720">
                <div class="page-hd">
                    <h2><?php the_title(); ?></h2> 
                    <div class="meta">
                        <a href="javascript:;"><?php the_author(); ?></a>
                        <time><?php the_time('Y年n月j日') ?></time>
                    </div>                    
                </div>
                <div class="page-bd">
                    <?php the_content(); ?>       
                </div>
                <div class="page-ft">
                    <div class="meta">
                        <p>标签：<?php the_tags(' '); ?></p>
                    </div>                    
                </div>
            </article>
        </div>
        <?php endwhile;  // End of the loop. ?> 
        
    </main>
<?php get_footer(); ?>