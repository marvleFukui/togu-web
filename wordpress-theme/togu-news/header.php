<?php if (!defined('ABSPATH')) exit; $base = TOGU_SITE_BASE; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="manifest" href="/site.webmanifest">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ===================== Header ===================== -->
<header class="site-header" data-solid="true">
  <a href="<?php echo esc_url($base); ?>" class="site-header__logo" aria-label="TOGU">
    <img class="logo-wh" src="<?php echo esc_url($base); ?>images/common/logo-wh.svg" alt="TOGU">
    <img class="logo-bk" src="<?php echo esc_url($base); ?>images/common/logo-bk.svg" alt="TOGU">
  </a>
  <nav class="gnav">
    <ul class="gnav__list">
      <li><a href="<?php echo esc_url($base); ?>">HOME</a></li>
      <li><a href="<?php echo esc_url($base); ?>concept">CONCEPT</a></li>
      <li><a href="<?php echo esc_url($base); ?>service">SERVICE</a></li>
      <li><a href="<?php echo esc_url($base); ?>salon">SALON</a></li>
      <li><a href="<?php echo esc_url($base); ?>faq">FAQ</a></li>
      <li><a href="<?php echo esc_url(home_url('/')); ?>">NEWS</a></li>
    </ul>
    <div class="header-actions">
      <a class="btn-reserve" data-link="line" href="#" target="_blank" rel="noopener">RESERVATION</a>
      <div class="header-sns">
        <a class="sns-ico" data-link="instagram" href="#" target="_blank" rel="noopener" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <rect class="ico-stroke" x="3.2" y="3.2" width="17.6" height="17.6" rx="5" stroke-width="1.7"/>
            <circle class="ico-stroke" cx="12" cy="12" r="4.3" stroke-width="1.7"/>
            <circle class="ico-fill" cx="17" cy="7" r="1.15"/>
          </svg>
        </a>
        <a class="sns-ico" data-link="facebook" href="#" target="_blank" rel="noopener" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path class="ico-fill" d="M13.7 21v-7.6h2.55l.38-2.96H13.7V8.55c0-.86.24-1.44 1.47-1.44h1.57V4.46a21 21 0 0 0-2.29-.12c-2.27 0-3.82 1.38-3.82 3.92v2.18H8.25v2.96h2.35V21h3.1Z"/>
          </svg>
        </a>
      </div>
      <button class="header-hamburger" aria-label="メニュー"><span></span><span></span><span></span></button>
    </div>
  </nav>
</header>

<div class="drawer">
  <a href="<?php echo esc_url($base); ?>">HOME</a>
  <a href="<?php echo esc_url($base); ?>concept">CONCEPT</a>
  <a href="<?php echo esc_url($base); ?>service">SERVICE</a>
  <a href="<?php echo esc_url($base); ?>salon">SALON</a>
  <a href="<?php echo esc_url($base); ?>beforeafter">BEFORE / AFTER</a>
  <a href="<?php echo esc_url($base); ?>faq">FAQ</a>
  <a href="<?php echo esc_url(home_url('/')); ?>">NEWS</a>
  <a data-link="line" href="#" target="_blank" rel="noopener">RESERVATION</a>
  <div class="drawer-sns">
    <a class="sns-ico" data-link="instagram" href="#" target="_blank" rel="noopener" aria-label="Instagram">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <rect class="ico-stroke" x="3.2" y="3.2" width="17.6" height="17.6" rx="5" stroke-width="1.7"/>
        <circle class="ico-stroke" cx="12" cy="12" r="4.3" stroke-width="1.7"/>
        <circle class="ico-fill" cx="17" cy="7" r="1.15"/>
      </svg>
    </a>
    <a class="sns-ico" data-link="facebook" href="#" target="_blank" rel="noopener" aria-label="Facebook">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
        <path class="ico-fill" d="M13.7 21v-7.6h2.55l.38-2.96H13.7V8.55c0-.86.24-1.44 1.47-1.44h1.57V4.46a21 21 0 0 0-2.29-.12c-2.27 0-3.82 1.38-3.82 3.92v2.18H8.25v2.96h2.35V21h3.1Z"/>
      </svg>
    </a>
  </div>
</div>

<main>
