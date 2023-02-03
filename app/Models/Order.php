<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;



class Order extends Model 
{
    use HasFactory;

    protected $fillable = ['id', 'status', 'date', 'price', 'obs', 'client_id', 'client_name'];

    public function client()
    {
    return $this->belongsTo(Client::class);
    }

    public function getOrdersWithPagination($perPage = 10)
    {
        return self::orderBy('id', 'desc')->paginate($perPage);
    }
 
}