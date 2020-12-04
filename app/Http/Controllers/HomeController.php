<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダを一つ取得する
        $tasks = $user->tasks()->first();
        if (is_null($tasks)) {
            return view('top.home');
        }

        return redirect()->route('tasks.index');

    }
}
