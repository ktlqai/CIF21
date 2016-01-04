<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends CI_Controller{
		function __construct() {
			parent::__construct();

			if ($this->session->userdata('user_level') == null || $this->session->userdata('user_level') != 1) {
				redirect('home');
			}
		}
		function index(){
			$this->layout_2();
		}
		
		function layout_2(){//-->Admin Home Page
			
		//Đường dẫn đến thư mục hình backend
		$data['backend_image'] = base_url().'public/images/image-admin/';
		$this->load->view('backend/home',$data);
		}
		
		//SLIDER MANAGER SECTION======================================================
		
		function slider_manager(){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			//$data['sliders']=$this->mhome->get_data_slider();// have build in home Models
			
			$this->load->library('pagination'); //Library for Pagigation :
			$data['base_url']=base_url().'admin/slider_manager';//Where for Pagination happend ?
			$data['total_rows'] = $this->madmin->count_all_slider(); // xác định tổng số record
			$data['per_page']=2; // All record you want to grab and show per page
			$data['uri_segment']=3;//localhost/CIF2/index.php/admin/slider_show/< 3 >
			
			 $this->pagination->initialize($data); //Change data to array
			
			//Load all data for per page : 
		$data['data'] = $this->madmin->list_all_slider($data['per_page'],$this->uri->segment(3)); 
			
			$this->load->view('backend/slider_show',$data);
		}
			
		function add_slider(){
			
			$result_insert = $this->madmin->insert_slider();
			
			$data['backend_image'] = base_url(). 'public/images/image-admin/';
			
			if($result_insert != false)
			{
				$this->load->view('backend/slider_add',$data);
			}
			else
			{
				$data['message']= "Có lỗi xãy ra !";
				$this->load->view('backend/slider_add',$data);
			}		
		}
		
		function delete_slider($param){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_delete = $this->madmin->delete_sliders($param);
			if($result_delete == true)
				redirect('admin/slider_manager');
			else
			{
			
					$data['message']="Có lỗi xãy ra !";
					$this->load->view('backend/slider_show',$data);
			}
		}
		
		function update_slider($param){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['data_slider']=$this->madmin->get_data_slider_with_param($param);
			
			$result_update = $this->madmin->update_sliders($param);
			if($result_update != false)
			{
				$data['message']="Happy !";
				$this->load->view('backend/slider_update',$data);
			}
			else
				{
					$data['message']="Something wrong !";
					$this->load->view('backend/slider_update',$data);
				}
		}
		
		
		//SLIDER MANAGER SECTION======================================================
		
		
		//MENU MANAGER SECTION======================================================
		function menu_manager() {
			
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['menu_data']=$this->mhome->get_menu_all();
			
			$this->load->view('backend/menu_show',$data);
			
		}
		
		function add_menu() {
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_add=$this->madmin->insert_menu();
				if($result_add==true)
				{
					$data['message']="Chúc mừng bạn đã thêm dữ liệu thành công !";
					$this->load->view('backend/menu_add',$data);
				}
				else{
					$data['message']="Có lỗi xãy ra !";
					$this->load->view('backend/menu_add',$data);
				}
		}
		
		function delete_menu($param){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_delete=$this->madmin->delete_menu($param);
			if($result_delete==true)
				redirect('admin/menu_manager');
			else
			{
					$data['message']="Có lỗi xãy ra !";
					$this->load->view('backend/menu_show',$data);
			}	
		}

		function update_menu_form($param) {
			 
			$data['backend_image'] = base_url().'public/images/image-admin/';
			 
			//$data['menu_item_data'] = $this->madmin->get_data_menu_with_param($param);
			$data['mid'] = $this->madmin->get_data_menu_with_param($param);
			 
			$this->load->view('backend/menu_update', $data);
		}
		
		function update_menu($param) {
			 
			//$data['backend_image'] = base_url().'public/images/image-admin/';
			 
			//$data['menu_item_data'] = $this->madmin->get_data_menu_with_param($param);
			 
			$result_update = $this->madmin->update_menu($param);
			
			if($result_update == true)
			 	{
					//$this->load->view('backend/menu_update',$data);
					redirect('admin/menu_manager');
				}
			else
				$data['message']="Có lỗi xãy ra trong lúc update menu !";
		}
		
		
		//MENU MANAGER SECTION======================================================
		
		
		//USER MANAGER SECTION======================================================
		function user_manager(){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['user_data']=$this->madmin->get_data_user();
			
			$this->load->view('backend/user_show',$data);
		}
		
		function user_delete($param){
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_delete=$this->madmin->delete_user($param);
			if($result_delete==true)
				redirect('admin/user_manager');
			else
			{
					$data['message']="Có lỗi xãy ra !";
					$this->load->view('backend/user_show',$data);
			}	
		}

		function user_update_form($param) {
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['user_data']=$this->madmin->get_data_user_with_param($param);

			$this->load->view('backend/user_update',$data);
		}
		
		function user_update($param) {
			$data['backend_image'] = base_url().'public/images/image-admin/';

			$result_update=$this->madmin->update_user($param);

			$data['user_data']=$this->madmin->get_data_user_with_param($param);

			if ($result_update==true)
			 	$this->load->view('backend/user_update',$data);
			else
				$data['message']="Có lỗi xãy ra !";		
		}
		//USER MANAGER SECTION======================================================
		
		
		//GALLERY MANAGER SECTION======================================================
		
		function gallery_manager(){
			
			 $data['backend_image'] = base_url().'public/images/image-admin/';
			 
			 $data['data_gallery'] = $this->mhome->get_data_gallery_3(); // Already build
			 
			 $this->load->view('backend/gallery_show',$data);
		}
		
		function add_gallery(){
			
			 $data['backend_image'] = base_url().'public/images/image-admin/';
			 
			 $result_add = $this->madmin->add_gallery();
			 if($result_add != false)
			 	{
					$this->load->view('backend/gallery_add',$data);
				}
				else
				{
					$data['message']= "Có lỗi xãy ra !";
					$this->load->view('backend/gallery_add',$data);
				}
		}
		
		function delete_gallery($param){
			
			 $data['backend_image'] = base_url().'public/images/image-admin/';
			 $result_delete=$this->madmin->delete_gallerys($param);
			 	if($result_delete==true)
					redirect('admin/gallery_manager');
				else
				{
					$data['message']="Có lỗi xãy ra !";
					$this->load->view('backend/gallery_manager',$data);
				}
		}
		
		function update_gallery($param){
			
			$gallery_ID = $this->uri->segment(3);
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			//$result_add = $this->madmin->insert_detail_gallery($param);
			//$result_update = $this->madmin->update_gallery($param);
			
	
				$data['gallery_detail']=$this->madmin->get_detail_data_gallery($gallery_ID);
				$this->load->view('backend/gallery_update',$data);
				
				$query = $this->madmin->update_gallery($param);
				if($query==true)
				{
					$this->load->view('backend/gallery_update',$data);
				}
		}
		
		//GALLERY MANAGER SECTION======================================================
		
		
		
		// NEW MANAGER SECTION=========================================================
		
		function new_manager()
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			//$data['data_new_all']=$this->madmin->get_data_new_all();
			
			$this->load->library('pagination');
			$data['base_url']=base_url().'admin/new_manager';
			$data['total_rows']=$this->madmin->count_all_new();
			$data['per_page']=5;
			$data['uri_segment']=3;
			
			$this->pagination->initialize($data);
			
			$data['data'] = $this->madmin->list_all_new($data['per_page'],$this->uri->segment(3));
			
			$this->load->view('backend/new_show',$data);
		}
		
		function delete_new($param)
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			$result_delete = $this->madmin->delete_news($param);
			if($result_delete == true)
				redirect('admin/new_manager');
			else
			{
				$data['message']="Có lỗi xãy ra !";
				$this->load->view('backend/new_manager',$data);
			}
		}
		
		function add_new()
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			$result_add = $this->madmin->add_news();
			if($result_add != false)
			{
				//$this->load->view('backend/new_add',$data);
				redirect('admin/new_manager');
			}
			else
				{
					$data['message']= "Có lỗi xãy ra !";
					$this->load->view('backend/new_add',$data);
				}
		}
		
		function update_new($param)
		{
			$new_ID = $this->uri->segment(3);
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['new_detail'] = $this->madmin->get_detail_data_new($param);
			
			$data['new_detail_2'] = $this->madmin->get_detail_data_new_gamelife($param);

			$this->load->view('backend/new_update',$data);
			
			$query=$this->madmin->update_news($param);
			if($query==true)
				{
					//$this->load->view('backend/new_update',$data);
					redirect('admin/new_manager');
				}
			$query_2=$this->madmin->update_news_gamelife($param);
			if($query_2==true)
				{
					//$this->load->view('backend/new_update',$data);
					redirect('admin/new_manager');
				}	
		}
		
		// NEW MANAGER SECTION=========================================================
		
		
		// FLASH GAME MANAGER SECTION=========================================================
		
		function flashgame_manager()
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['data_game']=$this->mhome->get_data_flashgame_3();
			
			$this->load->view('backend/game_show',$data);
		}
		
		function add_game()
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_add = $this->madmin->add_flashgames();
			
			if($result_add != false)
				{$this->load->view('backend/game_add');}
			else
			{
				$data['message']= "Có lỗi xãy ra !";
				$this->load->view('backend/game_add',$data);
			}
		}
		
		function delete_game($param)
		{
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$result_delete = $this->madmin->delete_games($param);
			
				if($result_delete == true)
					redirect('admin/flashgame_manager');
				else
					{
						$data['message']="Có lỗi xãy ra !";
						$this->load->view('backend/flashgame_manager',$data);
					}	
		}
		
		function update_game($param)
		{
			$new_ID = $this->uri->segment(3);
			
			$data['backend_image'] = base_url().'public/images/image-admin/';
			
			$data['game_detail'] = $this->madmin->get_detail_data_game($new_ID);

			$this->load->view('backend/game_update',$data);
			
			$query=$this->madmin->update_games($param);
			if($query==true)
				{
					$this->load->view('backend/game_update',$data);
				}	
		}
		
		
		
		// FLASH GAME MANAGER SECTION=========================================================
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function do_logout_2(){//--> Logout Admin and go to Home Page
        $this->session->sess_destroy();//unset session in Session class
        redirect('home');//localhost:81/CIF2/home/
		}
}
?>