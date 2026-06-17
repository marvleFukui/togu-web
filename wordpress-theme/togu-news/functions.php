<?php
/**
 * TOGU News theme functions
 */
if (!defined('ABSPATH')) exit;

/**
 * 静的サイト（TOP等）の公開先ベースURL。
 * 例) 静的サイトが https://togu.com/ にあり、WordPress を https://togu.com/news/ に設置する場合は '/' のままでOK。
 *     別ドメインに置く場合は 'https://togu.com/' のように絶対URLを指定してください。
 * ここで指定した場所の assets/css/style.css, assets/js/*.js, images/ を共有します。
 */
if (!defined('TOGU_SITE_BASE')) {
  define('TOGU_SITE_BASE', '/');
}

function togu_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
  register_nav_menus(array('primary' => 'グローバルメニュー'));
}
add_action('after_setup_theme', 'togu_setup');

function togu_assets() {
  $base = TOGU_SITE_BASE;
  wp_enqueue_style('togu-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300&display=swap', array(), null);
  wp_enqueue_style('togu-main', $base . 'assets/css/style.css', array(), null);
  // 静的サイトと同じ JS を共有（ヘッダー挙動・ドロワー・アーカイブ開閉・外部リンク注入）
  wp_enqueue_script('togu-config', $base . 'assets/js/config.js', array(), null, true);
  wp_enqueue_script('togu-main', $base . 'assets/js/main.js', array('togu-config'), null, true);
}
add_action('wp_enqueue_scripts', 'togu_assets');

/* 抜粋（excerpt）の調整 */
add_filter('excerpt_length', function () { return 80; });
add_filter('excerpt_more', function () { return '…'; });

/** 記事の代表カテゴリー名（バッジ用） */
function togu_primary_category() {
  $cats = get_the_category();
  if (!empty($cats)) return $cats[0]->name;
  return 'NEWS';
}

/**
 * ARCHIVES ツリー（年 > 月・件数）を出力。デザインに合わせて最新の年を開いた状態に。
 */
function togu_archives_tree() {
  global $wpdb;
  $rows = $wpdb->get_results("
    SELECT YEAR(post_date) AS y, MONTH(post_date) AS m, COUNT(*) AS c
    FROM {$wpdb->posts}
    WHERE post_type = 'post' AND post_status = 'publish'
    GROUP BY y, m
    ORDER BY y DESC, m DESC
  ");
  if (empty($rows)) {
    echo '<p class="news-side__empty">記事がまだありません。</p>';
    return;
  }

  $years = array();
  foreach ($rows as $r) { $years[(int)$r->y][] = $r; }

  $first = true;
  foreach ($years as $year => $months) {
    $open = $first ? ' is-open' : '';
    echo '<div class="arch-year' . $open . '">';
    echo '<button class="arch-year__head" type="button">' . esc_html($year) . '年<span class="arch-year__toggle"></span></button>';
    echo '<div class="arch-year__months">';
    foreach ($months as $mo) {
      $link = get_month_link($mo->y, $mo->m);
      echo '<a href="' . esc_url($link) . '">' . intval($mo->m) . '月<span class="cnt">(' . intval($mo->c) . ')</span></a>';
    }
    echo '</div></div>';
    $first = false;
  }
}

/**
 * 一覧のページネーション（‹ 1 2 3 … ›）。CSS .news-pager に対応。
 */
function togu_pagination() {
  global $wp_query;
  if ($wp_query->max_num_pages < 2) return;
  $links = paginate_links(array(
    'total'     => $wp_query->max_num_pages,
    'current'   => max(1, get_query_var('paged')),
    'prev_text' => '‹',
    'next_text' => '›',
    'type'      => 'array',
  ));
  if (empty($links)) return;
  echo '<nav class="news-pager" aria-label="ページ送り">';
  foreach ($links as $l) { echo $l; }
  echo '</nav>';
}
