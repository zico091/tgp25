<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
    $a = 10 + 15;
    dd($a);
}
    public function test2() {
    
    dd('zack');
}
}