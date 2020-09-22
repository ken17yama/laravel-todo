<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CheckRoom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::id();
        $room_id = $request->room_id;
        $result = DB::table('room_user')->where('user_id', $user_id)->where('room_id', $room_id)->exists();
        if($result){
            return $next($request);
        } else {
            return redirect('room');
        }

    }
}
