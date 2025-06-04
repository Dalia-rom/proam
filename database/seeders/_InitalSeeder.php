<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class _InitalSeeder extends Seeder
{
    public function userSeeder()
    {
        try {
            // admin
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Proam2025$'),
            ]);

            // user
            User::create([
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);

            // guest
            User::create([
                'name' => 'Guest',
                'email' => 'guest@guest.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);
        } catch (\Throwable $th) {
        }
    }

    public function categoryProductSeeder()
    {
        try {

            $mediciona = Category::create([
                'name' => 'Medicamentos',
                'description' => 'Productos destinados al tratamiento, prevención o alivio de enfermedades. Se dividen en medicamentos con receta médica (controlados) y de venta libre (como analgésicos, antigripales o antiácidos).',
            ]);

            Product::create([
                'category_id' => $mediciona->id,
                'code' => 'VAP-001',
                'name' => 'Paracetamol 500 mg',
                'description' => 'Analgésico y antipirético de venta libre.',
                'images' => null,
                'stock' => 231,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 3,
                'sale_price' => 5,
            ]);

            Product::create([
                'category_id' => $mediciona->id,
                'code' => 'VAP-002',
                'name' => 'Amoxicilina 500 mg',
                'description' => 'Antibiótico de amplio espectro, requiere receta médica.',
                'images' => null,
                'stock' => 232,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 15,
                'sale_price' => 25,
            ]);

            $vitamina = Category::create([
                'name' => 'Vitaminas y Suplementos',
                'description' => 'Compuestos nutricionales que ayudan a complementar la dieta, como multivitamínicos, minerales, colágeno o suplementos para fortalecer el sistema inmunológico.',
            ]);

            Product::create([
                'category_id' => $vitamina->id,
                'code' => 'VS-001',
                'name' => 'Centrum Adultos',
                'description' => 'multivitamínico diario para hombres y mujeres.',
                'images' => null,
                'stock' => 23,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 100,
                'sale_price' => 150,
            ]);

            Product::create([
                'category_id' => $vitamina->id,
                'code' => 'VS-002',
                'name' => 'Vitamina C 1000 mg',
                'description' => 'suplemento para fortalecer el sistema inmunológico.',
                'images' => null,
                'stock' => 22,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 95,
                'sale_price' => 125,
            ]);

            $higene = Category::create([
                'name' => 'Cuidado Personal e Higiene',
                'description' => 'Artículos para el aseo y el cuidado del cuerpo, como jabones, desodorantes, cepillos de dientes, shampoo, cremas corporales y productos para el afeitado.',
            ]);

            Product::create([
                'category_id' => $higene->id,
                'code' => 'CPH-001',
                'name' => 'Desodorante Nivea Men Invisible',
                'description' => 'antitranspirante para uso diario.',
                'images' => null,
                'stock' => 32,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 25,
                'sale_price' => 35,
            ]);

            Product::create([
                'category_id' => $higene->id,
                'code' => 'CPH-002',
                'name' => 'Shampoo Head & Shoulders',
                'description' => 'tratamiento anticaspa para todo tipo de cabello.',
                'images' => null,
                'stock' => 32,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 15,
                'sale_price' => 25,
            ]);

            $cuidado = Category::create([
                'name' => 'Cuidado Infantil',
                'description' => 'Productos diseñados para bebés y niños pequeños, incluyendo pañales, toallitas húmedas, fórmulas lácteas, biberones, cremas para rozaduras y artículos de higiene específicos.',
            ]);

            Product::create([
                'category_id' => $cuidado->id,
                'code' => 'CI-001',
                'name' => 'Pañales Huggies Etapa 2',
                'description' => 'para bebés de 5 a 8 kg.',
                'images' => null,
                'stock' => 312,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 150,
                'sale_price' => 200,
            ]);

            Product::create([
                'category_id' => $cuidado->id,
                'code' => 'CI-002',
                'name' => 'Fórmula Enfamil Premium',
                'description' => 'leche en polvo para lactantes a partir del nacimiento.',
                'images' => null,
                'stock' => 231,
                'min_stock' => 1,
                'max_stock' => 100,
                'purchase_price' => 23,
                'sale_price' => 30,
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function customerSeeder()
    {
        try {

            for ($i = 1; $i <= 11; $i++) {
                Customer::create([
                    'name' => fake()->name,
                    'email' => fake()->unique()->safeEmail(),
                    'phone' => fake()->phoneNumber,
                    'zip_code' => fake()->postcode,
                    'address' => fake()->address,
                    'city' => fake()->city,
                    'state' => fake()->state,
                    'country' => fake()->country,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function purchasePurchaseDetailsSeeder()
    {
        $purchase_number = 'PRC-' . fake()->unique()->numberBetween(1000, 9999);

        $purchase = Purchase::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => fake()->dateTimeBetween('-1 days', 'now'),
            'purchase_number' => $purchase_number,
            'description' => $purchase_number,
        ]);

        /* Detalle de Compra */

        for ($i = 1; $i <= 5; $i++) {
            $product = Product::inRandomOrder()->first();

            PurchaseDetails::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'quantity' => $qty = fake()->numberBetween(1, 10),
                'purchase_price' => $purchasePrice = $product->sale_price-(($product->sale_price*20)/100),
                'sale_price' => $product->sale_price,
                'total' => $purchasePrice * $qty,
            ]);
        }

        /*  */

        $purchase_number = 'PRC-' . fake()->unique()->numberBetween(1000, 9999);

        $purchase = Purchase::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => fake()->dateTimeBetween('-1 days', 'now'),
            'purchase_number' => $purchase_number,
            'description' => $purchase_number,
        ]);

        /* Detalle de Compra */

        for ($i = 1; $i <= 5; $i++) {
            $product = Product::inRandomOrder()->first();

            PurchaseDetails::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'quantity' => $qty = fake()->numberBetween(1, 10),
                'purchase_price' => $purchasePrice = $product->sale_price-(($product->sale_price*20)/100),
                'sale_price' => $product->sale_price,
                'total' => $purchasePrice * $qty,
            ]);
        }
    }

    public function saleSaleDetailsSeeder()
    {
        $sale_number = 'SL-' . fake()->unique()->numberBetween(1000, 9999);

        $sale = Sale::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => fake()->dateTimeBetween('-1 days', 'now'),
            'sale_number' => $sale_number,
            'description' => $sale_number,
        ]);

        /* Detalle de Compra */

        for ($i = 1; $i <= 5; $i++) {
            $product = Product::inRandomOrder()->first();

            SaleDetails::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $qty = fake()->numberBetween(1, 10),
                'sale_price' => $product->sale_price,
                'total' => $product->sale_price * $qty,
            ]);
        }

        /*  */
        $sale_number = 'SL-' . fake()->unique()->numberBetween(1000, 9999);

        $sale = sale::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => fake()->dateTimeBetween('-1 days', 'now'),
            'sale_number' => $sale_number,
            'description' => $sale_number,
        ]);

        /* Detalle de Compra */

        for ($i = 1; $i <= 5; $i++) {
            $product = Product::inRandomOrder()->first();

            saleDetails::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $qty = fake()->numberBetween(1, 10),
                'sale_price' => $product->sale_price,
                'total' => $product->sale_price * $qty,
            ]);
        }
    }

    public function run(): void
    {
        $this->userSeeder();
        $this->categoryProductSeeder();
        $this->customerSeeder();
        $this->purchasePurchaseDetailsSeeder();
        $this->saleSaleDetailsSeeder();
    }
}
