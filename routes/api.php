<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\CalcularController;

Route::get('/ping', fn() => response()->json([
    'success' => true,
    'data' => ['status' => 'ok'],
    'message' => 'API is running correctly'
]));

// Respuesta JSON en API routes/api.php
Route::get('/status', function () {
    return response()->json([
        'status' => 'OK',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});

Route::get('/products', function () {
    $products = [
        ['id' => 1, 'name' => 'Laptop', 'price' => 999.99],
        ['id' => 2, 'name' => 'Mouse', 'price' => 25.99],
        ['id' => 3, 'name' => 'Teclado', 'price' => 89.99]
    ];

    return response()->json([
        'data' => $products,
        'count' => count($products)
    ]);
});

Route::get('/calc/{operation}/{num1}/{num2}', [CalcularController::class, 'calcular']);

Route::post('/stat', [CalcularController::class, 'statistics']);

// Endpoint de prueba para archivos (sin autenticación para testing)
Route::post('/test-files', [FileController::class, 'upload']);
Route::get('/test-files', [FileController::class, 'index']);
Route::get('/test-files/download/{filename}', [FileController::class, 'download']);
Route::delete('/test-files/{filename}', [FileController::class, 'delete']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas para reset de contraseña
Route::post('/password/forgot', [AuthController::class, 'forgotPassword']);
Route::post('/password/reset', [AuthController::class, 'resetPassword']);

// Ruta para verificar email (no requiere autenticación)
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware('signed')
    ->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Reenviar email de verificación
    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail']);

    // Rutas para manejo de archivos
    Route::prefix('files')->group(function () {
        Route::post('/upload', [FileController::class, 'upload']);
        Route::get('/', [FileController::class, 'index']);
        Route::get('/download/{filename}', [FileController::class, 'download']);
        Route::delete('/{filename}', [FileController::class, 'delete']);
    });
});
