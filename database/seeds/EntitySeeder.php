<?php

use App\Entity;
use App\EntityEntity;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entityInstance = new Entity;

        $entitys = [
            [
                'id' => 1,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'V. Fulidhoo',
                'name' => 'Thundi Guest House',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 2,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'V. Fulidhoo',
                'name' => 'Fulidhoo Ihaa Logde',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 3,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Vashugiri',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 4,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Kudhiboli',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 5,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Kunaavashi Resort',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 6,
                'type' => 'excursion',
                'category' => 'ship wreck',
                'name' => 'Keyodhoo Ship Wreck',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 7,
                'type' => 'excursion',
                'category' => 'shark watching',
                'name' => 'Fulidhoo Shark Point',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 8,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'M. Muli',
                'name' => 'Muli inn surfview maldives',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 9,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'M. Mulah',
                'name' => 'Mulah Surf Camp',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 10,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Medhufushi Island Resort',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
            [
                'id' => 11,
                'type' => 'excursion',
                'category' => 'surfing',
                'island' => 'M. Mulah',
                'name' => 'Mulah surf break',
                'summary' => '',
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => 'https://via.placeholder.com/300x200',
                'published' => true,
            ],
        ];

        foreach ($entitys as $entity) {
            $entityInstance->create($entity);
        }

        $this->saveVaavu();
        $this->saveMeemu();


    }

    public function saveVaavu()
    {
        $vaavuGH1 = Entity::find(1);
        $vaavuGH2 = Entity::find(2);
        $vaavuResort1 = Entity::find(3);
        $vaavuResort2 = Entity::find(4);
        $vaavuResort3 = Entity::find(5);
        $vaavuShipWreck = Entity::find(6);
        $vaavuShark= Entity::find(7);

        $entityEntity = new EntityEntity;

        $entityEntity->create([
            'handler_entity' => $vaavuGH1->id,
            'price' => 100,
            'currency' => $vaavuGH1->average_price_currency,
            'from_entity' => $vaavuGH1->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuGH2->id,
            'price' => 100,
            'currency' => $vaavuGH2->average_price_currency,
            'from_entity' => $vaavuGH2->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort1->id,
            'price' => 100,
            'currency' => $vaavuResort1->average_price_currency,
            'from_entity' => $vaavuResort1->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort2->id,
            'price' => 100,
            'currency' => $vaavuResort2->average_price_currency,
            'from_entity' => $vaavuResort2->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort3->id,
            'price' => 100,
            'currency' => $vaavuResort3->average_price_currency,
            'from_entity' => $vaavuResort3->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuGH1->id,
            'price' => 100,
            'currency' => $vaavuGH1->average_price_currency,
            'from_entity' => $vaavuGH1->id,
            'to_entity' => $vaavuShipWreck->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuGH2->id,
            'price' => 100,
            'currency' => $vaavuGH2->average_price_currency,
            'from_entity' => $vaavuGH2->id,
            'to_entity' => $vaavuShark->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort1->id,
            'price' => 100,
            'currency' => $vaavuResort1->average_price_currency,
            'from_entity' => $vaavuResort1->id,
            'to_entity' => $vaavuShark->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort2->id,
            'price' => 100,
            'currency' => $vaavuResort2->average_price_currency,
            'from_entity' => $vaavuResort2->id,
            'to_entity' => $vaavuShark->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $vaavuResort3->id,
            'price' => 100,
            'currency' => $vaavuResort3->average_price_currency,
            'from_entity' => $vaavuResort3->id,
            'to_entity' => $vaavuShark->id,
        ]);
    }

    public function saveMeemu()
    {
        $meemuGH1 = Entity::find(8);
        $meemuGH2 = Entity::find(9);
        $meemuResort1 = Entity::find(10);
        $meemuSurfing = Entity::find(11);

        $entityEntity = new EntityEntity;

        
        $entityEntity->create([
            'handler_entity' => $meemuGH1->id,
            'price' => 100,
            'currency' => $meemuGH1->average_price_currency,
            'from_entity' => $meemuGH1->id,
            'to_entity' => $meemuSurfing->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $meemuGH2->id,
            'price' => 100,
            'currency' => $meemuGH2->average_price_currency,
            'from_entity' => $meemuGH2->id,
            'to_entity' => $meemuSurfing->id,
        ]);

        $entityEntity->create([
            'handler_entity' => $meemuResort1->id,
            'price' => 100,
            'currency' => $meemuResort1->average_price_currency,
            'from_entity' => $meemuResort1->id,
            'to_entity' => $meemuSurfing->id,
        ]);
    }
}
