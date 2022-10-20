<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        $appointment = DB::table('doctors')
            ->join('appointments','doctors.id', '=', 'appointments.doctor_id')
            ->where('appointments.trash',0)
            ->orderBy('appointments.id','desc')
            ->limit(3)
            ->get();
        return view('Website.index', compact('appointment'));
    }
}
