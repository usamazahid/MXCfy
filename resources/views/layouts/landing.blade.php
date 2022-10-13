@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $setting = App\Models\Utility::colorset();
    if ($setting['color']) {
        $color = $setting['color'];
    }
    else{
        $color = 'theme-3';
    }
@endphp
<!DOCTYPE html>
<html lang="en"  dir="{{$setting['SITE_RTL'] == 'on'?'rtl':''}}">
  <head>
    <title>{{ __('StoreGo SaaS')}}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{$logo.'/favicon.png'}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}" />
    <!-- font css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/tabler-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/material.css')}}">

    <!-- vendor css -->
    @if($setting['SITE_RTL']=='on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css')}}" id="main-style-link">
    @endif
    @if($setting['cust_darklayout']=='on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css')}}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" id="main-style-link">
    @endif
 <!--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" id="main-style-link"> -->
    <link rel="stylesheet" href="{{asset('assets/css/customizer.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/landing.css')}}" />
  </head>

  <body class="{{ $color }}">
    <!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-dark default">
      <div class="container">
        <a class="navbar-brand bg-transparent" href="#">
          <img  src="{{ $logo . '/' . ('logo-light.png') }}" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav align-items-center mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#about_us">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">Faq</a>
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-right ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="btn btn-light ms-2 me-1" href="{{ route('login') }}">Sign In</a>
            </li>

            @if(App\Models\Utility::getValByName('signup_button') == 'on')
            <li class="nav-item">
              <a class="btn btn-red ms-2 me-1" href="{{ route('register') }}">Free Trial</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- [ Nav ] start -->
    <!-- [ Header ] start -->
    <header id="home" class="bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-sm-6">
            <h1
              class="text-dark mb-sm-4 wow animate__fadeInLeft"
              data-wow-delay="0.2s"
            >
             Simplifying eCommerce,<br/>
            Create your own website<br/> 
            within few secs.
            </h1>
            <h2
              class="text-light-dark mb-sm-4 wow animate__fadeInLeft"
              data-wow-delay="0.4s"
            >Launch, scale, manage and integerate<br>
                with logistic companies. 
            </h2>
            <div class="my-4 wow animate__fadeInLeft form-inline" data-wow-delay="0.8s">
            <div class="col-sm-6 mx-2" style="float:left">
                <input type="email" class="form-control" value="" placeholder="Your Email Address.">
            </div>
            <div class="col-sm-4 mx-2" style="float:left">
              <button class="btn btn-red" id="free_trial">
              <i class="fas fa-free me-2"></i>
              Free Trial
              </a>  
            
            </div>
          </div>
          </div>
          <div class="col-sm-6">
            <img
              src="{{asset('assets/images/front/header-mokeup.png')}}"
              alt="Datta Able Admin Template"
              class="img-fluid header-img wow animate__fadeInRight"
              data-wow-delay="0.2s"
            />
          </div>
        </div>
      </div>
    </header>
    <!-- [ Header ] End -->
    <!-- [ client ] Start -->
    <section id="dashboard" class="theme-alt-bg dashboard-block gradient-block">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-9 title">
                <h2><span class="text-white">See how your business can sell online through mxcfy</span></h2>
            </div>
        </div>
        <img style="border-radius: 15px;"
        src="{{asset('landing/images/sample-themes.png')}}"
        alt=""
        class="img-fluid img-dashboard wow animate__fadeInUp mt-5"
        data-wow-delay="0.2s"
      />
      </div>
    </section>
    <!-- [ client ] End -->
    <!-- [ dashboard ] start -->
    <section id="dashboard" class="how-it-works">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-9">
                <h2><span class="text-white">How it works? 3 easy steps!</span></h2>
            </div>
        </div>
        <img style="border-radius: 15px;"
        src="{{asset('assets/images/front/how-it-works.png')}}"
        alt=""
        class="img-fluid img-dashboard wow animate__fadeInUp mt-5"
        data-wow-delay="0.2s"
      />
      </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ dashboard ] start -->
    <section class="">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-md-9">
                <h2><span>Be it a startup or a legacy business, here’s why you need mxcfy</span></h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-start">
          <div class="col-sm-6">
            <!--<img-->
            <!--  src="{{asset('')}}"-->
            <!--  alt="Datta Able Admin Template"-->
            <!--  class="img-fluid header-img wow animate__fadeInLeft"-->
            <!--  data-wow-delay="0.2s"-->
            <!--/>-->
          </div>
          <div class="col-sm-4">
            <h2
              class="mb-sm-4 f-w-600 wow animate__fadeInRight"
              data-wow-delay="0.2s">
            Launch Fast
        </h2>
            <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
              Fully responsive e-commerce website & mobile app.<br>
              Loads 6X faster than existing solutions.<br>
              Upload/import products and inventory in bulk.<br>
              Integrate payment gateways.<br>
              Easily customizable themes.
            </p>
            
            <h2
              class="mb-sm-4 f-w-600 wow animate__fadeInRight"
              data-wow-delay="0.2s">
            Scale Faster
        </h2>
            <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                Your store will have 99.5% uptime. <br>
                45+ third party plugins.<br>
                Marketing tools and discounts to drive repeat orders.<br>
                Add staff accounts, assign different roles.<br>
                Unlimited transactions, 0% transaction fees.<br>
            </p>
            
            <h2
              class="mb-sm-4 f-w-600 wow animate__fadeInRight"
              data-wow-delay="0.2s">
            Manage Better
        </h2>
            <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                  Order tracking, invoicing and order reports.<br>
                Bulk edit product prices, variants, inventory.<br>
                Manage global deliveries.<br>
                In-depth business analytics.<br>
                Automate all tax calculations.<br>
            </p>

          </div>
        </div>
      </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ faq ] start -->
    <section class="faq">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-md-9 title">
            <h2><span></span>Frequently Asked Questions</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-10 col-xxl-8">
            <div class="accordion accordion-flush" id="accordionExample">
              <div class="accordion-item card">
                <h2 class="accordion-header" id="headingOne">
                  <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    <span class="d-flex align-items-center">
                      <i class="ti ti-info-circle text-primary"></i> Is it easy to build a website?
                    </span>
                  </button>
                </h2>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                </div>
              </div>

              <div class="accordion-item card">
                <h2 class="accordion-header" id="headingThree">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    <span class="d-flex align-items-center">
                      <i class="ti ti-info-circle text-primary"></i> Is it easy to build a website?
                    </span>
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item card">
                <h2 class="accordion-header" id="headingThree">
                  <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    <span class="d-flex align-items-center">
                      <i class="ti ti-info-circle text-primary"></i> Is it easy to build a website?
                    </span>
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse"
                  aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- [ faq ] End -->
