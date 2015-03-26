<?php namespace basiccrud\Http\Controllers;

use basiccrud\Http\Requests;
use basiccrud\Http\Requests\ProductRequest;
use basiccrud\Http\Controllers\Controller;
use basiccrud\Model\Product;

use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::orderBy('name')->paginate(20);
		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = new Product();
		return view('products.create', compact('product'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductRequest $request)
	{
		$product = new Product();
		$product->is_enabled = $request->is_enabled ? true : false;
		$product->name = $request->name;
		$product->code = $request->code;
		$product->description = $request->description;

		$product->save();
		$request->flash();
		return redirect(action('ProductController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('products.edit', compact('product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ProductRequest $request, $id)
	{
		$product = Product::findOrFail($id);
		$product->is_enabled = $request->is_enabled ? true : false;
		$product->name = $request->name;
		$product->code = $request->code;
		$product->description = $request->description;

		$product->save();
		$request->flash();
		return redirect(action('ProductController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Product::destroy($id);
		return redirect(action('ProductController@index'));
	}

}
