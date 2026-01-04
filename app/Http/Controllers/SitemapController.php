<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $sitemap .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

        // Homepage
        $sitemap .= $this->addUrl(route('home'), now(), 'daily', '1.0');

        // Static pages
        $sitemap .= $this->addUrl(route('about'), now()->subDays(7), 'weekly', '0.8');
        $sitemap .= $this->addUrl(route('contact'), now()->subDays(7), 'weekly', '0.8');
        $sitemap .= $this->addUrl(route('faq'), now()->subDays(14), 'weekly', '0.7');
        $sitemap .= $this->addUrl(route('privacy'), now()->subDays(30), 'monthly', '0.5');
        $sitemap .= $this->addUrl(route('terms'), now()->subDays(30), 'monthly', '0.5');
        $sitemap .= $this->addUrl(route('booking'), now(), 'daily', '0.9');

        // Services index
        $sitemap .= $this->addUrl(route('services.index'), now()->subDays(3), 'weekly', '0.9');

        // Individual services
        $services = Service::active()->get();
        foreach ($services as $service) {
            $sitemap .= $this->addUrl(
                route('services.show', $service->slug),
                $service->updated_at,
                'weekly',
                '0.8'
            );
        }

        // Articles index
        $sitemap .= $this->addUrl(route('articles.index'), now(), 'daily', '0.9');

        // Individual articles
        $articles = Article::published()->get();
        foreach ($articles as $article) {
            $sitemap .= $this->addUrl(
                route('articles.show', $article->slug),
                $article->updated_at ?? $article->published_at,
                'weekly',
                '0.7'
            );
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'text/xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    private function addUrl($loc, $lastmod, $changefreq, $priority)
    {
        $url = '<url>';
        $url .= '<loc>' . htmlspecialchars($loc, ENT_XML1) . '</loc>';
        $url .= '<lastmod>' . $lastmod->toAtomString() . '</lastmod>';
        $url .= '<changefreq>' . $changefreq . '</changefreq>';
        $url .= '<priority>' . $priority . '</priority>';
        $url .= '</url>';

        return $url;
    }
}
