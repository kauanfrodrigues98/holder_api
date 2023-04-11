<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'purchase_value',
        'sale_value',
        'initial_date',
        'final_date',
        'result',
        'duration',
    ];

    protected $casts = [
        'description' => 'string',
        'purchase_value' => 'float:8,2',
        'sale_value' => 'float:8,2',
        'initial_date' => 'datetime:Y-m-d H:i:s',
        'final_date' => 'datetime:Y-m-d H:i:s',
        'duration' => 'string',
        'result' => 'float:8,2',
    ];

    /**
     * Converte a data para um o mesmo formato, porém mais limpo
     *
     * @param string $initialDate
     * @return string
     */
    public function getInitialDateAttribute(string $initialDate):string
    {
        return date('Y-m-d H:i:s', strtotime($initialDate));
    }

    /**
     * Converte a data para um o mesmo formato, porém mais limpo
     *
     * @param string $finalDate
     * @return string
     */
    public function getFinalDateAttribute(string $finalDate):string
    {
        return date('Y-m-d H:i:s', strtotime($finalDate));
    }

    /**
     * Converte a data para um o mesmo formato, porém mais limpo
     *
     * @param string $createdAt
     * @return string
     */
    public function getCreatedAtAttribute(string $createdAt):string
    {
        return date('Y-m-d H:i:s', strtotime($createdAt));
    }

    /**
     * Converte a data para um o mesmo formato, porém mais limpo
     *
     * @param string $updatedAt
     * @return string
     */
    public function getUpdatedAtAttribute(string $updatedAt):string
    {
        return date('Y-m-d H:i:s', strtotime($updatedAt));
    }
}
