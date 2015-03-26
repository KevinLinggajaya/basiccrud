<?php namespace basiccrud\Http\Controllers;

use basiccrud\Http\Requests;
use basiccrud\Http\Requests\ProductDetailRequest;
use basiccrud\Http\Controllers\Controller;
use basiccrud\Model\Product;
use basiccrud\Model\ProductDetail;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class ProductDetailController extends Controller {

	private $product;

	public function __construct() {
		$param = Route::current()->parameters();
		$this->product = Product::findOrFail($param['productId']);
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($productId)
	{
		$productDetails = ProductDetail::whereProductId($productId)->orderBy('size')->paginate(20);
		return view('products.details.index', [
			'productDetails' => $productDetails, 
			'product' => $this->product
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$productDetail = new ProductDetail();
		return view('products.details.create', [
			'productDetail' => $productDetail, 
			'product' => $this->product
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductDetailRequest $request)
	{
		$productDetail = new ProductDetail();
		$productDetail->is_enabled = $request->is_enabled ? true : false;
		$productDetail->size = $request->size;
		$productDetail->color = $request->color;
		$productDetail->weight = $request->weight;
		$productDetail->price = $request->price;
		$productDetail->quantity = $request->quantity;
		$productDetail->product()->associate($this->product);
		$productDetail->save();	

		$request->flash();
		return redirect(action('ProductDetailController@index', $this->product->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @param  int  $productId
	 * @return Response
	 */
	public function show($productId, $id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @param  int  $productId
	 * @return Response
	 */
	public function edit($productId, $id)
	{
		$productDetail = ProductDetail::whereProductId($productId)->findOrFail($id);
		return view('products.details.edit', [
			'productDetail' => $productDetail, 
			'product' => $this->product
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  int  $productId
	 * @return Response
	 */
	public function update(ProductDetailRequest $request, $productId, $id)
	{
		$productDetail = ProductDetail::whereProductId($productId)->findOrFail($id);
		$productDetail->is_enabled = $request->is_enabled ? true : false;
		$productDetail->size = $request->size;
		$productDetail->color = $request->color;
		$productDetail->weight = $request->weight;
		$productDetail->price = $request->price;
		$productDetail->quantity = $request->quantity;
		$productDetail->save();	

		$request->flash();
		return redirect(action('ProductDetailController@index', $this->product->id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @param  int  $productId
	 * @return Response
	 */
	public function destroy($productId, $id)
	{
		ProductDetail::destroy($id);
		return redirect(action('ProductDetailController@index', $this->product->id));
	}

}
