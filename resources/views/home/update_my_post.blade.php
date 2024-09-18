<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogger Club</title>
    <style type="text/css">

        .div_deg {
            text-align: center;
            background-color: black;
            padding: 15px;
        }

        .title_deg {
            font-size: 24px;
            font-weight: bold;
            color: white;


        }
        .input_Deg{
            padding: 15px;

        }

        label {
            display: inline-block;
            width: 200px;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }
        .img_deg{
            height: 150px;
            width: 250px;
            margin: auto;
            padding: 30px;

        }

    </style>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')
</head>
<body>
@include('sweetalert::alert')
<!-- header section start -->
<div class="header_section">
    @include('home.header')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}
        </div>

    @endif

    <div class="div_deg">
        <h3 class="title_deg">Update Post</h3>
        <form action="{{url('update_data',$post_update->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf


            <div class="input_Deg">
                <label>Title</label>
                <input  type="text" name="title" value="{{$post_update->title}}">
            </div>

            <div class="input_Deg">
                <label>Description</label>
                <textarea name="description">{{$post_update->description}}</textarea>
            </div>

            <div >
                <label>Old Image</label>
                <img height="150px" width="150px" style="margin: auto" src="/postimage/{{$post_update->image}}">
            </div>

            <div class="img_deg">
                <label>Update Image</label>
                <input type="file" name="image">
            </div>

            <div class="field_Deg">

                <input type="submit"  class="btn btn-outline-secondary">
            </div>


        </form>
    </div>


    <!-- footer section start -->
    @include('home.footer')
    <!-- footer section end -->

</body>
</html>
