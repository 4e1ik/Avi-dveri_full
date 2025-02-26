@extends('layouts.admin.admin')

@section('admin_content')
    <!-- start: content -->
    <div id="content">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-6 col-sm-12">
                    <h3 class="animated fadeInLeft">Customer Service</h3>
                    <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>

                    <ul class="nav navbar-nav">
                        <li><a href="">Impedit</a></li>
                        <li><a href="" class="active">Virtute</a></li>
                        <li><a href="">Euismod</a></li>
                        <li><a href="">Explicar</a></li>
                        <li><a href="">Rebum</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
                        <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Banyumas</h3>
                        <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="wheather">
                            <div class="stormy rainy animated pulse infinite">
                                <div class="shadow">

                                </div>
                            </div>
                            <div class="sub-wheather">
                                <div class="thunder">

                                </div>
                                <div class="rain">
                                    <div class="droplet droplet1"></div>
                                    <div class="droplet droplet2"></div>
                                    <div class="droplet droplet3"></div>
                                    <div class="droplet droplet4"></div>
                                    <div class="droplet droplet5"></div>
                                    <div class="droplet droplet6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="padding:20px;">
            <div class="col-md-12 padding-0">
                <div class="col-md-8 padding-0">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                    <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                        <h4 class="text-left">Visit</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                        <h4>
                                            <span class="icon-user icons icon text-right"></span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="panel-body text-center">
                                    <h1>51181,320</h1>
                                    <p>User active</p>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel box-v1">
                                <div class="panel-heading bg-white border-none">
                                    <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                        <h4 class="text-left">Orders</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                        <h4>
                                            <span class="icon-basket-loaded icons icon text-right"></span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="panel-body text-center">
                                    <h1>51181,320</h1>
                                    <p>New Orders</p>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel box-v4">
                            <div class="panel-heading bg-white border-none">
                                <h4><span class="icon-notebook icons"></span> Agenda</h4>
                            </div>
                            <div class="panel-body padding-0">
                                <div class="col-md-12 col-xs-12 col-md-12 padding-0 box-v4-alert">
                                    <h2>Checking Your Server!</h2>
                                    <p>Daily Check on Server status, mostly looking at servers with alerts/warnings</p>
                                    <b><span class="icon-clock icons"></span> Today at 15:00</b>
                                </div>
                                <div class="calendar">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 padding-0">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                                <img src="{{asset('/avi-dveri_assets/backend/img/bg2.jpg')}}"
                                     class="box-v2-cover img-responsive"/>
                                <div class="box-v2-detail">
                                    <img src="{{asset('/avi-dveri_assets/backend/img/avatar.jpg')}}"
                                         class="img-responsive"/>
                                    <h4>Akihiko Avaron</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12 padding-0 text-center">
                                    <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                        <h3>2.000</h3>
                                        <p>Post</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                        <h3>2.232</h3>
                                        <p>share</p>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                        <h3>4.320</h3>
                                        <p>photos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 padding-0">
                        <div class="panel box-v3">
                            <div class="panel-heading bg-white border-none">
                                <h4>Report</h4>
                            </div>
                            <div class="panel-body">

                                <div class="media">
                                    <div class="media-left">
                                        <span class="icon-folder icons" style="font-size:2em;"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Document Handling</h5>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="10"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <span class="icon-pie-chart icons" style="font-size:2em;"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">UI/UX Development</h5>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="19" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 19%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <span class="icon-energy icons" style="font-size:2em;"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Server Optimation</h5>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                 aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 55%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <span class="icon-user icons" style="font-size:2em;"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">User Status</h5>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:20%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <span class="icon-fire icons" style="font-size:2em;"></span>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Firewall Status</h5>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 90%;">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer bg-white border-none">
                                <center>
                                    <input type="button" value="download as pdf"
                                           class="btn btn-danger box-shadow-none"/>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 padding-0">
                        <div class="panel bg-light-blue">
                            <div class="panel-body text-white">
                                <p class="animated fadeInUp quote">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                    elit Ut wisi..."</p>
                                <div class="col-md-12 padding-0">
                                    <div class="text-left col-md-7 col-xs-12 col-sm-7 padding-0">
                                        <span class="fa fa-twitter fa-2x"></span>
                                        <span>22 May, 2015 via mobile</span>
                                    </div>
                                    <div style="padding-top:8px;"
                                         class="text-right col-md-5 col-xs-12 col-sm-5 padding-0">
                                        <span class="fa fa-retweet"></span> 2000
                                        <span class="fa fa-star"></span> 3000
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 card-wrap padding-0">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                                <h4>Line Chart</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="mini-onoffswitch pull-right onoffswitch-danger" style="margin-top:10px;">
                                    <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox"
                                           id="myonoffswitch1" checked>
                                    <label class="onoffswitch-label" for="myonoffswitch1"></label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="padding-bottom:50px;">
                            <div id="canvas-holder1">
                                <canvas class="line-chart" style="margin-top:30px;height:200px;"></canvas>
                            </div>
                            <div class="col-md-12" style="padding-top:20px;">
                                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                                    <h2 style="line-height:.4;">$100.21</h2>
                                    <small>Total Laba</small>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                                    <h2 style="line-height:.4;">2000</h2>
                                    <small>Total Barang</small>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <h2 style="line-height:.4;">$291.1</h2>
                                    <small>Total Pengeluaran</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                                <h4>Orders</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="mini-onoffswitch pull-right onoffswitch-primary" style="margin-top:10px;">
                                    <input type="checkbox" name="onoffswitch3" class="onoffswitch-checkbox"
                                           id="myonoffswitch3" checked>
                                    <label class="onoffswitch-label" for="myonoffswitch3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="padding-bottom:50px;">
                            <div id="canvas-holder1">
                                <canvas class="bar-chart"></canvas>
                            </div>
                            <div class="col-md-12 padding-0">
                                <div class="col-md-4 col-sm-4 hidden-xs" style="padding-top:20px;">
                                    <canvas class="doughnut-chart2"></canvas>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <h4>Progress Produksi barang</h4>
                                    <p>Sed hendrerit. Curabitur blandit mollis lacus. Duis leo. Sed libero.fusce commodo
                                        aliquam arcu..</p>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel bg-green text-white">
                    <div class="panel-body">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="maps" style="height:300px;">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <canvas class="doughnut-chart hidden-xs"></canvas>
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <h1>72.993</h1>
                                    <p>People</p>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <h1>12.000</h1>
                                    <p>Active</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: content -->
@endsection

