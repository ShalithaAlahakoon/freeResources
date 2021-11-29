<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>free resources</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    

    <!--Favicon-->
    <link rel="shortcut icon" href="https://www.globaledulink.co.uk/wp-content/uploads/2020/01/GEL_Favicon2.png" />
    <

 
    
</head>

<body>

<div class="container">
<header>
    <nav class="navbar navbar-expand-xl navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand me-0" href="#">
                <img src="https://www.globaledulink.co.uk/wp-content/uploads/2020/10/gel_log.png" alt="" class="d-inline-block align-text-top">
               
            </a>

            <!--Responsive icons-->
            <ul class="navbar-nav ms-auto notification-btns d-xl-none flex-row hide-destop">
                <li class="nav-item">
                    <a class="btn btn-icon" href="#"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-icon" href="#">
                        <i class="fa fa-heart"></i>
                        <span class="notification-badge">1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-icon" href="#">
                        <i class="fa fa-shopping-basket"></i>
                        <!--<span class="notification-badge"></span>-->
                    </a>
                </li>
            </ul>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Awarding bodes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Freebies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="btn btn-outline-primary rounded-pill">Enquiry Now</a>
                    </li>
                </ul>
                <ul class="navbar-nav notification-btns ms-auto mb-2 mb-lg-0 d-xl-flex d-none">
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#">
                            <i class="fa fa-heart"></i>
                            <span class="notification-badge">1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-icon" href="#">
                            <i class="fa fa-shopping-basket"></i>
                            <span class="notification-badge d-none">5</span>
                        </a>
                    </li>
                </ul>
                <div class="d-flex loginDiv">
                    <a href="#" class="btn btn-link">Login</a>
                    <a href="#" class="btn btn-info rounded-pill">REGISTER</a>
                </div>
            </div>
        </div>
    </nav>
</header>
        <a href="/logout">Logout</a>
    <div class="row">
        <!-- side navigation -->
        <div class ="col d-none d-sm-none d-md-inline col-3" style="background-color: aliceblue;">
            <h4>Refine your Search</h4><br>
            <h4>Awarding bodies</h4>
            
                         
                            
            <form action="#" method="post" id="">
                <?php $counter=0; ?>
                @foreach($awards as $award)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"  attr-name="{{$award['name']}}" class="custom-control-input category_checkbox" id="{{$award['id']}}">
                        <label class="custom-control-label" for="{{$award['id']}}">{{$award['name']}}</label>
                    </div>
                    <?php $counter++; ?>
                @endforeach
                
            </form>

            <h4>Courses</h4>
            <form action="#" class="courses">
                <p>Awarding body not selected</p>
            </form>
                
            <h4>Resource Type</h4>
            <form action="#">
                @foreach($rTypes as $rType)
                    <input type="checkbox" id={{ $rType}} name="rType[]" value={{ $rType}}>
                    <label for={{ $rType}}>{{ $rType}}</label><br>
                @endforeach
            </form>
            <div class="row m-0 causes_div">

            </div>
        </div>

        <!-- main area -->
        <div class="col-8">
            
            <div class="card-deck-wrapper courses_cards">
            @foreach($courses as $course)
            <!-- 200 150 -->
                <div class="card " style="width:230px; height:300; border-radius: 20px;margin: 5px; float:left">
                    <img class="card-img-top" src="img/{{$course['url']}}" alt="" style="border-radius: 15px 15px 0 0;"> <br>
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
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="widget">
                    <div class="widget-title">Contact Info</div>
                    <div class="contact-infos">
                        <div class="single-info">
                            <div class="icon-wrapper"><i class="fa fa-phone"></i></div>
                            <p><a href="tel:+442034097966">Call Us +4420-3409-7966</a></p>
                        </div>
                        <div class="single-info">
                            <div class="icon-wrapper"><i class="fab fa-whatsapp"></i></div>
                            <p><a href="https://wa.me/+447584056454">Whatsapp Us +4475-8405-6454</a></p>
                        </div>
                        <div class="single-info">
                            <div class="icon-wrapper"><i class="fa fa-envelope"></i></div>
                            <p><a href="mailto:support@globaledulink.co.uk">Support@globaledulink.co.uk</a></p>
                        </div>
                        <div class="single-info">
                            <div class="icon-wrapper"><i class="fa fa-map-marker"></i></div>
                            <p>CityPoint, 1 Ropemaker Street, London, EC2Y 9HU</p>
                        </div>
                    </div>
                    <ul class="social-links justify-content-lg-between justify-content-center">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <div class="d-inline-block verify_btn mt-4 w-100">
                        <a href="#" class="btn w-100 rounded-pill btn-outline-primary">Verify Your Certificate</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="widget">
                    <div class="widget-title">Quick Links</div>
                    <ul class="links">
                        <li><a href="#">About us</a></li>
                        <li><a href="Instructor.html">Become an Instructor</a></li>
                        <li><a href="corporate-training.html">Corporate Training</a></li>
                        <li><a href="our-partners.html">Our Partners</a></li>
                        <li><a href="awarding-bodies.html">Accrediting Bodies</a></li>
                        <li><a href="#">Special Offers</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">live online classes</a></li>
                        <li><a href="#">online courses</a></li>
                        <li><a href="#">classroom courses</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="widget">
                    <div class="widget-title">Resources</div>
                    <ul class="links">
                        <li><a href="#">Free Courses</a></li>
                        <li><a href="#">Free Resources</a></li>
                        <li><a href="#">FREE Webinars</a></li>
                        <li><a href="#">Practice Lab</a></li>
                        <li><a href="#">COURSE BUNDLES</a></li>
                        <li><a href="#">Course Library</a></li>
                        <li><a href="#">Books</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <div class="widget">
                    <div class="widget-title">Support</div>
                    <ul class="links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="our-partners.html">Our Partners</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-6 col-6">
                <div class="widget">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="https://globaledulink.s3.eu-west-2.amazonaws.com/wp-content/uploads/2021/08/02182743/foot-rigt-iconss.jpg" class="img-fluid">
                    </div>
                    <div class="d-flex align-items-center justify-content-md-center w-100 Imags2nd">
                        <!-- <img src="assets/images/footer-logo-2.png" class="img-fluid me-2">
                        <img src="assets/images/footer-logo-3.png" class="img-fluid"> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-6 col-12">
                <div class="copyRight d-flex align-items-center justify-content-md-start justify-content-center">Copyright © 2021 -Globaledulink - All Rights Reserved.</div>
            </div>
            <div class="sectery_icon col-lg-5 col-md-6 col-12 text-md-right">
                <!-- <div class="row">
                    <div class="col"><div class="bg-white p-1 rounded-3"><img src="assets/images/image-65.png" class="img-fluid"></div></div>
                    <div class="col"><div class="bg-white p-1 rounded-3"><img src="assets/images/image-67.png" class="img-fluid"></div></div>
                    <div class="col"><div class="bg-white p-1 rounded-3"><img src="assets/images/image-68.png" class="img-fluid"></div></div>
                    <div class="col"><div class="bg-white p-1 rounded-3"><img src="assets/images/image-69.png" class="img-fluid"></div></div>
                </div> -->
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 

<script src=" {{asset('assets/js/filter2.js')}}"></script>
<script src=" {{asset('assets/js/filter3.js')}}"></script>
</body>










 
   
    


