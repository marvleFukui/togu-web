<?php if (!defined('ABSPATH')) exit; get_header(); ?>

<!-- ===================== Page title ===================== -->
<section class="page-title">
  <p class="en">NEWS</p>
  <p class="jp">お知らせ</p>
</section>

<!-- ===================== News detail ===================== -->
<section class="news-archive">
  <div class="news-archive__grid">

    <?php get_sidebar(); ?>

    <div class="news-detail">
      <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <div class="news-detail__meta">
          <span class="news-badge"><?php echo esc_html(togu_primary_category()); ?></span>
          <span class="news-card__date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
        </div>
        <h1 class="news-detail__title"><?php the_title(); ?></h1>
        <div class="news-detail__body">
          <?php the_content(); ?>
        </div>
      </article>
      <?php endwhile; ?>

      <nav class="news-postnav" aria-label="記事ナビゲーション">
        <span class="news-postnav__prev">
          <?php previous_post_link('%link', '‹&ensp;前の記事'); ?>
        </span>
        <span class="news-postnav__home">
          <a href="<?php echo esc_url(home_url('/')); ?>">リストに戻る</a>
        </span>
        <span class="news-postnav__next">
          <?php next_post_link('%link', '次の記事&ensp;›'); ?>
        </span>
      </nav>
    </div>

  </div>
</section>

<?php get_footer(); ?>
