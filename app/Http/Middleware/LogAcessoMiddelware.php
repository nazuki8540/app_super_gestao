<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$request - manipular
        //response - manipular
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        
        $resposta = $next($request);
        
        $resposta->setStatusCode(201,'Tudo certo');

        return $resposta;
    }
}
