<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement([
                'موبایل سامسونگ',
                'لپ تاپ سونی',
                'لپ تاپ اچ پی',
                'لپ تاپ اپل',
                'لپ تاپ دل',
                'لپ تاپ قلوه',
                'لپ تاپ شیائومی',
                'اسپیکر هارمن کاردن',
                'اسپیکر کارمن هاردن',
                'اسپیکر هارمانم',
                'اسپیکر بابا نرده',
                'اسپیکر چارشافم',
                'کابل صدا',
                'صابل کدا',
                'کتابخوان',
                'مانیتور الجی',
            ]),
            'description' => 'این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است. این یک متن تست لورم ایپسوم برای توضیحات محصول است.',
            'image' => 'https://cdn.sheypoor.com/imgs/2022/08/09/412878166/666x500_Sw/412878166_681f0fca14fa5bd32090b0a195797683.webp',
            'price' => $this->faker->randomElement([
                10000000,
                12349000,
                12343000,
                97654000,
                23465000,
                99659000,
                54698000,
                45645000,
                32242000,
                23546000,
                34543000,
                34535000,
                34535000,
                12453000,
                45654000,
                23453000,
            ]),
            'stock' => $this->faker->randomDigitNotNull
        ];
    }
}
