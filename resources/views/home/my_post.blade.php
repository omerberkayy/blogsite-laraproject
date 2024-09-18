<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogger Club</title>
    <style>
        .post_deg
        {
            padding: 30px;
            text-align: center;
            background-color: black;

        }
        .title_deg{
            padding: 15px;
            font-size: 30px;
            font-weight: bold;
            color: whitesmoke;
        }
        .post_deg{
            padding: 15px;
            font-size: 30px;
            font-weight: bold;
            color: whitesmoke;
        }
        .img_deg{
            height: 300px;
            width: 400px;
            padding: 30px;
            margin: auto;
        }

    </style>
    <!-- basic -->
    @include('home.homecss')
</head>
<body>
<!-- header section start -->
<div class="header_section">
    @include('home.header')
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type=button class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

    @endif
    @foreach($data as $data)
    <div class="post_deg">
        <img class="img_deg" src="/postimage/{{$data->image}}">
        <h4 class="title_deg">{{$data->title}}</h4>
        <p class="desc_deg">{{$data->description}}</p>

        <a href="{{url('update_my_post',$data->id)}}" class="btn btn-outline-secondary" >Update</a>
        <a onclick="return confirm('are you sure to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
    </div>


    @endforeach


</div>
<!-- footer section start -->
@include('home.footer')
<!-- footer section end -->

</body>
</html>
