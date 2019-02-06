@extends('layouts.backend.main')

@section('title', 'MyBlog | Dashboard')

@section('content')

          <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashbboard
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                  
                      <h3>Hello {{ Auth::user()->name }}, Welcome to MyBlog</h3>

                      <h4>Get started</h4>
                      <p><a href="{{ route('backendblog.create') }}" class="btn btn-primary">Write your blog post</a> </p>
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

