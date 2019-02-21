<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Item;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => Carbon::parse($this->date)->format('d/m/Y'),
            'user' => [
                'name' => $this->user->getFirstAndLastName(),
                'telephone' => $this->user->telephone,
                'email' => $this->user->email,
            ],
            'items' => collect($this->items)->map(function ($item, $key) {
                $itemModel = Item::find($item['item']);

                return [
                    'name' => $itemModel->name,
                    'description' => $itemModel->description,
                    'quantity' => $item['quantity'],
                    'value' => toReal($itemModel->value),
                    'total' => toReal($itemModel->getTotal($item['quantity'])),
                ];
            }),
            'total' => toReal($this->getTotal()),
        ];
    }
}
