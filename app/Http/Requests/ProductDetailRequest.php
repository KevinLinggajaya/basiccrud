<?php namespace basiccrud\Http\Requests;

use basiccrud\Http\Requests\Request;

class ProductDetailRequest extends Request {

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
		return [
			'size' => 'required',
			'quantity' => 'required|integer|min:0',
			'weight' => 'required|numeric|min:0',
			'price' => 'required|numeric|min:0'
		];
	}

}
