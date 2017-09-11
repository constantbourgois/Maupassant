<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Maupassant </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
		crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!--FOR JQUERY FILE UPLOAD !-->
		<!-- Generic page styles -->
		<link rel="stylesheet" href="<?= base_url('assets/jfu/css/style.css'); ?>">
		<!-- blueimp Gallery styles -->
		<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" href="<?= base_url('assets/jfu/css/jquery.fileupload.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('assets/jfu/css/jquery.fileupload-ui.css'); ?>">
		<!-- CSS adjustments for browsers with JavaScript disabled -->
		<noscript>
			<link rel="stylesheet" href="<?= base_url('assets/jfu/css/jquery.fileupload-noscript.css'); ?>">
		</noscript>
		<noscript>
			<link rel="stylesheet" href="<?= base_url('assets/jfu/css/jquery.fileupload-ui-noscript.css'); ?>">
		</noscript>
		<style>
			img {
				max-width: 100%;
			}

			#table_events,
			#databasepic,
			#table_event_info {
				background-color: #f2f2f2;
			}

			#databasepic {
				background-color: lightgrey;
				display: inline-block;
			}

			#databasepic .pic-container {
				border: 1px solid #ddd;
			}

			.logo-cell {
				background-color:lightgrey;
				
			}
			.modal-dialog{

				width:90%!important;
			}

			.modal-dialog img{
				max-width:70%!important;
				margin:3%;
				
				background-color:#efefea;

			}

			img{
				
				
			}

			#logo_input{
				
			}

		</style>
	</head>

	<body>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="menu">
			</section>
			<!-- Main content -->
			<section class="content">
				<!-- Small boxes (Stat box) -->
				<div class="container">
					</center>
					<h3>Events</h3>
					<br />
					<button class="btn btn-success" id="btnAddevent"><i class="glyphicon glyphicon-plus"></i> Add Event</button>
					<br />
					<br />
					<table id="table_events" class="table table-bordered" cellspacing="2" width="100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>date</th>
								<th>title</th>
								<th>description</th>
								<th>logo</th>
								<th>background image 1</th>
								<th>background image 2 </th>
								<th>selected background </th>
								<th>link</th>
								<th>view_rank</th>
								<th> event info title </th>
								<th> event info description </th>
								<th> event info date champ1</th>
								<th> event info date champ2</th>
								<th> event info date champ3</th>
								<th> event info logo </th>
								<th> event info picture </th>
								<th> event info link </th>
								<th> event info link logo </th>
								<th style="width:125px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($events as $event) {?>
							<tr>
								<td>
									<?php echo $event->id; ?>
								</td>
								<td>
									<?php if (!empty($event->date))
										echo $newDate = date("d/m/Y", strtotime($event->date));?>
								</td>
								<td>
									<?php echo $event->title; ?>
								</td>
								<td>
									<?php echo $event->description; ?>
								</td>
								<td class="logo-cell"><img src="<?php echo base_url()?>uploads/files/<?php echo $event->logo; ?>" alt="logo"></td>
								<td><img src="<?php echo base_url()?>uploads/files/<?php echo $event->background_image; ?>" alt="bg_image"></td>
								<td><img src="<?php echo base_url()?>uploads/files/<?php echo $event->background_image_2; ?>" alt="bg_image"></td>
								<td>
									<?php echo $event->background_select;?>
								</td>
								<td>
									<?php echo $event->link;?>
								</td>
								<td>
									<?php echo $event->view_rank;?>
								</td>

								<td>
									<?php echo $event->title_event_info; ?>
								</td>
								<td>
									<?php echo $event->description_event_info; ?>
								</td>
								<td>
									<?php echo $event->date_event_info; ?>
								</td>
								<td>
									<?php echo $event->champ2_event_info; ?>
								</td>
								<td>
									<?php echo $event->champ3_event_info; ?>
								</td>
								<td class="logo-cell"><img src="<?php echo base_url()?>uploads/files/<?php echo $event->logo_event_info; ?>" alt="logo"></td>
								<td><img src="<?php echo base_url()?>uploads/files/<?php echo $event->picture_event_info; ?>" alt="picture"></td>
								<td id="evlink">
									<?php echo $event->link_event_info;?>
								</td>
								<td id="lglink">
									<?php echo $event->linklogo_event_info;?>
								</td>
								<td>
									<button data-event-id="<?php echo $event->id; ?>" class="btn btn-warning btnEditevent"><i class="glyphicon glyphicon-pencil"></i></button>
									<button data-event-id="<?php echo $event->id; ?>" class="btn btn-danger btnDeleteevent"><i class="glyphicon glyphicon-remove"></i></button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot style="display:none">
							<tr>
								<th>ID</th>
								<th>date</th>
								<th>title</th>
								<th>description</th>
								<th>logo</th>
								<th>background image</th>
								<th>background image 2</th>
								<th>link</th>
								<th>view_rank</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- Bootstrap modal -->
				<div class="modal fade" id="modal_form" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h3 class="modal-title">Event Form</h3>
							</div>
							<div class="modal-body form">
								<div class="form-group">
									<form id="fileupload2" class="fileupload" action="adminevents/json" method="POST" enctype="multipart/form-data">
										<!-- Redirect browsers with JavaScript disabled to the origin page -->
										<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
										<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
										<div class="row fileupload-buttonbar">
											<div class="col-md-6">
												<!-- The fileinput-button span is used to style the file input field as button -->

												<div class="form-group">
													<label class="control-label col-md-3">background image</label>
													<div class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input id="file_background" type="file" name="files" multiple>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">background image 2</label>
													<div class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input id="file_background_2" type="file" name="files" multiple>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">logo</label>
													<div class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input id="file_logo" type="file" name="files" multiple>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">logo event info</label>
													<div class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input id="file_logo_event_info" type="file" name="files" multiple>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">picture event info</label>
													<div class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input id="file_picture" type="file" name="files" multiple>
													</div>
												</div>
												<button type="submit" class="btn btn-primary start">
													<i class="glyphicon glyphicon-upload"></i>
													<span>Start upload</span>
												</button>
												<button type="reset" class="btn btn-warning cancel">
													<i class="glyphicon glyphicon-ban-circle"></i>
													<span>Cancel upload</span>
												</button>
												<button type="button" class="btn btn-danger delete">
													<i class="glyphicon glyphicon-trash"></i>
													<span>Delete</span>
												</button>
												<input type="checkbox" class="toggle">
												<!-- The global file processing state -->
												<span class="fileupload-process"></span>
											</div>
											<!-- The global progress state -->
											<div class="col-lg-5 fileupload-progress fade">
												<!-- The global progress bar -->
												<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
													<div class="progress-bar progress-bar-success" style="width:0%;"></div>
												</div>
												<!-- The extended global progress state -->
												<div class="progress-extended">&nbsp;</div>
											</div>
										</div>
										<!-- The table listing the files available for upload/download -->
										<table role="presentation" class="table table-striped">
											<tbody class="files"></tbody>
										</table>
									</form>
								</div>
								<form action="#" id="form" class="form-horizontal">
									<input type="hidden" value="" name="id" />
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">background image</label>
											<button class="btn btn-danger delete" id="delete-bg"><i class="glyphicon glyphicon-trash"></i></button>
											<div class="col-md-9">
												<img id="background_image_input" class="img-responsive" src="//" alt="image"> 
												<div class="col-md-12">file name <input name="background_image" class="form-control" ></div>
		
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">background image 2</label>
											<button class="btn btn-danger delete" id="delete-bg-2"><i class="glyphicon glyphicon-trash"></i></button>
											<div class="col-md-9">
												<img id="background_image_input_2" class="img-responsive" src="//" alt="image"> 
												<div class="col-md-12">file name <input name="background_image_2" class="form-control" ></div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">choose background to display </label>
											<select name="background_select" id="background_select">
												<option value="background_image_1">background image 1</option> 
												<option value="background_image_2">background image 2</option>
										  	</select>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">logo</label>
											<button class="btn btn-danger delete" id="delete-logo"><i class="glyphicon glyphicon-trash"></i></button>
											<div class="col-md-9">
												<img id="logo_input" src="//" alt="logo">
												<div class="col-md-12">file name <input name="logo" class="form-control" ></div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">date</label>
											<div class="col-md-9">
												<input class="datepicker form-control" name="date" placeholder="event date" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">title</label>
											<div class="col-md-9">
												<input name="title" placeholder="title" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">description</label>
											<div class="col-md-9">
												<textarea name="description" form="form" rows="10" placeholder="description" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">link</label>
											<div class="col-md-9">
												<input name="link" placeholder="link" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">view rank</label>
											<div class="col-md-9">
												<input name="view_rank" placeholder="view_rank" class="form-control" type="number">
											</div>
										</div>
										<!-- Event info -->
										<div class="col-md-12 bg-info text-center"> LIGHTBOX EVENT INFO</div>
										<div class="form-group">
											<label class="control-label col-md-3">logo</label>
											<div class="col-md-9">
												<button class="btn btn-danger delete" id="delete-logo-event_info"><i class="glyphicon glyphicon-trash"></i></button>
												<img id="logo_event_info_input" src="//" alt="image">
												<div class="col-md-9"> file name <input name="logo_event_info" class="form-control"></div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">picture</label>
											<div class="col-md-9">
												<button class="btn btn-danger delete" id="delete-picture_event_info"><i class="glyphicon glyphicon-trash"></i></button>
												<img id="picture_input" class="col-md-9" src="//" alt="picture">
												<div class="col-md-9">file name <input name="picture_event_info" class="form-control"></div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">date champ1</label>
											<div class="col-md-9">
												<input name="date_event_info" placeholder="event date" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">date champ2</label>
											<div class="col-md-9">
												<input name="champ2_event_info" placeholder="event date" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">date champ3</label>
											<div class="col-md-9">
												<input name="champ3_event_info" placeholder="event date" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">title</label>
											<div class="col-md-9">
												<input name="title_event_info" placeholder="title" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">description</label>
											<div class="col-md-9">
												<textarea name="description_event_info" form="form" rows="10" placeholder="description" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">link</label>
											<div class="col-md-9">
												<input name="link_event_info" placeholder="link_event_info" class="form-control" type="text">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">link logo</label>
											<div class="col-md-9">
												<input name="linklogo_event_info" placeholder="linklogo_event_info" class="form-control" type="text">
											</div>
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" id="btnSave" class="btn btn-primary">Save</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									</div>
								</form>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
				</div>
				<!-- /.modal -->
				<!-- End Bootstrap modal -->
				<!-- ./col -->
				<!-- /.row -->
				<!-- Main row -->
				<!-- /.row (main row) -->
			</section>
			<section id="picture_database">
				<div class="container">
					</center>
					<h3>Pictures database</h3>
					<form id="databasepic" action="#">
						<?php for ($i = 0; $i < count($thumbnails)-1;$i++) { ?>
						<div class="pic-container col-md-4 bg-faded">
							<label class="control-label"><?php echo $thumbnails[$i] ?></label>
							<div class="">
								<div class="text-center">
									<span class="">
										<img class="img-thumbnail center-block" src="<?php echo base_url()?>uploads/files/thumbnail/<?php echo $thumbnails[$i]; ?>" alt="picture">
								</span>
									<input class="text-center" name="deletePictures[]" value="<?php echo $thumbnails[$i]?>" type="checkbox">

								</div>
							</div>
						</div>
						<?}?>
							<div class="form-group col-md-12 ">
								<button id="subdelFiles" class="btn btn-danger delete">Delete</button>
							</div>

					</form>
				</div>
			</section>

			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<!-- Control Sidebar -->
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
		<script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-upload fade">
				<td>
					<span class="preview"></span>
				</td>
				<td>
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td>
					<p class="size">Processing...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
						<div class="progress-bar progress-bar-success" style="width:0%;"></div>
					</div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary start" disabled>
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start</span>
              </button> {% } %} {% if (!i) { %}
					<button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
				</td>
			</tr>
			{% } %}
		</script>
		<!-- The template to display files available for download -->
		<script id="template-download" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade">
				<td>
					<span class="preview">
              {% if (file.thumbnailUrl) { %}
                  <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
              {% } %}
          </span>
				</td>
				<td>
					<p class="name">
						{% if (file.url) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a>						{% } else { %}
						<span>{%=file.name%}</span> {% } %}
					</p>
					{% if (file.error) { %}
					<div><span class="label label-danger">Error</span> {%=file.error%}</div>
					{% } %}
				</td>
				<td>
					<span class="size">{%=o.formatFileSize(file.size)%}</span>
				</td>
				<td>
					{% if (file.deleteUrl) { %}
					<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials)
					{ %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                  <i class="glyphicon glyphicon-trash"></i>
                  <span>Delete</span>
              </button>
					<input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
					<button class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
              </button> {% } %}
				</td>
			</tr>
			{% } %}
		</script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

		<script src="<?= base_url('assets/jfu/js/vendor/jquery.ui.widget.js'); ?>"></script>
		<!-- The Templates plugin is included to render the upload/download listings -->
		<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
		<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
		<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
		<!-- The Canvas to Blob plugin is included for image resizing functionality -->
		<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
		<!-- blueimp Gallery script -->
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="<?= base_url('assets/jfu/js/jquery.iframe-transport.js'); ?>"></script>
		<!-- The basic File Upload plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload.js'); ?>"></script>
		<!-- The File Upload processing plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-process.js'); ?>"></script>
		<!-- The File Upload image preview & resize plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-image.js'); ?>"></script>
		<!-- The File Upload audio preview plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-audio.js'); ?>"></script>
		<!-- The File Upload video preview plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-video.js'); ?>"></script>
		<!-- The File Upload validation plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-validate.js'); ?>"></script>
		<!-- The File Upload user interface plugin -->
		<script src="<?= base_url('assets/jfu/js/jquery.fileupload-ui.js'); ?>"></script>
		<!-- The main application script -->
		<script src="<?= base_url('assets/jfu/js/main.js'); ?>"></script>

		<script type="text/javascript">
			$(document).ready(function () {
				var save_method;
				var table;

				// set the events on clicks //
				$('#editBtneventinfo').click(function () {
					update_event_info();
				});
				$('.btnEditevent').click(function () {
					edit_event($(this).attr('data-event-id'));
				});
				$('.btnDeleteevent').click(function () {
					delete_event($(this).attr('data-event-id'));
				});
				$('#btnAddevent').click(function () {
					add_event();
				});
				$('#btnSave').click(function () {
					save();
				});
				$('#delete-bg, #delete-logo, #delete-bg-2, #delete-logo-event_info, #delete-picture_event_info').click(function (event) {
					event.preventDefault();
					delete_element(event);
				});
				$("#subdelFiles").click(function (e) {
					e.preventDefault();
					if (window.confirm("Are you sure?")) {
						deletepicturesdb();
					}


				})

				// initiates plugins //
				$(function () {
					$(".datepicker").datepicker({
						dateFormat: 'dd/mm/yy',
					
						
					});
				});


				$('.fileupload').each(function () {
					$(this).fileupload({
						dropZone: $(this),
						limitMultiFileUploads: 1,
						maxNumberOfFiles: 2,
						maxFileSize: 3000000,
					});
				});

				$('#table_events').DataTable({
					"scrollX": true,
				});

				$('#fileupload2')
					.bind('fileuploaddone', function (e, data) {

						if (data.fileInput[0].id == "file_background") {
							var im = data.files[0].name;
							$('[name="background_image"]').val(im);
							$('#background_image_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + im);


						} else if (data.fileInput[0].id == "file_logo") {
							var im = data.files[0].name;
							$('[name="logo"]').val(im);
							$('#logo_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + im);

						} else if (data.fileInput[0].id == "file_background_2") {
							var im = data.files[0].name;
							$('[name="background_image_2"]').val(im);
							$('#background_image_input_2').attr('src', "<?php echo base_url()?>" + "uploads/files/" + im);


						} else if (data.fileInput[0].id == "file_picture") {
							var im = data.files[0].name;
							$('[name="picture_event_info"]').val(im);
							$('#picture_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + im);



						} else if (data.fileInput[0].id == "file_logo_event_info") {
							var im = data.files[0].name;
							$('[name="logo_event_info"]').val(im);
							$('#logo_event_info_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + im);

						}

						$("table tbody.files").empty();

					});

				//************************************* for the events ***************************************************************************//


				function add_event() {
					save_method = 'add';
					$('#form')[0].reset();
					$('#fileupload2')[0].reset();
					$("table tbody.files").empty();
					$("form img").attr('src','');
					// reset form on modals
					$('#modal_form').modal('show'); // show bootstrap modal
					//$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
				}

				function edit_event(id) {

					save_method = 'update';
					$('#form')[0].reset();
					$('#fileupload2')[0].reset();
					/*$('#fileupload_event_info')[0].reset();*/
					$("table tbody.files").empty();
					// reset form on modals

					//Ajax Load data from ajax
					$.ajax({
						url: "<?php echo site_url('/adminevents/ajax_edit')?>/" + id,
						type: "GET",
						dataType: "JSON",
						success: function (data) {
							// fill the form//
							$('[name="id"]').val(data.id);
							$('[name="date"]').val(data.date);
							$('[name="title"]').val(data.title);
							$('[name="description"]').val(data.description);
							$('[name="logo"]').val(data.logo);
							$('[name="background_image"]').val(data.background_image);
							$('[name="background_image_2"]').val(data.background_image_2);
							$('[name="background_select"]').val(data.background_select);
							$('[name="link"]').val(data.link);
							$('[name="view_rank"]').val(data.view_rank);
							$('[name="date_event_info"]').val(data.date_event_info);
							$('[name="champ2_event_info"]').val(data.champ2_event_info);
							$('[name="champ3_event_info"]').val(data.champ3_event_info);
							$('[name="title_event_info"]').val(data.title_event_info);
							$('[name="description_event_info"]').val(data.description_event_info);
							$('[name="logo_event_info"]').val(data.logo_event_info);
							$('[name="picture_event_info"]').val(data.picture_event_info);
							$('[name="link_event_info"]').val(data.link_event_info);
							$('[name="linklogo_event_info"]').val(data.linklogo_event_info);
							// links of images//
							$('#picture_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + data.picture_event_info);
							$('#logo_event_info_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + data.logo_event_info);
							$('#background_image_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + data.background_image);
							$('#background_image_input_2').attr('src', "<?php echo base_url()?>" + "uploads/files/" + data.background_image_2);
							$('#logo_input').attr('src', "<?php echo base_url()?>" + "uploads/files/" + data.logo);
							// show modal//
							$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
							$('.modal-title').text('Edit Event'); // Set title to Bootstrap modal title

						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert('Error get data from ajax');
						}
					});
				}

				function save() {
					var url;
					var dataForm;
					if (save_method == 'add') {
						url = "<?php echo site_url('/adminevents/add_event')?>";
					} else {

						url = "<?php echo site_url('/adminevents/event_update') ?>";
						
					}
					
					dataForm = $('#form');

					// ajax adding data to database
					$.ajax({
						url: url,
						type: "POST",
						data: dataForm.serialize(),
						dataType: "html",
						success: function (data) {

							//if success close modal and reload ajax table
							$('#modal_form').modal('hide');
							
							location.reload(); // for reload a page
						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert('Error adding / update data');
						}
					});
				}

				function delete_element(event) {
					event.preventDefault();

					id = $('[name="id"]').val();
					console.log(event.currentTarget.id);

					if (event.currentTarget.id == 'delete-bg') {
						$('[name="background_image"]').val("");
						$('#background_image_input').attr('src', "");
						
					} else if (event.currentTarget.id == "delete-bg-2") {
						$('[name="background_image_2"]').val("");
						$('#background_image_input_2').attr('src', "");

					} else if (event.currentTarget.id == "delete-picture_event_info") {
						$('[name="picture_event_info"]').val("");
						$('#picture_input').attr('src', "");


					} else if (event.currentTarget.id == "delete-logo-event_info") {
						$('[name="logo_event_info"]').val("");
						$('#logo_event_info_input').attr('src', "");

					}
					else if (event.currentTarget.id == "delete-logo") {
						$('[name="logo"]').val("");
						$('#logo_input').attr('src', "");

					}


				}

				function delete_event(id) {

					if (confirm('Are you sure delete this data?')) {
						// ajax delete data from database
						$.ajax({
							url: "<?php echo site_url('/adminevents/event_delete')?>/" + id,
							type: "POST",
							dataType: "JSON",
							success: function (data) {


								location.reload();
							},
							error: function (jqXHR, textStatus, errorThrown) {
								alert('Error deleting data');
							}
						});

					}
				}

				function deletepicturesdb() {

					var url;
					var dataForm;
					dataForm = $("#databasepic");

					url = "<?php echo site_url('/adminevents/delete_files')?>";

					// ajax adding data to database
					$.ajax({
						url: url,
						type: "POST",
						data: dataForm.serialize(),
						dataType: "html",
						success: function (data) {

							location.reload();

						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert('Error adding / update data');
						}
					});
				}
			});

		</script>

	</body>

	</html>

