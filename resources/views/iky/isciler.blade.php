@extends('master')
@section('icerik')
  <div class="col-lg-12">
    <h2>İşçiler</h2>
    <a href="{{url('iky/isci-ekle')}}" class="btn btn-default" style="margin-buttom:10px;">Yeni İşçi Ekle</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>Nitelikleri</th>
                    <th>Maaşı</th>
                    <th>Seçencekler</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($isciler as $isci)
                <tr>
                    <td>{{$isci->adi_soyadi}}</td>
                    <td>{{$isci->nitelikleri}}</td>
                    <td>{{$isci->maasi}}</td>
                    <td>
                      <a href="{{url('iky/isci-duzenle', $isci->id)}}" style="color:#337ab7;"><i class="fa fa-edit" aria-hidden="true"></i> Düzenle</a>
                      <a href="{{url('iky/isci-sil', $isci->id)}}" style="color:#ef4444;"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
