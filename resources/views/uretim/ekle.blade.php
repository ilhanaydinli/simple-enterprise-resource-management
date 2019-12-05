@extends('master')
@section('icerik')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
              Ürün Ekle
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i>  <a href="{{url('/')}}">Ana Sayfa</a>
              </li>
              <li class="active">
                  <i class="fa fa-edit"></i> Ürün Ekle
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
                  <input class="form-control" name="isim">
              </div>
              <div class="form-group">
                  <label>Hammaddeler</label>
                  @foreach ($hammaddeler as $hammadde)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="hammaddeler[]" value="{{$hammadde->id}}">{{$hammadde->isim}}
                            <br>Miktar: <input type="text" name="hammaddeler_miktar_{{$hammadde->id}}" value="">
                        </label>
                    </div>
                  @endforeach
              </div>
              <div class="form-group">
                  <label>İşçi Sayısı</label>
                  <input class="form-control" name="isciSayisi">
              </div>
              <div class="form-group">
                  <label>Ek Ücretler</label>
                  <input class="form-control" name="ekucretler">
              </div>
              <button type="submit" class="btn btn-default">Ürün Ekle</button>
          </form>
      </div>
  </div>
</div>
@endsection
