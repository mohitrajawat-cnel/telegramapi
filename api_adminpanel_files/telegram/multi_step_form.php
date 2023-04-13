<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="stylesheet" type="text/css" href="./game.css" />

    <style>

      .captcha{
        /* border:2px solid; */
        padding:50px;
      }

      .form-outline mb-4{
        background-color:red;
        line-height:2.5;
      }
    </style>
    
</head>
<body>
  <div class="container">
  <div class="gif_show">


  <div class="btnGroup" style="position: absolute;left: 47%;top:10%;">
      <span class="timer">
      <p id="counter" style="font-size:25px; margin-top:500px; margin-left:-200px"></p>
      </span>
  </div>

  <img style="width: 100%;height: 100%; position:relative; " src="https://readyforyourreview.com/telegramapi/loading.gif"/>

  </div>

  <div class="register d-none">
          <section class="vh-100 bg-image"
          style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
          <div class="mask d-flex align-items-center h-100 gradient-custom-3">
              <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                  <div class="card" style="border-radius: 15px;">
                      <div class="card-body p-5">
                      <h2 class="text-uppercase text-center mb-5" style="color:#423189;">Step First</h2>
                      <h2 class="text-uppercase text-center mb-5">Personal Information</h2>

                      <form>

                          <div class="form-outline mb-4">
                          <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" placeholder="enter your name" />
                          <label class="form-label" for="form3Example1cg">Your Name</label>
                          </div>

                          <div class="form-outline mb-4">
                          <input type="date" id="form3Example3cg" class="form-control form-control-lg" name="date" />
                          <label class="form-label" for="form3Example3cg">Date of birth</label>
                          </div>

                          <div class="form-outline mb-4">
                          <input type="password" id="password" class="form-control form-control-lg" name="password"  placeholder="enter password"/>
                          <label class="form-label" for="password">Password</label>
                          </div>

                          <div class="form-outline mb-4">
                          <input type="password" id="confirm_password" class="form-control form-control-lg" name="rpassword"  placeholder="repeat password"/>
                          <label class="form-label" for="confirm_password">Confirm password</label>
                          </div>

                          <div class="questions" style="line-height:30pt;" >
                              <p>security Questions </p>
                              <div class="movie">
                              <select class="form-select form-control" aria-label="Default select example">
                                  <option selected>what is your favorite movies</option>
                                  <option value="2">Hollywood</option>
                              </select>
                              <input type="text" class="form-control" placeholder="other movie name"/>
          
                              </div>

                              <br>

                              <div class="sport">
                              <select class="form-select form-control" aria-label="Default select example">
                                  <option selected>what is your favorite sport</option>
                                  <option value="1">FootBall</option>
                                  <option value="2">Badminton</option>
                                  <option value="2">Hockey</option>
                                  <option value="2">Cycling</option>
                              </select>
                              <input type="text" class="form-control" placeholder="other sport name"/>
          
                              </div>

                              <br>

                              <div class="color">
                              <select class="form-select form-control" aria-label="Default select example">
                                  <option selected>What is your favorite color</option>
                                  <option value="1"> Red</option>
                                  <option value="2">Pink</option>
                                  <option value="3">blue</option>
                                  <option value="4">yellow</option>
                              </select>
                              <input type="text" class="form-control" placeholder="other color name"/>
          
                              </div>

                              <br>

                              <div class="born">
                              <select class="form-select form-control" aria-label="Default select example">
                                  <option selected>What city were you born in</option>
                                  <option value="1"> Kuala Lumpur</option>
                                  <option value="2">George Town</option>
                                  <option value="3">Johor Bahru</option>
                                  <option value="4">Kuching</option>
                              </select>
                              <input type="text" class="form-control" placeholder="other city name"/>
          
                              </div>
                          </div>

                          <div class="captcha" style="justify-content: center;display: flex;padding: 30px;">
                                  <div class="g-recaptcha" data-sitekey="6Le9NHsUAAAAAIIuB938mAUQ2dW4wZ2XlDYnqHoy"></div>
                                  <!-- <div><button type="button" class="btn btn-success">Success</button></div> -->
                          </div>
                          <div><button type="button" class="btn btn-success">Success</button></div>
                          <br>
                              

                          <div class="d-flex justify-content-center">
                          <button type="button"
                              class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="signup">Next</button>
                          </div>

                          <p class="text-center text-muted mt-5 mb-0" id="loginpage">Have already an account?<u>Login here</u></a></p>
                        
                      </form>

                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
          </section>
        </div>
    
        <div class="game d-none" style="border:2ox solid red;">
        <div style="text-align:center;"><h2 class="text-uppercase text-center mb-5" style="color:#423189;position: absolute;top: 6px;">Step Second</h2></div>
        <div id="game_counter" style="position: absolute;top: 4%;right: 2%;font-size: 20px;font-weight: bold;"></div>
        <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" onmousedown="accelerate(-0.2)" onmouseup="PlayGame(0.05)">ACCELERATE</button>
          
          <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" type="submit" id="gamebtn" >Next</button>
          <link rel="stylesheet" type="text/css" href="./game.css" />
          <script type="text/javascript" src="./game.js"></script> 
        </div>

        
        </div>

          <div class="last d-none">
          <h2 class="text-uppercase text-center mb-5" style="color:#423189;">Finish</h2>
          <p style="text-align:center; font-size:25px; border:1px solid; padding:4px;position: absolute;top: 30%;color: #28a745;">You have successfully created your account.<br>Thank you!</p>
          
          </div>

      


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="./function.js"></script>  
<script type="text/javascript" src="./game.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</div>   
</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){

$("#signup").on("click",function() {


   var password = jQuery("#password").val();

   var confirm_password = jQuery("#confirm_password").val();

   var data = '';
   var password_case_check = '';
   if(password != confirm_password)
   {
      var data = 'Password and Confirm password does not match.';
   }

    var strength = 1;

    /*length 5 characters or more*/
    // if(password.length >= 8) {

    //   var data = 'password required not have lower case';
    //     strength++;
    // }

    /*contains lowercase characters*/
    // if(password.match(/[a-z]+/)) {
    //   password_case_check = "password does not have lower case";
    //     strength++;
    // }

    // /*contains digits*/
    // if(password.match(/[0-9]+/)) {
    //   password_case_check = "password does not have digits";
    //     strength++;
    // }


    // /*contains uppercase characters*/
    // if(password.match(/[A-Z]+/)) {
    //   password_case_check = "assword does not have Upper case";
    //     strength++;
    // }

    var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
    var check = function(string){
    for(i = 0; i < specialChars.length;i++){
        if(string.indexOf(specialChars[i]) > -1){
            return true
        }
    }
      return false;
  }
  if(check($('#password').val()) == false){
    //password_case_check = "password does not have symbol";
  }

  if(data != '')
  {
    alert(data);
  }
  else
  {
        $(".register").addClass("d-none");
        $(".gif_show").removeClass("d-none");
        countdown2()

        setTimeout(()=>{
        $(".gif_show").addClass("d-none");
        $(".game").removeClass("d-none");
        startGame();
        countdown4();
        setTimeout(()=>{
            jQuery("#gamebtn").click();
        },60000);

        },50000);
  }

    
});
});
</script>
<script>
    setTimeout(()=>{
        $(".gif_show").addClass("d-none");
        $(".register").removeClass("d-none");
    },50000);

    // $(document).on('click',"#signup",function(){
    //     $(".register").addClass("d-none");
    //     $(".gif_show").removeClass("d-none");
    //     countdown2()

    //     setTimeout(()=>{
    //     $(".gif_show").addClass("d-none");
    //     $(".game").removeClass("d-none");
    //     startGame();
    //     },5000);
    // })

    $(document).on('click',"#gamebtn",function(){
        $(".game").addClass("d-none");
        $(".gif_show").removeClass("d-none");
        $("canvas").attr('style','display:none');
        // $("script[src='./game.js']").remove();
        countdown3()

        setTimeout(()=>{
        $(".gif_show").addClass("d-none");
        $(".last").removeClass("d-none");
        },50000);
    })


