@extends('master')
@section('icerik')
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                İşçi Düzenle
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{url('/')}}">Ana Sayfa</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> İşçi Düzenle
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
                    <label>Adı Soyadı</label>
                    <input class="form-control" name="adi_soyadi" value="{{$isci->adi_soyadi}}">
                </div>
                <div class="form-group">
                    <label>İşçi Sayısı</label>
                    <textarea name="nitelikleri" class="form-control" rows="8" cols="80">{{$isci->nitelikleri}}</textarea>
                </div>
                <div class="form-group">
                    <label>Maaşı</label>
                    <input class="form-control" name="maasi" value="{{$isci->maasi}}">
                </div>
                <button type="submit" class="btn btn-default">İşçiyi Düzenle</button>
            </form>
        </div>
    </div>
  </div>
@endsection
