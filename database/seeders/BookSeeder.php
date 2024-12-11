<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\BookFactory;
use Database\Factories\TagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        BookFactory::new()
            ->has(TagFactory::new()->count(3))
            ->createMany(200);
    }
}
