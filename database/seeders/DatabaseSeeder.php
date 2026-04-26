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

        \App\Models\Article::factory(10)->create(['category_id' => $catNews->id]);
        \App\Models\Article::factory(5)->create(['category_id' => $catMaintenance->id]);
        \App\Models\Article::factory(5)->create(['category_id' => $catIncident->id]);
    }
}
