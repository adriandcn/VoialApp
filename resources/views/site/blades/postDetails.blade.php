<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Servicios</title>
    @include('site.reusable.head')
    <style type="text/css">
      #owl-demo .item{
        background: #3fbf79;
        padding: 30px 0px;
        margin: 10px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
      }
      .customNavigation{
        text-align: center;
      }
      //use styles below to disable ugly selection
      .customNavigation a{
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      }
      .eventCard {
        border-bottom: 1px solid #ccc;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        padding: 7px;
        border-radius: 5px;
      }
    </style>
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
      <!-- Breadcrumbs & Page title-->

      <section class="page-title breadcrumbs-elements page-title-inset-1" style="background: white;padding-bottom: 0;">
        <div class="shell">
          <div class="page-title__overlay box-skew box-skew-var-1"><span class="box-skew__item"></span>
            <div class="page-title-text">{{$postDetails->title}}</div>
            <!-- <p class="big text-width-medium">{{$postDetails->descripcion}}</p> -->
            <!-- path sistema -->
            <br>
            <hr>
            <div>
              <span class="box-skew__item"></span>
              <ul class="breadcrumbs-custom">
                <li><a href="{{asset('/')}}">{{ trans('publico/labels.lblHome')}}</a></li>
                <li><a href="{!!asset('/detalles-de-servicio')!!}/{{$servicioData->id}}">{{$servicioData->nombre_servicio}}</a></li>
                <li>{{$postDetails->title}}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section-sm bg-white blog-wrap" style="padding-top: 0;">
        <div class="shell">
          <!-- <h1>Blog</h1> -->
          <div class="range range-50 range-center range-sm-justify">
            <div class="cell-lg-6 cell-md-7 cell-sm-8 cell-xs-12">
              <div class="post-classic">
                <div class="post-classic-img-wrap"><a href="single-post.html"><img src="images/blog-1-570x376.jpg" alt="" width="570" height="376"></a></div>
                <div class="post-classic-body">
                  <div class="unit unit-sm-top unit-vertival unit-sm-horizontal">
                    <!-- <div class="unit__left text-left text-sm-center">
                      <div class="unit unit-spacing-xs unit-vertical unit-middle">
                        <div class="unit__left"><img class="img-circle" src="images/user-01-70x70.jpg" alt="" width="70" height="70">
                        </div>
                        <div class="unit__body"><a class="author-name" href="team-members.html">Sara Johnson</a></div>
                      </div>
                    </div> -->
                    <div class="unit__body">
                      <time datetime="2017-03-25">{{$postDetails->created_at}}</time>
                      <h6><a href="single-post.html">{{$postDetails->title}}</a></h6>
                      <p class="post-classic-text">
                        <span>
                          {!!html_entity_decode($postDetails->html)!!}
                        </span>
                      </p>
                      <!-- <ul class="list-tags">
                        <li><a href="#">New bike</a></li>
                        <li><a href="#">Downhill</a></li>
                      </ul> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-lg-3 cell-sm-4 cell-xs-8">
              <div class="blog-item text-left">
                <h6>Recent posts</h6>
                <div id="recentPosts"></div>
              </div>
              <div class="blog-item text-left">
                <h6>Popular posts</h6>
                <div id="popularPosts"></div>
              </div>
              <!-- <div class="blog-item">
                <h6>Tags</h6>
                <ul class="list-tags">
                  <li><a href="#">Review</a></li>
                  <li><a href="#">Downhill</a></li>
                  <li><a href="#">Mountain</a></li>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Video</a></li>
                  <li><a href="#">Events</a></li>
                  <li><a href="#">Pictures</a></li>
                  <li><a href="#">Bikes</a></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      @include('site.reusable.footer')

      <script type="text/javascript">
        AjacGetRecentPosts("{!!$servicioData->id!!}");
        AjacGetPopularPosts("{!!$servicioData->id!!}");
      </script>
    </div>
    <!-- END PANEL-->
  </body>
</html>