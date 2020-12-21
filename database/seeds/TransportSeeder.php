<?php

use App\Transport;
use App\Entity;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $imagePrefix = "https://aimme.s3-ap-southeast-1.amazonaws.com/hackmv/600x400/";// /133931_1608431275.jpg
        $imagePrefix = "https://aimme.s3-ap-southeast-1.amazonaws.com/hackmv/300x200/";// /133931_1608431275.jpg

        // $transportInstance = new Transport;
        $transportInstance = new Entity;

        $transports = [
            [
                'type' => 'transport',
                'category' => 'ferry',
                'name' => 'iCom Daily Speedboat',
                'travel_summary' => "Airport/Male' - 30 mins - V. Fulidhoo",
                'from_entity' => null,
                'to_entity' => 1,
                'summary' => '',
                'days' => 'SUN - THUR',
                'hours' => '08:00 AM,05:00 PM,09:00PM',
                'cover_image_url' => $imagePrefix. 't1.jpg',
            ],
            [
                'type' => 'transport',
                'category' => 'ferry',
                'name' => 'Nevi',
                'travel_summary' => "Airport/Male' - 30 mins - V. Fulidhoo",
                'from_entity' => null,
                'to_entity' => 1,
                'summary' => '',
                'days' => 'SUN - THUR',
                'hours' => '08:00 AM,05:00 PM,09:00PM',
                'cover_image_url' => $imagePrefix. 't2.jpg',
            ],
            [
                'type' => 'transport',
                'category' => 'ferry',
                'name' => 'Abaarana',
                'travel_summary' => "Airport/Male' - 30 mins - V. Fulidhoo",
                'from_entity' => null,
                'to_entity' => 1,
                'summary' => '',
                'days' => 'SUN - THUR',
                'hours' => '08:00 AM,05:00 PM,09:00PM',
                'cover_image_url' => $imagePrefix. 't4.jpeg',
            ],
        ];

        foreach ($transports as $transport) {
            $transportInstance->create($transport);
        }
    }
}
