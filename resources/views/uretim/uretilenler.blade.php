@extends('master')
@section('icerik')
  <div class="col-lg-12">
    <h2>Üretilen Ürünler</h2>
    <a href="{{url('uretim/uretim')}}" class="btn btn-default" style="margin-buttom:10px;">Yeni Ürün Üret</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Hammaddeler</th>
                    <th>İşçi Sayısı</th>
                    <th>Ek Ücretler</th>
                    <th>Toplam Ücret</th>
                    <th>Üretim Tarihi</th>
                    <th>Seçencekler</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($uretilenler as $uretilen)
                <tr>
                    <td>{{$uretilen->Urun->isim}}</td>
                    <td>
                    @php
                    $hammaddeler = \App\UrunHammadde::where('urun_id', $uretilen->urun_id)->get();
                    for ($i=0; $i < sizeof($hammaddeler); $i++) {
                      if ($i!=0) {
                        echo ', ';
                      }
                      echo \App\Hammadde::find($hammaddeler[$i]->hammadde_id)->isim;
                    }
                    @endphp
                    </td>
                    <td>{{$uretilen->Urun->isciSayisi*$uretilen->uretimMiktari}}</td>
                    <td>{{$uretilen->Urun->ekucretler*$uretilen->uretimMiktari}}</td>
                    <td>{{$uretilen->toplamUcret}}</td>
                    <td>{{$uretilen->created_at}}</td>
                    <td>
                      <a href="{{url('uretim/ayrintilar', $uretilen->id)}}" style="color:#45b733;"><i class="fa fa-bar-chart" aria-hidden="true"></i> Ayrıntılar</a>
                      <a href="{{url('uretim/sil', $uretilen->id)}}" style="color:#ef4444;"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
