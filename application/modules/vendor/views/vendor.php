<?php
$shop_name = $this->db->get_where('settings' , array('type'=>'shop_name'))->row()->description;
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_address = $this->db->get_where('settings' , array('type'=>'address'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;

$vendor_form_location = base_url().'vendor/add_vendor';
?>

<style type="text/css">
	section#content {
		min-height: 250px;
		padding-top: 10px;
	}

	.contact-box p {
		text-align: justify;
	}
</style>

<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>

<section id="content">
	<div class="global-map-area promo-box parallax" data-stellar-background-ratio="0.5" style="background-position: 50% 45.5px;">
        <div class="container">
            <div class="content-section description col-sm-12" style="height: 273px;">
                <div class="table-wrapper hidden-table-sm" style="height: 100%;">
                    <div class="table-cell col-sm-12">
                        <h2 class="m-title" style="margin-left: 30px;">
                            Vendor<br><em>Bergabunglah dengan jaringan media pemasangan iklan independen online terbesar di negara ini.</em>
                        </h2>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<div id="main" class="col-sm-8 col-md-9">
    <div class="tab-container">
        <ul class="tabs">
            <li class="active"><a href="#vendor-asuransi" data-toggle="tab">Vendor Asuransi</a></li>
            <li class=""><a href="#vendor-produksi" data-toggle="tab">Vendor Produksi</a></li>
            <li class=""><a href="#vendor-pengurusan_perijinan" data-toggle="tab">Vendor Pengurusan &amp; Perijinan</a></li>
           
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="vendor-asuransi">
            	<form method="post" action="<?= $vendor_form_location ?>">
            		<input type="hidden" name="vendor_cat" value="1">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="telp" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		            <!-- keuntungan -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Keuntungan Asuransi</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="keuntungan"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('keuntungan'); ?></span>
		                </div>
		            </div>

		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>

		        </form>

            </div>
            <div class="tab-pane fade" id="vendor-produksi">
                
            	<form method="post" action="<?= $vendor_form_location ?>">
            		<input type="hidden" name="vendor_cat" value="2">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="telp" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		             <!-- provinsi -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Provinsi</label>
		                    
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <?php 
							  	$additional_dd_code = 'class="form-control m-input m-input--air" id="provinsi"';
							  	$kategori_prov = array('' => 'Please Select',);
						        foreach ($prov->result_array() as $row) {
						            $kategori_prov[$row['id_prov']] = $row['nama'];   
						        }
							  	echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
							  	?>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
		                </div>
		            </div>

		            <!-- kota/kabupaten -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kota / Kabupaten</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <select id="kota" name="cat_city">
		                            
		                        </select>
		                        <span class="custom-select">Please Select</span>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		         

		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>

		        </form>

            </div>
            <div class="tab-pane fade" id="vendor-pengurusan_perijinan">
               
            	<form method="post" action="<?= $vendor_form_location ?>">
            		<input type="hidden" name="vendor_cat" value="3">
		            <!-- nama -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama Vendor</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="nama" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('nama'); ?></span>
		                </div>
		            </div>

		            <!-- pic -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Nama PIC</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="pic" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('pic'); ?></span>
		                </div>
		            </div>

		            <!-- telpon -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>No. Telpon</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="telp" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('telp'); ?></span>
		                </div>
		            </div>

		            <!-- email -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Email</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="email" class="input-text full-width" name="email" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('email'); ?></span>
		                </div>
		            </div>

		            <!-- url -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Link Website</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <input type="text" class="input-text full-width" name="url" value="">
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('url'); ?></span>
		                </div>
		            </div>

		             <!-- provinsi -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Provinsi</label>
		                    
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <?php 
							  	$additional_dd_code = 'class="form-control m-input m-input--air" id="wilayah"';
							  	$kategori_prov = array('' => 'Please Select',);
						        foreach ($prov->result_array() as $row) {
						            $kategori_prov[$row['id_prov']] = $row['nama'];   
						        }
							  	echo form_dropdown('cat_prov', $kategori_prov, '', $additional_dd_code);
							  	?>
		                    </div>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_prov'); ?></span>
		                </div>
		            </div>

		            <!-- kota/kabupaten -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Kota / Kabupaten</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <div class="selector full-width">
		                        <select id="kuto" name="cat_city">
		                            
		                        </select>
		                        <span class="custom-select">Please Select</span>
		                    </div>

		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('cat_city'); ?></span>
		                </div>
		            </div>

		            <!-- alamat -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                    <label>Alamat</label>
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="alamat"></textarea>
		                    <span class="error-msg" style="color: #f4516c; font-style: italic"><?php echo form_error('alamat'); ?></span>
		                </div>
		            </div>

		           
		            <!-- button -->
		            <div class="row form-group">
		                <div class="col-sms-2 col-sm-2">
		                </div>
		                <div class="col-sms-7 col-sm-7">
		                    <button type="submit" class="btn-medium pull-right" name="submit" value="Submit">DAFTAR</button>
		                </div>
		            </div>

		        </form>

            </div>

        </div>
    
    </div>
</div>

<div class="sidebar col-sm-4 col-md-3">
    <div class="travelo-box contact-box">
        <h4>Butuh Bantuan WIKLAN?</h4>
        <p>Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
        <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> <?= $shop_phone ?></span>
            <br>
            <a class="contact-email" href="#"><?= $shop_email ?></a>
        </address>
    </div>
</div>