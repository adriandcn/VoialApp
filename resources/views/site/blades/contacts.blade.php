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
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">{{trans('publico/labels.tittleContactsGeneral')}}</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-custom-body" style="background: white;">
                      <br>
                      <p><strong>Emails: </strong></p>
                      <p><a href="mailto:#">privacy@demolink.org</a> / <a href="mailto:#">privacy@demolink.org</a></p>
                      <p><strong>Teléfonos: </strong></p>
                      <p>(+593)999999999) / (2)966558</p>
                      <p><strong>Direción: </strong></p>
                      <p>Av. 123 </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-xs-6">
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">Misión</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-custom-body" style="background: white;"> <br>
                      <p style="text-align: justify;">Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion2Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse2" aria-controls="accordion2Collapse2">Visión</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion2Collapse2" role="tabpanel" aria-labelledby="accordion2Heading2">
                    <div class="panel-custom-body" style="background: white;"> <br>
                      <p style="text-align: justify;">Our customers have the right to access, correct and delete personal data relating to them, and to object to the processing of such data, by addressing a written request, at any time. The Company makes every effort to put in place suitable precautions to safeguard the security and privacy of personal data, and to prevent it from being altered, corrupted, destroyed or accessed by unauthorized third parties. However, the Company does not control each andevery risk related to the use of the Internet, and therefore warns the Site users of the potential risks involved in the functioning and use of the Internet.</p>
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
                    <div class="panel-custom-body" style="background:white;"><br>
                      <p style="text-align: justify;">Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                      <p style="text-align: justify;">Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                      <p style="text-align: justify;">Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                      <p style="text-align: justify;">Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
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