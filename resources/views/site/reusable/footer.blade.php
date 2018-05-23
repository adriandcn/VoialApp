    <footer class="page-footer footer-default">
        <section class="section-xs bg-gray-darker">
          <div class="shell">
            <div class="range range-30 range-around box-border-md-right">
              <div class="cell-md-4 cell-sm-5 cell-xs-10 wow fadeInUp" data-wow-delay=".2s">
                <h4>{{trans('publico/labels.latestCreated')}}</h4>
                      <div id="lastServicesCreated"></div>
              </div>
              <div class="cell-md-4 cell-sm-5 cell-xs-10 wow fadeInUp" data-wow-delay=".3s">
                <h4>Tags</h4>
                <ul class="list-tags">
                  @foreach($headerCategories as $category)
                      @if(count($headerCategories) > 0)
                        @foreach($category->child as $childCat)
                          <li><a href="{!!asset('/catalogo-de-servicios')!!}/{{$childCat->id_catalogo_servicios}}">{{$childCat->nombre_servicio}}<span class="overlay-skew"></span></a></li>
                        @endforeach
                      @endif
                  @endforeach
                </ul>
                <h4>Links</h4>
                <ul class="list-marked-2 list-bold list-primary-sec list-xs-inline-block">
                  <li><a href="http://www.cruzroja.org.ec/" target="_new">Cruz Roja Ecuatoriana</a></li>
                  <li><a href="http://www.salud.gob.ec/" target="_new">Ministerio de Salud Pública del Ecuador</a></li>
                  <li><a href="http://www.ecu911.gob.ec/" target="_new">911</a></li>
                  <li><a href="https://www.iess.gob.ec" target="_new">IESS</a></li>
                </ul>
              </div>
              <div class="cell-md-4 cell-sm-11 wow fadeInUp" data-wow-delay=".4s">
                <h4>Partners:</h4>
                <div class="footer-partners group-lg">
                  <a href="https://iwanatrip.com" target="_new">
                    <img src="{{asset('/siteStyle/images/partners/iwanna.jpg')}}" alt="" width="100" height="55"/>
                  </a>
                  <a href="https://bifeychorizo.com/" target="_new">
                    <img src="{{asset('/siteStyle/images/partners/bife_chorizo.png')}}" alt="" width="120" height="50"/>
                  </a>
                  <a href="http://www.zona-tecnologica.com/" target="_new">
                    <img src="{{asset('/siteStyle/images/partners/Zona_tecnologica.png')}}" alt="" width="300" height="50"/>
                  </a>
                </div>
                <!-- @if(Route::current()->getName() == 'getcatalogoServ')
                  <h4>{{trans('publico/labels.titleNews')}}</h4>
                  <p>{{trans('publico/labels.msgNews')}}</p>
                  <p>{{trans('publico/labels.msgRegisterNews')}}</p>
                  <form class="rd-mailform form-gray-outline form-button-within-1" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{asset('/subscribeNews')}}">
                    <div class="form-wrap">
                      <input class="form-input" type="email" id="emailNews" data-constraints="@Email @Required" style="color: white;">
                      <button class="button button-transparent" type="button" data-toggle="modal" data-target="#form-modal-subscribe-news" onclick="loadNewTags(event,{{ Request::route('idCatalogo') }},{{ Request::route('idSubCatalogo') }})">{{trans('publico/labels.btnRegisterNews')}}</button>
                    </div>
                  </form>
                @endif -->
              </div>
            </div>
          </div>
        </section>
        <section class="footer-bottom-panel">
          <div class="shell">
            <div class="wrap-bottom-panel">
              <p>Voilapp.city &#169; <span id="copyright-year"></span>. <a href="{{asset('/contacts')}}">{{trans('publico/labels.tittleTerms')}}</a>
              </p>
                  <ul class="list-inline">
                    <li><a class="icon fa fa-facebook icon-xxs" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus icon-xxs" href="#"></a></li>
                    <li><a class="icon fa fa-linkedin icon-xxs" href="#"></a></li>
                    <li><a class="icon fa fa-twitter icon-xxs" href="#"></a></li>
                  </ul>
            </div>
          </div>
        </section>
    </footer>
    <div class="snackbars" id="form-output-global"></div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Add News -->
  <div class="modal modal-custom fade" id="form-modal-subscribe-news" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
          <div class="modal-header">
            <h5>{{ trans('back/admin.lblAddService')}}</h5>
          </div>
          <div class="modal-body">
            <form class="rd-mailform" id="form-subscribe-news" action="{{asset('/registerUserToNews')}}">
              <div class="form-wrap">
                <label class="form-label-outside" for="email_news"><i class="fa fa-font"></i>&nbsp;&nbsp;{{ trans('back/admin.lblEmailServ')}}</label>
                <input class="form-input tooltip" id="email_news" type="email" name="email_news" title="{{ trans('back/admin.altNombre')}}" data-constraints="@Required">
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="email_news"><i class="fa fa-font"></i>&nbsp;&nbsp;{{ trans('publico/labels.lblRangeSendNewsTitle')}}</label>
                <fieldset id="group2">
                    {{ trans('publico/labels.lblRangeSendNewsWeek')}} <input type="radio" value="8" name="range" checked>
                    {{ trans('publico/labels.lblRangeSendNewsBiWeek')}} <input type="radio" value="15" name="range">
                    {{ trans('publico/labels.lblRangeSendNewsMonth')}} <input type="radio" value="30" name="range">
                </fieldset>
              </div>
              <div class="form-wrap">
                <label class="form-label-outside" for="register-password-4"><i class="fa fa-list"></i>&nbsp;&nbsp;{{ trans('back/admin.lblDescriptionServ')}}</label>
               <div style="display: inline;" id="spinnerNewsTags">Cargando ... <i class="fa fa-spinner fa-spin"></i></div>
               <divclass="row">
                 <div id="NewsTagList"></div>
               </div>
              </div>
              <br>
              <div class="rowErrorServStep1"></div>
              <div class="button-wrap text-right">
                <button class="button-primary button" type="button" onclick="registerClientToNews(event,'form-add-trip','trip')">
                  <div style="display: inline;" id="spinnerSaveNews"><i class="fa fa-spinner fa-spin"></i></div>
                  {{trans('publico/labels.btnRegisterNews')}}<span></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('/siteStyle/js/wNumb.js')}}"></script>
    <script src="{{ asset('/siteStyle/js/core.min.js')}}"></script>
    <script src="{{ asset('/siteStyle/js/script.js')}}"></script>
    <script src="{{ asset('/siteStyle/sweetalert/sweetalert.js')}}"></script>
    <script src="{{ asset('/siteStyle/js/alertas.js')}}"></script>
    <script src="{{ asset('/siteStyle/nouislider/nouislider.min.js')}}"></script>  
    <script src="{{ asset('/siteStyle/js/bootstrap-switch.js')}}"></script> 
    <script src="{{ asset('/siteStyle/js/underscore.js')}}"></script>
    <script src="{{ asset('/siteStyle/js/Compartido.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

      <script type="text/javascript">
          $('.error').html('');
          $("#spinnerSave").hide();
          $("#spinnerSaveTrip").hide();
          $("#spinnerSaveHotel").hide();
          $('#spinnerLogin').hide();
          $('#spinnerRegister').hide();
          $.ajaxSetup({
              headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
          });
          $("#formLogin").submit(function (event) {
              $('.rowerrorRegister').hide();
              $('.rowerrorRegister').html('');
              $('#spinnerLogin').show();
              event.preventDefault();
              var $form = $(this),
                  data = $form.serialize(),
                  url = $form.attr("action");
              $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function(r){
                            if (r.redirectto){
                                showAlert('Bienvenido!','',r.redirectto,'success','success');
                            }
                            if (r.error) {
                              if (r.error == 'These credentials do not match our records.') {
                                showAlert('Error!','Usuario / contraseña incorrectos',null,'warning','danger');
                              }
                              if (r.error == 'verifyMail') {
                                showAlert('Email no verificado!','verifica tu cuenta para poder continuar',null,'info','info');
                              }
                            }
                            $('#spinnerLogin').hide();
                        },
                        error: function(e){
                          var errorString = '<ul>';
                          $.each(e.responseJSON,function(key,val){
                            errorString += '<li>' + val[0] + '</li><br>';
                          });
                          errorString += '</ul>';
                          $('.rowerrorLogin').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");
                          $('#spinnerLogin').hide();
                        }
                    });
          });
          $("#formRegister").submit(function (event) {
              $('#spinnerRegister').show();
              $('.rowerrorRegister').html('');
              event.preventDefault();
              var $form = $(this),
                  data = $form.serialize(),
                  url = $form.attr("action");
              var posting = $.post(url, {formData: data});
              posting.done(function (data) {
                  if (data.fail == true) {
                      var errorString = '<ul>';
                      $.each(data.errors, function (key, value) {
                          errorString += '<li>' + value + '</li><br>';
                      });
                      errorString += '</ul>';
                      $('.rowerrorRegister').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");
                      $('.rowerrorRegister').show();
                  }
                  if (data.success) {
                      $('.rowerrorRegister').hide();
                      $('.register').fadeOut(); //hiding Reg form
                      var successContent = '' + data.message + '';
                      $('.rowerrorRegister').html("@include('partials/error', ['type' => 'danger','message'=>'Success'])");
                      showAlert('Registro correcto!','ya puedes utilizar tu cuenta',data.redirectto,'success','success');
                  }
                  $('#spinnerRegister').hide();
              });
              posting.error(function(e){
                  var errorString = '<ul>';
                  $.each(e.responseJSON,function(key,val){
                    errorString += '<li>' + val[0] + '</li><br>';
                  });
                  errorString += '</ul>';
                  $('.rowerrorRegister').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");
                  $('#spinnerLogin').hide();
              });
          });

      </script>

      <script type="text/javascript">
        $(document).ready(function () {
          // getLastServicesCreated();
          // setInterval(function(){
            getLastServicesCreated();
          // },10000)
        });
      </script>