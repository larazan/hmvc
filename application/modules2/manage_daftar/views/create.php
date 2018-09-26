
<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?= $headline ?>
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."manage_daftar/create/".$update_id; 
	?>
	<form class="m-form m-form--fit m-form--label-align-right" method="post" action="<?= $form_location ?>">
		<div class="m-portlet__body">
			<div class="form-group m-form__group m--margin-top-10">
				<!-- alert -->
				<?php 
				if (isset($flash)) {
					echo $flash;
				}
				?>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Nama
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="nama" name="nama" value="<?= $username ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('nama'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-search-input" class="col-2 col-form-label">
					Email
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="email" id="email" name="email" value="<?= $email ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					No Telpon
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="phone" id="telp" name="no_telp" value="<?= $no_telp ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('no_telp'); ?></div>
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="alamat"><?= $alamat ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('alamat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Status
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$options = array(
							  		'' => 'Please Select',
							  		'1' => 'Active',
							  		'0' => 'Inactive'  
						  		);
				  	echo form_dropdown('status', $options, $status, $additional_dd_code);
				  	?>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
				</div>
			</div>
			
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-10">
						<button type="submit" class="btn btn-success" name="submit" value="Submit">
							Submit
						</button>
						<button type="submit" class="btn btn-secondary" name="submit" value="Cancel">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Portlet-->

