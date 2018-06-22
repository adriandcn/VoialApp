<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
  </head>
   <body>
    <!-- Page-->
    <div class="text-center text-sm-left page">
      <!-- Page preloader-->
      <div class="page-loader">
        <div>
          <div class="page-loader-body">
            <div class="center" id="loop1"></div>
            <div class="center" id="bike-wrapper">
              <div class="centerBike" id="bike"></div>
            </div>
            <h1>{{trans('publico/labels.LoaderTitleSearch')}}</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            @if($despliegue != null)
            <p class="big text-width-medium">{{trans('publico/labels.resultTittle')}} <strong style="color: #c26933">{{$despliegue->total()}}</strong>
              @if($despliegue->total() == 1)
                {{trans('publico/labels.singularResult')}}
              @else
                {{trans('publico/labels.pluralResult')}}
              @endif
               {{trans('publico/labels.resultTittleFor')}}  : <strong style="color: #c26933">{{ app('request')->input('s') }}</strong>
             </p>
             @else
              <p class="big text-width-medium">{{trans('publico/labels.noResult')}} {{trans('publico/labels.resultTittleFor')}}
               : <strong style="color: #c26933">{{ app('request')->input('s') }}</strong>
              </p>
             @endif
             <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li>{{ trans('publico/labels.lblPathSearch')}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-12">
              <div class="range range-60">
                <div class="cell-xs-12">
                  <h6>{{trans('publico/labels.lblSearch')}}</h6>
                  <!-- <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php"> -->
                    <div class="range range-15">
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">{{trans('publico/labels.lblCriterio')}}</label>
                            <input class="form-input" id="txtQuery" type="text" name="txtQuery" value="{{app('request')->input('s')}}" >
                          </div>
                          <!-- <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-filter" data-toggle="modal" data-target="#filter">Aplicar filtros<span></span></button> -->
                          <button class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" onclick="sendSearch($('#txtQuery').val())">{{trans('publico/labels.btnSearch')}}<span></span></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <br>
                      <hr>
                      <i class="fa fa-list"></i>&nbsp;&nbsp; {{trans('publico/labels.titleResults')}}
                      <br>
                      <br>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <h3>SERVICIOS</h3>
                        <hr>
                        <br>
                          @if($despliegue != null)
                              @if($despliegue->total() > 0)
                                    @foreach ($despliegue->items() as $serv)
                                       <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                        <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image  post-skew-right-top post-skew-var-4" style="background: url('images/fullsize/{{($serv->filename != null) ?$serv->filename:'default_service.png'}}');
                                            background-size: cover;
                                            background-repeat: no-repeat;
                                            min-height: 200px;
                                            cursor: pointer;
                                            margin-bottom: 20px;" onclick="openDetailOnClick({{$serv->id}})">
                                          <div class="post-masonry-content">
                                          </div>
                                          <h6 class="" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">
                                            <a href="{!!asset('/detalles-de-servicio')!!}/{{$serv->id}}" style="color:white;">{{strtoupper($serv->nombre_servicio)}}
                                            </a>
                                          </h6>
                                          <span class="badge" style="color:white;background: #c26933;">{{$serv->especialidad}}</span>
                                        </div>
                                      </div>   
                                    @endforeach
                                    @if ($despliegue->lastPage() > 1)
                                        <ul class="pagination">
                                            <li class="{{ ($despliegue->currentPage() == 1) ? ' disabled' : '' }}">
                                                <a href="{{ $despliegue->url(1) }}&s={{app('request')->input('s')}}">Atras</a>
                                            </li>
                                            @for ($i = 1; $i <= $despliegue->lastPage(); $i++)
                                                <li class="{{ ($despliegue->currentPage() == $i) ? ' active' : '' }}">
                                                    <a href="{{ $despliegue->url($i) }}&s={{app('request')->input('s')}}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="{{ ($despliegue->currentPage() == $despliegue->lastPage()) ? ' disabled' : '' }}">
                                                <a href="{{ $despliegue->url($despliegue->currentPage()+1) }}&s={{app('request')->input('s')}}" >Siguiente</a>
                                            </li>
                                        </ul>
                                    @endif
                                @else
                                 <div class="col-xs-12" style="text-align: center;">
                                  <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                                </div>
                              @endif
                            @else
                               <div class="col-xs-12" style="text-align: center;">
                                <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                              </div>
                            @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                          <!-- despliegue posts -->
                        <h3>POSTS</h3>
                        <hr>
                        <br>
                        @if($desplieguePosts != null)
                          @if($desplieguePosts->total() > 0)
                                @foreach ($desplieguePosts->items() as $post)
                                   <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                    <div class="post-masonry post-masonry-short post-content-white bg-post-2 bg-image  post-skew-right-top post-skew-var-4" style="background: url('images/{{($post->filename != null) ?$post->filename:'PostIcon.png'}}');
                                background-size: contain;
                                background-repeat: no-repeat;
                                min-height: 200px;
                                cursor: pointer;
                                margin-bottom: 20px;" onclick="openDetailOnClick({{$post->id}})">
                                      <div class="post-masonry-content">
                                      </div>
                                      <h6 class="" style="color: #fff; text-shadow: 3px -1px 2px #1b1b1b;">
                                        <a href="{!!asset('/detalles-de-post')!!}/{{$post->id}}" style="color:white;">{{strtoupper($post->title)}}</a>
                                      </h6>
                                    </div>
                                  </div>   
                                @endforeach
                                @if ($desplieguePosts->lastPage() > 1)
                                    <ul class="pagination">
                                        <li class="{{ ($desplieguePosts->currentPage() == 1) ? ' disabled' : '' }}">
                                            <a href="{{ $desplieguePosts->url(1) }}&s={{app('request')->input('s')}}">Atras</a>
                                        </li>
                                        @for ($i = 1; $i <= $desplieguePosts->lastPage(); $i++)
                                            <li class="{{ ($desplieguePosts->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{ $desplieguePosts->url($i) }}&s={{app('request')->input('s')}}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="{{ ($desplieguePosts->currentPage() == $desplieguePosts->lastPage()) ? ' disabled' : '' }}">
                                            <a href="{{ $desplieguePosts->url($desplieguePosts->currentPage()+1) }}&s={{app('request')->input('s')}}" >Siguiente</a>
                                        </li>
                                    </ul>
                                @endif
                            @else
                             <div class="col-xs-12" style="text-align: center;">
                              <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                            </div>
                          @endif
                        @else
                           <div class="col-xs-12" style="text-align: center;">
                            <h4><a href=""><i class="fa fa-frown-o "></i> &nbsp;&nbsp;{{trans('publico/labels.noResult')}}</a></h4>
                          </div>
                        @endif
                        </div>
                    </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="modal modal-custom fade" id="filter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="width: 80%;">
          <div class="modal-content">
            <div id="testboxForm">
              <div class="modal-header">
              <h3 class="modal-title">
                {{trans('publico/labels.btnFilter')}}
              </h3>
              </div>
            <div class="modal-body">
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="range range-15">
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">{{trans('publico/labels.lblCriterio')}}</label>
                            <input class="form-input" id="txtQuery" type="text" name="txtQuery" value="{{app('request')->input('s')}}" >
                          </div>
                        </div>
                      </div>
                      <div class="cell-sm-12">
                        <div class="form-inline form-inline-custom">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="contact-email">
                              {{trans('publico/labels.servTypes')}}
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-search" style="float: right;" href="#" onclick="sendSearch($('#txtQueryModal').val())">
                  {{trans('publico/labels.btnSearch')}}
                  <span></span>
              </a>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>