@extends('admin.master')
@php $lang_login = 'auth/login.'; @endphp
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	 	<!-- Content Header (Page header) -->
	    @include('admin.partial.content-header' , ['title' => 'Health' , 'preview'=>'Section'])

	    <!-- Main content -->
	        <section class="content">
	        	 <div class="box box-default">
	                <div class="box-header with-border">
	                    <h3 class="box-title"><!-- About / Vision --></h3>
	                    <div class="box-tools pull-right">
	                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	                    </div>
	                </div><!-- /.box-header -->
	                 <div class="box-body">
	                 	<form action="/healths/1" method="post">
	                 		@csrf
	                 		<input type="hidden" name="_method" value="put">
		                    <div class="row">
		                        <div class="col-md-6">
		                        	@foreach($healths as $health)
		                            <div class="form-group">
		                                <label>{{$health->title_en}}</label>
		                                <input name="title_en[{{$health->id}}]" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$health->title_en}}">
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>image</label>
		                                <input name="image_name[{{ $health->id }}]" type="file" class="form-control" id="exampleInputEmail1" placeholder="">
		                            </div><!-- /.form-group -->
		                            @endforeach
		                        </div><!-- /.col -->
		                        <div class="col-md-6">
		                        	@foreach($healths as $health)
		                            <div class="form-group">
		                                <label>{{$health->title_ar}}</label>
		                                <input name="title_ar[{{$health->id }}]" class="form-control" id="exampleInputEmail1" placeholder=" title_ar" value="{{$health->title_ar}}">
		                            </div><!-- /.form-group -->
		                            @endforeach
		                            <div class="form-group">
		                                <button type="submit" class="btn btn-primary">Update</button>
		                            </div><!-- /.form-group -->
		                        </div><!-- /.col -->
		                    </div><!-- /.row -->
	                    </form>
	                </div><!-- /.box-body -->
	            </div><!-- /.box -->
	        </section>
	    </div><!-- /.content-wrapper -->
@endsection