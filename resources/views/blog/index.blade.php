@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if( !$posts->count())
                    <div class="alert alert-warning">
                        <p>Nothing found</p>
                    </div>
                @else
                    @if (isset($categoryName))
                        <div class="alert alert-info">
                            <p>Category:<strong>{{ $categoryName }}</strong></p>
                        </div>
                    @endif
                    @if (isset($writerName))
                        <div class="alert alert-info">
                            <p>Category:<strong>{{ $writerName }}</strong></p>
                        </div>
                    @endif



                    @foreach($posts as $post)
                    <article class="post-item">
                        @if( $post->image_url )
                        <div class="post-item-image">
                            <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->image_url }}" alt="">
                            </a>
                        </div>
                        @endif
                        <div class="post-item-body">
                            <div class="padding-10">
                                <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                            <p>{{ $post->excerpt }}</p>
                            </div>
                            <div class="post-meta padding-10 clearfix">
                                    <div class="pull-left">
                                           
                                        <ul class="post-meta-group">
                                            <li><i class="fa fa-user"></i><a href="{{ route('writer', $post->writer->slug) }}"> {{ $post->writer->name }}</a></li>
                                            <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                            <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a></li>
                                            <li><i class="fa fa-comments"></i><a href="#">5 Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <a href="post.html">Continue Reading &raquo;</a>
                                    </div>
                                </div>
                            </div>
                    </article>
                    @endforeach
                @endif
                        
                
                <nav>
                    {{-- adding next page in post index --}}
                  {{ $posts->links() }}
                </nav>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>
    

@endsection
