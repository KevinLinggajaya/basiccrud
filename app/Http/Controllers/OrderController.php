<?php namespace basiccrud\Http\Controllers;

use basiccrud\Http\Requests;
use basiccrud\Http\Requests\OrderRequest;
use basiccrud\Http\Controllers\Controller;
use basiccrud\Model\Order;
use basiccrud\Model\OrderDetail;
use basiccrud\Model\Product;
use basiccrud\Model\ProductDetail;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::orderBy('created_at','DESC')->paginate(20);
		return view('orders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$lastOrder = Order::withTrashed()->orderBy('created_at', 'DESC')->first();
		$lastOrderNo = $lastOrder ? $lastOrder->order_no+1 : 1;
		$order = new Order();
		$order->total_price = 0;
		$order->order_no = str_pad(intval($lastOrderNo), 10, '0', STR_PAD_LEFT);
		$products = Product::with('productDetails')->whereIsEnabled(true)->orderBy('name')->get();
		$product_detail_ids = [];
		return view('orders.create', compact('order','products','product_detail_ids'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(OrderRequest $request)
	{
		DB::beginTransaction(); 

		$order = new Order();
		$order->order_no = $request->order_no;
		$order->total_price = $request->total_price;
		$order->shipping_address = $request->shipping_address;
		$order->save();

		foreach ($request->product_detail_ids as $product_detail_id) {
			$productDetail = ProductDetail::find($product_detail_id);
			$productDetail->quantity = $productDetail->quantity - 1;
			$productDetail->save();

			$orderDetail = new OrderDetail();
			$orderDetail->order()->associate($order);
			$orderDetail->productDetail()->associate($productDetail);
			$orderDetail->quantity = 1;
			$orderDetail->save();
		}

		DB::commit();

		$request->flash();
		return redirect(action('OrderController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);
		$products = Product::with('productDetails')
					->orderBy('name')->get();
		$product_detail_ids = OrderDetail::whereOrderId($id)->lists('product_detail_id');
		return view('orders.edit', compact('order','products','product_detail_ids'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(OrderRequest $request, $id)
	{
		DB::beginTransaction(); 

		$order = Order::findOrFail($id);
		$order->total_price = $request->total_price;
		$order->shipping_address = $request->shipping_address;
		$order->save();

		$dbOrderDetails = OrderDetail::whereOrderId($id)->get();
		foreach ($dbOrderDetails as $dbOrderDetail) {
			$dbProductDetail = $dbOrderDetail->productDetail;
			$dbProductDetail->quantity += 1;
			$dbProductDetail->save();
			$dbOrderDetail->delete();
		}

		foreach ($request->product_detail_ids as $product_detail_id) {
			$productDetail = ProductDetail::find($product_detail_id);
			$productDetail->quantity = $productDetail->quantity - 1;
			$productDetail->save();

			$orderDetail = new OrderDetail();
			$orderDetail->order()->associate($order);
			$orderDetail->productDetail()->associate($productDetail);
			$orderDetail->quantity = 1;
			$orderDetail->save();
		}

		DB::commit();

		$request->flash();
		return redirect(action('OrderController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);
		return redirect(action('OrderController@index'));
	}

}
