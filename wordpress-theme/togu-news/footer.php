<?php if (!defined('ABSPATH')) exit; $base = TOGU_SITE_BASE; ?>
</main>

<!-- ===================== Footer ===================== -->
<footer class="site-footer">
  <div class="inner">
    <div class="site-footer__grid">
      <div class="site-footer__brand">
        <img src="<?php echo esc_url($base); ?>images/common/logo-wh.svg" alt="TOGU">
        <a class="footer-line" data-link="line" href="#" target="_blank" rel="noopener">公式LINE ＞ 友だち追加 +</a>
        <p class="copy">© 2025, togu. All right reserved.</p>
      </div>
      <div class="site-footer__right">
        <nav class="footer-nav">
          <a href="<?php echo esc_url($base); ?>">HOME</a>
          <a href="<?php echo esc_url($base); ?>concept">CONCEPT</a>
          <a href="<?php echo esc_url($base); ?>service">SERVICE</a>
          <a href="<?php echo esc_url($base); ?>salon">SALON</a>
          <a href="<?php echo esc_url($base); ?>beforeafter">BEFORE / AFTER</a>
          <a href="<?php echo esc_url($base); ?>faq">FAQ</a>
          <a href="<?php echo esc_url(home_url('contact/')); ?>">CONTACT</a>
        </nav>
        <div class="footer-sns">
          <a class="sns-ico" data-link="facebook" href="#" target="_blank" rel="noopener" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path class="ico-fill" d="M13.7 21v-7.6h2.55l.38-2.96H13.7V8.55c0-.86.24-1.44 1.47-1.44h1.57V4.46a21 21 0 0 0-2.29-.12c-2.27 0-3.82 1.38-3.82 3.92v2.18H8.25v2.96h2.35V21h3.1Z"/>
            </svg>
          </a>
          <a class="sns-ico" data-link="instagram" href="#" target="_blank" rel="noopener" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <rect class="ico-stroke" x="3.2" y="3.2" width="17.6" height="17.6" rx="5" stroke-width="1.7"/>
              <circle class="ico-stroke" cx="12" cy="12" r="4.3" stroke-width="1.7"/>
              <circle class="ico-fill" cx="17" cy="7" r="1.15"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