<!-- [subscribe] Start -->
<section class="slice slice-xl bg-cover bg-size--cover" style="background-image: url(https://demo.rajodiya.com/storego-saas/storage/uploads/theme1/subscriber/email_subscriber_1.png); background-position: center center;">
                <div class="container col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-lg-12 col-xl-12 text-center">
                            <div class="mb-5">
                                <h1 class="text-white store-title">
                                    Always on time
                                </h1>
                                <p class="lead text-white mt-2 store-dcs">
                                    There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.
                                </p>
                            </div>
                            <form method="POST" action="https://demo.rajodiya.com/storego-saas/subscriptions/1" accept-charset="UTF-8"><input name="_token" type="hidden" value="CenliEcakjwdfEaxocTJR7e689g6q7wPaN8EfzmS">
                            <div class="form-group mb-0 form-subscribe">
                                <div class="input-group input-group-lg input-group-merge col-md-6">
                                    <input class="form-control bg-white form-control-flush rounded-pill" aria-label="Enter your email address" placeholder="Enter Your Email Address" name="email" type="email">
                                    <div class="input-group-append ml-3">
                                        <button type="submit" class="btn btn-primary rounded-pill hover-translate-y-n3 btn-icon mr-sm-4 scroll-me">
                                            <span class="btn-inner--text">Subscribe</span>
                                            <span class="far fa-paper-plane"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
