<?php
namespace sdavis1902\LaravelControllerRoutes;

use ReflectionParameter;
use ReflectionMethod;
use ReflectionClass;
use Route;

class MoreRoute
{
    public function controller($path, $controllerClassName) {
        $class = new ReflectionClass('App\Http\Controllers\\' . $controllerClassName);
        $publicMethods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($publicMethods as $method) {
            $methodName = $method->name;
            if ($methodName == 'getMiddleware') {
                continue;
            }
            if( $this->stringStartsWith($methodName, 'any') ){
                $slug = self::slug($method);
                //var_dump($slug);
                Route::any($path . '/' . $slug, $controllerClassName . '@' . $methodName);
            }
            if( $this->stringStartsWith($methodName, 'get') ){
                $slug = self::slug($method);
                //var_dump($slug);
                Route::get($path . '/' . $slug, $controllerClassName . '@' . $methodName);
            }
            if( $this->stringStartsWith($methodName, 'post') ){
                $slug = self::slug($method);
                //var_dump($slug);
                Route::post($path . '/' . $slug, $controllerClassName . '@' . $methodName);
            }
        }
    }

    private function stringStartsWith($string, $match) {
        return (substr($string, 0, strlen($match)) == $match) ? true : false;
    }

    private function slug($method) {
        $methodName = $method->name;
        $cleaned = str_replace(['any', 'get', 'post', 'delete'], '', $methodName);
        $snaked = \Illuminate\Support\Str::snake($cleaned, ' ');
        $slug = str_slug($snaked, '-');
        if($slug == "index")
            $slug = "";
        foreach ($method->getParameters() as $parameter) {
            if( $this->hasType($parameter) ){
                continue;
            }
            $slug .= sprintf('/{%s%s}', $parameter->getName(), $parameter->isDefaultValueAvailable() ? '?' : '');
        }
        if($slug != null && $slug[0] ==  '/')
            return substr($slug,1);
        return $slug;
    }

    private function hasType(ReflectionParameter $param) {
        //TODO: if php7 use the native method
        preg_match('/\[\s\<\w+?>\s([\w]+)/s', $param->__toString(), $matches);
        return isset($matches[1]) ? true : false;
    }
}
