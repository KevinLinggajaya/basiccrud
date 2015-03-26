<?php namespace basiccrud\Model;

use Illuminate\Database\Eloquent\Model;
use basiccrud\Model\Product;

class ProductDetail extends BaseModel {

	protected $table = 'product_details';

	public function product(){
        return $this->belongsTo('basiccrud\Model\Product');
    }
}
