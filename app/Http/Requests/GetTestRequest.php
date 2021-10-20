<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetTestRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => 'string'
        ];
    }

    public function getCategories(): array
    {
        $stringifyCategories = $this->category;

        if (is_null($stringifyCategories)) {
            return [];
        }

        return explode(',', $stringifyCategories);
    }
}
