<?php

namespace App\Http\Requests;

use App\DTO\OrderDetailsDto;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Define validation rules
        return [
            'phone' => 'required|string|exists:clients,phone',
            'item_id' => 'required|array|exists:menu_items,id',
            'item_id.*' => 'required|exists:menu_items,id',
            'quantity' => 'required|min:1',
            'quantity.*' => 'required|integer|min:1',
        ];
    }

    public function getDto(): OrderDetailsDto
    {
        $dto = new OrderDetailsDto();
        $dto->setItemId($this->validated('item_id'))
            ->setQuantity($this->validated('quantity'))
            ->setPhone($this->request->get('phone'));

        return $dto;
    }

}
