@extends('master')
@section('icerik')
  <div class="col-lg-12">
    <h2>Hammaddeler</h2>
    <a href="{{url('uretim/hammadde-ekle')}}" class="btn btn-default" style="margin-buttom:10px;">Yeni Hammadde Ekle</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Miktar</th>
                    <th>Fiyat</th>
                    <th>Seçencekler</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($hammaddeler as $hammadde)
                <tr>
                    <td>{{$hammadde->isim}}</td>
                    <td>{{$hammadde->miktar}}</td>
                    <td>{{$hammadde->fiyat}}</td>
                    <td>
                      <a href="{{url('uretim/hammadde-duzenle', $hammadde->id)}}" style="color:#337ab7;"><i class="fa fa-edit" aria-hidden="true"></i> Düzenle</a>
                      <a href="{{url('uretim/hammadde-sil', $hammadde->id)}}" style="color:#ef4444;"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
