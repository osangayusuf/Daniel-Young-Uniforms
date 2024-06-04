<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Corporate Uniforms',
                'image' => '/images/corporate-uniform.png'
            ],
            [
                'name' => 'School Uniforms',
                'image' => '/images/school-uniform.png'
            ],
            [
                'name' => 'Industrial Workwear',
                'image' => '/images/industrial-workwear.png'
            ],
            [
                'name' => 'Hospitality Uniforms',
                'image' => '/images/hospitality-uniform.png'
            ],
            [
                'name' => 'Healthcare Uniforms',
                'image' => '/images/healthcare-uniform.png'
            ],
            [
                'name' => 'Security Uniforms',
                'image' => '/images/security-uniform.png'
            ],
        ];

        foreach($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'image' => $category['image']
            ]);
        }
    }
}
