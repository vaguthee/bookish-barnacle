<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;


class TripController extends Controller
{
    public function __construct(Trip $entity)
    {
        $this->trips = $entity;
    }

    public function show($id)
    {
        $trip = $this->trips->find($id);

        $trip->load('userTripEntities','userTripEntities.entity');

        return $trip;
    }

    public function index()
    {
        $trips = auth()->user()->trips;

        $trips->load('userTripEntities','userTripEntities.entity');

        $trips = $trips->toArray();

        $data = array();

        foreach ($trips as $key => $trip) {
            // dd($trip);
            $data['trips'][$key] = $trip;
            foreach ($trip['user_trip_entities'] as $k => $userTripEntity) {
                // dump($userTripEntity['entity']);
                $data['trips'][$key]['entities'][$k]=$userTripEntity['entity'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_id']=$userTripEntity['id'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_user_id']=$userTripEntity['user_id'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_entity_id']=$userTripEntity['entity_id'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_trip_id']=$userTripEntity['trip_id'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_created_at']=$userTripEntity['created_at'];
                $data['trips'][$key]['entities'][$k]['user_trip_entity_updated_at']=$userTripEntity['updated_at'];
                # code...
            }
        }

        // dd($data);
        return $data;

        return $trips;
    }
}
