<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>free resources</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    
    <!--Favicon-->
    <link rel="shortcut icon" href="https://www.globaledulink.co.uk/wp-content/uploads/2020/01/GEL_Favicon2.png" />
    

 
    
</head>

<body>

<div class="container">
<header>
    <nav class="navbar navbar-expand-xl navbar-light bg-white sticky-top">
        <div class="container">
            <a class=" me-0 col-lg-11 col-md-11 col-9 " href="#">
                <img src="https://www.globaledulink.co.uk/wp-content/uploads/2020/10/gel_log.png" alt="" class="d-inline-block align-text-top">
               
            </a>

           

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
 
            <div class=" col-lg-1 col-md-1 col-sm-1 col-3">
                 <a href="/logout" style><i class="fa fa-sign-out" aria-hidden="true" style="color: rgb(165,9,220);font-size: 30px;" ></i></a>
            </div>
            
        </div>
    </nav>
</header>
        
    <div class="row">
        <!-- side navigation -->
        <div class ="col d-none d-sm-none d-md-inline col-md-3  " style="background-color: aliceblue;">
            <h4>Refine your Search</h4><br>
            <h4>Awarding bodies</h4>
            
                         
                            
            <form action="#" method="post" id="">
                <?php $counter=0; ?>
                @foreach($awards as $award)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"  attr-name="{{$award['name']}}" class="custom-control-input award_checkbox" id="{{$award['id']}}">
                        <label class="custom-control-label" for="{{$award['id']}}">{{$award['name']}}</label>
                    </div>
                    <?php $counter++; ?>
                @endforeach
                
            </form>

            <h4>Courses</h4>
            <div class="courses">
                <p>Awarding body not selected</p>
            </div>
                
            <h4>Resource Type</h4>
            <div class="resources">
                <?php $counter2=0; ?>
                @foreach($rTypes as $rType)
                <!-- <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input resource_checkbox" id={{ $rType}} name="rType[]" value={{ $rType}}>
                    <label for={{ $rType}}>{{ $rType}}</label><br>
                </div> -->
                <div class="custom-control custom-checkbox">
                        <input type="checkbox"  attr-name="{{ $rType}}" class="custom-control-input resource_checkbox" id="{{ $rType}}">
                        <label class="custom-control-label" for="{{ $rType}}">{{ $rType}}</label>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
               
            
            <div class="row m-0 causes_div">

            </div>
        </div>

        <!-- main area -->
        <div class="col-lg-9 col-md-9 col-sm-12">
            
            <div class="courses_cards">
            @foreach($courses as $course)
                <div class="card col-lg-3 col-md-3 col-sm-6" style="float:left" >
                        <img class="card-img-top" src="img/{{$course['url']}}" alt="" > <br>
                        <h6 style="margin:auto;">{{$course['course_name']}}</h6> <br>

                        <div  style="margin: auto; text-align: center;">
                            <button type="submit" class="btn btn-primary" style="border-radius:50px;" > Start Now</button><br><br>
                        
                        </div>
                    </div>
            @endforeach
            </div>
            

        </div>
    </div>
</div>
<br><br>


<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 

<script src=" {{asset('assets/js/filter2.js')}}"></script>
<script src=" {{asset('assets/js/filter3.js')}}"></script>
<script src=" {{asset('assets/js/filter4.js')}}"></script>
</body>










 
   
    


