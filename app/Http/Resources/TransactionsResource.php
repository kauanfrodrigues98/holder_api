<?php

namespace App\Http\Resources;

use App\Traits\HelperTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionsResource extends JsonResource
{
    use HelperTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $duration = $this->getDuration($this->initial_date, $this->final_date);
        $result = $this->getResult($this->sale_value, $this->purchase_value);

        return [
            'transaction_id' => $this->id,
            'description' => $this->description,
            'purchase_value' => $this->purchase_value,
            'sale_value' => $this->sale_value,
            'initial_date' => $this->initial_date,
            'final_date' => $this->final_date,
            'duration' => $duration->format('%h') . ' Hours ' . $duration->format('%i') . ' Minutes ' . $duration->format('%s') . ' Seconds',
            'result' => $result,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
