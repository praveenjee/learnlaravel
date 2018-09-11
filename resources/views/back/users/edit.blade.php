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
                <h3>Users</h3>
              </div>
              <!--<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit User <small>{{ 'Update user details here' }}</small></h2>
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
                    <form name="frmUpdateUser" class="form-horizontal form-label-left" method="POST" action="{{ route('users.update', [$user->id]) }}" enctype="multipart/form-data" data-parsley-validate>
        						{{ csrf_field() }}
        						{{ method_field('PUT') }}
        						<div class="form-group">
        							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
        							<div class="col-md-6 col-sm-6 col-xs-12">
        							  <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('name', $user->name) }}">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
        							<div class="col-md-6 col-sm-6 col-xs-12">
        							  <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('email', $user->email) }}">
        							</div>
        						</div>
        						<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default {{ ($user->gender == 'M') ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">	
                            <input type="radio" name="gender" value="M" {{ ($user->gender == 'M') ? 'checked="checked"' : "" }} > Male 
                          </label>                            
                          <label class="btn btn-default {{ ($user->gender == 'F') ? 'active' : '' }}" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="F" {{ ($user->gender == 'F') ? 'checked="checked"' : "" }} > Female 
                          </label>							
                          </div>
                      </div>
            </div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthday" name="dob" class="date-picker form-control col-md-7 col-xs-12" type="text" value="{{ old('dob', $user->dob) }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="password" name="password" class="form-control col-md-7 col-xs-12" type="password" value="{{ old('password', $user->password) }}" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="profileimage">Profile Image <br><small>(Optional)</small></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" id="profileimage" name="profileimage" class="form-control col-md-7 col-xs-12" />
							</div>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<img src="{{ asset('uploads/users/' . $user->profileimage )}}" width="75" alt="{{$user->name}}" title="{{$user->name}}" />
							</div>
						</div>
					<div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="contactno" name="contactno" class="form-control col-md-7 col-xs-12" type="text" autocomplete="off" value="{{ old('contactno', $user->contactno) }}">
              </div>
          </div>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
						<div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:7px;">
						  <input type="radio" class="flat" name="status" id="status1" value="1" required="" data-parsley-multiple="status" style="position: absolute; opacity: 0;" {{ ($user->status == 1) ? 'checked="checked"' : "" }} > Active 
						  
						  <input type="radio" class="flat" name="status" id="status0" value="0" required="" data-parsley-multiple="status" style="position: absolute; opacity: 0;" {{ ($user->status == 0) ? 'checked="checked"' : "" }} > Inactive
						</div>
					</div>	
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">						  
                  <button type="submit" class="btn btn-success">Edit User</button>
		                <a href="{{ URL::to('admin/users') }}" class="btn btn-primary" >Cancel </a>
                </div>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>
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

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

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

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->
@endsection