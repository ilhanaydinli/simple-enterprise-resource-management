@extends('master')
@section('icerik')
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">
                  Anasayfa <small>İstatistikler</small>
              </h1>
              <ol class="breadcrumb">
                  <li class="active">
                      <i class="fa fa-dashboard"></i> Anasayfa
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{\App\Urun::where('user_id', Auth::user()->id)->get()->count()}}</div>
                            <div>Üretime Hazır Ürünler</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('uretim/urunler')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ayrıntılar</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-tasks fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{\App\Uretilen::where('user_id', Auth::user()->id)->get()->count()}}</div>
                              <div>Üretilen Ürünler</div>
                          </div>
                      </div>
                  </div>
                  <a href="{{url('uretim/uretilenler')}}">
                      <div class="panel-footer">
                          <span class="pull-left">Ayrıntılar</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-shopping-cart fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{\App\Hammadde::where('user_id', Auth::user()->id)->get()->count()}}</div>
                              <div>Hammadde Stoğu</div>
                          </div>
                      </div>
                  </div>
                  <a href="{{url('uretim/hammadde')}}">
                      <div class="panel-footer">
                          <span class="pull-left">Ayrıntılar</span>
                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
      <!-- /.row -->

  </div>
  <!-- /.container-fluid -->
@endsection
