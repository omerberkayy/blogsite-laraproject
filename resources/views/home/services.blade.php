
<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">All Posts </h1>

        <div class="services_section_2">
            <div class="row">
                @foreach($post as $post)
                <div  class="col-md-4">
                    <div><img style="margin-bottom: 20px; height: 300px; width: 450px"  src="/postimage/{{$post->image}}" class="services_img"></div>
                    <h4 style="text-align: center"> {{$post->title}}</h4>
                    <p style="text-align: center">Post By <b>{{$post->name}}</b></p>
                    <div class="btn_main" ><a href="{{url('/post_details',$post->id)}}">Read More</a></div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
