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
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/news-card'); ?>
        <?php endwhile; ?>
        <?php togu_pagination(); ?>
      <?php else : ?>
        <p class="news-empty">記事がまだありません。</p>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
