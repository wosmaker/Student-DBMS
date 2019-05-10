<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // เช็ค role ว่าตรงกับ role ที่กำหนดไว้ในหน้านั้นๆหรือไม่ หากใช่ก็ไปต่อ หากไม่ใช่ส่งกลับหน้า HOME
        $userroleid = auth()->user()->UserRoleID;

        if(in_array($userroleid, $roles))
            return $next($request);

        return redirect('home');
    }
}
