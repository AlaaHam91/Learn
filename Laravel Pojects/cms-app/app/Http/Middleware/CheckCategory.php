<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
class CheckCategory
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
        $count=Category::all()->count();
        if($count == 0)
        {
            session()->flash('error','No category is avilable');
           return redirect(route('Categories.index'));
        }
        return $next($request);
    }
}
