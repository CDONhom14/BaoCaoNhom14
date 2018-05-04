<?php
Class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('order_model');
    }
    
    /*
     * Hien thi danh sach giao dich
     */
    function index()
    {
        //lay tong so luong ta ca cac giao dich trong websit
        $total_rows = $this->order_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac giao dich tren website
        $config['base_url']   = admin_url('order/index'); //link hien thi ra danh sach giao dich
        $config['per_page']   = 4;//so luong giao dich hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
       
       
        
        //lay danh sach san pha
        $list = $this->order_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay danh sach danh muc giao dich
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/order/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them giao dich moi
     */
    function add()
    {
        //lay danh sach danh muc giao dich
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name        = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);
                

                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);
                
                
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/order';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
                //upload cac anh kem theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);
                
                //luu du lieu can them
                $data = array(
                    'name'       => $name,
                    'catalog_id' => $catalog_id,
                    'price'      => $price,
                    'image_link' => $image_link,
                    'image_list' => $image_list,
                    'discount'   => $discount,
                    'warranty'   => $this->input->post('warranty'),
                    'gifts'      => $this->input->post('gifts'),
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'content'    => $this->input->post('content'),
                    'created' => now(),
                ); 
                //them moi vao csdl
                if($this->order_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('order'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/order/add';
        $this->load->view('admin/main', $this->data);
    }
    
    function del()
    {
        $id=$this->uri->rsegment(3);
        $order=$this->order_model->get_info($id);
        if(!$order)
        {
            $this->session->set_flashdata('message', 'xoa khong thanh cong');
            redirect(admin_url('order'));
        }
        //thuc hien xoa giao dich
        $this->order_model->delete($id);
       
       
        redirect(admin_url('order'));
    }
}