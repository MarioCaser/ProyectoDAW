<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertParamsToUppercase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next){
        // Obtener todos los parámetros de la URL
        $params = $request->route()->parameters();

        // Iterar sobre los parámetros y convertirlos a mayúsculas si están en minúsculas
        foreach ($params as $key => $value) {
            if (is_string($value) && ctype_lower($value)) {
                $params[$key] = strtoupper($value);
            }
        }

        // Actualizar los parámetros de la URL en la petición
        $request->route()->setParameter('parameters', $params);

        return $next($request);
    }

}
