@extends('master')
@section('icerik')
<div class="container-fluid">
  <div class="col-lg-12">
    <h2>Finans</h2>
    @isset($ay)
      <p><h3>{{ date("F", mktime(0, 0, 0, $ay, 1)) }} Ayına Ait Giderler</h3></p>
    @endisset
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Ürün Giderleri</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Ürün Adı</th>
                          <th>Hammadde Tutarı</th>
                          <th>Ek Ücretler Tutarı</th>
                          <th>Toplam Ücret</th>
                          <th>Üretim Tarihi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $toplamUcret = 0;
                      $toplamHammaddeUcreti = 0;
                      $toplamEkUcretler = 0;
                    @endphp
                    @foreach ($uretilenler as $uretilen)
                      @php
                        $toplamUcret = $toplamUcret + $uretilen->toplamUcret;
                        $toplamEkUcretler = $toplamEkUcretler + ($uretilen->uretimMiktari*$uretilen->ekUcretler);
                        $toplamHammaddeUcreti = $toplamHammaddeUcreti + ($uretilen->uretimMiktari*$uretilen->hammaddeUcreti);
                      @endphp
                      <tr>
                          <td>{{$uretilen->Urun->isim}}</td>
                          <td>{{$uretilen->uretimMiktari*$uretilen->hammaddeUcreti}}</td>
                          <td>{{$uretilen->uretimMiktari*$uretilen->ekUcretler}}</td>
                          <td>{{$uretilen->toplamUcret}}</td>
                          <td>{{$uretilen->created_at}}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <td><strong>Toplam</strong></td>
                      <td><strong>{{$toplamHammaddeUcreti}}</strong></td>
                      <td><strong>{{$toplamEkUcretler}}</strong></td>
                      <td><strong>{{$toplamUcret}}</strong></td>
                      <td><strong></strong></td>
                    </tr>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">İşçi Giderleri</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>İşçi Adı</th>
                          <th>Nitelikleri</th>
                          <th>Maaşı</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $toplamIsciMaas=0;
                    @endphp
                    @foreach ($isciler as $isci)
                      @php
                        $toplamIsciMaas = $toplamIsciMaas+$isci->maasi;
                      @endphp
                      <tr>
                          <td>{{$isci->adi_soyadi}}</td>
                          <td>{{$isci->nitelikleri}}</td>
                          <td>{{$isci->maasi}}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Aylık Giderler</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>Gider</th>
                          <th>Tutar</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Ürün Giderleri</td>
                          <td>{{$toplamUcret}}</td>
                      </tr>
                      <tr>
                          <td>İşçi Giderleri</td>
                          <td>{{$toplamIsciMaas}}</td>
                      </tr>
                      <tr>
                        <td><strong>Toplam</strong></td>
                        <td><strong>{{$toplamUcret+$toplamIsciMaas}}</strong></td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
