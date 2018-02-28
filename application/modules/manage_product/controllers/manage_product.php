<?php
class Manage_product extends MX_Controller 
{

    var $path_big = './marketplace/big_pics/';
    var $path_small = './marketplace/small_pics/';
    var $path_video = './marketplace/video/';
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->CI=& $this;
        $this->load->helper(array('text', 'tgl_indo_helper'));
    }

    function add_map($update_id) {
        $update_id = $this->uri->segment(3);

        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $submit = $this->input->post('submit', true);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sr_address', 'Alamat', 'required');
            $this->form_validation->set_rules('sr_lat', 'Latitude', 'required|numeric');
            $this->form_validation->set_rules('sr_lng', 'Longitude', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data['address'] = $this->input->post('sr_address', true);
                $data['lat'] = $this->input->post('sr_lat', true);
                $data['long'] = $this->input->post('sr_lng', true);

                if (is_numeric($update_id)) {
                    $this->_update($update_id, $data);
                    $flash_msg = "The map were successfully updated.";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('manage_product/create/'.$update_id);
                }
            }
        }    

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data['headline'] = "Add Map";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "add_map";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function _generate_thumbnail($file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_big.$file_name;
        $config['new_image'] = $path_small.$file_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function add_video($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = $this->path_video;
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);

            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
                $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
                $data['headline'] = "Upload error";
                $data['video_name'] = '';
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "upload_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            } else {
                $videoDetails = $this->upload->data();
                $data['video_name']= $configVideo['file_name'];
                $data['video_detail'] = $videoDetails;

                // $data = array('upload_data' => $this->upload->data());

                // $upload_data = $data['upload_data'];
                $file_name = $configVideo['file_name']; // $upload_data['file_name'];

                //update database
                $update_data['video'] = $file_name;
                $this->_update($update_id, $update_data);

                $flash_msg = "The video were successfully uploaded.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);

                $data['headline'] = "Upload Success";
                $data['update_id'] = $update_id;
                $data['flash'] = $this->session->flashdata('item');
                $data['view_file'] = "show_video";
                $this->load->module('templates');
                $this->templates->admin($data);
            }
            
        }

        
    }

    function do_upload($update_id)
    {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        if ($submit == "Cancel") {
            redirect('manage_product/create/'.$update_id);
        }

        $config['upload_path']          = $this->path_big;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
        else
        {
    
            $data = array('upload_data' => $this->upload->data());

            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];

            //update database
            $update_data['big_pic'] = $file_name;
            $update_data['small_pic'] = $file_name;
            $this->_update($update_id, $update_data);

            $flash_msg = "The image were successfully uploaded.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            // $data['view_module'] = "manage_product";
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin($data);
        }
    }

    function delete_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = $this->path_big.$big_pic;
        $small_pic_path = $this->path_small.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        unset($data);
        $data['big_pic'] = "";
        $data['small_pic'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The product image were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/create/'.$update_id);
    } 

    function delete_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $data = $this->fetch_data_from_db($update_id);
        $video = $data['video'];

        $video_path = $this->path_video.$video;

        if (file_exists($video_path)) {
            unlink($video_path);
        } 

        unset($data);
        $data['video'] = "";
        $this->_update($update_id, $data);

        $flash_msg = "The video were successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/create/'.$update_id);
    } 

    function upload_image($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_image";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_document($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_document";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_maintenance($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Image";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_maintenance";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function upload_video($update_id) {
        if (!is_numeric($update_id)) {
            redirect('site_security/not_allowed');
        }

        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        
        $data['headline'] = "Upload Video";
        $data['update_id'] = $update_id;
        $data['video_name'] = '';
        $data['flash'] = $this->session->flashdata('item');
        // $data['view_module'] = "manage_product";
        $data['view_file'] = "upload_video";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('store_provinces');
    $this->load->module('store_cities');
    $this->load->module('store_categories');
    $this->load->module('store_roads');
    $this->load->module('store_sizes');
    $this->load->module('store_labels');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('manage_product/manage');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_title', 'Item title', 'required|max_length[204]');
        // $this->form_validation->set_rules('item_price', 'Item price', 'required|numeric');
        $this->form_validation->set_rules('was_price', 'Was price', 'numeric');
        $this->form_validation->set_rules('item_description', 'Item description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|numeric');
        $this->form_validation->set_rules('cat_prod', 'Kategori', 'required|numeric');
        $this->form_validation->set_rules('cat_road', 'Jenis Jalan', 'required|numeric');
        $this->form_validation->set_rules('cat_size', 'Ukuran', 'required|numeric');
        $this->form_validation->set_rules('cat_stat', 'Status ketersediaan', 'required|numeric');
        $this->form_validation->set_rules('cat_type', 'Tipe', 'required|numeric');
        $this->form_validation->set_rules('cat_light', 'Pencahayaan', 'required|numeric');
        $this->form_validation->set_rules('cat_prov', 'Provinsi', 'required|numeric');
        $this->form_validation->set_rules('cat_city', 'Kota/Kabupaten', 'required|numeric');
        $this->form_validation->set_rules('cat_distric', 'Kecamatan', 'required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            // generate kode produk dari id provinsi & kota
            $keyCode = $data['cat_prov'].$data['cat_city'];

            $cek_kode = $this->checkCode($keyCode);
            $kode = "";
            foreach($cek_kode->result() as $ck)
            {
                if($ck->prod_code == NULL)
                {
                    $kode = $keyCode.'0001';
                }
                else
                {
                    $kd_lama = $ck->prod_code ;
                    $kode = $kd_lama + 1;
                }
            }

            $data['prod_code'] = $kode;
            $data['item_url'] = url_title($data['item_title'].' '.$data['prod_code']);

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The product were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_product/create/'.$update_id);
            } else {
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The product was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('manage_product/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
        $data['big_pic'] = "";
        $data['video'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Produk";
    } else {
        $data['headline'] = "Update Produk";
    }


    $data['prov'] = $this->store_provinces->get('id_prov');
    $data['city'] = $this->store_cities->get('id_kab');
    $data['jenis'] = $this->store_categories->get('id');
    $data['jalan'] = $this->store_roads->get('id'); 
    $data['ukuran'] = $this->store_sizes->get('id');
    $data['ketersediaan'] = $this->store_labels->get('id');
    
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "select store_item.*, provinsi.*, kabupaten.*, store_categories.*, store_roads.*, store_labels.*, store_item.id as id_produk, store_item.status as stat_prod, provinsi.nama as provinsi, kabupaten.nama as kabupaten from store_item left join provinsi on store_item.cat_prov=provinsi.id_prov left join kabupaten on store_item.cat_city=kabupaten.id_kab left join store_categories on store_item.cat_prod=store_categories.id left join store_roads on store_item.cat_road=store_roads.id left join store_labels on store_item.cat_stat=store_labels.id order by store_item.id desc";

    // $result = $this->_custom_query($mysql_query);
    $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = "manage_product";
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);

    // echo "manage daftar";
}

function fetch_data_from_post() {
    
    $data['item_title'] = $this->input->post('item_title', true);
    $data['item_price'] = $this->input->post('item_price', true);
    $data['item_description'] = $this->input->post('item_description', true);
    $data['was_price'] = $this->input->post('was_price', true);
    $data['cat_prod'] = $this->input->post('cat_prod', true);
    $data['cat_road'] = $this->input->post('cat_road', true);
    $data['cat_size'] = $this->input->post('cat_size', true);
    $data['cat_stat'] = $this->input->post('cat_stat', true);
    $data['cat_type'] = $this->input->post('cat_type', true);
    $data['cat_light'] = $this->input->post('cat_light', true);
    $data['item_address'] = $this->input->post('item_address', true);
    $data['cat_prov'] = $this->input->post('cat_prov', true);
    $data['cat_city'] = $this->input->post('cat_city', true);
    $data['cat_distric'] = $this->input->post('cat_distric', true);
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['status'] = $this->input->post('status', true);
    return $data;
}

function checkCode($key) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = "select MAX(prod_code) FROM store_item where prod_code like '%$key%'";
     
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['prod_code'] = $row->prod_code;
        $data['item_title'] = $row->item_title;
        $data['item_url'] = $row->item_url;
        $data['item_price'] = $row->item_price;
        $data['item_description'] = $row->item_description;
        $data['item_address'] = $row->item_address;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
        $data['video'] = $row->video;
        $data['was_price'] = $row->was_price;
        $data['cat_prod'] = $row->cat_prod;
        $data['cat_road'] = $row->cat_road;
        $data['cat_size'] = $row->cat_size;
        $data['cat_stat'] = $row->cat_stat;
        $data['cat_type'] = $row->cat_type;
        $data['cat_light'] = $row->cat_light;
        $data['address'] = $row->address;
        $data['lat'] = $row->lat;
        $data['long'] = $row->long;
        $data['cat_prov'] = $row->cat_prov;
        $data['cat_city'] = $row->cat_city;
        $data['created_at'] = $row->created_at;
        $data['updated_at'] = $row->updated_at;
        $data['status'] = $row->status;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

    function _process_delete($update_id){
        $data = $this->fetch_data_from_db($update_id);
        $big_pic = $data['big_pic'];
        $small_pic = $data['small_pic'];

        $big_pic_path = $this->path_big.$big_pic;
        $small_pic_path = $this->path_small.$small_pic;

        if (file_exists($big_pic_path)) {
            unlink($big_pic_path);
        } 

        if (file_exists($small_pic_path)) {
            unlink($small_pic_path);
        } 

        // delete the item record from db
        $this->_delete($update_id);
    }

function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('manage_product/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        $this->_process_delete($update_id);

        $flash_msg = "The banner were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_product/manage');
    }
}


function get($order_by)
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->get($order_by);
    return $query;
}

function get_where_with_limit($col, $value, $limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where_with_limit($col, $value, $limit, $offset, $order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_product');
    $this->mdl_product->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $this->mdl_product->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_product');
    $this->mdl_product->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_product');
    $count = $this->mdl_product->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_product');
    $max_id = $this->mdl_product->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_product');
    $query = $this->mdl_product->_custom_query($mysql_query);
    return $query;
}

}