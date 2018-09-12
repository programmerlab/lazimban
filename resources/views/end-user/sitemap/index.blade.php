<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://laravel-news.com/sitemap/posts</loc>
        <lastmod>{{ $post->publishes_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://laravel-news.com/sitemap/categories</loc>
        <lastmod>{{ $post->publishes_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://laravel-news.com/sitemap/podcasts</loc>
        <lastmod>{{ $podcast->publishes_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap
</sitemapindex>