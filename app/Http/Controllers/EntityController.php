<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Entity;
use App\EntityEntity;
use App\UserTripEntity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function __construct(Entity $entity, EntityEntity $nearbyEntities)
    {
        $this->entities = $entity;
        $this->nearbyEntities = $nearbyEntities;
    }

    public function show($id)
    {
        return $this->getEntityData($id);
    }

    public function addToTrip($id)
    {
        if (!$trip = auth()->user()->trips()->where('status','draft')->orderBy('id','desc')->first()) {
            $trip = Trip::create([
                'user_id' => auth()->user()->id
            ]);
        }

        if ($userTripEntity = UserTripEntity::create([
            'user_id' => auth()->user()->id,
            'trip_id' => $trip->id,
            'entity_id' => $id,
        ])) {
            return $this->getEntityData($id);
        }

        return $this->getEntityData($id);
        // return [
        //     'status' => 'error'
        // ];
    }

    protected function getEntityData($id)
    {
        $nearbyEntityId = $this->nearbyEntities->where('from_entity', $id)->get()->pluck('to_entity');
        $nearbyEntities = $this->entities->whereIn('id',$nearbyEntityId)->get();
        $entity = $this->entities->find($id);
        $trip = auth()->user()->trips()->where('status','draft')->orderBy('id','desc')->first();
        $trip->load('userTripEntities','userTripEntities.entity');

        return [
            'nearbyEntities' => $nearbyEntities,
            'entity' => $entity,
            'trip' => $trip,
        ];
    }
}
