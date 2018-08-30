<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
    <loc>{{ $sitename }}</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
    </url>
    <url>
    <loc>{{ $sitename }}myaccount/signup</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>    
    <url>
    <loc>{{ $sitename }}about</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}privacy-policy</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}delivery-and-returns</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}distance-sales-contract</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}blogs</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}myaccount/login</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}faq</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>{{ $sitename }}contact</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.80</priority>
    </url>    
    <url>
    <loc>{{ $sitename }}blog-detail/4</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.64</priority>
    </url>
    <url>
    <loc>{{ $sitename }}blog-detail/3</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.64</priority>
    </url>
    <url>
    <loc>{{ $sitename }}blog-detail/2</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.64</priority>
    </url>    
    <url>
    <loc>{{ $sitename }}order</loc>
    <lastmod>2018-08-09T12:17:21+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.51</priority>
    </url>
    @foreach ($products as $post)
        <url>
            <loc>{{ $sitename }}{{ $post->url }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($categories as $cat)
         @foreach ($cat as $c)
             <url>
                <loc>{{ $sitename }}{{ $c['slug'] }}</loc>
                <lastmod>{{ $c['created_at']->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
            
         @endforeach
    @endforeach
</urlset>