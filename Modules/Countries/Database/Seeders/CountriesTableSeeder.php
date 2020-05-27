<?php

use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Modules\Countries\Entities\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->countries())
        );

        $bar->start();

        foreach ($this->countries() as $country) {
            /** @var \Modules\Countries\Entities\Country $countryModel */
            $countryModel = factory(Country::class)
                ->create(Arr::except($country, ['flag', 'cities']));

            $countryModel->addMediaFromUrl($country['flag'])
                ->toMediaCollection('flags');

            foreach ($country['cities'] as $city) {
                $countryModel->cities()->create($city);

                $bar->advance();
            }
        }
        $bar->finish();
        $this->command->info("\n");
    }

    private function countries()
    {
        return [
            [
                'name:ar' => 'مصر',
                'name:en' => 'Egypt',
                'code' => 'eg',
                'key' => '+20',
                'currency:ar' => 'ج.م',
                'currency:en' => 'EGP',
                'flag' => __DIR__.'/../../Resources/assets/flags/158-egypt.png',
                'cities' => require __DIR__.'/cities/eg.php',
            ],
            [
                'name:ar' => 'السعودية',
                'name:en' => 'Saudi',
                'code' => 'sa',
                'key' => '+966',
                'currency:ar' => 'ر.س',
                'currency:en' => 'SAR',
                'flag' => __DIR__.'/../../Resources/assets/flags/133-saudi-arabia.png',
                'cities' => require __DIR__.'/cities/sa.php',
            ],
            [
                'name:ar' => 'فلسطين',
                'name:en' => 'Palestine',
                'code' => 'ps',
                'key' => '+970',
                'currency:ar' => 'شيكل',
                'currency:en' => 'ILS',
                'flag' => __DIR__.'/../../Resources/assets/flags/208-palestine.png',
                'cities' => require __DIR__.'/cities/ps.php',
            ],
            [
                'name:ar' => 'الكويت',
                'name:en' => 'kuwait',
                'code' => 'kw',
                'key' => '؜+965',
                'currency:ar' => 'د.ك',
                'currency:en' => 'KWD',
                'flag' => __DIR__.'/../../Resources/assets/flags/107-kwait.png',
                'cities' => require __DIR__.'/cities/kw.php',
            ],
            [
                'name:ar' => 'الأردن',
                'name:en' => 'Jordan',
                'code' => 'jo',
                'key' => '+962',
                'currency:ar' => 'د.ا',
                'currency:en' => 'JOD',
                'flag' => __DIR__.'/../../Resources/assets/flags/077-jordan.png',
                'cities' => require __DIR__.'/cities/jo.php',
            ],
            [
                'name:ar' => 'العراق',
                'name:en' => 'Iraqi',
                'code' => 'iq',
                'key' => '+964',
                'currency:ar' => 'ع.د',
                'currency:en' => 'IQD',
                'flag' => __DIR__.'/../../Resources/assets/flags/020-iraq.png',
                'cities' => require __DIR__.'/cities/iq.php',
            ],
            [
                'name:ar' => 'عُمان',
                'name:en' => 'Oman',
                'code' => 'om',
                'key' => '+968',
                'currency:ar' => 'ر.ع.',
                'currency:en' => 'OMR',
                'flag' => __DIR__.'/../../Resources/assets/flags/004-oman.png',
                'cities' => require __DIR__.'/cities/om.php',
            ],
            [
                'name:ar' => 'ليبيا',
                'name:en' => 'Libya',
                'code' => 'ly',
                'key' => '+218',
                'currency:ar' => 'ل.د',
                'currency:en' => 'LYD',
                'flag' => __DIR__.'/../../Resources/assets/flags/231-libya.png',
                'cities' => require __DIR__.'/cities/ly.php',
            ],
            [
                'name:ar' => 'اليمن',
                'name:en' => 'Yemen',
                'code' => 'ye',
                'key' => '+967',
                'currency:ar' => 'ريال',
                'currency:en' => 'YER',
                'flag' => __DIR__.'/../../Resources/assets/flags/232-yemen.png',
                'cities' => require __DIR__.'/cities/ye.php',
            ],
            [
                'name:ar' => 'الإمارات',
                'name:en' => 'United Arab Emirates',
                'code' => 'ae',
                'key' => '+971',
                'currency:ar' => 'د.إ',
                'currency:en' => 'AED',
                'flag' => __DIR__.'/../../Resources/assets/flags/151-united-arab-emirates.png',
                'cities' => require __DIR__.'/cities/ae.php',
            ],
            [
                'name:ar' => 'قطر',
                'name:en' => 'Qatar',
                'code' => 'qa',
                'key' => '+974',
                'currency:ar' => 'ر.ق',
                'currency:en' => 'QAR',
                'flag' => __DIR__.'/../../Resources/assets/flags/qatar-flag_xs.jpg',
                'cities' => require __DIR__.'/cities/qa.php',
            ],
            [
                'name:ar' => 'سوريا',
                'name:en' => 'Syria',
                'code' => 'sy',
                'key' => '+963',
                'currency:ar' => 'ل.س',
                'currency:en' => 'SYP',
                'flag' => __DIR__.'/../../Resources/assets/flags/022-syria.png',
                'cities' => require __DIR__.'/cities/sy.php',
            ],
            [
                'name:ar' => 'لبنان',
                'name:en' => 'Lebanon',
                'code' => 'lb',
                'key' => '+961',
                'currency:ar' => 'ل.ل.',
                'currency:en' => 'LBP',
                'flag' => __DIR__.'/../../Resources/assets/flags/018-lebanon.png',
                'cities' => require __DIR__.'/cities/lb.php',
            ],
            [
                'name:ar' => 'السودان',
                'name:en' => 'Sudan',
                'code' => 'sd',
                'key' => '+249',
                'currency:ar' => 'ج.س.',
                'currency:en' => 'SDG',
                'flag' => __DIR__.'/../../Resources/assets/flags/199-sudan.png',
                'cities' => require __DIR__.'/cities/sd.php',
            ],
            [
                'name:ar' => 'البحرين',
                'name:en' => 'Bahrain',
                'code' => 'bh',
                'key' => '+973',
                'currency:ar' => 'د.ب.',
                'currency:en' => 'BHD',
                'flag' => __DIR__.'/../../Resources/assets/flags/138-bahrain.png',
                'cities' => require __DIR__.'/cities/bh.php',
            ],
            [
                'name:ar' => 'الجزائر',
                'name:en' => 'Algeria',
                'code' => 'dz',
                'key' => '+213',
                'currency:ar' => 'د.ج.',
                'currency:en' => 'DZD',
                'flag' => __DIR__.'/../../Resources/assets/flags/144-algeria.png',
                'cities' => require __DIR__.'/cities/dz.php',
            ],
            [
                'name:ar' => 'المغرب',
                'name:en' => 'Morocco',
                'code' => 'ma',
                'key' => '+212',
                'currency:ar' => 'د.م.',
                'currency:en' => 'MAD',
                'flag' => __DIR__.'/../../Resources/assets/flags/166-morocco.png',
                'cities' => require __DIR__.'/cities/ma.php',
            ],
            [
                'name:ar' => 'تونس',
                'name:en' => 'Tunisia',
                'code' => 'tn',
                'key' => '+216',
                'currency:ar' => '	د.ت',
                'currency:en' => 'TND',
                'flag' => __DIR__.'/../../Resources/assets/flags/049-tunisia.png',
                'cities' => require __DIR__.'/cities/tn.php',
            ],
            [
                'name:ar' => 'الصومال',
                'name:en' => 'Somalia',
                'code' => 'so',
                'key' => '+252',
                'currency:ar' => 'شلن',
                'currency:en' => 'SOS',
                'flag' => __DIR__.'/../../Resources/assets/flags/083-somalia.png',
                'cities' => require __DIR__.'/cities/so.php',
            ],
        ];
    }
}
