<?php if (!defined('ABSPATH')) exit; ?>
<article <?php post_class('news-card reveal'); ?>>
  <a class="news-card__img" href="<?php the_permalink(); ?>">
    <?php
    if (has_post_thumbnail()) {
      the_post_thumbnail('medium_large', array('alt' => esc_attr(get_the_title())));
    } else {
      echo '<img class="news-card__ph" src="' . esc_url(TOGU_SITE_BASE . 'images/common/logo-wh.svg') . '" alt="TOGU">';
    }
    ?>
  </a>
  <div class="news-card__body">
    <div class="news-card__meta">
      <span class="news-badge"><?php echo esc_html(togu_primary_category()); ?></span>
      <span class="news-card__date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
    </div>
    <h3 class="news-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="news-card__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
    <p class="news-card__more"><a href="<?php the_permalink(); ?>">MORE</a></p>
  </div>
</article>
