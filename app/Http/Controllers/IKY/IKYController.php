<?php

namespace App\Http\Controllers\IKY;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Isci;
use App\Http\Requests\IKYRequest;
use Auth;

class IKYController extends Controller
{
  public function iscilerGet()
  {
    $isciler = Isci::where('user_id', Auth::user()->id)->get();
    return view('iky.isciler', compact('isciler'));
  }
  public function isciEkleGet()
  {
    return view('iky.ekle');
  }
  public function isciEklePost(IKYRequest $request)
  {
    $request->request->add(['user_id' => Auth::user()->id]);
    Isci::create($request->all());
    return redirect('iky/isciler');
  }
  public function isciDuzenleGet(Isci $isci)
  {
    return view('iky.duzenle', compact('isci'));
  }
  public function isciDuzenlePost(Isci $isci, IKYRequest $request)
  {
    $isci->update($request->all());
    return redirect('/iky/isciler');
  }
  public function isciSilGet(Isci $isci)
  {
    $isci->delete();
    return redirect('/iky/isciler');
  }
}
