 <!-- Navigation -->
 <header>
     <!-- Navbar -->
     <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">

         <div class="container">

             <!-- SideNav slide-out button -->
             <div class="float-left mr-2">

                 <a href="" class="button-collapse"><img src="{{ asset('template/img/home/fishlogo.png') }}"
                         class="img-fluid flex-center"></a>

             </div>

             <a class="navbar-brand font-weight-bold" href="{{ route('home') }}"><strong>Fishi'Sop</strong></a>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                 aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">

                 <span class="navbar-toggler-icon"></span>

             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                 <ul class="navbar-nav ml-auto">

                     <li class="nav-item">
                         <a class="nav-link dark-grey-text font-weight-bold" href="{{ route('product.showCart') }}">

                             <span class="badge danger-color">{{ getCartItemCount() }}</span>

                             <i class="fas fa-shopping-cart blue-text" aria-hidden="true"></i>

                             <span class="clearfix d-none d-sm-inline-block">Cart</span>

                         </a>
                     </li>
                     <li class="nav-item">

                         <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="#"><i
                                 class="fas fa-envelope blue-text"></i>

                             Contact <span class="sr-only">(current)</span></a>

                     </li>

                     <li class="nav-item ml-3">

                         <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="#"><i
                                 class="fas fa-cog blue-text"></i>

                             Settings</a>

                     </li>

                     <li class="nav-item dropdown ml-3">

                         <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                             @if (!Auth::check()) href="{{ route('login') }}"
    @else
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" @endif>
                             <i class="fas fa-user blue-text"></i> Profile
                         </a>

                         @if (Auth::check())
                             <div class="dropdown-menu dropdown-menu-right dropdown-cyan">
                                 <a class="dropdown-item waves-effect waves-light dark-grey-text font-weight-bold"
                                     href="#">Hi! {{ Auth::user()->name }}</a>
                                 <a class="dropdown-item waves-effect waves-light" href="{{ route('profile') }}">My account</a>

                                 <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}">Log
                                     out</a>
                             </div>
                         @endif

                     </li>


                 </ul>

             </div>

         </div>

     </nav>

     <!-- Navbar -->
 </header>
 <!-- Navigation -->
