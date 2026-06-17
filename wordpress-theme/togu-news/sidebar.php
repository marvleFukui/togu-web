<?php if (!defined('ABSPATH')) exit; ?>
<aside class="news-side">
  <div class="news-side__sec">
    <h2 class="news-side__title">CATEGORY</h2>
    <nav class="news-side__list">
      <?php
      $cats = get_categories(array('hide_empty' => false, 'orderby' => 'term_id'));
      if (!empty($cats)) {
        foreach ($cats as $c) {
          echo '<a href="' . esc_url(get_category_link($c->term_id)) . '">' . esc_html($c->name) . '</a>';
        }
      }
      ?>
    </nav>
  </div>

  <div class="news-side__sec">
    <h2 class="news-side__title">ARCHIVES</h2>
    <div class="news-side__archives">
      <?php togu_archives_tree(); ?>
    </div>
  </div>
</aside>
