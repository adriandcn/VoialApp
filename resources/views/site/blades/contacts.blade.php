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
          <h1>{{trans('publico/labels.tittleContacts')}}</h1>
          <div class="range range-50 range-xs-center">
            <div class="cell-xs-6">
              <div class="panel-custom-group text-left" id="accordionGeneral" role="tablist" aria-multiselectable="true">
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1HeadingGeneral" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordionGeneral" href="#accordion1CollapseGeneral" aria-controls="accordion1CollapseGeneral" aria-expanded="true">{{trans('publico/labels.tittleContactsGeneral')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1CollapseGeneral" role="tabpanel" aria-labelledby="accordion1HeadingGeneral">
                    <div class="panel-custom-body" style="background: white; color: black !important;">
                      <br>
                      <p><strong>{{trans('publico/labels.lblEmailsContacts')}}: </strong></p>
                      <p><a href="mailto:#">privacy@demolink.org</a> / <a href="mailto:#">privacy@demolink.org</a></p>
                      <p><strong>{{trans('publico/labels.lblPhonesContacts')}}: </strong></p>
                      <p>(+593)999999999) / (2)966558</p>
                      <p><strong>{{trans('publico/labels.lblAddressContacts')}}: </strong></p>
                      <p>Av. 123 </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-xs-6">
              <div class="panel-custom-group text-left" id="accordionAbout" role="tablist" aria-multiselectable="true">
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1HeadingAbaout" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordionAbout" href="#accordion1CollapseAbout" aria-controls="accordion1CollapseAbout" aria-expanded="true">{{trans('publico/labels.tittleAbout')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1CollapseAbout" role="tabpanel" aria-labelledby="accordion1HeadingAbaout">
                    <div class="panel-custom-body" style="background: white; color: black !important;"> <br>
                      <p style="text-align: justify;">{{trans('publico/labels.tittleAboutText')}}</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion2HeadingClients" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2CollapseClients" aria-controls="accordion2CollapseClients">{{trans('publico/labels.tittleTermsClientes')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion2CollapseClients" role="tabpanel" aria-labelledby="accordion2HeadingClients">
                    <div class="panel-custom-body" style="background: white; color: black !important;"> <br>
                      <p style="text-align: justify;">{{trans('publico/labels.tittleTermsClientesText')}}</p>
                    </div>
                  </div>
                </div>
                 <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion2HeadingUsers" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2CollapseUsers" aria-controls="accordion2CollapseUsers">{{trans('publico/labels.tittleTermsUsuarios')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion2CollapseUsers" role="tabpanel" aria-labelledby="accordion2HeadingUsers">
                    <div class="panel-custom-body" style="background: white; color: black !important;"> <br>
                      <p style="text-align: justify;">{{trans('publico/labels.tittleTermsUsuariosText')}}</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion2HeadingRegister" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2CollapseRegister" aria-controls="accordion2CollapseRegister">{{trans('publico/labels.tittleTermsRegistro')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion2CollapseRegister" role="tabpanel" aria-labelledby="accordion2HeadingRegister">
                    <div class="panel-custom-body" style="background: white; color: black !important;"> <br>
                      <p style="text-align: justify;">{{trans('publico/labels.tittleTermsRegistroText')}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-xs bg-white">
        <div class="shell">
          <h1>{{trans('publico/labels.tittleTerms')}}</h1>
          <div class="range range-50 range-xs-center">
            <div class="cell-xs-12">
              <!-- Bootstrap collapse-->
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">{{trans('publico/labels.tittleTermsResumen')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-custom-body" style="background:white; color: black !important;"><br>
                      <p style="text-align: justify;">
                        {!!html_entity_decode(trans('publico/labels.tittleTermsText'))!!}
                      </p>
                    </div>
                  </div>
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