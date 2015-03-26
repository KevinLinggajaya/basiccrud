<?php namespace basiccrud\Model;

use Illuminate\Database\Eloquent\Model;
use basiccrud\Model\BaseModel;
use basiccrud\Model\ProductDetails;

class Product extends BaseModel {

	protected $table = 'products';

	public function productDetails(){
		return $this->hasMany('basiccrud\Model\ProductDetail');
	}
}
