<?php

namespace App\Http\Controllers\Uretim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hammadde;
use App\UrunHammadde;
use App\Urun;
use App\Http\Requests\HammaddeRequest;
use Auth;

class HammaddeController extends Controller
{
    public function urunHammaddeGet()
    {
      $hammaddeler = Hammadde::where('user_id', Auth::user()->id)->get();

      return view('hammadde.hammadde', compact('hammaddeler'));
    }
    public function urunHammaddeEkleGet()
    {
      return view('hammadde.hammadde-ekle');
    }
    public function urunHammaddeEklePost(HammaddeRequest $request)
    {
      $request->request->add(['user_id' => Auth::user()->id]);
      Hammadde::create($request->all());
      return redirect('/uretim/hammadde');
    }
    public function urunHammaddeDuzenleGet(Hammadde $hammadde)
    {
      return view('hammadde.hammadde-duzenle', compact('hammadde'));
    }
    public function urunHammaddeDuzenlePost(Hammadde $hammadde, HammaddeRequest $request)
    {
      $hammadde->update($request->all());
      return redirect('/uretim/hammadde');
    }
    public function urunHammaddeSilGet(Hammadde $hammadde)
    {
      $hammadde->delete();
      return redirect('/uretim/hammadde');
    }
}
