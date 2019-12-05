@extends('master')
@section('icerik')
  <div class="col-lg-12">
    <h2>Ürünler</h2>
    <a href="{{url('uretim/urun-ekle')}}" class="btn btn-default" style="margin-buttom:10px;">Yeni Ürün Ekle</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Hammaddeler</th>
                    <th>İşçi Sayısı</th>
                    <th>Ek Ücretler</th>
                    <th>Seçencekler</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($urunler as $urun)
                <tr>
                    <td>{{$urun->isim}}</td>
                    <td>
                    @php
                    $hammaddeler = \App\UrunHammadde::where('urun_id', $urun->id)->get();
                    for ($i=0; $i < sizeof($hammaddeler); $i++) {
                      if ($i!=0) {
                        echo ', ';
                      }
                      echo \App\Hammadde::find($hammaddeler[$i]->hammadde_id)->isim;
                    }
                    @endphp
                    </td>
                    <td>{{$urun->isciSayisi}}</td>
                    <td>{{$urun->ekucretler}}</td>
                    <td>
                      <a href="{{url('uretim/urun-duzenle', $urun->id)}}" style="color:#337ab7;"><i class="fa fa-edit" aria-hidden="true"></i> Düzenle</a>
                      <a href="{{url('uretim/urun-sil', $urun->id)}}" style="color:#ef4444;"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
