@extends('back.layout')

@section('stylesheets')
	<!-- iCheck -->
    <link href="{{ asset('adminlte/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href=".{{ asset('adminlte/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('adminlte/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('adminlte/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('adminlte/vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
@endsection

@section('main')
	<div class="right_col" role="main">
     <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Posts</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Add new Post <small>{{ 'Please enter all the information here.' }}</small></h2>
                <ul class="nav navbar-right panel_toolbox">                      
    					  <li>
    						@if ($errors->any())
    							@component('back.alert-danger', ['errors' => $errors->all()])
    								@slot('title')
    									Errors
    								@endslot
    							@endcomponent
    						@endif
    					  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <form name="frmAddPost" class="form-horizontal form-label-left" method="POST" action="{{ url('admin/posts')}}" enctype="multipart/form-data" data-parsley-validate>
				        {{ csrf_field() }}
				
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Post Title <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('title') }}" placeholder="Post Title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Select Category <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="category" name="category[]" class="form-control required" multiple='multiple'>
                        <option value="">Select Category</option>
                        @if(count($categories) > 0)
                        @foreach($categories as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->title }}</option> @endforeach
                        @endif
                      </select>
                    </div>
                  </div>                     

                  <div class="form-group" style="display: none;">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="seo_url">Seo Url/Slug <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" value="" name="seo_url" id="seo_url" class="form-control required" placeholder="Seo Url">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="excerpt">Excerpt <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" value="" name="excerpt" id="excerpt" class="form-control required" placeholder="Short Description">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_title">Meta Title </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="meta_title" name="meta_title" class="form-control col-md-7 col-xs-12" value="{{ old('meta_title') }}" placeholder="Meta Title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_keyword">Meta Keyword </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="meta_keyword" name="meta_keyword" class="form-control col-md-7 col-xs-12" value="{{ old('meta_keyword') }}" placeholder="Meta Keyword">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta_description">Meta Description </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="meta_description" name="meta_description" class="form-control col-md-7 col-xs-12" value="{{ old('meta_description') }}" placeholder="Meta Description">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo_id">Upload Photo </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" value="" name="photo_id" id="photo_id" class="form-control" >
                    </div>
                  </div>
      						
        					<div class="form-group">
        						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
        						<div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:7px;">
        						  <input type="radio" class="flat" name="status" id="status1" value="1" required="" data-parsley-multiple="status" style="position: absolute; opacity: 0;"> Active
        						  
        						  <input type="radio" class="flat" name="status" id="status0" value="0" required="" data-parsley-multiple="status" style="position: absolute; opacity: 0;"> Inactive
        						</div>
        					</div>	

                  	<div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Featured Post </label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:7px;">
                      <input type="checkbox" class="flat" name="featured" id="featured" value="1"  data-parsley-multiple="featured" style="position: absolute; opacity: 0;" />
                      <div style="float:right;"> Freatured post visible in a seperate section on site.</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:7px;">
                      <input type="text" class="form-control" name="tags" id="tags" placeholder="Tags (Commma seperated words)" />
                    </div>
                  </div>

                  <div class="form-group" style="display: none;">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Input Tags</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="tags_1" type="text" class="tags form-control" value="social, adverts, sales" data-tagsinput-init="true" style="display: none;"><div id="tags_1_tagsinput" class="tagsinput" style="width: auto; min-height: 100px; height: 100px;"><span class="tag"><span>social&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><span class="tag"><span>adverts&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><span class="tag"><span>sales&nbsp;&nbsp;</span><a href="#" title="Removing tag">x</a></span><div id="tags_1_addTag"><input id="tags_1_tag" value="" data-default="add a tag" style="color: rgb(102, 102, 102); width: 72px;"></div><div class="tags_clear"></div></div>
                      <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="body">Description </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <textarea rows="3" cols="2" name="body" id="body" class="form-control required" placeholder="Long Description"></textarea>
                    </div>
                  </div>		

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Save User</button>
				              <a href="{{ URL::to('admin/users') }}" class="btn btn-default" >Cancel </a>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
	</div>
</div>
@include('includes.ckeditor')
	
@endsection

@section('scripts')
	<!-- iCheck -->
    <script src="{{ asset('adminlte/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('adminlte/js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/datepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('adminlte/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('adminlte/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('adminlte/vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('adminlte/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('adminlte/vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('adminlte/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('adminlte/vendors/starrr/dist/starrr.js') }}"></script>
	
	<!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
	
    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

    </script>
    <!-- /Parsley -->
    
@endsection