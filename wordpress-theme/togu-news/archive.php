<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<!-- ===================== Page title ===================== -->
<section class="page-title">
  <p class="en">NEWS</p>
  <p class="jp">お知らせ</p>
</section>

<!-- ===================== News archive ===================== -->
<section class="news-archive">
  <div class="news-archive__grid">

    <?php get_sidebar(); ?>

    <div class="news-list-col">
      <?php
      $label = '';
      if (is_category()) { $label = single_cat_title('', false); }
      elseif (is_month()) { $label = get_the_date('Y年n月'); }
      elseif (is_year()) { $label = get_the_date('Y年'); }
      elseif (is_date()) { $label = get_the_date('Y年n月j日'); }
      if ($label) :
      ?>
      <p class="news-archive__label"><?php echo esc_html($label); ?></p>
      <?php endif; ?>

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/news-card'); ?>
        <?php endwhile; ?>
        <?php togu_pagination(); ?>
      <?php else : ?>
        <p class="news-empty">該当する記事がありません。</p>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
