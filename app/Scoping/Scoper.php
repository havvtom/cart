<?php

namespace App\Scoping;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Scoping\Contracts\Scope;
use Illuminate\Support\Arr;

class Scoper {

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function apply(Builder $builder, array $scopes)
	{
		foreach ($this->limitScopes($scopes) as $key => $scope) {

		if(!$scope instanceOf Scope) {

			continue;
		}

		$scope->apply($builder, $this->request->get($key));
		
		}

		return $builder;
	}

	protected function limitScopes(array $scopes)
	{

		return Arr::only(
			$scopes,
			array_keys($this->request->all())
		);
	}
}