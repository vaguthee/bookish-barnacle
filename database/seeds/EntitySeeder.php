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

        // https://aimme.s3-ap-southeast-1.amazonaws.com/hackmv/300x200/133931_1608431275.jpg
        $imagePrefix = "https://aimme.s3-ap-southeast-1.amazonaws.com/hackmv/300x200/";// /133931_1608431275.jpg

        $entitys = [
            [
                'id' => 1,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'V. Fulidhoo',
                'name' => 'Thundi Guest House',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'gh1.jpeg',
                'published' => true,
            ],
            [
                'id' => 2,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'V. Fulidhoo',
                'name' => 'Fulidhoo Ihaa Logde',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'gh2.jpg',
                'published' => true,
            ],
            [
                'id' => 3,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Vashugiri',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'r1.jpg',
                'published' => true,
            ],
            [
                'id' => 4,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Kudhiboli',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'r2.jpg',
                'published' => true,
            ],
            [
                'id' => 5,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Kunaavashi Resort',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'r3.jpeg',
                'published' => true,
            ],
            [
                'id' => 6,
                'type' => 'excursion',
                'category' => 'ship wreck',
                'name' => 'Keyodhoo Ship Wreck',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'shipwreck1.jpeg',
                'published' => true,
            ],
            [
                'id' => 7,
                'type' => 'excursion',
                'category' => 'shark watching',
                'name' => 'Fulidhoo Shark Point',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'shark3.jpg',
                'published' => true,
            ],
            [
                'id' => 8,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'M. Muli',
                'name' => 'Muli inn surfview maldives',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'gh3.jpg',
                'published' => true,
            ],
            [
                'id' => 9,
                'type' => 'stay',
                'category' => 'guest house',
                'island' => 'M. Mulah',
                'name' => 'Mulah Surf Camp',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'gh4.jpeg',
                'published' => true,
            ],
            [
                'id' => 10,
                'type' => 'stay',
                'category' => 'resort',
                'name' => 'Medhufushi Island Resort',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'r4.jpg',
                'published' => true,
            ],
            [
                'id' => 11,
                'type' => 'excursion',
                'category' => 'surfing',
                'island' => 'M. Mulah',
                'name' => 'Mulah surf break',
                'summary' => $this->summaries()[random_int(0,(count($this->summaries())-1))][0],
                'getting_here' => '',
                'average_price_currency' => '$',
                'longitude' => '15.232',
                'latitude' => '12.3444',
                'total_review_count' => random_int(0,200),
                'average_rating' => random_int(0,5),
                'average_price' => random_int(60,1000),
                'cover_image_url' => $imagePrefix . 'surf1.jpeg',
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

    public function summaries()
    {
        return [
                    [
                    "One of our best sellers in Hithadhoo! Abuharee Grand is located in Hithadhoo. Among the facilities at this property are a 24-hour front desk and a concierge service, along with free WiFi throughout the property. The restaurant serves Asian dishes. At the guest house, the rooms are equipped with a balcony. With a private bathroom equipped with a shower and free toiletries, some units at Abuharee Grand also offer a garden view. Guest rooms at the accommodations include air conditioning and a wardrobe. Continental and buffet breakfast options are available each morning at Abuharee Grand. The guest house offers a terrace. Cycling, snorkeling, bicycle hire are among the activities that guests can enjoy near Abuharee Grand."
                    ],
                    [
                    "Located in Fulidhoo, a few steps from Fulidhoo Island Beach, Alkina lodge provides accommodations with a restaurant, free private parking, a shared lounge and a garden. Among the facilities at this property are a shared kitchen and babysitting service, along with free WiFi throughout the property. The guesthouse features family rooms. All guest rooms features air conditioning, a fridge, an oven, an electric tea pot, a shower, free toiletries and a desk. The guesthouse has some units that feature garden views, and all rooms come with a private bathroom and a closet. The rooms at Alkina lodge are equipped with a seating area. The accommodation offers a continental or buffet breakfast.   "
                    ],   
                    [
                    "Set in Male City and with Hulhumale Ferry Terminal reachable within 1312 feet, Amina Residency features express check-in and check-out, nonsmoking rooms, a terrace, free WiFi and a shared lounge. 1,650 feet from Republic Square, the property is also 1,650 feet away from Velana Airport Ferry. The property offers a 24-hour front desk. Guest rooms at the guest house are equipped with a seating area. The rooms are equipped with a private bathroom and free toiletries, and some rooms at Amina Residency have a balcony. The rooms have a wardrobe. The property offers a lounge at an additional charge. A continental breakfast can be enjoyed at the property. Henveiru Park is 1,950 feet from the accommodations, while Sultan Park is 2,300 feet away.   "
                    ],   
                    [
                    "Located along the coastline of Maafushi, Arena Beach Hotel features modern and tranquil accommodations with free WiFi access in the entire property including rooms. Guests can enjoy water sports activities such as diving, snorkeling and windsurfing on site. Elegantly furnished, air-conditioned rooms come with a personal safe, electric kettle, a wardrobe and a flat-screen TV with cable/satellite channels. Offering bathtub or shower facility, private bathrooms also include a hairdryer and free toiletries like a dental kit. At Arena Beach Hotel, guests may relax at the common hot tub or sun lounges located at the rooftop. The friendly 24-hour front desk staff can assist with ticketing services, luggage storage and tour arrangements. Free parking is also available on site. Located right on the sandy beach, the in-house restaurant serves delectable local and Western cuisine, accompanied with views of the blue lagoon."
                    ],
                    [
                    "One of our best sellers in Maafushi! Arora Inn is on Maafushi Island in Maldives, about 17 miles from the center of the city. The on-site Arora Café serves both Western and Maldivian cuisines. Free Wi-Fi is provided throughout the property. All of the rooms have air conditioning and a minibar. The private bathroom has a shower and hairdryer. Room service is available 24 hours a day. From Male International Airport, guests can take the 1-hour and 30-minute ride by scheduled ferry to Arora Inn. Alternatively, there is also a speedboat transfer service which takes 35 minutes. Guests can enjoy water sports activities at the beach, or use the barbecue facilities. Luggage can be stored at the 24-hour front desk.   "
                    ],    
                    [
                    "One of our best sellers in Feridhoo! ASAA View has a restaurant, shared lounge, a garden and private beach area in Feridhoo. The accommodations offers a 24-hour front desk, room service and currency exchange for guests. At the guest house, each room has a wardrobe. At ASAA View the rooms are equipped with air conditioning and a private bathroom. Continental and halal breakfast options are available every morning at the accommodations. Feridhoo Beach is 1,000 feet from ASAA View. The nearest airport is Male International, 56 mi from the guest house, and the property offers a paid airport shuttle service."
                    ],
                    [
                    "Located in Vaadhoo, Avanti Vaadhoo provides a garden and free WiFi. At the guesthouse, every room includes a patio with a garden view. Complete with a private bathroom equipped with a bidet and a hairdryer, all guest rooms at Avanti Vaadhoo have a flat-screen TV and air conditioning, and certain rooms here will provide you with a seating area. The rooms will provide guests with a closet and an electric tea pot.   "
                    ],   
                    [
                    "Facing the beachfront in Gaafu Alifu Atoll, Baivaru Guesthouse Services features a shared lounge and a private beach area. Among the facilities of this property are a restaurant, a 24-hour front desk and a shared kitchen, along with free WiFi. The property provides evening entertainment and room service. All guest rooms features air conditioning, a flat-screen TV with satellite channels, a microwave, an electric tea pot, a bath, a hairdryer and a desk. All rooms come with a coffee machine and a private bathroom with a bidet and free toiletries, while selected rooms here will provide you with a kitchenette equipped with a fridge. All rooms feature a closet. The guesthouse offers a continental or à la carte breakfast. Baivaru Guesthouse Services has a playground. The area is popular for cycling, and bike rental is available at the accommodation. Baivaru Guesthouse Services provides a laundry service, as well as business facilities like fax and photocopying.   "
                    ],   
                    [
                    "Featuring free WiFi, a restaurant and a sun terrace, Banyan Villa Maldives Dhangethi offers accommodations in Dhangethi. Guests can enjoy the on-site snack bar. Every air conditioned room at this guest house is fitted with a flat-screen TV offering satellite channels. Each room comes with a private bathroom. Extras include bath robes, free toiletries and a hair dryer. Guests can enjoy various activities in the surroundings, including snorkeling,diving and windsurfing. The nearest airport is Male International Airport, 56 mi from the property.   "
                    ],   
                    [
                    "Located on the island of Thulusdhoo, Batuta Maldives Surf View Guest House is a beachfront property offering simple rooms with a private bathroom. It features a sundeck and a restaurant. Batuta Maldives Surf View Guest House is located across a beach and lagoon. It is accessible via a speed boat ride from Male International Airport or a 1.5-hour ferry ride from the capital city of Male. The air-conditioned rooms are equipped with a ceiling fan. Each room features a private bathroom with hot and cold shower. Bed linen and towels are available. A free bottle of water is provided daily. Guests can relax on the sun deck on the 2nd floor. Surf guides are available at the guest house, which also has a 24-hour reception. Laundry services can be arranged at an extra charge. Maldivian and Western cuisine are served at the restaurant.   "
                    ],   
                    [
                    "Beach Home Kelaa has a restaurant, free bikes, a shared lounge and garden in Kelaa. With free WiFi, this 3-star guest house offers a private beach area and room service. The accommodations offers a 24-hour front desk, a shared kitchen and currency exchange for guests. All guest rooms at the guest house come with air conditioning, a seating area, a flat-screen TV with satellite channels, a kitchen, a dining area and a private bathroom with free toiletries and a shower. All units will provide guests with a desk and a kettle. Beach Home Kelaa offers a continental or à la carte breakfast. The accommodations offers a terrace. The area is popular for cycling, and bike hire is available at Beach Home Kelaa. The guest house provides an ironing service, as well as business facilities like fax and photocopying.   "
                    ],   
                    [
                    "Located just a 10-minute drive from Male International Airport, Beach Palace welcomes guests with free internet access and an in-house restaurant. Free WiFi is available throughout the property. All the rooms at Beach Palace are tastefully furnished with a flat-screen TV, mini-bar and writing table. Private bathrooms come with free toiletries and hot-water showers. This modern building is located only a few steps from Hulhumale Beach. Malè City Center is 3.1 mi away. A 24-hour front desk can assist with laundry services and luggage storage space. Guests can also make use of the barbecue facilities and diving activities can be arranged. Airport shuttle services are available at a surcharge. Local Maldivian and international cuisines can be enjoyed at in-house restaurant. For alternative dining options, room service is available.   "
                    ],   
                    [
                    "Beach Veli offers accommodations in Ukulhas. The beachfront guest house has a private beach area and a barbecue, and guests can enjoy a meal at the restaurant. Free WiFi is available throughout the property. Some rooms include a seating area to relax in after a busy day. You will find a kettle in the room. All rooms come with a private bathroom. For your comfort, you will find free toiletries and a hairdryer. You will find babysitting service at the property. This guest house has water sports facilities and free use of bicycles is available. The area is popular for snorkeling, fishing and diving. Male International Airport is 45 mi from the property.   "
                    ],   
                    [
                    "Blue World Dharavandhoo has free bikes, garden and terrace in Dharavandhoo. Among the various facilities are a shared lounge and a bar. Free WiFi and free airport shuttle service are also available. At the guest house, all rooms are equipped with a patio with a garden view. The private bathroom is fitted with a shower. The units at Blue World Dharavandhoo include air conditioning and a wardrobe. A continental, Asian or Italian breakfast can be enjoyed at the property. The on-site restaurant serves Italian cuisine. Blue World Dharavandhoo has its own SSI Diving Center, offering diving courses and excursions. The staff at the 24-hour reception speaks German, English, Spanish, Italian and Divehi.   "
                    ],   
                    [
                    "Facing the beachfront in Rasdhoo, Brick Wood has a restaurant and a garden. Featuring family rooms, this property also provides guests with a sun terrace. Guests can use water sports facilities. At the guesthouse, rooms are equipped with a balcony. Rooms contain an electric tea pot and a private bathroom with a bidet and a hairdryer, while certain rooms are equipped with a kitchenette equipped with a fridge. The rooms will provide guests with a toaster. Brick Wood offers a continental or American breakfast. Guests at the accommodation will be able to enjoy activities in and around Rasdhoo, like hiking and snorkeling. The nearest airport is Male, 3.1 miles from Brick Wood, and the property offers a paid airport shuttle service.   "
                    ],   
                    [
                    "Located in Hangnaameedhoo, 1,650 feet from Bikini Beach, BY THE SHADE provides accommodations with a restaurant, free private parking, free bikes and a shared lounge. Each accommodations at the 3-star hotel has garden views, and guests can enjoy access to a garden and to a private beach area. The accommodations offers a shared kitchen, room service and currency exchange for guests. Guest rooms are equipped with air conditioning, a flat-screen TV with satellite channels, a kettle, a shower, a hairdryer and a desk. At the hotel each room comes with a wardrobe and a private bathroom. Continental and buffet breakfast options are available daily at BY THE SHADE. The accommodations offers a terrace. Guests at BY THE SHADE will be able to enjoy activities in and around Hangnaameedhoo, like snorkeling. The hotel provides an ironing service, as well as business facilities like fax and photocopying. The nearest airport is Male International Airport, 46 mi from BY THE SHADE.   "
                    ],   
                    [
                    "Canopus Retreat Thulusdhoo provides rooms in Thulusdhoo. Among the facilities of this property are a restaurant, a shared lounge and a concierge service, along with free WiFi. Staff on site can arrange airport transfers. At the guest house, each room is equipped with a wardrobe. Complete with a private bathroom and all units at Canopus Retreat Thulusdhoo have a flat-screen TV and air conditioning, and selected rooms are equipped with a seating area. A continental breakfast can be enjoyed at the property. Male City is 0.8 mi from the accommodations. Male International Airport is 4.3 mi from the property.   "
                    ],   
                    [
                    "Located a few steps from Eastern/ Hulhumale beach, Casa Retreat has rooms with air conditioning in Hulhumale. Among the facilities of this property are a restaurant, a 24-hour front desk and luggage storage space, along with free WiFi. The hotel has family rooms. At the hotel, all rooms are equipped with a closet. At Casa Retreat all rooms have a desk, a flat-screen TV and a private bathroom. Guests at the accommodation can enjoy a continental breakfast. Ferry Terminal Park is an 11-minute walk from Casa Retreat. The nearest airport is Male International, 4.2 miles from the hotel, and the property offers a paid airport shuttle service.   "
                    ],   
                    [
                    "Cerulean View Residence has a restaurant, shared lounge, a garden and private beach area in Hanimaadhoo. Featuring family rooms, this property also provides guests with a terrace. The property has a 24-hour front desk, room service and currency exchange for guests. Rooms are complete with a private bathroom, while some rooms at the guesthouse also feature a seating area. Guests at Cerulean View Residence can enjoy a continental breakfast. The area is popular for cycling, and bike rental is available at the accommodation."
                    ]

        ];
    }
}
