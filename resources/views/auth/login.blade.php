@extends('layouts.app')
@section('content')


<div class="container"> 
      <div class="flip-container h-100 threed-flip" id="threed-flip">
          
            <div class="user_card card-front d-flip">
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                  <img src="images/logo.png" class="brand_logo" alt="Logo">
                </div>
              </div>

              <div class="login-welcome"> <span class="big-welcome">  </span> <br>  </div>
              <div class="d-flex justify-content-center form_container">

                
              <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @csrf
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

@if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="customControlInline">Remember me</label>
                    </div>
                  </div>
              <!--  -->
              </div>
              <div class="d-flex justify-content-center mt-3 login_container">
              <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
              </div>
              </form>
              <!-- <div class="mt-4">
                <div class="d-flex justify-content-center links forgot-password">
                  <span> Don't have an account? </span>  &nbsp;  &nbsp; <a class="login-link" href="#" class="ml-2" onclick="flip()">SIGNUP</a>
                </div>
                <div class="d-flex justify-content-center links">
                  <a class="login-link " href="#">Forgot your password?</a>
                </div>
              </div>
            </div> -->



             
            <div class="user_card card-back d-flip">
                <div class="d-flex justify-content-center">

                    
                 
                </div>
  
               
                  
                  <form>
                  <div class="row sign-row">  
                    <div class="container-fluid"> 
                      <div class="col profile-pic sign-photo sree-reg"> Add photo </div>
                      <div class="col ml-auto sign-photo sree-reg"> Add Company Logo </div>

                    </div>

                    <div class=" container-fluid signup-welcome">
                      Let's set you up. It only takes a few minutes.
                    </div>



                    </div>    
                      <input type="text" name="" class="form-control sree-reg input_user" value="" placeholder="Name">
                      <input type="text" name="" class="form-control sree-reg input_user" value="" placeholder="Company or Business Name">
                      <input type="text" name="" class="form-control sree-reg input_user" value="" placeholder="Position">
                      <div class="input-group">
    <input type="tel" class="form-control">
    <span class="input-group-addon">Tel</span>
  </div>
                      <input type="email" name="" class="form-control sree-reg input_user" value="" placeholder="Email">
                      <input type="text" name="" class="form-control sree-reg input_user" value="" placeholder="username">
                      <input type="password" name="" class="form-control sree-reg input_pass" value="" placeholder="Currency">
                  


                  </form>
               

                <div class="sign-btns ">
                  <button type="button" name="button" class="btn login_btn sign-photo"  >SIGNUP</button>

                  <div class="acc-hav ">
                    <span> Have an account? </span> <a class="login-link" href="#" class="ml-2" onclick ="flip1()" > LOGIN</a>
                  </div>


                </div>
               
                 
                
                </div>
              </div>
              

      
          </div>

        </div>
         

           
          








          <script type="text/javascript">
            function flip(){
              document.getElementById("threed-flip") .style.transform='rotateY(180deg)';
            }
            
            function flip1(){
              document.getElementById("threed-flip") .style.transform='rotateY(0deg)';
            }
            
            
            </script>



@endsection
