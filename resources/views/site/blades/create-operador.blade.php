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
            <h1>{{trans('back/admin.lblLoaderCreateOperador')}}</h1>
          </div>
        </div>
      </div>
      <!-- Page Header-->
      <!-- Modal-->
      @include('site.reusable.header')
      <!-- Breadcrumbs & Page title-->
      <section class="page-title breadcrumbs-elements page-title-inset-1">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{trans('back/admin.titleOperadorHeaderPage')}}</div>
            <!-- <p class="big text-width-medium">Completa los siguientes datos de operador</p> -->
          </div>
        </div>
      </section>

      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range range-50">
            <div class="cell-md-2">
            </div>
            <div class="cell-md-8">
              <h6><i class="fa fa-user"></i>&nbsp;&nbsp;{{trans('back/admin.titleResposableInfo')}}</h6>
              <!-- RD Mailform-->
              <form class="rd-mailform" id="form-add-operador" action="{{$serverDir}}/voialApp/public/nuevoOperador">
                <div class="range range-15">
                  <div class="cell-sm-7">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="contact-first-name-3">{{trans('back/admin.lblFullNamePerson1')}}</label>
                      <input class="form-input tooltip" id="contact-first-name-3" type="text" name="nombre_contacto_operador_1" data-constraints="@Required" placeholder="{{trans('back/admin.placeHolderFullNamePerson1')}}" title="{{trans('back/admin.altFullNamePerson1')}}" value="{{$operador[0]->nombre_contacto_operador_1}}">
                      <input type="hidden" name="id_usuario_op" value="{{$operador[0]->id_usuario_op}}">
                    </div>
                  </div>
                  <div class="cell-sm-5">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="forms-phone">{{trans('back/admin.lblPhonePerson1')}}</label>
                      <input class="form-input tooltip" id="forms-phone" type="text" name="telf_contacto_operador_1" data-constraints="@Numeric @Required" placeholder="{{trans('back/admin.placeHolderPhonePerson1')}}" title="{{trans('back/admin.altPhonePerson1')}}" value="{{$operador[0]->telf_contacto_operador_1}}">
                    </div>
                  </div>
                  <div class="cell-sm-7">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="contact-first-name-3">{{trans('back/admin.lblFullNamePerson2')}}</label>
                      <input class="form-input tooltip" id="contact-first-name-3" type="text" name="nombre_contacto_operador_2" placeholder="{{trans('back/admin.placeHolderFullNamePerson1')}}" title="{{trans('back/admin.altFullNamePerson1')}}" value="{{$operador[0]->nombre_contacto_operador_1}}" value="{{$operador[0]->nombre_contacto_operador_2}}">
                    </div>
                  </div>
                  <div class="cell-sm-5">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="forms-phone">{{trans('back/admin.lblPhonePerson2')}}</label>
                      <input class="form-input" id="forms-phone" type="text" name="telf_contacto_operador_2" placeholder="{{trans('back/admin.placeHolderPhonePerson1')}}" title="{{trans('back/admin.altPhonePerson1')}}" value="{{$operador[0]->telf_contacto_operador_2}}">
                    </div>
                  </div>
                  <div class="cell-sm-12">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="contact-email-3">{{trans('back/admin.lblEmailResp')}}</label>
                      <input class="form-input tooltip" id="contact-email-3" type="text" name="email_contacto_operador" data-constraints="@Email" placeholder="{{trans('back/admin.placeHolderEmailResp')}}" title="{{trans('back/admin.altEmailResp')}}" value="{{$operador[0]->email_contacto_operador}}">
                    </div>
                  </div>
                  <!-- Datos de la empresa -->
                  <h6><i class="fa fa-building-o"></i>&nbsp;&nbsp;{{trans('back/admin.titleEmpresaInfo')}}</h6>
                  <div class="cell-xs-12">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="company-name">{{trans('back/admin.lblEmpresaName')}}</label>
                      <input class="form-input tooltip" id="company-name" type="text" name="nombre_empresa_operador" data-constraints="@Required" placeholder="{{trans('back/admin.placeHolderEmpresaName')}}" title="{{trans('back/admin.altEmpresaName')}}" value="{{$operador[0]->nombre_empresa_operador}}">
                    </div>
                  </div>
                   <div class="cell-xs-12">
                    <div class="form-wrap">
                      <label class="form-label-outside" for="company-name">{{trans('back/admin.lblDirEmpresa')}}</label>
                      <input class="form-input tooltip" id="company-name" type="text" name="direccion_empresa_operador" data-constraints="@Required" placeholder="{{trans('back/admin.placeHolderDirEmpresa')}}" title="{{trans('back/admin.altDirEmpresa')}}" value="{{$operador[0]->direccion_empresa_operador}}">
                    </div>
                  </div>
                  <div class="cell-xs-12" id="ErrorDiv">
                      	<div class="rowerror alert alert-danger"></div>
                  </div>
                  <div class="cell-sm-8"></div>
                  <div class="cell-sm-4">
                    <div class="form-inline form-inline-custom">
                      <div class="form-wrap">
                        <a class="button button-facebook button-icon button-icon-sm button-icon-right fa-floppy-o" href="" onclick="saveOperadorData('form-add-operador')">{{trans('back/admin.lblBtnSave')}}<span></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- RD Parallax-->  
      <!-- Page Footer-->
      @include('site.reusable.footer')
      <script src="{{ asset('/siteStyle/js/procesos/operadores.js')}}"></script>
    </div>
    <!-- END PANEL-->
  </body>
</html>