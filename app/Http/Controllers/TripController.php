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
        // $trip = $this->trips->find($id);

        // $trip->load('userTripEntities','userTripEntities.entity');

        return $this->getUserTrips($id);
    }

    public function paid(Request $request, $id)
    {
        $trip = $this->trips->find($id);
        // dd($trip);
        $trip->status = 'booked';
        $trip->save();

        if ($request->q) {
            return $this->getUserTrips($id);
        }

        return $this->getUserTrips();
    }

    public function index()
    {
        return $this->getUserTrips();
    }

    protected function getUserTrips($id = null)
    {
        if($id) {
            $trips = auth()->user()->trips()->where('id',$id)->orderBy('id','desc')->get();
        } else {
            $trips = auth()->user()->trips()->orderBy('id','desc')->get();
        }


        $trips->load('userTripEntities','userTripEntities.entity');

        $trips = $trips->toArray();

        $data = array();

        foreach ($trips as $key => $trip) {
            $totalPrice =  0;
            $totalPrepaid =  0;
            $totalPostpaid =  0;
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

                $totalPrice =  $totalPrice + $userTripEntity['entity']['average_price'];

                // dd($userTripEntity);
                if ($userTripEntity['entity']['type'] == 'stay') {
                    $totalPrepaid =  $totalPrepaid + $userTripEntity['entity']['average_price'];
                } else {
                    $totalPostpaid =  $totalPostpaid + $userTripEntity['entity']['average_price'];
                }
                # code...
            }

            $data['trips'][$key]['total_prepaid'] = $totalPrepaid;
            $data['trips'][$key]['total_postpaid'] = $totalPostpaid;
            $data['trips'][$key]['total_price'] = $totalPrice;
        }

        // dd($data);
        return $data;

        return $trips;
    }
}
