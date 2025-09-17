<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Review;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;

echo "1. Creando Reseñas\n";

echo "\n1.1. Productos\n";
$iPhone = Product::where('name', 'like', '%iPhone%')->first();
$samsung = Product::where('name', 'like', '%Samsung%')->first();

echo $iPhone . "\n";
echo $samsung . "\n";

echo "\n1.2. Clientes\n";

$john = Customer::where('email', 'jdoe@hotmail.com')->first();
$martin = Customer::where('email', 'mvarelochoa@hotmail.com')->first();

echo $john . "\n";
echo $martin . "\n";

echo "\n1.3. Reseñas\n";
$review1 = new Review([
    'rating' => 5,
    'comment' => 'Excelente producto, muy satisfecho con la compra.'
]);
$review1->product()->associate($iPhone);
$review1->customer()->associate($john);
$review1->save();