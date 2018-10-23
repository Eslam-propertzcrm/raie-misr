@extends('admin.master')
@php $lang_login = 'auth/login.'; @endphp
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
	 	<!-- Content Header (Page header) -->
	    @include('admin.partial.content-header' , ['title' => 'Finances' , 'preview'=>'Section'])

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
	                 	<form action="/finances/1" method="post" enctype="multipart/form-data">
	                 		@csrf
	                 		<input type="hidden" name="_method" value="put">
		                    <div class="row">
		                        <div class="col-md-6">
		                        	@foreach($finances as $finance)
		                            <div class="form-group">
		                                <label>{{$finance->title_en}}</label>
		                                <input name="title_en[{{$finance->id}}]" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$finance->title_en}}">
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>Description En</label>
		                                <textarea class="form-control" rows="3" name="description_en"> {{$finance->description_en}} </textarea>
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>image</label>
		                                <input name="image_name[{{ $finance->id }}]" type="file" class="form-control" id="exampleInputEmail1" placeholder="">
		                            </div><!-- /.form-group -->
		                            @endforeach
		                        </div><!-- /.col -->
		                        <div class="col-md-6">
		                        	@foreach($finances as $finance)
		                            <div class="form-group">
		                                <label>{{$finance->title_ar}}</label>
		                                <input name="title_ar[{{$finance->id}}]" class="form-control" id="exampleInputEmail1" placeholder=" title_ar" value="{{$finance->title_ar}}">
		                            </div><!-- /.form-group -->
		                            <div class="form-group">
		                                <label>Description Ar</label>
		                                <textarea class="form-control" rows="3" name="description_ar[{{$finance->id}}]"> {{$finance->description_ar}} </textarea>
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