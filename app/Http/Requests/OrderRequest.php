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
            'order_id' => 'required|integer',
            'item_id' => 'required|integer',
            'quantity' => 'nullable|integer',
            'price' => 'required|integer',
        ];
    }

    public function getDto(): OrderDetailsDto
    {
        $dto = new OrderDetailsDto();
        $dto->setItemId()
            ->setOrderId()
            ->setPrice()
            ->setQuantity();
    }

}
