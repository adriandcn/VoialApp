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
                    {{ trans('publico/labels.label147')}}
                    </div>
                    <span></span>
                  </a>
                  <form class="rd-search" action="{!!asset('/Search')!!}" data-search-live="rd-search-results-live" method="GET">
                    <div class="form-wrap">
                      <label class="form-label form-label" for="rd-navbar-search-form-input">{{ trans('publico/labels.label147')}}</label>
                      <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="on">
                    </div>
                    <button class="rd-search-form-submit fa-search"></button>
                  </form>
                </div>
                <div class="rd-navbar-collapse">
                  <div class="forms-modal">
                    @if(session('statut') == 'visitor')
                      <a href="#" data-toggle="modal" data-target="#form-modal-1">
                        {{ trans('publico/labels.label148')}}
                      </a>
                      <a href="#" data-toggle="modal" data-target="#form-modal-2">
                        {{ trans('publico/labels.label149')}}
                      </a>
                    @else
                      <a href="{!!asset('/serviciosres')!!}" data-toggle="modal">
                        {!!session('user_name')!!}
                      </a>
                    @endif
                  </div>
                  <ul class="list-inline">
                    @if(session('statut') == 'user')
                      <li><a class="icon fa fa-tachometer text-white" href="{!!asset('/serviciosres')!!}"> Dashboard</a></li>
                      <li><a class="icon fa fa-sign-out  text-white" href="{!!asset('/auth/logout')!!}"> Salir</a></li>
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
                  <div class="rd-navbar-brand"><a class="brand-name" href="{{asset('/')}}"><img class="logo-long" src="{{asset('/siteStyle/images/logo-white-209x19.png')}}" alt="" width="209" height="19"/><img class="logo-short" src="{{asset('/siteStyle/images/logo-white-209x19.png')}}" alt="" width="123" height="34"/></a></div>
                </div>
                <div class="rd-navbar-aside-right">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li><a href="{{asset('/')}}">Home<span class="overlay-skew"></span></a>
                      </li>
                      <li><a href="">Contactos<span class="overlay-skew"></span></a>
                      </li>
                      <li class="active"><a href="">Categorias<span class="overlay-skew"></span></a>
                        <ul class="rd-navbar-megamenu">
                          @foreach($headerCategories as $category)
                          <li>
                            <p class="rd-megamenu-header">{{$category->nombre_servicio}}</p>
                            <ul class="rd-megamenu-list">
                              @if(count($headerCategories)>0)
                                @foreach($category->child as $childCat)
                                  <li><a href="{!!asset('/catalogoServ')!!}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
                                @endforeach
                              @endif
                            </ul>
                          </li>
                          @endforeach
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
              <div class="modal modal-custom fade" id="form-modal-1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <div class="modal-header">
                      <h5>{{ trans('publico/labels.label148')}}</h5>
                    </div>
                    <div class="modal-body">
                      <form class="rd-mailform" id="formLogin" action="{{$serverDir}}voialApp/public/auth/loginr" method="POST">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="log">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;{{ trans('publico/labels.labelUser')}}
                          </label>
                          <input class="form-input" id="log" type="text" name="log" data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="pass">
                            <i class="fa fa-key"></i>&nbsp;&nbsp;{{ trans('publico/labels.labelPass')}}</label>
                          <input class="form-input" id="pass" type="password" name="password" data-constraints="@Required">
                        </div>
                        <div class="rowerror1"></div>
                        <div class="button-wrap text-right">
                          <button class="button-primary button" type="submit">{{ trans('publico/labels.label148')}}<span></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal modal-custom fade" id="form-modal-2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <div class="modal-header">
                      <h5>{{ trans('publico/labels.label149')}}</h5>
                    </div>
                    <div class="modal-body">
                      <form class="rd-mailform" id="formRegister" action="{{$serverDir}}voialApp/public/auth/registerr">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-name-4">{{ trans('publico/labels.labelName')}}</label>
                          <input class="form-input" id="login-name-4" type="text" name="name" data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-username-4">{{ trans('publico/labels.labelUsername')}}</label>
                          <input class="form-input" id="login-username-4" type="text" name="username" data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-4">{{ trans('publico/labels.labelEmail')}}</label>
                          <input class="form-input" id="login-email-4" type="email" name="email" data-constraints="@Email">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-4">{{ trans('publico/labels.labelEmailConfirmation')}}</label>
                          <input class="form-input" id="login-email-4" type="email" name="email_confirmation" data-constraints="@Email">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-password-4">{{ trans('publico/labels.labelPassword')}}</label>
                          <input class="form-input" id="login-password-4" type="password" name="password" data-constraints="@Required">
                          <input class="form-input" id="system" type="hidden" name="system" value="VOILAPP">
                        </div>
                        <div class="rowerror1"></div>
                        <div class="button-wrap text-right">
                          <button class="button-primary button" type="submit">{{ trans('publico/labels.label149')}}<span></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
      </header>