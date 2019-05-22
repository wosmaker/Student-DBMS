<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class CheckPersonal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userid = auth()->user()->id;
        $userdetail = DB::table('user_list')
        ->select('*')
        ->where('userid', '=', $userid)
        ->get()->all();

        if($userdetail != null)
            return $next($request);

        return redirect('personal');
    }
}
