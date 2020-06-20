<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($query as $value)
        <url>
            <loc>{{ urldecode(url('category',$value->title)) }}</loc>
            <lastmod>{{ $value->updated_at }}</lastmod>
            <changefreq>always</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
</urlset>