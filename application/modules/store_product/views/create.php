<?php
$upload_image = base_url()."store_product/upload_image/".$update_id;
$delete_image = base_url()."store_product/delete_image/".$update_id;
$add_map = base_url()."store_product/add_map/".$update_id;
$add_point = base_url()."store_product/add_point/".$update_id;
$add_document = base_url()."store_product/upload_document/".$update_id;
$add_maintenance = base_url()."store_product/upload_maintenance/".$update_id;
$upload_video = base_url()."store_product/upload_video/".$update_id;
$delete_video = base_url()."store_product/delete_video/".$update_id;
?>

<style>
	ul.search-tabs li {
		border: 1px solid #f4f4f4;
	}
</style>

<div class="tab-pane fade in active">

	<h2>Apa yang anda jual</h2>

<?php if ($update_id != '') { ?>
    <div class="row container">
        <ul class="search-tabs clearfix">
            <li><a href="<?= $upload_image ?>">UPLOAD GAMBAR</a></li>
            <li><a href="<?= $add_document ?>">UPLOAD DOKUMEN</a></li>
            <li><a href="<?= $upload_video ?>">UPLOAD VIDEO</a></li>
            <li><a href="<?= $add_map ?>">UPLOAD PETA LOKASI</a></li>
            <li><a href="<?= $add_point ?>">TAMBAH SELLING POINT</a></li>
        </ul>
    </div>
<?php } ?>


<?php 
	$form_location = base_url()."store_product/create/".$update_id; 
