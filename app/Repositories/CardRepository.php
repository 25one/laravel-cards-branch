<?php

namespace App\Repositories;

use App\Models\ {
    Card

};

class CardRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Create a new CardRepository instance.
     *
     * @param  \App\Models\Card $card      
     */
    public function __construct(Card $card)
    {
        $this->model = $card;
    }

    /**
     * Get data from cards.
     *
     * @param  \App\Models\Card $card      
     */
    public function getData($request, $parameters) //$parameters['order'], $parameters['direction']
    {
        $query = $this->model
           ->select('id', 'type_id', 'name', 'title')
           //->where($parameters['wherewho'], 'like', '%' . $parameters['wherewhat'] . '%')
           ->orderBy($parameters['order'], $parameters['direction']); 

        if($request->type) $query->where('type_id', $request->type);

        return $query->get();   
    }

}
