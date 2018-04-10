

<style>
.panel {
    -webkit-box-shadow: none!important;
    -moz-box-shadow: none!important;
    box-shadow: none!important
}

.panel-group .panel {
    overflow: visible
}

.panel .panel-title>a:hover {
    text-decoration: none
}

.accordion .panel .panel-heading,
.accordion .panel .panel-title {
    padding: 0
}

.accordion .panel .panel-title .accordion-toggle {
    display: block;
    padding: 10px 15px
}

.accordion .panel .panel-title .accordion-toggle.accordion-toggle-styled {
    background: url(../img/accordion-plusminus.png) right -19px no-repeat;
    margin-right: 15px
}

.accordion .panel .panel-title .accordion-toggle.accordion-toggle-styled.collapsed {
    background-position: right 12px
}

.panel-heading {
    background: #eee
}

.panel-heading a,
.panel-heading a:active,
.panel-heading a:focus,
.panel-heading a:hover {
    text-decoration: none;
    font-size: 14px;
    color: #333;
}

.thumb img {
	width: 8.6rem;
}

#map-canvas {
    margin: 0;
    padding: 0;
    height: 100%;
}

#map-canvas {
    width: 100%;
    height: 270px;
}

#map {
    height: 400px;
    width: 100%;
}
</style>


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

		<?php 
		$upload_image = base_url()."manage_product/upload_image/".$update_id;
		$delete_image = base_url()."manage_product/delete_image/".$update_id;
		$add_map = base_url()."manage_product/add_map/".$update_id;
		$add_document = base_url()."manage_product/upload_document/".$update_id;
		$add_maintenance = base_url()."manage_product/upload_maintenance/".$update_id;
		$upload_video = base_url()."manage_product/upload_video/".$update_id;
		$delete_video = base_url()."manage_product/delete_video/".$update_id;
			if (is_numeric($update_id)) { 
		?>

		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
						<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
							<i class="la la-ellipsis-h m--font-brand"></i>
						</a>
						<div class="m-dropdown__wrapper">
							<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
							<div class="m-dropdown__inner">
								<div class="m-dropdown__body">
									<div class="m-dropdown__content">
										<ul class="m-nav">
											<li class="m-nav__section m-nav__section--first">
												<span class="m-nav__section-text">
													Upload
												</span>
											</li>
										<?php if ($big_pic == "") { ?>
											<li class="m-nav__item">
												<a href="<?= $upload_image ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-add"></i>
													<span class="m-nav__link-text">
														Upload Image
													</span>
												</a>
											</li>
										<?php } else { ?>
											<li class="m-nav__item">
												<a href="<?= $delete_image ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cancel"></i>
													<span class="m-nav__link-text">
														Delete Image
													</span>
												</a>
											</li>
										<?php } ?>
											<li class="m-nav__item">
												<a href="<?= $add_document ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-folder"></i>
													<span class="m-nav__link-text">
														Upload Dokumen
													</span>
												</a>
											</li>
										<?php if ($video == "") { ?>	
											<li class="m-nav__item">
												<a href="<?= $upload_video ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-add"></i>
													<span class="m-nav__link-text">
														Upload Video
													</span>
												</a>
											</li>
										<?php } else { ?>
											<li class="m-nav__item">
												<a href="<?= $delete_video ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cancel"></i>
													<span class="m-nav__link-text">
														Delete Video
													</span>
												</a>
											</li>
										<?php } ?>		
											<li class="m-nav__section">
												<span class="m-nav__section-text">
													Any
												</span>
											</li>
											<li class="m-nav__item">
												<a href="<?= $add_map ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-map-location"></i>
													<span class="m-nav__link-text">
														Upload Map Lokasi
													</span>
												</a>
											</li>
											<li class="m-nav__item">
												<a href="<?= $add_maintenance ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-cogwheel"></i>
													<span class="m-nav__link-text">
														Report Maintenance
													</span>
												</a>
											</li>
											<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<?php } ?>
	

		
	</div>
	<!--begin::Form-->

	<?php 
	$form_location = base_url()."manage_product/create/".$update_id; 
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
					Judul
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="item_title" name="item_title" value="<?= $item_title ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_title'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Customer
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="was_price" name="was_price" value="<?= $was_price ?>" disabled="disabled">
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input" class="col-2 col-form-label">
					Harga Fix
				</label>
				<div class="col-10">
					<input class="form-control m-input m-input--air" type="text" id="item_price" name="item_price" value="<?= $item_price ?>">
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_price'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Deskripsi
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_description"><?= $item_description ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_description'); ?></div>
				</div>
			</div>
