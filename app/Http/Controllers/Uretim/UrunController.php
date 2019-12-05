<?php

namespace App\Http\Controllers\Uretim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hammadde;
use App\UrunHammadde;
use App\Urun;
use App\Http\Requests\UrunRequest;
use Auth;

class UrunController extends Controller
{
    public function urunlerGet()
    {
      $urunler = Urun::where('user_id', Auth::user()->id)->get();
      return view('uretim.urunler', compact('urunler'));
    }
    public function urunEkleGet()
    {
      $hammaddeler = Hammadde::where('user_id', Auth::user()->id)->get();
      return view('uretim.ekle', compact('hammaddeler'));
    }
    public function urunEklePost(UrunRequest $request)
    {
      $request->request->add(['user_id' => Auth::user()->id]);
      $urun = Urun::create($request->all());
      for($i=0; $i <sizeof($request->hammaddeler); $i++) {
        $hammaddeler_miktar = 'hammaddeler_miktar_'.$request->hammaddeler[$i];
        UrunHammadde::create([
          'urun_id' => $urun->id,
          'hammadde_id' => $request->hammaddeler[$i],
          'miktar' => $request->$hammaddeler_miktar,
        ]);
      }
      return redirect('/uretim/urunler');
    }
    public function urunDuzenleGet(Urun $urun)
    {
      $hammaddeler = Hammadde::where('user_id', Auth::user()->id)->get();
      return view('uretim.duzenle', compact('urun', 'hammaddeler'));
    }
    public function urunDuzenlePost(Urun $urun, UrunRequest $request)
    {
      //return $request->all();
      $urun->update($request->all());
      UrunHammadde::where('urun_id', $urun->id)->delete();
      for($i=0; $i <sizeof($request->hammaddeler); $i++) {
        $hammaddeler_miktar = 'hammaddeler_miktar_'.$request->hammaddeler[$i];
        UrunHammadde::create([
          'urun_id' => $urun->id,
          'hammadde_id' => $request->hammaddeler[$i],
          'miktar' => $request->$hammaddeler_miktar,
        ]);
      }
      return redirect('/uretim/urunler');
    }
    public function urunSilGet(Urun $urun)
    {
      $urun->delete();
      return redirect('/uretim/urunler');
    }
}
