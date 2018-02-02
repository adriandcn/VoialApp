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
            <h1>{{trans('publico/labels.tittleLoaderDetails')}}</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      @if(session('device') != 'mobile')
        <br>
        <br>
        <br>
        <br>
        <br>
      @endif
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-6">
              <div class="range range-60">
                <div class="cell-lg-10">
                  <h6><i class="fa fa-user"></i> {{trans('publico/labels.lblLogIn')}}</h6>
                  <!-- RD Mailform-->
                  <form class="rd-mailform" id="formLogin" action="{{$serverDir}}public/auth/loginr" method="POST">
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
                        <div id="restoreForm">
                          <div class="form-wrap">
                            <label class="form-label-outside" for="pass">
                              <i class="fa fa-envelope"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblPassRestore')}}</label>
                            <input class="form-input" id="passRestore" type="text" name="passRestore" data-constraints="@Required">
                          </div>
                          <div class="group-buttons-3" style="text-align: right;">
                            <button class="button-primary button" type="button" onclick="sendRestorePassword(event)">
                              <div style="display: inline; " id="spinnerRestore">
                                <i class="fa fa-spinner fa-spin"></i>
                              </div>
                              {{ trans('publico/labels.lblBtnRestore')}}
                              <span></span>
                            </button>
                            <button class="button-primary button" type="button" onclick="showRestorePassword(event)">
                              {{ trans('publico/labels.lblBtnCancel')}}
                              <span></span>
                            </button>
                          </div>
                        </div>
                        <div class="form-wrap" style="text-align: right;" id="restorePassLink">
                          <a href="" onclick="showRestorePassword(event)">{{ trans('publico/labels.lblPassRestoreLink')}}</a>
                        </div>
                        <div class="rowerrorLogin" style="margin-top: 10px;"></div>
                        <div class="group-buttons-3 group-md-justify">
                          <input type="hidden" id="messageOK" value="{{trans('publico/labels.msgOkRestore')}}">
                          <input type="hidden" id="messageError" value="{{trans('publico/labels.msgErrorRestore')}}">
                          <input type="hidden" id="messageErrorUser" value="{{trans('publico/labels.messageErrorUserRestore')}}">
                          <button class="button-primary button" type="submit">
                            <div style="display: inline;" id="spinnerLogin">
                              <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            {{ trans('publico/labels.lblLogIn')}}
                            <span></span></button>
                          <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-facebook" href="{{url('/redirect/L')}}" target="_blank">
                            {{ trans('publico/labels.btnLogInFacebook')}}
                            <span></span>
                          </a>
                        </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="cell-md-6">
              <h6> <i class="fa fa-plus"></i> {{ trans('publico/labels.lblRegister')}}</h6>
              <!-- RD Mailform-->
              <form class="rd-mailform" id="formRegister" action="{{$serverDir}}public/auth/registerr">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-name-4">{{ trans('publico/labels.lblName')}}</label>
                          <input class="form-input tooltip" id="login-name-4" type="text" name="name" data-constraints="@Required" title="Ingresa tu nombre Ej: Juan">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" >{{ trans('publico/labels.lblUsername')}}</label>
                          <input class="form-input tooltip" type="text" name="username" data-constraints="@Required" title="Ingresa tu nombre de usuario con el que ingresaras al sistema Ej: juan18">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-4">{{ trans('publico/labels.lblEmail')}}</label>
                          <input class="form-input tooltip" id="login-email-4" type="email" name="email" data-constraints="@Email" title="Ingresa tu email, recuerda que enviaremos un email de confirmación Ej: juan18@midominio.com">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" >{{ trans('publico/labels.lblEmailConfirmation')}}</label>
                          <input class="form-input tooltip" id="login-email-confirmation" type="email" name="email_confirmation" data-constraints="@Email" title="Repite tu email, procura que coicida con el anterior email Ej: juan18@midominio.com">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-password-4">{{ trans('publico/labels.lblPassword')}}</label>
                          <input class="form-input tooltip" id="login-password-4" type="password" name="password" data-constraints="@Required" title="Ingresa tu contraseña, recuerda que debe ser mayor a 6 caracteres Ej: 123Abc18@XYZ">
                          <input class="form-input" id="system" type="hidden" name="system" value="VOILAPP">
                        </div>
                        <div class="rowerrorRegister" style="margin-top: 10px"></div>
                        <div class="group-buttons-3 group-md-justify">
                            <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-facebook" href="{{url('/redirect/R')}}" target="_blank">
                                {{ trans('publico/labels.btnRegisterFacebook')}}
                                <span></span>
                            </a>
                            <button class="button-primary button" type="submit">
                                <div style="display: inline;" id="spinnerRegister">
                                  <i class="fa fa-spinner fa-spin"></i>
                                </div>
                                {{ trans('publico/labels.lblRegister')}}
                                <span></span>
                            </button>
                        </div>
                    </div>
                    </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>