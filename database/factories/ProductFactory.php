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
                10_000_000,
                12_349_000,
                12_343_000,
                97_654_000,
                23_465_000,
                99_659_000,
                54_698_000,
                45_645_000,
                32_242_000,
                23_546_000,
                34_543_000,
                34_535_000,
                34_535_000,
                12_453_000,
                45_654_000,
                23_453_000,
            ]),
            'stock' => $this->faker->randomDigitNotNull
        ];
    }
}
