<?php

namespace App\Http\Controllers\Dir;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct() {
    	return $this->middleware('rusmiddle');
    }

    public function index() {
    	return view('BASE Middleware');
    }

    public function show($id)
	{
		return view('user.profile', ['user' => User::findOrFail($id)]);
	}
}
