@extends('layouts.backend.main')

@section('title', 'MyBlog | Blog Create')


@section('content')

          <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blog
        <small>Create New Posts</small>
      </h1>
        {{-- <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol> --}}
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                   {!! Form::model($post, [
                       'method' => 'POST',
                       'route' => 'backendblog.store'
                   ]) !!}
                   <div class="form-group">
                       {!! Form::label('title')  !!}
                       {!! Form::text('title', null, ['class' => 'form-control']) !!}
                   </div>

                   {!! Form::close() !!}
                      
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    

@endsection

