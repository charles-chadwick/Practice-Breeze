<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use Illuminate\Http\Request;

class AppointmentTypeController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 */
	public function index () {
		
		$appointment_types = AppointmentType::orderBy(request("order_by", "title"))
											->get();
		
		return view('appointments.types.index', compact('appointment_types'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 */
	public function create () {
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 */
	public function store (Request $request) {
		//
	}
	
	/**
	 * Display the specified resource.
	 */
	public function show (string $id) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit (string $id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 */
	public function update (Request $request, string $id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy (string $id) {
		//
	}
	
}
