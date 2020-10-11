<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Cage as CageResource;
use App\Cage;
use Auth;

class CageController extends Controller
{
    public function create(Request $request, Cage $cage)
	{
		$this->validate($request, [
			'cage_name'	=> 'required',
		]);

		$cage = $cage->create([
			'company_id'	=> Auth::user()->company_id,
			'cage_name'		=> $request->cage_name,
			'created_by'	=> Auth::user()->id,
		]);

		return new CageResource($cage);
	}

	public function read(Request $request, Cage $cage)
	{
		$cage = $cage
					->where('company_id', Auth::user()->company_id)
					->where('status', $request->status)
					->get();

		return CageResource::collection($cage);
	}

	public function update(Request $request, Cage $cage)
	{
		$this->validate($request, [
			'cage_name'	=> 'required',
			'status'	=> 'required',
		]);

		$this->authorize('update', $cage);

		$cage->cage_name = $request->get('cage_name', $cage->cage_name);
		$cage->status = $request->get('status', $cage->status);
		$cage->save();

		return new CageResource($cage);
	}
}
