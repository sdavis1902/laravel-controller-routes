<?php
namespace sdavis1902\LaravelControllerRoutes;

use ReflectionParameter;
use ReflectionMethod;
use ReflectionClass;
use Route;
use Request;

class MoreRoute
{
    public function controller($uri, $controller){
        // new method, to replace old one
        $uri = preg_replace('/^\//', '', $uri); // clear any leading slashes
        $uri = preg_replace('/\/$/', '', $uri); // clear any trailing slashes

        Route::any($uri . '/{rest?}', function() use ($uri, $controller){
			$segments = Request::segments();
            if($segments[0] !== $uri){
                // must be using prefix, we need to adjust our uri
                $newuri = '';
                foreach($segments as $segment){
                    $newuri.= "$segment/";
                    if($segment == $uri) break;
                }

                $uri = preg_replace('/\/$/', '', $newuri);
            }

            $uri_segment_count = count(explode('/', $uri));
            $params = array_slice(Request::segments(), $uri_segment_count);
            $method = strtolower(Request::method());

            $function_path = count($params) === 0 ? 'index' : array_shift($params);
            $function = $method . join('', array_map('ucfirst', explode('-', $function_path)));

            if($function == 'getMiddleware'){
                abort(404);
            }

            $classname = 'App\Http\Controllers\\' . $controller;
            $class = new $classname();
            if(!method_exists($class, $function)){
                abort(404);
            }

            // now check params are correct
            $rmethod = new ReflectionMethod('App\Http\Controllers\\' . $controller, $function);
            $required_num = $rmethod->getNumberOfRequiredParameters();
            $num = $rmethod->getNumberOfParameters();

            $parameters = [];
			foreach ($rmethod->getParameters() as $key => $parameter) {
				$rclass = $parameter->getClass();
				if ($rclass) {
					$parameters[$key] = \App::make($rclass->name);
                }else{
                    break;
                }
            }
            $params = array_merge($parameters, $params);

            $params_count = count($params);
            if($params_count < $required_num || $params_count > $num){
                abort(404);
            }

            return call_user_func_array([$class, $function], $params);
        })->where('rest', '.*');
    }
}
