@extends('master')
@section('icerik')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
              Ürun Düzenle
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i>  <a href="{{url('/')}}">Ana Sayfa</a>
              </li>
              <li class="active">
                  <i class="fa fa-edit"></i> Ürun Düzenle
              </li>
          </ol>
          @include('hata')
      </div>
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-6">
          <form role="form" action="" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                  <label>İsim</label>
                  <input class="form-control" name="isim" value="{{$urun->isim}}">
              </div>
              <div class="form-group">
                  <label>Hammaddeler</label>
                  @foreach ($hammaddeler as $hammadde)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="hammaddeler[]" value="{{$hammadde->id}}"
                            @php
                            $urunhammaddeler = \App\UrunHammadde::where('urun_id', $urun->id)->get();
                            for ($i=0; $i < sizeof($urunhammaddeler); $i++) {
                              if ($hammadde->id == $urunhammaddeler[$i]->hammadde_id) {
                                echo 'checked';
                              }
                            }
                            if (isset(\App\UrunHammadde::where('urun_id', $urun->id)->where('hammadde_id', $hammadde->id)->first()->miktar)) {
                              $hammaddeler_miktar = \App\UrunHammadde::where('urun_id', $urun->id)->where('hammadde_id', $hammadde->id)->first()->miktar;
                            }
                            else {
                              $hammaddeler_miktar='';
                            }
                            @endphp
                            >{{$hammadde->isim}}
                            <br>Miktar: <input type="text" name="hammaddeler_miktar_{{$hammadde->id}}" value="{{ $hammaddeler_miktar }}">
                        </label>
                    </div>
                  @endforeach
              </div>
              <div class="form-group">
                  <label>İşçi Sayısı</label>
                  <input class="form-control" name="isciSayisi" value="{{$urun->isciSayisi}}">
              </div>
              <div class="form-group">
                  <label>Ek Ücretlet</label>
                  <input class="form-control" name="ekucretler" value="{{$urun->ekucretler}}">
              </div>
              <button type="submit" class="btn btn-default">Ürün Düzenle</button>
          </form>
      </div>
  </div>
</div>
@endsection
