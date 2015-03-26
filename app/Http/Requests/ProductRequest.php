<?php namespace basiccrud\Http\Requests;

use basiccrud\Http\Requests\Request;

class ProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'name' => 'required'
		];

		$rule = 'unique:products,code';

		if($this->method() == 'PUT') {
			$segments = $this->segments();
	    	$id = intval(end($segments));
			$rule .= "," . $id . ",id,deleted_at,NULL";
		} else {
			$rule .= ",NULL,id,deleted_at,NULL";
		}
		$rules['code'][] = $rule ;
		
		return $rules;
	}

}
