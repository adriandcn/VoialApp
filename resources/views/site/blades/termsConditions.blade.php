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
              <!-- Bootstrap collapse-->
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">General information</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-custom-body">
                      <p>Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-xs-6">
              <!-- Bootstrap collapse-->
              <div class="panel-custom-group text-left" id="accordion1" role="tablist" aria-multiselectable="true">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion1Heading1" role="tab">
                    <p class="panel-custom-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="true">General information</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse in" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-custom-body">
                      <p>Welcome to our Privacy Policy page! When you use our web site services, you trust us with your information. This Privacy Policy is meant to help you understand what data we collect, why we collect it, and what we do with it. When you share information with us, we can make our services even better for you. For instance, we can show you more relevant search results and ads, help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we`re using information and the ways in which you can protect your privacy.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion2Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#accordion2Collapse2" aria-controls="accordion2Collapse2">Right to access, corerct &amp; delete data and to object to data processing</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion2Collapse2" role="tabpanel" aria-labelledby="accordion2Heading2">
                    <div class="panel-custom-body">
                      <p>Our customers have the right to access, correct and delete personal data relating to them, and to object to the processing of such data, by addressing a written request, at any time. The Company makes every effort to put in place suitable precautions to safeguard the security and privacy of personal data, and to prevent it from being altered, corrupted, destroyed or accessed by unauthorized third parties. However, the Company does not control each andevery risk related to the use of the Internet, and therefore warns the Site users of the potential risks involved in the functioning and use of the Internet.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion3Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#accordion3Collapse2" aria-controls="accordion3Collapse2">Management of personal data</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion3Collapse2" role="tabpanel" aria-labelledby="accordion3Heading2">
                    <div class="panel-custom-body">
                      <p>You can view or edit your personal data online for many of our services. You can also make choices about our collection and use of your data. How you can access or control your personal data will depend on which services you use. You can choose whether you wish to receive promotional communications from our web site by email, SMS, physical mail,and telephone. If you receive promotional email or SMS messages from us and would like to opt out, you can do so by following the directions in that message. You can also make choices about the receipt ofpromotional email, telephone calls, and postal mail by visiting and signing into Company Promotional Communications Manager, which allows you to update contact information, manage contact preferences, opt out of email subscriptions, and choose whether to share your contact information with our partners.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion4Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#accordion4Collapse2" aria-controls="accordion4Collapse2">Information we collect</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion4Collapse2" role="tabpanel" aria-labelledby="accordion4Heading2">
                    <div class="panel-custom-body">
                      <p>Our store collects data to operate effectively and provide you the best experiences with our services. You provide some of this data directly, such as when you createa personal account. We get some of it by recording how you interact with our  services by, for example, using technologies like cookies, and receiving error reports or usage data from software running on your device. We also obtain data from third parties (including other companies). For example, we supplement the data we collect by purchasing demographic data from other companies. We also use services from other companies to help us determine a location based on your IP address in order to customize certain services to your location. The data we collect depends on the services and features you use.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion5Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#accordion5Collapse2" aria-controls="accordion5Collapse2">How we use information</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion5Collapse2" role="tabpanel" aria-labelledby="accordion5Heading2">
                    <div class="panel-custom-body">
                      <p>Our web site uses the data we collect for three basic purposes: to operate our business and provide (including improving and personalizing) the services we offer, to send communications, including promotional communications, and to display advertising. In carrying out these purposes, we combine data we collect through the various web site services you use to give you a more seamless, consistent and personalized experience. However, to enhance, privacy, we have built in technological and procedural safeguards designed to prevent certain data combinations. For example, we store data we collect from you when you are unauthenticated (not signed in) separately from any account information that directly identifies you, such as your name &amp; email.</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-custom-default">
                  <div class="panel-custom-heading" id="accordion6Heading2" role="tab">
                    <p class="panel-custom-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion6" href="#accordion6Collapse2" aria-controls="accordion6Collapse2">Sharing your information</a>
                    </p>
                  </div>
                  <div class="panel-custom-collapse collapse" id="accordion6Collapse2" role="tabpanel" aria-labelledby="accordion6Heading2">
                    <div class="panel-custom-body">
                      <p>We share your personal data with your consent or as necessary to complete any transaction or provide any service you have requested or authorized. For example, we share your content with third parties when you tell us to do so. When you provide payment data to make a purchase, we will share payment data with banks and other entities that process payment transactions or provide other financial services, and for fraud prevention and credit risk reduction. In addition, we share personal data among our controlled affiliates and subsidiaries. We also share personal data with vendors or agents working on our behalf for the purposes described in this statement. For example, companies we've hired to provide customer service support or assist in protecting and securing our systems and services may need access to personal data in order to provide those functions.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-xs-12"><a href="mailto:#">privacy@demolink.org</a></div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')
    </div>
    <!-- END PANEL-->
  </body>
</html>