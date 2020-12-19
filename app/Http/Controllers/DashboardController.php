<?php

namespace App\Http\Controllers;

use App\Entity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(Entity $entity)
    {
        $this->entitites = $entity;
    }

    public function discover()
    {
        $stay = $this->getStay();
        $excursions = $this->getExcursions();
        $shopping = $this->getShopping();
        $landmarks = $this->getLandmarks();

        return [
            'entitites' => [
                'stay' => $stay,
                'excursions' => $excursions,
                'shopping' => $shopping,
                'landmarks' => $landmarks,
            ]
        ];
    }

    public function search(Request $request)
    {
        $stay = $this->getStay();
        $excursions = $this->getExcursions();
        $shopping = $this->getShopping();
        $landmarks = $this->getLandmarks();

        return [
            'entitites' => [
                'stay' => $stay,
                'excursions' => $excursions,
                'shopping' => $shopping,
                'landmarks' => $landmarks,
            ]
        ];
    }

    protected function getStay()
    {
        return  $this->entitites->where('type', 'stay')->get();        
    }

    protected function getExcursions()
    {
        return  $this->entitites->where('type', 'excursion')->get();        
    }

    protected function getShopping()
    {
        return  $this->entitites->where('type', 'shopping')->get();        
    }

    protected function getLandmarks()
    {
        return  $this->entitites->where('type', 'landmark')->get();        
    }
}
