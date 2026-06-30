/* =========================================================
   TOGU - Site configuration
   ---------------------------------------------------------
   NEWS(お知らせ)は WordPress の REST API から取得します。
   WordPress を設置したら下記 WP_API_BASE を実際のURLに変更してください。
   例) "https://news.togu.jp" や "https://togu.jp/blog"
   （末尾スラッシュ不要 / WordPress本体のURL。REST APIは
     {WP_API_BASE}/wp-json/wp/v2/posts に自動的にアクセスします）

   未設定(null)の場合はサンプルのお知らせを表示します。
   ========================================================= */
window.TOGU_CONFIG = {
  // 例: "https://example.com" （WordPressのサイトURL）
  WP_API_BASE: "/news",

  // お問い合わせ送信完了後に遷移するサンクスページのURL
  // WordPress(/news/)のサンクス固定ページ。ルート相対なので本番でもそのまま動作。
  THANKS_URL: "/news/thanks/",

  // 外部リンク
  LINE_URL: "https://line.me/R/ti/p/@744cwkjd?ts=06051343&oat_content=url",
  INSTAGRAM_URL: "https://www.instagram.com/togu_michiru/",
  FACEBOOK_URL: "https://www.facebook.com/togu.sapporo/"
};
