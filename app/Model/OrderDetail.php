<?php namespace basiccrud\Model;

use Illuminate\Database\Eloquent\Model;
use basiccrud\Model\Order;
use basiccrud\Model\ProductDetail;

class OrderDetail extends BaseModel {

	protected $table = 'order_details';

	public function order() {
		return $this->belongsTo('basiccrud\Model\Order');
	}

	public function productDetail() {
		return $this->belongsTo('basiccrud\Model\ProductDetail');
	}

}
