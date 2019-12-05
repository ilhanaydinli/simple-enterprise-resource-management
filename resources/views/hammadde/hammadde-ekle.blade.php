@extends('master')
@section('icerik')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
              Hammadde Ekle
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i>  <a href="{{url('/')}}">Ana Sayfa</a>
              </li>
              <li class="active">
                  <i class="fa fa-edit"></i> Hammadde Ekle
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
                  <label>Toplam Miktar</label>
                  <input class="form-control" name="miktar">
              </div>
              <div class="form-group">
                  <label>Fiyat</label>
                  <input class="form-control" name="fiyat">
              </div>
              <button type="submit" class="btn btn-default">Hammadde Ekle</button>
          </form>
      </div>
  </div>
</div>
@endsection
