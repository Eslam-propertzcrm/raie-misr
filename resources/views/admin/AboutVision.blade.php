@extends('admin.master')
@php $lang_login = 'auth/login.'; @endphp
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	 	<!-- Content Header (Page header) -->
	    @include('admin.partial.content-header' , ['title' => 'About / Vision', 'preview'=>'Section'])

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
	                 	<form action="/aboutvisions/{{$aboutVision->id}}" method="post">
	                 		@csrf
	                 		<input type="hidden" name="_method" value="put">
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>title_ar</label>
		                                <input name="title_ar" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$aboutVision->title_ar}}">
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>description_ar</label>
		                                <textarea name="description_ar" class="form-control" rows="3" placeholder="">{{$aboutVision->description_ar}}</textarea>
		                            </div><!-- /.form-group -->
		                        </div><!-- /.col -->
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label>title_en</label>
		                                <input name="title_en" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$aboutVision->title_en}}">
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>description_en</label>
		                                <textarea name="description_en" class="form-control" rows="3" placeholder="">{{$aboutVision->description_en}}</textarea>
		                            </div><!-- /.form-group -->
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