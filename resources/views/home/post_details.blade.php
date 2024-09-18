<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogger Club</title>
    <!-- basic -->
    <base href="/public" >
    @include('home.homecss')
</head>
<body>
<!-- header section start -->
<div class="header_section">
    @include('home.header')


    </div>
<div style="text-align: center;" >
    <div><img style="padding: 20px; height: 400px; width: 550px; margin: auto" src="/postimage/{{$post->image}}" ></div>
    <h3> <b>{{$post->title}}</b> </h3>
    <h4 style="padding: 15px"> {{$post->description}} </h4>
    <p>Post By <b>{{$post->name}}</b></p>

</div>
<!-- footer section start -->
@include('home.footer')
<!-- footer section end -->

</body>
</html>
