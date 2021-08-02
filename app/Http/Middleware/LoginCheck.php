<?php

namespace App\Http\Middleware;
use \Auth;
use App\User;
use App\Product;

use Closure;

class LoginCheck
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
        $user = User::find(Auth::id());
        $age = $user->age;
        // ye theek chal raha
        $category = Product::where('product_id','=', $request->product_id)->pluck('category_id');
        // return $category[0];
        if($age < 18 and $category[0] == 3)
        {
            return redirect('/Mobiles');
        }
        else{
            return $next($request);
        }
    }
}
