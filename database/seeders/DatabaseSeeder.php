<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CustomerProfile;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use App\Models\Branch;
use App\Models\Warehouse;
use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@techmart.om',
            'phone' => '96899999999',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
        ]);

        CustomerProfile::create([
            'user_id' => $admin->id,
            'referral_code' => 'ADMIN001',
        ]);

        // Customer User
        $customer = User::create([
            'name' => 'أحمد العماني',
            'email' => 'ahmed@example.com',
            'phone' => '96891234567',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
        ]);

        CustomerProfile::create([
            'user_id' => $customer->id,
            'referral_code' => 'CUST001',
        ]);

        // Categories
        $phones = Category::create(['name_ar' => 'هواتف ذكية', 'name_en' => 'Smartphones', 'slug' => 'smartphones', 'is_active' => true]);
        $laptops = Category::create(['name_ar' => 'لابتوبات', 'name_en' => 'Laptops', 'slug' => 'laptops', 'is_active' => true]);
        $tablets = Category::create(['name_ar' => 'أجهزة لوحية', 'name_en' => 'Tablets', 'slug' => 'tablets', 'is_active' => true]);
        $accessories = Category::create(['name_ar' => 'إكسسوارات', 'name_en' => 'Accessories', 'slug' => 'accessories', 'is_active' => true]);

        // Brands
        $apple = Brand::create(['name' => 'Apple', 'slug' => 'apple']);
        $samsung = Brand::create(['name' => 'Samsung', 'slug' => 'samsung']);
        $dell = Brand::create(['name' => 'Dell', 'slug' => 'dell']);
        $hp = Brand::create(['name' => 'HP', 'slug' => 'hp']);

        // Products
        $products = [
            [
                'name_ar' => 'آيفون 15 برو ماكس',
                'name_en' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'description_ar' => 'أحدث هاتف من أبل مع معالج A17 برو',
                'description_en' => 'Latest Apple phone with A17 Pro chip',
                'category_id' => $phones->id,
                'brand_id' => $apple->id,
                'condition_type' => 'new',
                'price' => 550.000,
                'cost_price' => 400.000,
                'is_featured' => true,
                'status' => 'active',
            ],
            [
                'name_ar' => 'سامسونج جالاكسي S24 ألترا',
                'name_en' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'galaxy-s24-ultra',
                'description_ar' => 'هاتف سامسونج الرائد مع قلم S-Pen',
                'description_en' => 'Samsung flagship with S-Pen',
                'category_id' => $phones->id,
                'brand_id' => $samsung->id,
                'condition_type' => 'new',
                'price' => 520.000,
                'cost_price' => 380.000,
                'is_featured' => true,
                'status' => 'active',
            ],
            [
                'name_ar' => 'ماك بوك برو 16 بوصة',
                'name_en' => 'MacBook Pro 16"',
                'slug' => 'macbook-pro-16',
                'description_ar' => 'لابتوب أبل الاحترافي بشريحة M3',
                'description_en' => 'Apple professional laptop with M3 chip',
                'category_id' => $laptops->id,
                'brand_id' => $apple->id,
                'condition_type' => 'new',
                'price' => 1200.000,
                'cost_price' => 900.000,
                'is_featured' => true,
                'status' => 'active',
            ],
            [
                'name_ar' => 'ديل XPS 15',
                'name_en' => 'Dell XPS 15',
                'slug' => 'dell-xps-15',
                'description_ar' => 'لابتوب ديل الفاخر للأعمال',
                'description_en' => 'Dell luxury business laptop',
                'category_id' => $laptops->id,
                'brand_id' => $dell->id,
                'condition_type' => 'new',
                'price' => 850.000,
                'cost_price' => 650.000,
                'is_featured' => false,
                'status' => 'active',
            ],
            [
                'name_ar' => 'آيفون 14 برو - مستعمل',
                'name_en' => 'iPhone 14 Pro - Used',
                'slug' => 'iphone-14-pro-used',
                'description_ar' => 'هاتف مستعمل بحالة ممتازة',
                'description_en' => 'Used phone in excellent condition',
                'category_id' => $phones->id,
                'brand_id' => $apple->id,
                'condition_type' => 'used',
                'condition_grade' => 'excellent',
                'price' => 380.000,
                'cost_price' => 280.000,
                'warranty_days' => 90,
                'is_featured' => false,
                'status' => 'active',
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);

            // Variant
            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'sku' => strtoupper(substr($product->slug, 0, 3)) . '-' . rand(1000, 9999),
                'color' => ['أسود', 'أبيض', 'أزرق', 'ذهبي'][array_rand([0, 1, 2, 3])],
                'storage' => ['128GB', '256GB', '512GB', '1TB'][array_rand([0, 1, 2, 3])],
                'is_active' => true,
            ]);

            // Image
            ProductImage::create([
                'product_id' => $product->id,
                'url' => 'https://via.placeholder.com/400x400?text=' . urlencode($product->name_ar),
                'sort_order' => 0,
                'is_main' => true,
            ]);

            // Branch & Warehouse
            $branch = Branch::firstOrCreate(
                ['code' => 'MCT'],
                ['name' => 'فرع مسقط', 'governorate' => 'مسقط', 'is_active' => true]
            );

            $warehouse = Warehouse::firstOrCreate(
                ['code' => 'MCT-WH'],
                ['branch_id' => $branch->id, 'name' => 'مستودع مسقط', 'governorate' => 'مسقط', 'is_active' => true]
            );

            // Inventory
            Inventory::create([
                'product_variant_id' => $variant->id,
                'warehouse_id' => $warehouse->id,
                'quantity' => rand(5, 50),
                'reorder_level' => 5,
            ]);
        }
    }
}
