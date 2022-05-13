 <!----- HEADER SECTION  START----->
 <nav class="navbar navbar-expand-lg py_5 ">
     <div class="container-fluid py-4">
         <a class="navbar-brand" href="{{ route('home') }}">
             <img src="{{ asset('assets/img/Baobab-Logo.png') }}" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
             aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fa-solid fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                 <li class="nav-item">
                     <a class="nav-link active text-white" aria-current="page" href="#">Anti-Scam</a>
                 </li>
                 <li class="nav-item dropdown ">
                     <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink"
                         role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         About
                     </a>
                     <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                         <li><a class="dropdown-item" href="#">Action</a></li>
                         <li><a class="dropdown-item" href="#">Another action</a></li>
                         <li><a class="dropdown-item" href="#">Something else here</a></li>
                     </ul>
                 </li>
             </ul>
             <div class="nav-icon d-flex justify-content-evenly align-items-center">
                 @guest
                     <span><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></span>
                     <span><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-notes-medical"></i></a></span>
                 @else
                     <span><a href="{{route('user.dashboard')}}"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></span>
                     <span><a href="{{route('user.product.create')}}" ><i class="fa-solid fa-notes-medical"></i></a></span>
                     <span><a href="javascript:;" ><i class="fa-solid fa-envelope-open"></i></a></span>
                 @endguest
                 <span><a href="javascript:;" data-bs-toggle="modal" data-bs-target=""><i
                             class="fa-solid fa-globe"></i></a></span>

                 <!-------- START MODAL --------->

                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered ">
                         <div class="modal-content p-3">
                             <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                             <div class="modal-body login_modal p-2">
                                 <h5 class="modal-title mb-4" id="exampleModalLabel">Login</h5>
                                 <form name="login" action="{{route('login')}}" method="post">
                                    @csrf
                                     <div class="row">
                                         <div class="col-12 col-sm-6">
                                             <label for="exampleInputEmail1" class="form-label m-0">Username / Email
                                                 *</label>
                                             <input id="user_login" type="email" class="form-control border-0 border-bottom p-0 rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                                             <span class="error text-danger"></span>
                                         </div>
                                         <div class="col-12 col-sm-6">
                                             <label for="exampleInputPassword1" class="form-label m-0">Password *</label>
                                             <input id="pass_login" type="password" class="form-control border-0 border-bottom p-0 rounded-0" id="exampleInputPassword1" required>
                                             <span class="error text-danger"></span>
                                        </div>
                                     </div>
                                     <div class="my-4">
                                         <button onclick="loginUser()" id="login_btn" class="btn model_btn w-100 fw-bold" type="button">LOGIN</button>
                                     </div>
                                 </form>
                                 <div class="text-center my-4">
                                     <a href="javascript:;" class="pt-2 text-muted" id="forget_pass">Forgotten your
                                         password ?</a>
                                 </div>
                                 <div class="h-line-text text-center w-75 mx-auto">
                                     <span class="fw-bold">OR</span>
                                 </div>
                                 <p class="m-0 text-center mt-3">Sign In With</p>
                                 <div
                                     class="singin-text d-flex flex-wrap align-items-center justify-content-evenly pt-2">
                                     <a href="javascript:;" class="f-conect d-flex flex-wrap align-items-center p-2">
                                         <i class="fa-brands fa-facebook-f p-1"></i>
                                         <h6 class="m-0">Connect with Facebook</h6>
                                     </a>
                                     <a href="javascript:;"
                                         class="g-conect d-flex flex-wrap align-items-center p-2 mt-2 mt-sm-0">
                                         <i class="fa-brands fa-google pe-2"></i>
                                         <span class="m-0">Connect with Google</span>
                                     </a>
                                 </div>
                                 <div class="text-center m-3">
                                     <a href="javascript:;" class="text-muted" id="create_ac">Don't have an
                                         account? Create one here</a>
                                 </div>
                             </div>
                             <!------------FORGET PASSWORD MODAL START-------------->
                             <div class="modal-body recover_pass_modal p-1">
                                 <h5 class="modal-title mb-4" id="exampleModalLabel">Recover Password</h5>
                                 <form>
                                     <div class="row">
                                         <div class="col">
                                             <label for="exampleInputEmail1" class="form-label m-0">Email *</label>
                                             <input type="email"
                                                 class="form-control border-0 border-bottom p-0 rounded-0"
                                                 id="exampleInputEmail1" aria-describedby="emailHelp"
                                                 placeholder="Your registered Email">
                                         </div>
                                     </div>
                                 </form>
                                 <div class="my-4">
                                     <button class="btn model_btn w-100 fw-bold" type="submit">RECOVER</button>
                                 </div>
                                 <div class="text-center m-3">
                                     <a href="javascript:;" class="text-muted" id="login_acc">Already have an
                                         account?
                                         login here.</a>
                                 </div>
                             </div>
                             <!---------FORGET PASSWORD MODAL END---------->

                             <!----------CREATE ACCOUNT MODAL------------>
                             <div class="modal-body createAcc_modal p-2">
                                 <h5 class="modal-title mb-4" id="exampleModalLabel">Register</h5>
                                 <form>
                                     <div class="row">
                                         <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                             <label for="name" class="form-label m-0">Username *</label>
                                             <input type="text" class="form-control border-0 border-bottom p-0 rounded-0" id="reg_username" name="name" aria-describedby="emailHelp">
                                             <span class="error text-danger"></span>
                                         </div>
                                         <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                                             <label for="email" class="form-label m-0">Email *</label>
                                             <input type="email" class="form-control border-0 border-bottom p-0 rounded-0" id="reg_email" name="email" required>
                                             <span class="error text-danger"></span>
                                         </div>
                                         <div class="col-12 col-sm-6 mt-4">
                                             <label for="password" class="form-label m-0">Password *</label>
                                             <input type="password" class="form-control border-0 border-bottom p-0 rounded-0" id="reg_pass" name="password" aria-describedby="emailHelp">
                                             <span class="error text-danger"></span>
                                         </div>
                                         <div class="col-12 col-sm-6 mt-4">
                                             <label for="password-confirm" class="form-label m-0">Re-password *</label>
                                             <input type="password" class="form-control border-0 border-bottom p-0 rounded-0" id="reg_conf_pass" name="password_confirmation" autocomplete="new-password">
                                             <span class="error text-danger"></span>
                                         </div>
                                         <div class="form-check ms-3 pt-4">
                                             <input type="checkbox" class="form-check-input" id="term_cond">
                                             <label class="form-check-label" for="exampleCheck1">I agree to tearms & conditions</label>
                                         </div>
                                     </div>
                                     <div class="my-4">
                                         <button onclick="register()" class="btn model_btn w-100 fw-bold" id="register_btn"
                                             type="button" disabled>REGISTER</button>
                                     </div>
                                 </form>
                                 <div class="h-line-text text-center w-75 mx-auto">
                                     <span>OR</span>
                                 </div>
                                 <p class="m-0 text-center mt-3">Sign In With</p>
                                 <div
                                     class="singin-text d-flex flex-wrap align-items-center justify-content-evenly pt-2">
                                     <a href="javascript:;" class="f-conect d-flex flex-wrap align-items-center p-2">
                                         <i class="fa-brands fa-facebook-f p-1"></i>
                                         <h6 class="m-0">Connect with Facebook</h6>
                                     </a>
                                     <a href="javascript:;"
                                         class="g-conect d-flex flex-wrap align-items-center p-2 mt-2 mt-sm-0">
                                         <i class="fa-brands fa-google pe-2"></i>
                                         <span class="m-0">Connect with Google</span>
                                     </a>
                                 </div>
                                 <div class="text-center m-3">
                                     <a href="javascript:;" class="text-muted" id="login_ac">Already have an
                                         account?
                                         login here.</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!------ END MODAL ------->
             </div>
         </div>
     </div>
 </nav>
