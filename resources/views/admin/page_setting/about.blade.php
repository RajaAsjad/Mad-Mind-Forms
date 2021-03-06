@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title </label>
							<div class="col-sm-9">
								<input type="text" name="about_heading" class="form-control" value="{!! isset($page_data['about_heading'])?$page_data['about_heading']:'' !!}" placeholder="Enter heading">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">About Content </label>
							<div class="col-sm-9">
								<textarea name="about_content" class="form-control texteditor" cols="30" rows="10" placeholder="Enter left content">{!! isset($page_data['about_content'])?$page_data['about_content']:'' !!}</textarea>
							</div>
						</div>
						@if(isset($page_data['about_side_image']))
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Existing Image</label>
								<div class="col-sm-6" style="padding-top:6px;">
									<img src="{{ asset('/public/admin/assets/images/page/'.$page_data['about_side_image']) }}" class="existing-photo" style="height:180px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Side Image </label>
							<div class="col-sm-9">
								<input type="file" name="about_side_image" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on Home? </label>
							<div class="col-sm-2">
								<select name="about_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['about_status'])?($page_data['about_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['about_status'])?($page_data['about_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
@push('js')
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
	});
</script>
@endpush