<?php namespace basiccrud;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model {

	protected $table = 'product_details';

	public function product()
    {
        return $this->belongsTo('basiccrud\Model\Product');
    }
}
