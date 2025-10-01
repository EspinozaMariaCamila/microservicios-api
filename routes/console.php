<?php

use App\Models\Category;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Listar las categorías
Artisan::command('categories', function () {
    $categories = Category::all();
    if ($categories->isEmpty()) {
        $this->info('No hay categorías disponibles.');
        return;
    }

    $this->table(['ID', 'Nombre', 'Slug', 'Activa'], $categories->map(function ($category) {
        return [
            $category->id,
            $category->name,
            $category->slug,
            $category->is_active ? 'Sí' : 'No',
        ];
    }));
})->describe('List all categories');

// Insertar una nueva categoría
Artisan::command('category:create {name} {slug} {--description=""} {--color=#000000} {--active=true}', function ($name, $slug, $description, $color, $active) {
    $category = Category::create([
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'color' => $color,
        'is_active' => $active ? true : false,
    ]);
    $this->info("Categoría '{$category->name}' creada con ID {$category->id}.");
})->describe('Create a new category');
