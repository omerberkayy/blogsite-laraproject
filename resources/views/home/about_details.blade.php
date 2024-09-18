<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogger Club</title>
    <style>
        .about_img{
            height: auto;
            width: auto;
            padding: 50px;


        }
        .about_taital{
            padding: 30px;

        }
        .about_text{
            padding: 15px;
        }
    </style>
    <!-- basic -->
    @include('home.homecss')
</head>
<body>
<!-- header section start -->
<div class="header_section">
    @include('home.header')
</div>
<div class="row">
<div class="col-md-6">
    <h1 class="about_taital">About Me</h1>
    <p class="about_text"><br>Hi, I'm Ömer Berkay Coşkun, a passionate web developer with a keen interest in creating dynamic and user-friendly websites.
        Currently, I’m working on a variety of projects using Laravel 11, a powerful PHP framework.
        </br>
        <br>
        In this section, I'd love to hear from you! Feel free to share your recommendations or any areas where I can improve.
        Your feedback is highly valued and helps me continue growing and delivering the best possible experience.
        </br>
    </p>
    
</div>
<div class="col-md-6 padding_right_0">
    <div><img src="images/aboutimgnew.jpg" class="about_img"></div>
</div>
</div>
<!-- footer section start -->
@include('home.footer')
<!-- footer section end -->

</body>
</html>
