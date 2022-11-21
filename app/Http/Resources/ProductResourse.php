<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'price'=> $this->price,
            'amount'=> $this->amount,
            'category_id'=>$this->category_id,
            'created_at'=>$this ->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}