<!-- [subscribe] End -->
    <!-- [ dashboard ] start -->
    <section class="footer">
       <!-- [ dashboard ] start -->
    <section class="footer">

    <div class="container">
   <div class="row pt-md top-footer delimiter-top">
      <div class="col-lg-4 mb-5 mb-lg-0">
         
         <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}" alt="logo" />
    
      </div>
      <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
         <h6 class="heading mb-3 text-primary">
            Theme Pages
         </h6>
         <ul class="list-unstyled f-list">
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Home Pages
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Pricing
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               Contact Us
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               Team
               </a>
            </li>
         </ul>
      </div>
      <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
         <h6 class="heading mb-3 text-primary">
            About
         </h6>
         <ul class="list-unstyled f-list">
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Blog
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               Help Center
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Sales Tools Catalog
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Academy
               </a>
            </li>
         </ul>
      </div>
      <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
         <h6 class="heading mb-3 text-primary">
            Company
         </h6>
         <ul class="list-unstyled f-list">
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Terms and Policy
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               About Us
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Terms and Policy
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               About Us
               </a>
            </li>
         </ul>
      </div>
      <div class="col-lg-2 col-md-3 col-6 col-sm-6 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
         <h6 class="heading mb-3 text-primary">
            Company
         </h6>
         <ul class="list-unstyled f-list">
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Terms and Policy
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               About Us
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/store-blog/my-store">
               Support
               </a>
            </li>
            <li>
               <a class="t-gray" target="_blank" href="https://mxcfy.com/page/about-us">
               About Us
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="row align-items-center justify-content-md-between py-2 delimiter-top">
      <div class="col-md-6">
         <div class="copyright text-sm font-weight-bold text-md-left">
            <p class="text-body">{{__('Copyright')}} {{ (Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :config('app.name', 'StoreGo') }} {{date('Y')}}</p>
         </div>
      </div>
      <div class="col-md-6 footer-social">
         <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
            <li class="nav-item d-flex align-items-center">
               <p class="mb-0">Follow us on :</p>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.whatsapp.com/">
               <i class="fab fa-whatsapp"></i>
               </a>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.facebook.com/">
               <i class="fab fa-facebook"></i>
               </a>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.skype.com/">
               <i class="fab fa-skype"></i>
               </a>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.github.com/">
               <i class="fab fa-github"></i>
               </a>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.instagram.com/">
               <i class="fab fa-instagram"></i>
               </a>
            </li>
            <li class="nav-item storelinkicon mx-1">
               <a class="t-gray" target="_blank" href="https://www.youtube.com/">
               <i class="fab fa-youtube"></i>
               </a>
            </li>
         </ul>
      </div>
   </div>
</div>

    </section>
    <!-- [ dashboard ] End -->
    </section>
    <!-- [ dashboard ] End -->
    <!-- Required Js -->
    <script src="{{asset('assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/wow.min.js')}}"></script>
    <script>
      // Start [ Menu hide/show on scroll ]
      let ost = 0;
      document.addEventListener("scroll", function () {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
          document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
          document.querySelector(".navbar").classList.add("top-nav-collapse");
          document.querySelector(".navbar").classList.remove("default");
        } else {
          document.querySelector(".navbar").classList.add("default");
          document
            .querySelector(".navbar")
            .classList.remove("top-nav-collapse");
        }
        ost = cOst;
      });
      // End [ Menu hide/show on scroll ]
      var wow = new WOW({
        animateClass: "animate__animated", // animation css class (default is animated)
      });
      wow.init();
      var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
      });
    </script>
  </body>
</html>