<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Provinsi
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
				  	$kategori_prov = array('' => 'Please Select',);
			        foreach ($prov->result_array() as $row) {
			            $kategori_prov[$row['id_prov']] = $row['nama'];   
			        }
				  	echo form_dropdown('cat_prov', $kategori_prov, $cat_prov, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prov'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kota/kabupaten
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kota" name="cat_city"></select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_city'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kecamatan
				</label>
				<div class="col-10">
					<select class="form-control m-input m-input--air" id="kecamatan" name="cat_distric"></select>
					
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_distric'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-url-input" class="col-2 col-form-label">
					Alamat
				</label>
				<div class="col-10">
					<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="3" name="item_address"><?= $item_address ?></textarea>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('item_address'); ?></div>
				</div>
			</div>
<div class="m-separator m-separator--dashed m-separator--md"></div>
			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Jenis
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jenis = array('' => 'Please Select',);
			        foreach ($jenis->result_array() as $row) {
			            $kategori_jenis[$row['id']] = $row['cat_title'];   
			        }
				  	echo form_dropdown('cat_prod', $kategori_jenis, $cat_prod, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_prod'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Kategori Jalan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_jalan = array('' => 'Please Select',);
			        foreach ($jalan->result_array() as $row) {
			            $kategori_jalan[$row['id']] = $row['road_title'];   
			        }
				  	echo form_dropdown('cat_road', $kategori_jalan, $cat_road, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_road'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ukuran
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ukuran = array('' => 'Please Select',);
			        foreach ($ukuran->result_array() as $row) {
			            $kategori_ukuran[$row['id']] = $row['size'];   
			        }
				  	echo form_dropdown('cat_size', $kategori_ukuran, $cat_size, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_size'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Ketersediaan
				</label>
				<div class="col-10">
					<?php 
				  	$additional_dd_code = 'class="form-control m-input m-input--air"';
				  	$kategori_ketersediaan = array(NULL => 'Please Select',);
			        foreach ($ketersediaan->result_array() as $row) {
			            $kategori_ketersediaan[$row['id']] = $row['label_title'];   
			        }
				  	echo form_dropdown('cat_stat', $kategori_ketersediaan, $cat_stat, $additional_dd_code);
				  	?>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_stat'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Tipe
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_type" value="1" <?php if($cat_type == 1){ ?> checked=checked <?php } ?> >
							Horizontal
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_type" value="2" <?php if($cat_type == 2){ ?> checked=checked <?php } ?> >
							Vertical
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>
				</div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-email-input" class="col-2 col-form-label">
					Light
				</label>
				<div class="col-10">
					<div class="m-radio-inline">
						<label class="m-radio">
							<input type="radio" name="cat_light" value="1" <?php if($cat_light == 1){ ?> checked=checked <?php } ?> >
							Front Light
							<span></span>
						</label>
						<label class="m-radio">
							<input type="radio" name="cat_light" value="2" <?php if($cat_light == 2){ ?> checked=checked <?php } ?> >
							Back Light
							<span></span>
						</label>
					</div>
					<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>
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

<?php
$path_img = base_url().'marketplace/big_pics/'.$big_pic;
if ($big_pic != "") { ?>

<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="col-6">
			<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
				<img src="<?= $path_img ?>" width="" style="width: 100%;">
			</div>
		</div>
	</div>	
</div>
			
<?php } ?>	


<?php
$path_fifty = base_url().'marketplace/limapuluh/'.$limapuluh;
$path_hundred = base_url().'marketplace/seratus/'.$seratus;
$path_twohundred = base_url().'marketplace/duaratus/'.$duaratus;
$path_ktp = base_url().'marketplace/ktp/'.$ktp;
$path_npwp = base_url().'marketplace/npwp/'.$npwp;
$path_sertifikat = base_url().'marketplace/sertifikat/'.$sertifikat;
$path_ijin = base_url().'marketplace/ijin/'.$ijin;
$path_vid = base_url().'marketplace/video/'.$video;
?>


<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Gambar
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-accordion m-accordion--default m-accordion--solid" id="m_accordion_5" role="tablist">
			<!--begin::Item-->
		
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed"  role="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa flaticon-web"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Foto Lokasi
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
                    		<?php
							if ($limapuluh != "") { 
							?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_fifty ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Metronic Documentation
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($seratus != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_hundred ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Make JPEG Great Again
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($duaratus != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_twohundred ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Full Deeveloper Manual For 4.7
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		
			<!--end::Item--> 
<!--begin::Item-->
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_2_head" data-toggle="collapse" href="#m_accordion_5_item_2_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-tabs"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Dokumen
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_2_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
                    		<?php
							if ($ktp != "") { 
							?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_ktp ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Metronic Documentation
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($npwp != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_npwp ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Make JPEG Great Again
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($ijin != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_ijin ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Full Deeveloper Manual For 4.7
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>

							<?php
							if ($sertifikat != "") { 
							?>
							<div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<img class="" src="<?= $path_sertifikat ?>" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										Full Deeveloper Manual For 4.7
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="#" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!--end::Item--> 
<!--begin::Item-->
			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_5_head" data-toggle="collapse" href="#m_accordion_5_item_5_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-laptop"></i>
					</span>
					<span class="m-accordion__item-title">
						Upload Video
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_5_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_5_head" data-parent="#m_accordion_5">
					<span>
						<?php
						if ($video != "") { 
						?>
						<video id="video1" class="video-js vjs-default-skin" width="480" height="320" poster="http://www.tutorial-webdesign.com/wp-content/themes/nurumah/img/logo-bg.png" data-setup='{"controls" : true, "autoplay" : false, "preload" : "auto"}'>
				            <source src="<?= $path_vid ?>" type="video/x-flv">
				            <source src="<?= $path_vid ?>" type='video/mp4'>
				        </video>
						<?php
						} 
						?>
					</span>
				</div>
			</div>
			<!--end::Item--> 			

			<div class="m-accordion__item">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_4_head" data-toggle="collapse" href="#m_accordion_5_item_4_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-cogwheel"></i>
					</span>
					<span class="m-accordion__item-title">
						Report Maintenance
					</span>
					<span class="m-accordion__item-mode">
						<i class="la la-plus"></i>
					</span>
				</div>
				<div class="m-accordion__item-body collapse" id="m_accordion_5_item_4_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_4_head" data-parent="#m_accordion_5">
					<div class="m-portlet__body">
                    	<div class="m-widget4">
	                        <?php 
	                        $this->load->module('manage_product');
	                        foreach ($reports->result() as $report) {
	                        	$loc = $this->manage_product->location($report->type);
								$image_location = base_url().$loc.'300x160/'.$report->image;
								$image_big_location = base_url().$loc.$report->image;
	           					$download_url = base_url().'manage_product/getFile/'.$report->token;
	                        ?>
	                        <div class="m-widget4__item">
								<div class="m-widget4__img thumb">
									<a href="<?= $image_location ?>" data-fancybox data-caption="<?= $report->type.'  tgl : '.$report->created_at ?>">
										<img class="" src="<?= $image_big_location ?>" alt="">
									</a>	
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__text">
										<?= $report->type.'  tgl : '.$report->created_at ?>
									</span>
								</div>
								<div class="m-widget4__ext">
									<a href="<?= $download_url ?>" class="m-widget4__icon">
										<i class="la la-download"></i>
									</a>
								</div>
							</div>
							<?php }
	                        ?>
							
						</div>
					</div>
				</div>
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="m-accordion__item" id="toTheMap">
				<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body" aria-expanded="    false">
					<span class="m-accordion__item-icon">
						<i class="fa  flaticon-placeholder"></i>
					</span>
					<span class="m-accordion__item-title">
						Peta Lokasi
					</span>
					<span class="m-accordion__item-mode">
					</span>
				</div>
				<!-- <div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_5">
					<span>
						<div id="map2"></div>
					</span>
				</div> -->
			</div>
			<!--end::Item-->
		</div>
		<!--end::Section-->

		<div id="map"></div>
		
	</div>	
</div>

<script>

	// $('#toTheMap').on('shown.bs.collapse', function (e) {
	// 	initia();
 //  	})

	(function initia() {
		var uluru = {lat: <?= $lat ?>, lng: <?= $long ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
	})();

</script>