<header class="page-header rd-navbar-default">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="80px" data-lg-stick-up-offset="46px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true">
            <div class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-top-panel">
              <div class="rd-navbar-top-panel-inner">
                <div class="rd-navbar-search">
                  <a class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search" href="#">
                    <div class="search-content">
                    {{ trans('publico/labels.lblSearch')}}
                    </div>
                    <span></span>
                  </a>
                  <form class="rd-search" action="{!!asset('/Search')!!}" data-search-live="rd-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label form-label" for="rd-navbar-search-form-input">{{ trans('publico/labels.lblSearch')}}</label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="on">
                    </div>
                    <button class="rd-search-form-submit fa-search"></button>
                  </form>
                </div>
                <div class="rd-navbar-collapse">
                  <div class="forms-modal">
                    @if(session('statut') == 'visitor')
                      <a href="{!!asset('/login')!!}">
                        {{ trans('publico/labels.lblLogIn')}}
                      </a>
                      <a href="{!!asset('/Register')!!}">
                        {{ trans('publico/labels.lblRegister')}}
                      </a>
                      <a href="{!!asset('/language')!!}">
                        @if(session('locale') == 'es')
                          <img src="{{asset('/siteStyle/images/english-flag.png')}}" alt=""/>
                        @else
                          <img src="{{asset('/siteStyle/images/espanol-flag.png')}}" alt=""/>
                        @endif
                      </a>
                    @else
                      <a href="{!!asset('/createOperador')!!}" data-toggle="modal">
                        {!!session('user_name')!!}
                      </a>
                      <a href="{!!asset('/language')!!}">
                        @if(session('locale') == 'es')
                          <img src="{{asset('/siteStyle/images/english-flag.png')}}" alt=""/>
                        @else
                          <img src="{{asset('/siteStyle/images/espanol-flag.png')}}" alt=""/>
                        @endif
                      </a>
                    @endif
                  </div>
                  <ul class="list-inline">
                    @if(session('statut') == 'user' || session('statut') == 'admin')
                      <li>
                        <a class="icon fa fa-tachometer text-white" href="{!!asset('/serviciosres')!!}"> 
                          {{ trans('publico/labels.lblDash')}}
                        </a>
                      </li>
                      <li>
                        <a class="icon fa fa-sign-out  text-white" href="{!!asset('/auth/logout')!!}">
                          {{ trans('publico/labels.lblLogOut')}}
                        </a>
                      </li>
                    @endif
                    @if(session('device') == 'mobile')
                      <br>
                    @endif
                    <li><a class="icon fa fa-facebook text-white" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus text-white" href="#"></a></li>
                    <li><a class="icon fa fa-linkedin text-white" href="#"></a></li>
                    <li><a class="icon fa fa-twitter text-white" href="#"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <div class="rd-navbar-aside-wrap">
                <div class="rd-navbar-panel">
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <div class="rd-navbar-brand"><a class="brand-name" href="{{asset('/')}}"><img class="logo-long" src="{{asset('/siteStyle/images/logo_azul.png')}}" alt="" width="209" height="19"/><img class="logo-short" src="{{asset('/siteStyle/images/logo_azul.png')}}" alt="" width="123" height="34"/></a></div>
                </div>
                <div class="rd-navbar-aside-right">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}<span class="overlay-skew"></span></a>
                      </li>
                      <li><a href="{{asset('/contacts')}}">{{ trans('publico/labels.lblContact')}}<span class="overlay-skew"></span></a>
                      <!-- <li><a href="../Blog">{{ trans('publico/labels.lblBlog')}}<span class="overlay-skew"></span></a> -->
                      </li>
                      @if(session('device') == 'mobile')
                        <li class="active"><a href="#">{{ trans('publico/labels.lblCate')}}<span class="overlay-skew"></span></a>
                          <ul class="rd-navbar-megamenu">
                            @foreach($headerCategories as $category)
                            <li>
                              @if(count($category->child) > 0)
                                <a href="#">{{$category->nombre_servicio}}<span class="overlay-skew"></span></a>
                              @endif
                              <ul class="rd-navbar-megamenu">
                                @if(count($headerCategories) > 0)
                                  @foreach($category->child as $childCat)
                                    <li><a href="{!!asset('/catalogoServ')!!}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
                                  @endforeach
                                @endif
                              </ul>
                            </li>
                            @endforeach
                          </ul>
                        </li>
                      @else
                        <li class="active"><a href="#">{{ trans('publico/labels.lblCate')}}<span class="overlay-skew"></span></a>
                          <ul class="rd-navbar-megamenu">
                            @foreach($headerCategories as $category)
                            <li>
                              @if(count($category->child) > 0)
                                <p class="rd-megamenu-header">{{$category->nombre_servicio}}</p>
                              @endif
                              <ul class="rd-megamenu-list">
                                @if(count($headerCategories) > 0)
                                  @foreach($category->child as $childCat)
                                    <li><a href="{!!asset('/catalogoServ')!!}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
                                  @endforeach
                                @endif
                              </ul>
                            </li>
                            @endforeach
                          </ul>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
</header>
<input type="hidden" id="serverDir" value="{{$serverDir}}">
<script>
      $(document).ready(function() {
        new jBox('Tooltip', {
          attach: '.tooltip',
          closeOnMouseleave: true,
          closeButton: true
        });
      });
</script>