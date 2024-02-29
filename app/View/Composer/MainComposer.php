<?php

namespace App\View\Composer;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class MainComposer
{
    public function compose(View $view)
    {
        $view->with('tittle', Str::headline(config('app.name')));
    }
}
