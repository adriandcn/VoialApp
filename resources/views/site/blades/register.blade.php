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
            <div class="cell-md-3">
            </div>
            <div class="cell-md-6">
              <h6> <i class="fa fa-plus"></i> {{ trans('publico/labels.lblRegister')}}</h6>
              <!-- RD Mailform-->
              <form class="rd-mailform" id="formRegister" action="{{$serverDir}}public/auth/registerr">
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-name-4">{{ trans('publico/labels.lblName')}}</label>
                          <input class="form-input tooltip" id="login-name-4" type="text" name="name" data-constraints="@Required" title="{{trans('publico/labels.altRegisterName')}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" >{{ trans('publico/labels.lblUsername')}}</label>
                          <input class="form-input tooltip" type="text" name="username" data-constraints="@Required" title="{{trans('publico/labels.altRegisterUsername')}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-email-4">{{ trans('publico/labels.lblEmail')}}</label>
                          <input class="form-input tooltip" id="login-email-4" type="email" name="email" data-constraints="@Email" title="{{trans('publico/labels.altRegisterEmail')}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" >{{ trans('publico/labels.lblEmailConfirmation')}}</label>
                          <input class="form-input tooltip" id="login-email-confirmation" type="email" name="email_confirmation" data-constraints="@Email" title="{{trans('publico/labels.altRegisterConfirmation')}}">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-password-4">{{ trans('publico/labels.lblPassword')}}</label>
                          <input class="form-input tooltip" id="login-password-4" type="password" name="password" data-constraints="@Required" title="{{trans('publico/labels.altRegisterPassword')}}">
                          <input class="form-input" id="system" type="hidden" name="system" value="VOILAPP">
                        </div>
                        <div class="form-wrap">
                          <label class="form-label-outside" for="login-password-4"><input type="checkbox" name="acceptTerms" id="accepTermsCheck" /> <a href="{{asset('/contacts')}}">{{ trans('publico/labels.lblRegisterTems')}}</a></label>
                        </div>
                        <div class="rowerrorRegister" style="margin-top: 10px"></div>
                        <div class="group-buttons-3 group-md-justify" id="btnRegisterDiv">
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