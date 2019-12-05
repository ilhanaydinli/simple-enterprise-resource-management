@extends('master')
@section('icerik')
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">
                  Ürün Üret
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="{{url('/')}}">Ana Sayfa</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-edit"></i> Ürün Üret
                  </li>
              </ol>
              @include('hata')
          </div>
      </div>
      <!-- /.row -->

      <div class="row">
          <div class="col-lg-6">
              <form role="form" method="post" action="">
                {{ csrf_field() }}
                  <div class="form-group">
                      <label>Hangi ürün üretilecek?</label>
                      <select class="form-control" name="urun_id">
                        @foreach ($urunler as $urun)
                          <option value="{{$urun->id}}">{{$urun->isim}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Kaç adet ürün üretilecek?</label>
                      <input class="form-control" name="miktar">
                  </div>
                  <button type="submit" class="btn btn-default">Üretime Başla</button>
              </form>
          </div>
          <div class="col-lg-6">
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="disabledSelect">Hammadde Yeterliliği</label>
                  @isset($yetersizHammaddeler)
                    @for ($i=0; $i < sizeof($yetersizHammaddeler); $i++)
                      <input class="form-control" id="disabledInput" type="text" style="background:#ffc4c4;" placeholder="{{$yetersizHammaddeler[$i]}} yetersiz" disabled>
                    @endfor
                  @endisset
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="disabledSelect">İşçi Yeterliliği</label>
                  @isset($yetersizIsci)
                    @for ($i=0; $i < sizeof($yetersizIsci); $i++)
                    <input class="form-control" id="disabledInput" type="text" style="background:#ffc4c4;" placeholder="{{$yetersizIsci[$i]}}" disabled>
                    @endfor
                  @endisset
              </div>
            </div>
          </div>
      </div>
      <!-- /.row -->

  </div>
  <!-- /.container-fluid -->
@endsection
