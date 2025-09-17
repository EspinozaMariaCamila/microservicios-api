<?php

namespace App\Utils;

class ProductNameGenerator
{
    /**
     * Genera un nombre de producto coherente con su descripción
     *
     * @return array Con 'name' y 'description_suffix'
     */
    public static function generateProductData(): array
    {
        $products = [
            [
                'name' => 'Smartphone Pro Max',
                'description_suffix' => 'Tecnología avanzada al mejor precio del mercado.'
            ],
            [
                'name' => 'Auriculares Bluetooth Premium',
                'description_suffix' => 'Diseño ergonómico pensado para la comodidad del usuario.'
            ],
            [
                'name' => 'Laptop UltraBook Elite',
                'description_suffix' => 'Ideal para profesionales y usuarios exigentes.'
            ],
            [
                'name' => 'Cafetera Espresso Deluxe',
                'description_suffix' => 'Fácil de usar y mantener, perfecto para principiantes.'
            ],
            [
                'name' => 'Monitor Gaming 4K',
                'description_suffix' => 'Compatible con todos los sistemas modernos.'
            ],
            [
                'name' => 'Reloj Inteligente Sport',
                'description_suffix' => 'Resistente al agua y condiciones extremas.'
            ],
            [
                'name' => 'Cargador Solar Portátil',
                'description_suffix' => 'Eco-friendly y sostenible con el medio ambiente.'
            ],
            [
                'name' => 'Aspiradora Robot Smart',
                'description_suffix' => 'Bajo consumo energético y alta eficiencia.'
            ],
            [
                'name' => 'Tablet Gráfica Professional',
                'description_suffix' => 'Recomendado por expertos en la industria.'
            ],
            [
                'name' => 'Aire Acondicionado Split',
                'description_suffix' => 'Instalación rápida y sencilla en pocos minutos.'
            ],
            [
                'name' => 'Cámara Reflex Digital',
                'description_suffix' => 'Producto de alta calidad con acabados premium.'
            ],
            [
                'name' => 'Teclado Mecánico RGB',
                'description_suffix' => 'Disponible en múltiples colores y tamaños.'
            ],
            [
                'name' => 'Microondas Inverter',
                'description_suffix' => 'Certificado bajo estrictos estándares de calidad.'
            ],
            [
                'name' => 'Bicicleta Eléctrica Urban',
                'description_suffix' => 'Excelente relación calidad-precio garantizada.'
            ],
            [
                'name' => 'Proyector LED 1080p',
                'description_suffix' => 'Incluye accesorios complementarios sin costo adicional.'
            ],
            [
                'name' => 'Silla Gamer Ergonómica',
                'description_suffix' => 'Diseño innovador y funcional para uso diario.'
            ],
            [
                'name' => 'Router WiFi 6 Mesh',
                'description_suffix' => 'Con garantía extendida y soporte técnico incluido.'
            ],
            [
                'name' => 'Licuadora Alta Potencia',
                'description_suffix' => 'Fabricado con materiales resistentes y duraderos.'
            ],
            [
                'name' => 'Drone Cámara 4K',
                'description_suffix' => 'Producto bestseller en su categoría.'
            ],
            [
                'name' => 'Altavoz Bluetooth Waterproof',
                'description_suffix' => 'Envío gratuito a todo el país en 24-48 horas.'
            ]
        ];

        return $products[array_rand($products)];
    }

    /**
     * Genera solo un nombre de producto aleatorio
     *
     * @return string
     */
    public static function generateName(): string
    {
        return self::generateProductData()['name'];
    }

    /**
     * Genera solo un sufijo de descripción aleatorio
     *
     * @return string
     */
    public static function generateDescriptionSuffix(): string
    {
        return self::generateProductData()['description_suffix'];
    }
}
