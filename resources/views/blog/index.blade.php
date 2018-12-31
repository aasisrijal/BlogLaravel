@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <article class="post-item">
                    @if($post->image)
                    <div class="post-item-image">
                        <a href="post.html">
                        <img src="/img/{{ $post->image }}" alt="">
                        </a>
                    </div>
                    @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="post.html">{{ $post->title }}</a></h2>
                        <p>{{ $post->excerpt }}</p>
                        </div>

                        
                    </div>
                </article>
                @endforeach
            
                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> Dec 31, 2018</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Vue Js</a>, <a href="#"> Laravel</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="post.html">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    
                
                <nav>
                  <ul class="pager">
                    <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>
                    <li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
                </nav>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>
    

@endsection
