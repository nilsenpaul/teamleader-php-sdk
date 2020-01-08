<?php

namespace Teamleader\Entities\Products;

use Teamleader\Actions\Storable;
use Teamleader\Model;

class Product extends Model
{
    use Storable;

    const TYPE = 'product';

    protected $fillable = [
        'id',
        'name',
        'code',
        'purchase_price', // { "amount": 123.4, "currency": "EUR" }
        'selling_price', // { "amount": 123.4, "currency": "EUR" }
    ];

    /**
     * @var string
     */
    protected $endpoint = 'products';

    /**
     * @return mixed
     */
    public function insert()
    {
        $result = $this->connection()->post($this->getEndpoint() . '.add', $this->jsonWithNamespace());

        return $this->selfFromResponse($result);
    }
}
