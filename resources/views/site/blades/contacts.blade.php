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
            <div class="cell-xs-4">
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
            <div class="cell-xs-8">
              <!-- Bootstrap collapse-->
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">{{trans('publico/labels.tittleTerms')}}</a>
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