<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>free resources</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body >

    
    <div class="container ">
            <div class="bg-image img-fluid" style="background-image: url('https://globaledulink.s3.eu-west-2.amazonaws.com/wp-content/uploads/2021/08/11162802/Landing-Pages-02.png');  
            background-repeat: no-repeat; 
            background-position: right; 
            ">
            
        <div style="width: 60%;min-width: 320px;margin-top: 31px;">
          
            <img src="https://www.globaledulink.co.uk/wp-content/uploads/2020/10/gel_log.png"  >

            <h1 style="margin-top: 21px;margin-bottom: 26px;">The most accessible resources you could ever come across</h1>
            <p style="margin-bottom: 32px;">This exclusive website provides Axelos e-books and printed books all at one stop! Housing over 300 Axelos pulications, this platform supplies books aat unbelievable princes! Scroll down to learn more about this amaizing platform.</p>
            <button class="btn btn-primary" type="button" style="background-color: rgb(165,9,220);border: 0;border-radius: 50px;margin-bottom: 9px;"><a href="login" style="text-decoration:none; color:white" data-toggle="modal" data-target="#loginModal">View Free Resources</a></button>
                <div class="table-responsive" style="margin-top: 17px;">
                    <table class="table">
                        <thead>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="margin-right: 20px;"><i class="material-icons" style="font-size:24px; color:yellow;">inventory</i></td><td>Guided Learning Hours(48)</td>
                                <td><i class="material-icons" style="font-size:24px; color:#0574d3; ">next_week</i> </td><td>Course Material</td>
                            </tr>
                            <tr>
                                <td ><i class="material-icons" style="font-size:24px; color:blue; ">person</i></td><td>Tutor Support</td>
                                <td ><i class="material-icons" style="font-size:24px; color:green; ">pending_actions</i></td><td> Assessment Included</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    
        </div>
    </div>
    <!-- login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:21px;">
      <div class="modal-header " style=" background-color:rgb(165,9,220); color:white; border-radius: 20px 20px 0 0;">
        <h5 class="modal-title w-100" id="exampleModalLongTitle"  style="margin: auto; text-align: center; ">LOGIN</h5>
        
      </div>
      <div class="modal-body">
          <h1  style="margin: auto; text-align: center;">Welcome Back!</h1><br>
          <p  style="margin: auto; text-align: center;">What will you learn today? Find out, with GEL</p><br><br>
      <form action="user" method="POST">
      @csrf
        <div class="form-group">
            <input type="email" class="form-control"  name="email" id="InputEmail1" aria-describedby="emailHelp" placeholder="Email" style="width:75% ; margin: auto; ">
            <span style="color:red;"> @error('user'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control"  name="password" id="InputEmail1"  placeholder="Password" style="width:75%; margin: auto; ">
            <span style="color:red;"> @error('password'){{$message}} @enderror</span><br>
        </div>

        <div  style="margin: auto; text-align: center;">
            <button type="submit" class="btn btn-primary" style="border-radius:50px; width:30%" > Login</button><br><br>
            <p>New User? <a href="#" data-toggle="modal" data-target="#signUpModal">Sign up</a></p>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
    <!-- sign up Modal -->
    <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:21px;">
      <div class="modal-header " style=" background-color:rgb(165,9,220); color:white; border-radius: 20px 20px 0 0;">
        <h5 class="modal-title w-100" id="exampleModalLongTitle"  style="margin: auto; text-align: center; ">SIGN UP</h5>
        
      </div>
      <div class="modal-body">
          <h1  style="margin: auto; text-align: center;">Sign Up for free</h1><br>
          <p  style="margin: auto; text-align: center;">Join the World's Largest Free Learning Community</p><br><br>
        <form action="signup" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" name="firstName" placeholder="First Name" class="form-control"  style="width:75%; margin: auto; "><br>
            <span style="color:red;"> @error('firstName'){{$message}} @enderror</span>
          </div>

          <div class="form-group">
            <input type="text" name="lastName" placeholder="Last Name" class="form-control"  style="width:75%; margin: auto; "><br>
            <span style="color:red;"> @error('lastName'){{$message}} @enderror</span>
          </div>

          <div class="form-group">
            <input type="text" name="email" placeholder="Email" class="form-control"  style="width:75%; margin: auto; "><br>
            <span style="color:red;"> @error('email'){{$message}} @enderror</span>
          </div>

          <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control"  style="width:75%; margin: auto; "><br>
            <span style="color:red;"> @error('password'){{$message}} @enderror</span>
          </div>
         
          <div  style="margin: auto; text-align: center;">
            <button type="submit" class="btn btn-primary" style="border-radius:50px; width:30%" > Sign Up</button><br><br>
            <p>Already have an account? <a href="#" data-toggle="modal" data-target="#loginModal">Log In</a></p>
        </div>
          
      </form>
         
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>