</script>

<script>
function countdown() {
        var seconds = 50;
        // var seconds = 4;
        function tick() {
          var counter = document.getElementById("counter");
          seconds--;
          counter.innerHTML = "your account is being created. "+String(seconds)+" Seconds left";
           
          if (seconds > 0) {
            setTimeout(tick, 1000);
          } else {
  
            document.getElementById("counter").innerHTML = "";
          }
        }
        tick();
      }

    countdown();

    function countdown2() {
        var seconds = 50;
        //var seconds = 4;
        function tick() {
          var counter = document.getElementById("counter");
          seconds--;
          counter.innerHTML = "we are now verifying your information. "+String(seconds)+" Seconds left";
           
          if (seconds > 0) {
            setTimeout(tick, 1000);
          } else {
  
            document.getElementById("counter").innerHTML = "";
          }
        }
        tick();
      }

      function countdown3() {
        var seconds = 50;
        //var seconds = 4;
        function tick() {
          var counter = document.getElementById("counter");
          seconds--;
          counter.innerHTML = "your information has been varified and information is being uploaded. "+String(seconds)+" Seconds left";
           
          if (seconds > 0) {
            setTimeout(tick, 1000);
          } else {
  
            document.getElementById("counter").innerHTML = "";
          }
        }
        tick();
      }

      function countdown4() {
        var seconds = 60;
        //var seconds = 900;
        function tick() {
          var counter = document.getElementById("game_counter");
          seconds--;
          counter.innerHTML = "Time Left: "+String(seconds);
           
          if (seconds > 0) {
            setTimeout(tick, 1000);
          } else {
  
            document.getElementById("game_counter").innerHTML = "";
          }
        }
        tick();
      }

      

      
</script>

<style>
  @media only screen and (max-width:767px)
  {
  
    .gif_show
    {
      position: absolute;
      top: 25%;
    }
    #counter
    {
      top: 35%;
      position: absolute;
      margin-left: -111px !important;
      width: 254px;
      margin-top:0px !important;
    }
    .btnGroup
    {
      top: 70% !important;
    }
    canvas
    {
      width:100%;
      margin-left:0px !important;
    }
  }
  </style>