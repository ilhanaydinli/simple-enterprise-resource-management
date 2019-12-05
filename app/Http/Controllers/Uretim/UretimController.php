<?php

namespace App\Http\Controllers\Uretim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hammadde;
use App\UrunHammadde;
use App\Urun;
use App\Isci;
use App\Uretilen;
use App\Http\Requests\UretimRequest;
use Auth;

class UretimController extends Controller
{
  public function urunAyrintilarGet(Uretilen $uretilen)
  {
    $urunHammaddeler = UrunHammadde::where('urun_id', $uretilen->urun_id)->get();
    return view('uretim.ayrintilar', compact('uretilen', 'urunHammaddeler'));
  }

  public function urunUretilenlerGet()
  {
    $uretilenler = Uretilen::where('user_id', Auth::user()->id)->get();
    return view('uretim.uretilenler', compact('uretilenler'));
  }

  public function urunUretilenSilGet(Uretilen $uretilen)
  {
    $uretilen->delete();
    return redirect('uretim/uretilenler');
  }

  public function urunUretGet()
  {
    $urunler = Urun::where('user_id', Auth::user()->id)->get();
    return view('uretim.uretim', compact('urunler'));
  }
  public function urunUretPost(UretimRequest $request)
  {
    $durum = 0;
    $urunler = Urun::where('user_id', Auth::user()->id)->get();

    $yetersizHammaddeler = [];
    $yetersizIsci = [];
    $urun = Urun::where('user_id', Auth::user()->id)->find($request->urun_id);
    $urunHammaddeler = UrunHammadde::where('urun_id', $urun->id)->get();
    /*hammadde yeterlimi kontrolü*/
    foreach ($urunHammaddeler as $urunHammadde) {
    $hammadde = Hammadde::where('user_id', Auth::user()->id)->find($urunHammadde->hammadde_id);
      if ($hammadde->miktar < ($urunHammadde->miktar*$request->miktar)) {
        $yetersizHammaddeler[] = $hammadde->isim;
      }
    }
    /*işçi yeterlimi kontrolü*/
    if (($urun->isciSayisi*$request->miktar) > Isci::where('user_id', Auth::user()->id)->count()) {
      $yetersizIsci[] = 'Yetersiz İşçi Sayısı';
    }
    if (sizeof($yetersizHammaddeler)>0 || sizeof($yetersizIsci)>0) {
      return view('uretim.uretim', compact('durum', 'urunler', 'yetersizHammaddeler', 'yetersizIsci'));
    }

    $hammaddeUcreti = 0;
    foreach ($urunHammaddeler as $urunHammadde) {
    $hammadde = Hammadde::where('user_id', Auth::user()->id)->find($urunHammadde->hammadde_id);
      /*hammadde ücret hesaplama*/
      $hammaddeUcreti = $hammaddeUcreti + $hammadde->fiyat;
      /*stoktan hammadde miktarını düşme*/
      $hammadde->miktar = ($hammadde->miktar - $urunHammadde->miktar);
      $hammadde->save();
    }

    $uretilen = Uretilen::create([
      'user_id' => Auth::user()->id,
      'urun_id' => $urun->id,
      'uretimMiktari' => $request->miktar,
      'hammaddeUcreti' => $hammaddeUcreti,
      'ekUcretler' => $urun->ekucretler,
      'toplamUcret' => (($hammaddeUcreti+$urun->ekucretler)*$request->miktar),
    ]);

    $uretildi = $request->miktar;
    $urunIsmi = $urun->isim;

    $urunHammaddeler = UrunHammadde::where('urun_id', $uretilen->urun_id)->get();
    return view('uretim.ayrintilar', compact('uretildi', 'urunIsmi', 'uretilen', 'urunHammaddeler'));
  }
}
