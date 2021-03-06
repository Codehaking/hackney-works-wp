<?php get_header();

global $paged;
$max_page = $wp_query->max_num_pages;
$results = $wp_query->found_posts;
?>

<section class="hero">
    <div class="hero__content">
        <h1 class="hero__title">Search results</h1>


        <!-- <form class="search-box container container--narrow" method="get">
            <div class="search-box__field">
                <label class="search-box__label" for="location_filter">Search information, advice and guidance</label>
                <input class="search-box__input" name="s" placeholder="eg. autism" value="<?php the_search_query(); ?>"/>
            </div>
            <button class="search-box__button">Search</button>
        </form> -->
    </div>
</section>

<div class="page-content">
    <div class="container container--mid">

        <?php if(have_posts()): ?>
            <p class="results-count"><?php echo $results; ?> results found</p>
            <ol class="search-results">
                <?php while(have_posts()): the_post(); ?>
                <li class="search-results__card">
                    <h2 class="search-results__title"><a class="search-results__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                    <small>Last updated <?php the_modified_time(" j F Y") ?></small>
                </li>
                <?php endwhile; ?>
            </ol>

            <?php if($max_page > 1): ?>
                <nav class="page-navigation">
                    <ul class="page-navigation__list">  
                        <?php if($paged > 1): ?>
                        <li class="page-navigation__item page-navigation__item--previous">
                            <a class="page-navigation__link" href="<?php echo previous_posts(); ?>">
                                <span>Previous</span>    
                                <span>Page <?php echo $paged - 1 ?> of <?php echo $max_page ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($paged < $max_page): ?>
                        <li class="page-navigation__item page-navigation__item--next"> 
                            <a class="page-navigation__link" href="<?php echo next_posts(); ?>">
                                <span>Next</span>   
                                <span>Page <?php echo $paged + 1 ?> of <?php echo $max_page ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>

        <?php else: ?>
            <p class="no-results">No results match your search. Try widening your query.</p>
        <?php endif; ?>

    </div>
</div>

<?php get_template_part("call-to-action"); ?>

<?php get_footer(); ?>