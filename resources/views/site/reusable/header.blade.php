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
                      <a href="#" data-toggle="modal" data-target="#form-modal-1">
                        {{ trans('publico/labels.lblLogIn')}}
                      </a>
                      <a href="#" data-toggle="modal" data-target="#form-modal-2">
                        {{ trans('publico/labels.lblRegister')}}
                      </a>
                      <a href="{!!asset('/language')!!}">
                        {{ trans('publico/labels.lblLanguage')}}
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
                    @if(session('statut') == 'user')
                      <li>
                        <a class="icon fa fa-tachometer text-white" href="{!!asset('/serviciosres')!!}"> 
                          Dashboard
                        </a>
                      </li>
                      <li>
                        <a class="icon fa fa-sign-out  text-white" href="{!!asset('/auth/logout')!!}">
                          Salir
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
                  <div class="rd-navbar-brand"><a class="brand-name" href="{{asset('/')}}"><img class="logo-long" src="{{asset('/siteStyle/images/logo-white-209x19.png')}}" alt="" width="209" height="19"/><img class="logo-short" src="{{asset('/siteStyle/images/logo-white-209x19.png')}}" alt="" width="123" height="34"/></a></div>
                </div>
                <div class="rd-navbar-aside-right">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li><a href="{{asset('/')}}">Home<span class="overlay-skew"></span></a>
                      </li>
                      <li><a href="">Contactos<span class="overlay-skew"></span></a>
                      </li>
                      @if(session('device') == 'mobile')
                        <li class="active"><a href="#">Categorias<span class="overlay-skew"></span></a>
                          <ul class="rd-navbar-megamenu">
                            @foreach($headerCategories as $category)
                            <li>
                              @if(count($category->child) > 0)
                                <a href="#">{{$category->nombre_servicio}}<span class="overlay-skew"></span></a>
                              @endif
                              <ul class="rd-navbar-megamenu">
                                @if(count($headerCategories) > 0)
                                  @foreach($category->child as $childCat)
                                    <li><a href="{!!asset('/catalogoServ')!!}/{{$childCat->id_padre}}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
                                  @endforeach
                                @endif
                              </ul>
                            </li>
                            @endforeach
                          </ul>
                        </li>
                      @else
                        <li class="active"><a href="#">Categorias<span class="overlay-skew"></span></a>
                          <ul class="rd-navbar-megamenu">
                            @foreach($headerCategories as $category)
                            <li>
                              @if(count($category->child) > 0)
                                <p class="rd-megamenu-header">{{$category->nombre_servicio}}</p>
                              @endif
                              <ul class="rd-megamenu-list">
                                @if(count($headerCategories) > 0)
                                  @foreach($category->child as $childCat)
                                    <li><a href="{!!asset('/catalogoServ')!!}/{{$childCat->id_padre}}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
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
              <div class="modal modal-custom fade" id="form-modal-1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <div class="modal-header">
                      <h5>{{ trans('publico/labels.lblLogIn')}}</h5>
                    </div>
                    <div class="modal-body">
                      <form class="rd-mailform" id="formLogin" action="{{$serverDir}}/voialApp/public/auth/loginr" method="POST">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="log">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblUser')}}
                          </label>
                          <input class="form-input" id="log" type="text" name="log" data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="pass">
                            <i class="fa fa-key"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblPass')}}</label>
                          <input class="form-input" id="pass" type="password" name="password" data-constraints="@Required">
                        </div>
                        <div class="rowerror1"></div>
                        <div class="button-wrap text-right">
                          <button class="button-primary button" type="submit">{{ trans('publico/labels.lblLogIn')}}<span></span></button>
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
                      <h5>{{ trans('publico/labels.lblRegister')}}</h5>
                    </div>
                    <div class="modal-body">
                      <form class="rd-mailform" id="formRegister" action="{{$serverDir}}/voialApp/public/auth/registerr">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-name-4">{{ trans('publico/labels.lblName')}}</label>
                          <input class="form-input tooltip" id="login-name-4" type="text" name="name" data-constraints="@Required" title="Ingresa tu nombre Ej: Juan">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-username-4">{{ trans('publico/labels.lblUsername')}}</label>
                          <input class="form-input tooltip" id="login-username-4" type="text" name="username" data-constraints="@Required" title="Ingresa tu nombre de usuario con el que ingresaras al sistema Ej: juan18">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-4">{{ trans('publico/labels.lblEmail')}}</label>
                          <input class="form-input tooltip" id="login-email-4" type="email" name="email" data-constraints="@Email" title="Ingresa tu email, recuerda que enviaremos un email de confirmación Ej: juan18@midominio.com">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-confirmation">{{ trans('publico/labels.lblEmailConfirmation')}}</label>
                          <input class="form-input tooltip" id="login-email-confirmation" type="email" name="email_confirmation" data-constraints="@Email" title="Repite tu email, procura que coicida con el anterior email Ej: juan18@midominio.com">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-password-4">{{ trans('publico/labels.lblPassword')}}</label>
                          <input class="form-input tooltip" id="login-password-4" type="password" name="password" data-constraints="@Required" title="Ingresa tu contraseña, recuerda que debe ser mayor a 6 caracteres Ej: 123Abc18@XYZ">
                          <input class="form-input" id="system" type="hidden" name="system" value="VOILAPP">
                        </div>
                        <div class="rowerror1"></div>
                        <div class="button-wrap text-right">
                          <button class="button-primary button" type="submit">{{ trans('publico/labels.lblRegister')}}<span></span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
      </header>
      <script>
      $(document).ready(function() {
        new jBox('Tooltip', {
          attach: '.tooltip',
          closeOnMouseleave: true,
          closeButton: true
        });
      });
    </script>