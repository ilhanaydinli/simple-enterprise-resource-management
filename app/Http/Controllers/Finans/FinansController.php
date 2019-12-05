<?php

namespace App\Http\Controllers\Finans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Uretilen;
use App\Isci;
use Auth;

class FinansController extends Controller
{
    public function finansGet()
    {
      $uretilenler = Uretilen::where('user_id', Auth::user()->id)->get();
      $isciler = Isci::where('user_id', Auth::user()->id)->get();
      return view('finans.finans', compact('uretilenler', 'isciler'));
    }
    public function aylikGet()
    {
      $uretilenler = Uretilen::where('user_id', Auth::user()->id)->whereMonth('created_at', '=', date('m'))->get();
      $isciler = Isci::where('user_id', Auth::user()->id)->whereMonth('created_at', '=', date('m'))->get();
      $ay = date('m');
      return view('finans.finans', compact('uretilenler', 'isciler', 'ay'));
    }
}
