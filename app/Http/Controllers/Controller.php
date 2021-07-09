<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
	 * Return whether previous route name is equal to a given route name.
	 *
	 * @param string $routeName
	 * @return boolean
	 */
	function is_previous_route(string $routeName) : bool
	{
	    $previousRequest = app('request')->create(URL::previous());

	    try {
	        $previousRouteName = app('router')->getRoutes()->match($previousRequest)->getName();
	    } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception) {
	        // Exception is thrown if no mathing route found.
	        // This will happen for example when comming from outside of this app.
	        return false;
	    }

	    return $previousRouteName === $routeName;
	}

	/**
    * Format date.
    * @param string $value
    * @return \date
    */
    public function dateFormat(string $value = '')
    {
        if ($value) {
            return \Carbon\Carbon::createFromFormat('d/m/Y',$value);
        }
    }
}
