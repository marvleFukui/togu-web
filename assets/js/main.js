/* =========================================================
   TOGU - main.js
   - header scroll state
   - mobile drawer
   - hero slideshow
   - scroll reveal
   - news (WordPress REST API)
   ========================================================= */
(function () {
  "use strict";
  var CFG = window.TOGU_CONFIG || {};

  /* ---------- Header scroll state ---------- */
  var header = document.querySelector(".site-header");
  function onScroll() {
    if (!header) return;
    if (window.scrollY > 40) header.classList.add("is-scrolled");
    else header.classList.remove("is-scrolled");
  }
  if (header) {
    // pages without a hero keep the header solid
    if (header.dataset.solid === "true") header.classList.add("is-solid");
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  /* ---------- Mobile drawer ---------- */
  var hamburger = document.querySelector(".header-hamburger");
  if (hamburger) {
    hamburger.addEventListener("click", function () {
      document.body.classList.toggle("nav-open");
    });
    document.querySelectorAll(".drawer a").forEach(function (a) {
      a.addEventListener("click", function () { document.body.classList.remove("nav-open"); });
    });
  }

  /* ---------- Hero slideshow ---------- */
  var slides = document.querySelectorAll(".hero__slide");
  if (slides.length > 1) {
    var idx = 0;
    setInterval(function () {
      var prev = slides[idx];
      idx = (idx + 1) % slides.length;
      slides[idx].classList.add("is-active");   // fade the new one in first
      // keep the previous slide underneath during the crossfade, then drop it
      window.setTimeout(function () { prev.classList.remove("is-active"); }, 2600);
    }, 6500);
  }

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll(".faq-q").forEach(function (q) {
    q.addEventListener("click", function () {
      var item = q.closest(".faq-item");
      if (item) item.classList.toggle("is-open");
    });
  });

  /* ---------- News archives tree (year collapse) ---------- */
  document.querySelectorAll(".arch-year__head").forEach(function (head) {
    head.addEventListener("click", function () {
      var year = head.closest(".arch-year");
      if (year) year.classList.toggle("is-open");
    });
  });

  /* ---------- Contact Form 7: 送信完了でサンクスページへ ---------- */
  document.addEventListener("wpcf7mailsent", function () {
    var url = CFG.THANKS_URL || "thanks.html";
    window.location.href = url;
  }, false);

  /* ---------- Scroll reveal ---------- */
  var reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && reveals.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add("is-in"); io.unobserve(e.target); }
      });
    }, { threshold: 0.12 });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-in"); });
  }

  /* ---------- News (WordPress REST API) ---------- */
  var SAMPLE_NEWS = [
    { category: "NEWS",  date: "2025.09.01", title: "ホームページを公開いたしました。", link: "/news/" },
    { category: "MEDIA", date: "2025.08.20", title: "東京・渋谷でのプライベートサロン施術日程のお知らせ。", link: "/news/" },
    { category: "BLOG",  date: "2025.08.05", title: "季節のアロマセレクションを更新しました。", link: "/news/" }
  ];

  function fmtDate(iso) {
    try {
      var d = new Date(iso);
      var m = ("0" + (d.getMonth() + 1)).slice(-2);
      var day = ("0" + d.getDate()).slice(-2);
      return d.getFullYear() + "." + m + "." + day;
    } catch (e) { return iso; }
  }

  function decodeEntities(str) {
    var t = document.createElement("textarea");
    t.innerHTML = str || "";
    return t.value;
  }

  function renderNews(container, items, limit) {
    container.innerHTML = "";
    items.slice(0, limit).forEach(function (item) {
      var a = document.createElement("a");
      a.className = "news-list__item";
      a.href = item.link || "/news/";
      a.innerHTML =
        '<span class="news-cat">' + (item.category || "NEWS") + "</span>" +
        '<span class="news-date">' + item.date + "</span>" +
        '<span class="news-title">' + decodeEntities(item.title) + "</span>";
      container.appendChild(a);
    });
  }

  function loadNews() {
    var container = document.querySelector("[data-news]");
    if (!container) return;
    var limit = parseInt(container.dataset.limit || "3", 10);
    var base = CFG.WP_API_BASE;

    if (!base) { renderNews(container, SAMPLE_NEWS, limit); return; }

    var url = base.replace(/\/$/, "") + "/wp-json/wp/v2/posts?_embed&per_page=" + limit;
    fetch(url)
      .then(function (r) { if (!r.ok) throw new Error("HTTP " + r.status); return r.json(); })
      .then(function (posts) {
        if (!Array.isArray(posts) || !posts.length) { renderNews(container, SAMPLE_NEWS, limit); return; }
        var items = posts.map(function (p) {
          var cat = "NEWS";
          try {
            var terms = p._embedded["wp:term"][0];
            if (terms && terms.length) cat = terms[0].name;
          } catch (e) {}
          return {
            category: cat,
            date: fmtDate(p.date),
            title: (p.title && p.title.rendered) || "(無題)",
            link: p.link || "/news/"
          };
        });
        renderNews(container, items, limit);
      })
      .catch(function () { renderNews(container, SAMPLE_NEWS, limit); });
  }
  loadNews();

  /* ---------- Inject external links from config ---------- */
  document.querySelectorAll("[data-link='line']").forEach(function (a) { if (CFG.LINE_URL) a.href = CFG.LINE_URL; });
  document.querySelectorAll("[data-link='instagram']").forEach(function (a) { if (CFG.INSTAGRAM_URL) a.href = CFG.INSTAGRAM_URL; });
  document.querySelectorAll("[data-link='facebook']").forEach(function (a) { if (CFG.FACEBOOK_URL) a.href = CFG.FACEBOOK_URL; });
})();
