<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Cost as CostResource;
use App\Cost;
use Auth;

class CostController extends Controller
{
	public function create(Request $request, Cost $cost)
	{
		$this->validate($request, [
			'animal_id' => 'required',
			'cost' 		=> 'required',
		]);

		$cost = $cost->create([
			'company_id'	=> Auth::user()->company_id,
			'animal_id'		=> $request->animal_id,
			'cost'			=> $request->cost,
			'note'			=> $request->note,
			'created_by'	=> Auth::user()->id,
		]);

		return new CostResource($cost);
	}

	public function read(Request $request, Cost $cost)
	{
		$cost = $cost
					->where('animal_id', $request->animal_id)
					->where('company_id', Auth::user()->company_id)
					->orderBy('id', 'DESC')
					->get();

		return CostResource::collection($cost);
	}

	public function update(Request $request, Cost $cost)
	{
		$this->authorize('update', $cost);

		$cost->cost = $request->get('cost', $cost->cost);
		$cost->note = $request->get('note', $cost->note);
		$cost->save();

		return new CostResource($cost);
	}

	public function delete(Request $request, Cost $cost)
	{
		$this->authorize('delete', $cost);

		$cost->delete();

		return new CostResource($cost);
	}
}
