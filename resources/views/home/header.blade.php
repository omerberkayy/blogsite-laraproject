<style>

    .logo {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .img_deg {
        max-width: 100%;
        height: auto;
    }
</style>


<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about_details">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/all_posts">All Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/create_post">Create Post</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/my_post">My Posts</a>
                    </li>

                    @if (Route::has('login'))
                        @auth

                            @if(Auth::user()->usertype == 'admin') <!-- Admin kontrolü -->
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.adminhome') }}">Dark Admin Panel</a></li>
                            @endif

                                <li>        <x-app-layout></x-app-layout>

                        @else
                            <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>

                            <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>

                        @endauth
                    @endif


                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo">
            <a href="/"><img height="100" width="100"  class="img_deg" src="images/newlogo.png"></a></div>
        <div class="menu_main">
            <ul>

                <li class="active"><a href="/">Home</a></li>
                <li><a href="/about_details">About</a></li>
                <li><a href="/all_posts">All Posts</a></li>
                <li><a href="/create_post">Create Post</a></li>
                <li><a href="/my_post">My Posts</a></li>

                @if (Route::has('login'))
                    @auth

                        @if(Auth::user()->usertype == 'admin') <!-- Admin kontrolü -->
                        <li><a href="{{ route('admin.adminhome') }}">Dark Admin Panel</a></li>
                        @endif

                        <li>        <x-app-layout></x-app-layout>


                    @else
                        <li><a href="{{route('login')}}">Login</a></li>

                        <li><a href="{{route('register')}}">Register</a></li>

                    @endauth
                @endif

            </ul>
        </div>
    </div>
</div>
