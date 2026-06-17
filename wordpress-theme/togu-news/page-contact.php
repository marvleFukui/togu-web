<?php
/**
 * Template Name: Contact (TOGU)
 * 固定ページに割り当てて使用します。本文に Contact Form 7 のショートコードを貼り付けてください。
 */
if (!defined('ABSPATH')) exit; get_header(); ?>

<!-- ===================== Page title ===================== -->
<section class="page-title">
  <p class="en">CONTACT</p>
  <p class="jp">お問い合わせ</p>
</section>

<!-- ===================== Contact form ===================== -->
<section class="contact-form">
  <?php
  while (have_posts()) : the_post();
    the_content();
  endwhile;
  ?>
</section>

<?php get_footer(); ?>
