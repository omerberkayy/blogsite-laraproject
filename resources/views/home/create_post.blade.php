<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blogger Club</title>
    <style type="text/css">
        .div_deg
        {
            text-align: center;
        }
        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            color: white;
        }
        label
        {
            display: inline-block;
            width: 200px;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }
        .field_Deg{
            padding: 20px;

        }




    </style>
    <!-- basic -->
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
        <h3 class="title_deg">Add Post</h3>
        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="field_Deg">
                <label>Title</label>
                <input type="text" name="title">
            </div>

            <div class="field_Deg">
                <label>Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="field_Deg">
                <label>Image</label>
                <input type="file" name="image">
            </div>

            <div class="field_Deg">

                <input type="submit" value="Add Post" class="btn btn-outline-secondary">
            </div>


        </form>
    </div>
</div>


<!-- footer section start -->
@include('home.footer')
<!-- footer section end -->

</body>
</html>
