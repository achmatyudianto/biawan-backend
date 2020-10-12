<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Animal as AnimalResource;
use App\Animal;
use Auth;

class AnimalController extends Controller
{
	public function create(Request $request, Animal $animal) 
	{
		$this->validate($request, [
			'cage_id'		=> 'required',
			'animal'		=> 'required',
			'animal_name'	=> 'required',
		]);

		$animal = $animal->create([
			'company_id'	=> Auth::user()->company_id,
			'cage_id'		=> $request->cage_id,
			'animal'		=> $request->animal,
			'animal_name'	=> $request->animal_name,
			'buy'			=> $request->get('buy', 0),
			'sold'			=> $request->get('sold', 0),
			'created_by'	=> Auth::user()->id,
		]);

		return new AnimalResource($animal);
	}

	public function read(Request $request, Animal $animal)
	{
		$animal = $animal
					->where('cage_id', $request->cage_id)
					->where('company_id', Auth::user()->company_id)
					->where('status', $request->status)
					->orderBy('id', 'DESC')
					->get();

		return AnimalResource::collection($animal);
	}

	public function update(Request $request, Animal $animal)
	{
		$this->authorize('update', $animal);

		$animal->animal = $request->get('animal', $animal->animal);
		$animal->animal_name = $request->get('animal_name', $animal->animal_name);
		$animal->buy = $request->get('buy', $animal->buy);
		$animal->sold = $request->get('sold', $animal->sold);
		$animal->status_sold = $request->get('status_sold', $animal->status_sold);
		$animal->status = $request->get('status', $animal->status);
		$animal->save();

		return new AnimalResource($animal);
	}
}
