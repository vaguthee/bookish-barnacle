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
        $query = $request->q;


        $stay = $this->getStay($query);
        $excursions = $this->getExcursions($query);
        $shopping = $this->getShopping($query);
        $landmarks = $this->getLandmarks($query);

        return [
            'entitites' => [
                'stay' => $stay,
                'excursions' => $excursions,
                'shopping' => $shopping,
                'landmarks' => $landmarks,
            ]
        ];
    }

    protected function getStay($query = null)
    {
        if ($query) {
            return  $this->entitites->where('type', 'stay')->where(function($q) use ($query){
              $q->where('name','LIKE',"%$query%")
                ->orWhere('type','LIKE',"%$query%")  
                ->orWhere('category','LIKE',"%$query%");  
            })->get();        
        }

        return  $this->entitites->where('type', 'stay')->get();        
    }

    protected function getExcursions($query = null)
    {
        if ($query) {
            return  $this->entitites->where('type', 'excursion')->where(function($q) use ($query){
              $q->where('name','LIKE',"%$query%")
                ->orWhere('type','LIKE',"%$query%")  
                ->orWhere('category','LIKE',"%$query%");  
            })->get();        
        }

        return  $this->entitites->where('type', 'excursion')->get();        
    }

    protected function getShopping($query = null)
    {
        if ($query) {
            return  $this->entitites->where('type', 'shopping')->where(function($q) use ($query){
              $q->where('name','LIKE',"%$query%")
                ->orWhere('type','LIKE',"%$query%")  
                ->orWhere('category','LIKE',"%$query%");  
            })->get();        
        }

        return  $this->entitites->where('type', 'shopping')->get();        
    }

    protected function getLandmarks($query = null)
    {
        if ($query) {
            return  $this->entitites->where('type', 'landmark')->where(function($q) use ($query){
              $q->where('name','LIKE',"%$query%")
                ->orWhere('type','LIKE',"%$query%")  
                ->orWhere('category','LIKE',"%$query%");  
            })->get();        
        }

        return  $this->entitites->where('type', 'landmark')->get();        
    }
}
