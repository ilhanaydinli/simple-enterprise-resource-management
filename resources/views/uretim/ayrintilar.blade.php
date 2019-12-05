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
      </div>
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
        @isset($uretildi)
          <div class="alert alert-success">
                <strong>Tebrikler!</strong> {{$uretildi}} adet {{$urunIsmi}} ürünü ürettiniz.
            </div>
        @endisset
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Üretilen Ürüne Ait Bilgiler</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Üretilen Ürün</th>
                              <th>Üretim Miktari</th>
                              <th>Üretim Tutarı</th>
                              <th>Üretim Zamanı</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>{{$uretilen->Urun->isim}}</td>
                              <td>{{$uretilen->uretimMiktari}}</td>
                              <td>{{$uretilen->toplamUcret}}</td>
                              <td>{{$uretilen->created_at}}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
        <div class="panel panel-yellow">
              <div class="panel-heading">
                  <h3 class="panel-title">Kullanılan İşçilere Ait Özellikler</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kullanılan İşçi Sayısı</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$uretilen->Urun->isciSayisi*$uretilen->uretimMiktari}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
          <div class="panel panel-yellow">
            <div class="panel-heading">
                <h3 class="panel-title">Ek Ücretler</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>İsim</th>
                              <th>Ek Ücret Sayısı</th>
                              <th>Ek Ücret Miktarı</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Ek Ücret</td>
                              <td>{{$uretilen->uretimMiktari}}</td>
                              <td>{{$uretilen->Urun->ekucretler}}</td>
                          </tr>
                          <tr>
                            <td><strong>Toplam</strong></td>
                            <td><strong>{{$uretilen->uretimMiktari}}</strong></td>
                            <td><strong>{{$uretilen->Urun->ekucretler*$uretilen->uretimMiktari}}</strong></td>                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
        <div class="panel panel-info">
              <div class="panel-heading">
                  <h3 class="panel-title">Hammadde Kullanım Oranları Ve Ücretleri</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                          <table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>Kullanılan Hammadde</th>
                                      <th>Kullanım Miktari</th>
                                      <th>Kullanım Tutarı</th>
                                      <th>Kalan Miktar</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @php
                                $toplamKHammadde = 0;
                                $toplamHammaddeUcreti = 0 ;
                                @endphp
                                @foreach ($urunHammaddeler as $urunHammadde)
                                  @php
                                    $hammade = \App\Hammadde::find($urunHammadde->hammadde_id);
                                    $toplamKHammadde = $toplamKHammadde + ($urunHammadde->miktar * $uretilen->uretimMiktari);
                                    $toplamHammaddeUcreti = $toplamHammaddeUcreti + ($hammade->fiyat * $uretilen->uretimMiktari);
                                  @endphp
                                  <tr>
                                      <td>{{$hammade->isim}}</td>
                                      <td>{{$urunHammadde->miktar * $uretilen->uretimMiktari}}</td>
                                      <td>{{($hammade->fiyat * $uretilen->uretimMiktari)}}</td>
                                      <td>{{$hammade->miktar}}</td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td><strong>Toplam</strong></td>
                                  <td><strong>{{$toplamKHammadde}}</strong></td>
                                  <td><strong>{{$toplamHammaddeUcreti}}</strong></td>
                                  <td><strong></strong></td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
              </div>
          </div>
          <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Toplam Tutar</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>İsim</th>
                              <th>Ücret Miktarı</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Hammadde</td>
                              <td>{{$toplamHammaddeUcreti}}</td>
                          </tr>
                          <tr>
                              <td>Ek Ücret</td>
                              <td>{{$uretilen->Urun->ekucretler*$uretilen->uretimMiktari}}</td>
                          </tr>
                          <tr>
                            <td><strong>Toplam</strong></td>
                            <td><strong>{{($uretilen->Urun->ekucretler*$uretilen->uretimMiktari)+$toplamHammaddeUcreti}}</strong></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection
