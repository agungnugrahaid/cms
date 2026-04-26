<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );

        \App\Models\Page::firstOrCreate(
            ['slug' => 'home'],
            ['title' => 'GMEDIA Network Operations Center', 'content' => 'Delivering 24/7 monitoring, incident management, and infrastructure resilience to ensure uninterrupted global connectivity.']
        );
        \App\Models\Page::firstOrCreate(
            ['slug' => 'about'],
            ['title' => 'NOC Overview & Capabilities', 'content' => 'The core of our infrastructure resilience. Discover how GMEDIA\'s Network Operation Center maintains absolute uptime through rigorous monitoring, rapid incident response, and strict SLA compliance.']
        );
        \App\Models\Page::firstOrCreate(
            ['slug' => 'contact'],
            ['title' => 'NOC Contact & Support', 'content' => 'Global Network Operations Center. For immediate critical incidents, please use the direct hotline numbers provided below. Standard inquiries will be addressed within standard SLAs.']
        );

        $catNews = \App\Models\Category::firstOrCreate(['slug' => 'news'], ['name' => 'News']);
        $catMaintenance = \App\Models\Category::firstOrCreate(['slug' => 'maintenance'], ['name' => 'Maintenance']);
        $catIncident = \App\Models\Category::firstOrCreate(['slug' => 'incident'], ['name' => 'Incident']);
        $catCarousel = \App\Models\Category::firstOrCreate(['slug' => 'home-carousel'], ['name' => 'Home Carousel']);

        \App\Models\Article::firstOrCreate(
            ['slug' => 'gmedia-network-operations-center'],
            [
                'title' => 'GMEDIA Network Operations Center',
                'content' => 'Delivering 24/7 monitoring, incident management, and infrastructure resilience to ensure uninterrupted global connectivity.',
                'category_id' => $catCarousel->id,
                'featured_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        \App\Models\Article::firstOrCreate(
            ['slug' => 'global-expansion-q3'],
            [
                'title' => 'Global Network Expansion in Q3',
                'content' => 'We are rolling out 50+ new PoPs (Points of Presence) across Europe and Asia, significantly reducing latency and expanding our edge compute capacity for enterprise clients.',
                'category_id' => $catCarousel->id,
                'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ]
        );

        \App\Models\Article::firstOrCreate(
            ['slug' => 'next-gen-ddos-mitigation'],
            [
                'title' => 'Next-Generation DDoS Mitigation',
                'content' => 'Our new automated scrubbing centers are now fully operational, providing instantaneous multi-terabit filtering to protect your critical infrastructure from volumetric attacks.',
                'category_id' => $catCarousel->id,
                'featured_image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        );

        \App\Models\Article::firstOrCreate(
            ['slug' => 'zero-trust-architecture'],
            [
                'title' => 'Adopting Zero Trust Architecture',
                'content' => 'GMEDIA NOC has officially transitioned all internal systems and client portals to a strict Zero Trust model, ensuring unparalleled security without compromising speed.',
                'category_id' => $catCarousel->id,
                'featured_image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2000&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ]
        );

        \App\Models\Article::factory(10)->create(['category_id' => $catNews->id]);
        \App\Models\Article::factory(5)->create(['category_id' => $catMaintenance->id]);
        \App\Models\Article::factory(5)->create(['category_id' => $catIncident->id]);
    }
}
