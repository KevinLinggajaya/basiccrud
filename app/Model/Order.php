<?php namespace basiccrud\Model;

use Illuminate\Database\Eloquent\Model;
use basiccrud\Model\OrderDetails;
use Carbon\Carbon;

class Order extends BaseModel {

	protected $table = 'orders';

    protected $dates = ['created_at'];

	public function orderDetails() {
		return $this->hasMany('basiccrud\Model\OrderDetail');
	}

    public function getCreatedAtAttribute() {
		return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']))->toDateTimeString();
    }

}