?>

    <div class="col-sm-12 no-float no-padding">
    	<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

        <form method="post" action="<?= $form_location ?>">

            <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id') ?>">
            <!-- nama produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Nama Produk</label>
                </div>
                <div class="col-sms-7 col-sm-7">
                    <input type="text" class="input-text full-width" name="item_title" value="<?= $item_title ?>">
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_title'); ?></span>
                </div>

                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>

            </div>
            <!-- harga produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Harga</label>
                </div>
                <div class="col-sms-4 col-sm-4">
                    <input type="text" class="input-text full-width" name="was_price" value="<?= $was_price ?>">
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('was_price'); ?></span>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <?php if ($update_id != '') { ?>
                    <input type="text" class="input-text full-width" value="Rp. 
                                <?php
                                $this->load->module('site_settings');
                                $fix_price = $this->site_settings->rupiah($was_price);
                                ?>" disabled="disabled">
                    <?php } ?>
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>
            <!-- harga produk -->
            <?php if ($update_id != '') { ?>
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Harga Fix</label>
                </div>
                <div class="col-sms-4 col-sm-4">
                    <input type="text" class="input-text full-width" name="was_price" value="<?= $item_price ?>" disabled="disabled">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <input type="text" class="input-text full-width" value="Rp. 
                                <?php
                                $this->load->module('site_settings');
                                $fix_price = $this->site_settings->rupiah($item_price);
                                ?>" disabled="disabled">
                </div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>
            <?php } ?>
            <!-- deskripsi produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Deskripsi</label>
                </div>
                <div class="col-sms-5 col-sm-5">
                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="item_description"><?= $item_description ?></textarea>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_description'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>

            <hr>
            <!-- provinsi -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Provinsi</label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
					  	$kategori_prov = array('' => 'Please Select',);
				        foreach ($prov->result_array() as $row) {
				            $kategori_prov[$row['id_prov']] = $row['nama'];   
				        }
					  	echo form_dropdown('cat_prov', $kategori_prov, $cat_prov, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- kota/kabupaten -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kota / Kabupaten</label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <select id="kota" name="cat_city">
                            <?php
                            if (isset($update_id)) {
                            ?>
                            <option selected="selected" value="<?= $cat_city ?>"><?= $nama_kota ?></option>
                            <?php    
                             } 
                            ?>
                            
                        </select>
                        <span class="custom-select"><?= $nama_kota ?></span>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- kecamatan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kecamatan</label>
                    
                </div>
                <div class="col-sms-5 col-sm-5">
                    <div class="selector full-width">
                        <select id="kecamatan" name="cat_distric">
                            <?php
                            if (isset($update_id)) {
                            ?>
                            <option selected="selected" value="<?= $cat_distric ?>"><?= $nama_kecamatan ?></option>
                            <?php    
                             } 
                            ?>   
                        </select>
                        <span class="custom-select"><?= $nama_kecamatan ?></span>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_distric'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- alamat -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Alamat</label>
                </div>
                <div class="col-sms-5 col-sm-5">
                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="item_address"><?= $item_address ?></textarea>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('item_address'); ?></span>
                </div>
                <div class="col-sms-2 col-sm-2"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Tulis nama produk sesuai jenis, merek, dan rincian produk.</span>
                </div>
            </div>
            
            <hr>
            <div class="form-group">
                <h4>Detail Produk</h4>
            </div>
            <!-- kategori produk -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Jenis Produk</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_jenis = array('' => 'Please Select',);
				        foreach ($jenis->result_array() as $row) {
				            $kategori_jenis[$row['id']] = $row['cat_title'];   
				        }
					  	echo form_dropdown('cat_prod', $kategori_jenis, $cat_prod, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prod'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- kategori jalan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kategori Jalan</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_jalan = array('' => 'Please Select',);
				        foreach ($jalan->result_array() as $row) {
				            $kategori_jalan[$row['id']] = $row['road_title'];   
				        }
					  	echo form_dropdown('cat_road', $kategori_jalan, $cat_road, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_road'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- kategori ukuran -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Kategori Ukuran</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_ukuran = array('' => 'Please Select',);
				        foreach ($ukuran->result_array() as $row) {
				            $kategori_ukuran[$row['id']] = $row['size'];   
				        }
					  	echo form_dropdown('cat_size', $kategori_ukuran, $cat_size, $additional_dd_code);
					  	?>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_size'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            <!-- kategori ketersediaan -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Ketersediaan</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <?php 
					  	$additional_dd_code = 'class="form-control m-input m-input--air"';
					  	$kategori_ketersediaan = array(NULL => 'Please Select',);
				        foreach ($ketersediaan->result_array() as $row) {
				            $kategori_ketersediaan[$row['id']] = $row['label_title'];   
				        }
					  	echo form_dropdown('cat_stat', $kategori_ketersediaan, $cat_stat, $additional_dd_code);
					  	?>
                        <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_stat'); ?></span>
                    </div>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
            
            <!-- kategori tipe -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Tipe</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <input type="radio" name="cat_type" value="1" <?php if($cat_type == 1){ ?> checked=checked <?php } ?> >&nbsp;Horizontal
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cat_type" value="2" <?php if($cat_type == 2){ ?> checked=checked <?php } ?> >&nbsp;Vertical
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_type'); ?></div>

                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_type'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </div>
            </div>
            <!-- kategori light -->
            <div class="row form-group">
                <div class="col-sms-2 col-sm-2">
                    <label>Light</label>
                    
                </div>
                <div class="col-sms-3 col-sm-3">
                    <div class="selector full-width">
                        <input type="radio" name="cat_light" value="1" <?php if($cat_light == 1){ ?> checked=checked <?php } ?> >&nbsp;Front Light
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="cat_light" value="2" <?php if($cat_light == 2){ ?> checked=checked <?php } ?> >&nbsp;Back Light
                        <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_light'); ?></div>
                    </div>
                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_light'); ?></span>
                </div>
                <div class="col-sms-4 col-sm-4"></div>
                <div class="col-sms-3 col-sm-3">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>

            <br>
            <div class="row form-group">
            	<div class="col-sms-2 col-sm-2"></div>
	            <div class="col-sms-7 col-sm-7">
	                <button type="submit" class="btn-medium" name="submit" value="Submit">TAMBAH PRODUK</button>
	                <button type="submit" class="btn-medium red" name="submit" value="Cancel">CANCEL</button>
	            </div>
	        </div>
        </form>
    </div>
</div>