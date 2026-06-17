<?php
/**
 * Template Name: Thanks (TOGU)
 * お問い合わせ送信完了後のサンクスページ。固定ページに割り当てて使用します。
 * 本文を入力するとその内容を、空の場合は既定メッセージを表示します。
 */
if (!defined('ABSPATH')) exit; get_header(); ?>

<!-- ===================== Page title ===================== -->
<section class="page-title">
  <p class="en">THANK YOU</p>
  <p class="jp">お問い合わせありがとうございます</p>
</section>

<!-- ===================== Thanks ===================== -->
<section class="thanks">
  <div class="inner">
    <?php
    $body = '';
    if (have_posts()) {
      while (have_posts()) { the_post(); $body = trim(get_the_content()); }
    }
    if ($body !== '') {
      echo '<div class="thanks__lead">';
      the_content();
      echo '</div>';
    } else {
    ?>
    <p class="thanks__lead">この度はお問い合わせいただき、誠にありがとうございます。<br>内容を確認のうえ、担当者より追ってご連絡いたします。<br>今しばらくお待ちくださいませ。</p>
    <?php } ?>

    <a class="reserve-box" href="<?php echo esc_url(TOGU_SITE_BASE . 'index.html'); ?>">
      <span class="label">
        <span class="jp">TOPへ戻る</span>
      </span>
      <svg class="arrow" viewBox="0 0 14 26" fill="none" aria-hidden="true"><path d="M1 1 L12 13 L1 25" stroke="currentColor" stroke-width="1"/></svg>
    </a>
  </div>
</section>

<?php get_footer(); ?>
