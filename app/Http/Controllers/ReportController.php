<?php namespace basiccrud\Http\Controllers;

use basiccrud\Http\Requests;
use basiccrud\Http\Controllers\Controller;
use basiccrud\Model\Order;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller {

	private $periods;

	public function __construct()
	{
		$this->middleware('auth');
		$this->periods = DB::select("SELECT DISTINCT(year(created_at)) AS year, month(created_at) AS month FROM orders");
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$periods = $this->periods;
		return view("reports.index", compact('periods'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $period
	 * @return Response
	 */
	public function show($period)
	{
		$period = explode("-", $period);	 
		$orders = DB::select("SELECT PD.id AS pdId, P.name, PD.size, PD.color, PD.price, SUM(PD.price) AS total_sales, count(PD.id) AS quantity FROM order_details AS OD
							LEFT JOIN orders AS O
							ON OD.order_id = O.id
							LEFT JOIN product_details AS PD
							ON OD.product_detail_id = PD.id
							LEFT JOIN products AS P
							ON PD.product_id = P.id
							WHERE MONTH(O.created_at) = :month
							AND YEAR(O.created_at) = :year
							GROUP BY pdId
							ORDER BY total_sales DESC, P.name ASC, PD.size ASC", ["month" => intval($period[1]), "year" => intval($period[0])]);

		$periods = $this->periods;
		return view("reports.show", compact('orders','periods'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
