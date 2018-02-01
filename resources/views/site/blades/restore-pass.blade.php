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
                        <div class="range range-60">
                            <div class="cell-lg-10">
                                <h6><i class="fa fa-user"></i> {{trans('publico/labels.lblRestorePassForm')}}</h6>
                                <!-- RD Mailform-->
                                <form class="rd-mailform" id="formLogin" action="{{$serverDir}}public/restorePassword" method="POST">
                                    <div class="form-wrap">
                                        <label class="form-label-outside" for="log">
                                            <i class="fa fa-key"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblNewPass')}}
                                        </label>
                                        <input class="form-input" id="pass" type="password" name="pass" data-constraints="@Required">
                                    </div>
                                    <div class="form-wrap">
                                        <label class="form-label-outside" for="pass2">
                                            <i class="fa fa-key"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblNewPass2')}}</label>
                                        <input class="form-input" id="pass2" type="password" name="password" data-constraints="@Required">
                                    </div>
                                    <div class="rowerrorLogin" style="margin-top: 10px;"></div>
                                    <div class="group-buttons-3 group-md-justify">
                                        <input type="hidden" id="msgOkUpdatePass" value="{{trans('publico/labels.msgOkUpdatePass')}}">
                                        <input type="hidden" id="messageErrorUpdatePass" value="{{trans('publico/labels.messageErrorUpdatePass')}}">
                                        <input type="hidden" id="msgPassNotEqual" value="{{trans('publico/labels.messagePassNotEqual')}}">
                                        <input type="hidden" id="emailUpdate" value="{{$email}}">
                                        <button class="button-primary button" type="button" onclick="changePassword(event)">
                                            <div style="display: inline;" id="spinnerChange">
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </div>
                                            {{ trans('publico/labels.lblBtnUpdatePass')}}
                                            <span></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
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