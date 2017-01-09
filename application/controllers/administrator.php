<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');		
		if(!$this->session->userdata('logged_in')){
			redirect(base_url().'login');
		}
	}  

	public function index(){
		if($this->session->userdata('logged_in')){
			redirect('administrator/dashboard','location');
		}else{
			redirect('login','refresh');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');	
	}
	
	public function dashboard(){
		$data['title'] = 'Dashboard';
		$data['page'] = 'dashboard';
		$data['products'] = count($this->admin_model->get_all('products'));
		$this->load->view('administrator',$data);
	}

	public function categories(){
		$data['title'] = 'Categories';
		$data['page'] = 'categories';
		$data['results'] = $this->admin_model->get_all('categories');
		$this->load->view('administrator',$data);
	}

	public function add_category(){
		$data['title'] = 'Add Category';
		$data['page'] = 'add_category';
		$data['parent'] = dropdown_categories();
 		
		if($_POST){
			$save = $this->input->post();
			$save['date'] = date('Y-m-d H:i:s');
			$save['slug'] = alias_checker($this->input->post('cat_name'),'categories');
			$save['sorting'] = $this->admin_model->get_maxorder('categories') + 1;
	       	$this->admin_model->insert_database($save,'categories');
	       	$this->session->set_flashdata('saved', 'Category is successfully inserted.');
			redirect('administrator/categories?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function edit_category($id){
		
		$data['title'] = 'Edit Category';
		$data['page'] = 'edit_category';
		$data['parent'] = dropdown_categories();
		$data['result'] = $this->admin_model->get_first('categories',array('cat_id' => $id));

		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('cat_name'), 'categories', 'cat_id', $id);
	       	$this->admin_model->update_database($save,$id,'categories','cat_id');
	       	$this->session->set_flashdata('saved', 'Category is successfully updated.');
			redirect('administrator/categories?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_category($id){
		$this->admin_model->delete_database($id,'categories','cat_id');
		$this->session->set_flashdata('saved', 'Category is successfully deleted.');
		redirect('administrator/categories?route=catalog');
	}

	public function products(){
		$data['title'] = 'Products';
		$data['page'] = 'products';
		$data['results'] = $this->admin_model->get_products();
		$this->load->view('administrator',$data);
	}

	public function add_product(){
		$data['title'] = 'Add Product';
		$data['page'] = 'add_product';
		$data['categories'] = dropdown_categories();
		$data['collections'] = dropdown_collection();
		
		if($_POST){
			$save = $this->input->post();
	       	$save['date'] = date('Y-m-d H:i:s');
			$save['slug'] = alias_checker($this->input->post('name'),'products');
	       	$this->admin_model->insert_database($save,'products');
	       	$this->session->set_flashdata('saved', 'Product is successfully inserted.');
			redirect('administrator/products?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	    
	}

	public function edit_product($id){
		$data['title'] = 'Edit Product';
		$data['page'] = 'edit_product';
        
		$data['product'] = $this->admin_model->get_first('products', array('pid' => $id));
        $data['categories'] = dropdown_categories();
        $data['collections'] = dropdown_collection();
        $data['subcategories'] = dropdown_categories($data['product']->cat_id);
        //echo '<pre>'.print_r($data['product'],1).'</pre>'; exit;
		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('name'), 'products', 'pid', $id);
	       	$this->admin_model->update_database($save,$id,'products','pid');
	       	$this->session->set_flashdata('saved', 'Product is successfully updated.');
			redirect('administrator/products?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_product($id){
	    $this->admin_model->delete_database($id,'products','pid');
		$this->admin_model->delete_database($id,'products_variation','pid');
		$this->session->set_flashdata('saved', 'Product is successfully deleted.');
		redirect('administrator/products?route=catalog');
	}

	public function add_attribute($id){
		$data['title'] = 'Add Attribute';
		$data['page'] = 'add_attribute';
		$data['result'] = $this->admin_model->get_first('products',array('pid' => $id));
		$data['attributes'] = $this->admin_model->get_all('products_variation', array('pid' => $id));

		if($_POST){
			$save = $this->input->post();
			$this->admin_model->insert_database($save,'products_variation');
			$this->session->set_flashdata('saved', 'Product Attribute is successfully inserted.');
			redirect('administrator/add_attribute/'.$id.'?route=catalog');
		}	

	   	$this->load->view('administrator',$data);
	}

	public function delete_attribute($id){
	    $this->load->library('user_agent');
		$this->admin_model->delete_database($id,'products_variation','prod_var_id');
		$this->session->set_flashdata('saved', 'Product Attribute is successfully deleted.');
		redirect($this->agent->referrer());
	}

	public function add_image($id){
		$data['title'] = 'Add Image';
		$data['page'] = 'add_image';
		$data['result'] = $this->admin_model->get_first('products',array('pid' => $id));
		$data['images'] = $this->admin_model->get_all('products_image', array('pid' => $id));

		if($_POST){
			$save = $this->input->post();
			$save['sorting'] = $this->admin_model->get_maxorder('products_image') + 1;
			$this->admin_model->insert_database($save,'products_image');
			$this->session->set_flashdata('saved', 'Product Image is successfully inserted.');
			redirect('administrator/add_image/'.$id.'?route=catalog');
		}	

	   	$this->load->view('administrator',$data);
	}

	public function delete_image($id){
	    $this->load->library('user_agent');
		$this->admin_model->delete_database($id,'products_image','prod_img_id');
		$this->session->set_flashdata('saved', 'Product Image is successfully deleted.');
		redirect($this->agent->referrer());
	}

	public function collections(){
		$data['title'] = 'Collections';
		$data['page'] = 'collections';
		$data['results'] = $this->admin_model->get_all('collections');
		$this->load->view('administrator',$data);
	}

	public function add_collection(){
		$data['title'] = 'Add Collection';
		$data['page'] = 'add_collection';
		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('name'),'collections');
	       	$this->admin_model->insert_database($save,'collections');
	       	$this->session->set_flashdata('saved', 'Collections is successfully inserted.');
			redirect('administrator/collections?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	    
	}

	public function edit_collection($id){
		$data['title'] = 'Edit Collection';
		$data['page'] = 'edit_collection';
		$data['result'] = $this->admin_model->get_first('collections',array('id' => $id));
		
		if($_POST){
			$save = $this->input->post();
			$save['slug'] = alias_checker($this->input->post('name'), 'collections', 'id', $id);
	       	$this->admin_model->update_database($save,$id,'collections','id');
	       	$this->session->set_flashdata('saved', 'Collection is successfully updated.');
			redirect('administrator/collections?route=catalog');
		}
	   	
	   	$this->load->view('administrator',$data);	  	   
	}

	public function delete_collection($id){
	    $this->admin_model->delete_database($id,'collections','id');
		$this->session->set_flashdata('saved', 'Collection is successfully deleted.');
		redirect('administrator/collections?route=catalog');
	}

	public function dropdown_subcategories(){
		$id = $this->input->post('cat_id');
		$data = $this->admin_model->get_all('categories', array('parent_id' => $id));
		echo json_encode($data);
	}

	public function do_upload(){

        $path = './uploads/img/';
        $this->load->library('upload');
        
        // Define file rules
        $this->upload->initialize(array(
            "upload_path"       =>  $path,
            "allowed_types"     =>  "gif|jpg|png|jpeg",
            "max_size" => "5000"
        ));
        
        if($this->upload->do_multi_upload("uploadfile")){
            $data['upload_data'] = $upload_data = $this->upload->get_multi_upload_data();

            if(!$upload_data){
                $data['upload_data'] = $upload_data = $this->upload->data();
            }

            echo json_encode($upload_data);
        } else {    
            // Output the errors
            echo json_encode(array('errors' => $this->upload->display_errors()));
        }
            
        // Exit to avoid further execution
        exit;
    }

    public function reording(){
		$data = $this->admin_model->ordering($this->input->post('data'), $this->input->post('tablename'), $this->input->post('idname'));
	}
}

?>
