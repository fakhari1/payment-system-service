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
                97654500,
                23465400,
                99659540,
                54698490,
                45645350,
                32242340,
                23546450,
                34543560,
                34535340,
                34535430,
                12453450,
                45654600,
                23453460,
            ]),
            'stock' => $this->faker->randomDigitNotNull
        ];
    }
}
