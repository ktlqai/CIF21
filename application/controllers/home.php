<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{
				
		function index(){//--> home page
			$this->layout();
		}
		
 	function layout(){
		   
    	$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
		$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
		//$data['log_out']="";
		
		//Đường dẫn đến file chi tiết tin tức khi người dùng 
		// click vào bất cứ tin tức nào mà họ muốn xem chi tiết
		$data['new_detail']="home/newdetail";
		//$data['log_out']='';
		$data['log_out']="<a href='home/do_logout'>Click here to Logout !</a>";
		
		
		//Dữ liệu của menu
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			
		//Dữ liệu của phần bên trái trang chủ	
			$data['slider_home_1']=$this->mhome->get_data_slider_1();
			$data['slider_home_2']=$this->mhome->get_data_slider_2();
			$data['slider_home']=$this->mhome->get_data_slider();
			
			$data['new_home']=$this->mhome->get_data_new();
			$data['recent_new']=$this->mhome->get_recent_new();
		
		//Dữ liệu phần bên phải trang chủ
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
		
			$this->load->view('frontend/home',$data); // Home page
	}
	
	function recentnew(){
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
			
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
			
		        // load thư viện để phân trang : 
            	$this->load->library('pagination'); 
            	//$this->load->helper('url'); không cần load cái này, vì trong autoload đã load rùi
			 
            // cấu hình phân trang :
            $data['base_url'] = base_url().'home/recentnew'; // xác định trang phân trang 
            $data['total_rows'] = $this->mhome->count_all(); // xác định tổng số record 
            $data['per_page'] = 4; // xác định số record ở mỗi trang 
            $data['uri_segment'] = 3; // xác định segment chứa page number ("localhost:81/CIF2/index.php/home/recentnew/< 3 >")
			
            $this->pagination->initialize($data); //Chuyen du lieu phan trang thanh 1 array 
			
			// dữ liệu để load lên theo từng trang :
            $data['data'] = $this->mhome->list_all($data['per_page'],$this->uri->segment(3)); 
			$data['data_1'] = $this->mhome->list_all_where();//Lấy ra 1 tin nổi bật duy nhất và hiện lên trên đầu của mổi trang.
			
					
			$data['frontend_image'] = base_url().'public/images/'; //images path of front-end pages
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['other_new']=$this->mhome->get_other_new();
			
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
		
			$this->load->view('frontend/recent_update',$data); // Recent Update page
		}
		
	function gamelife(){
		
		$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
		$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
			$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
		
		$data['menu_top_home']=$this->mhome->get_menu_home();
		$data['menu_top_items']=$this->mhome->get_menu_items();
		$data['rating_board']=$this->mhome->get_rating_board();
		
		$data['game_life_1']=$this->mhome->get_data_gamelife();
		$data['game_life_2']=$this->mhome->get_data_gamelife_2();
		$data['game_life']=$this->mhome->get_data_gamelife_3(); 
		
		$this->load->view('frontend/game_life',$data); 	
		
		}
	function gamelife_detail($param)
	{
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
			$data['comment_thong_bao']='';
			$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['other_new']=$this->mhome->get_other_new();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$data['gamelife_title_for_gamelife_detail']=$this->mhome->get_title_gamelife_for_gamelife_detail($param);
			$data['new_detail']=$this->mhome->get_detail_new($param); // Variable of URLs to receive and do where to filter data !
			
			// COMMENT FOR EACH NEW HERE ! :
			
			$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			
			$data['count_all_comment_each_new']=$this->mhome->count_all_comment_each_new($param); // count amount comment relative with new
			
			$data['data_comment_with_new']=$this->mhome->get_all_data_comment($param); 
			
			// COMMENT FOR EACH NEW HERE ! :
			
			$this->load->view('frontend/gamelife_detail',$data);
	}		
		
	function newdetail($param){
			
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
			$data['comment_thong_bao']='';
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$data['other_new']=$this->mhome->get_other_new();
			$data['new_title_for_new_detail']=$this->mhome->get_title_news_for_new_detail($param);
			$data['new_detail']=$this->mhome->get_detail_new($param); // Variable of URLs to receive and do where to filter data !
			
			// COMMENT FOR EACH NEW HERE ! :
			
			$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			
			$data['count_all_comment_each_new']=$this->mhome->count_all_comment_each_new($param); // count amount comment relative with new
			
			$data['data_comment_with_new']=$this->mhome->get_all_data_comment($param); 
			
			// COMMENT FOR EACH NEW HERE ! :
			
			$this->load->view('frontend/new_detail',$data);
		}
	/*	
	function xulycomment($param){
			
			$data['comment_thong_bao']='';
			
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['other_new']=$this->mhome->get_other_new();
			$data['new_detail']=$this->mhome->get_detail_new($param); // Variable of URLs to receive and do where to filter data !
		
		 	$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			$this->load->view('frontend/new_detail',$data);
		}
	*/		
		
		
	function sliderdetail($param){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
			$data['comment_thong_bao']='';
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['other_new']=$this->mhome->get_other_new();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$data['title_slider_for_slider_detail']=$this->mhome->get_title_slider_for_slider_detail($param);
			$data['new_detail']=$this->mhome->get_detail_slide($param); // Variable of URLs to receive and do where to filter data !
			
			// COMMENT FOR EACH NEW HERE ! :
			
			$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			
			$data['count_all_comment_each_new']=$this->mhome->count_all_comment_each_new($param); // count amount comment relative with new
			
			$data['data_comment_with_new']=$this->mhome->get_all_data_comment($param); 
			
			// COMMENT FOR EACH NEW HERE ! :
			$this->load->view('frontend/slider_detail',$data);
	}
	
	function rating_item_detail($param){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['other_new']=$this->mhome->get_other_new();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
			
		$data['rating_board_item_detail']=$this->mhome->get_rating_item_detail($param); // Variable of URLs to receive and do where to filter data !
		
		$data['new_title_for_new_detail']=$this->mhome->get_title_news_for_new_detail($param);
		
		// COMMENT FOR EACH NEW HERE ! :
			
			$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			
			$data['count_all_comment_each_new']=$this->mhome->count_all_comment_each_new($param); // count amount comment relative with new
			
			$data['data_comment_with_new']=$this->mhome->get_all_data_comment($param); 
			
			// COMMENT FOR EACH NEW HERE ! :
		
			
			$this->load->view('frontend/rating_item_detail',$data);	
	}
	
		//Rating board show :
	function rating(){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$data['rating_board_show_data']=$this->mhome->get_rating_board_show();
			
			$this->load->view('frontend/rating_board',$data);
		}	
		
	// USER LOGIN HERE !
		
	function dangnhap($message = NULL){ //--> Hiển thị trang đăng nhập
			
			$data['message'] = $message;
			$data['thong_bao'] ='';
			$data['log_out']='';
			$data['data_user']='';
			
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
	//Đường dẫn đến các trang trong thư mục views/frontend ( thông qua các action trong Home Controller ) :
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$this->load->view('frontend/dangnhap',$data);
	}
	
	function xulydangnhap($message = NULL){
		
		$data['message']=$message;
		$data['thong_bao']='';
		$data['log_out']='';
		$data['data_user']='';
		
		//Load all data from dangnhap:
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
	//Đường dẫn đến các trang trong thư mục views/frontend ( thông qua các action trong Home Controller ) :
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			//$data['thong_bao'] = 'Congaturlation, you have logged in !';
			
			
			// Call model :
			$result_login = $this->mhome->process_login();
			$result_login_admin=$this->mhome->process_login_admin();
			
			if($result_login == false){ //--> Login failed, keep the user go to dangnhap page again
				$data['message'] = 'Login failed !';
				$this->load->view('frontend/dangnhap',$data);
			}
			else{//--> Login success, go to home page
				//$data['thong_bao'] = 'Congaturlation, you have logged in !';
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
				redirect('home');
				//$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
				
				// ĐÂY LÀ CÁCH LẤY 'user_fullname' của user khi họ đăng nhập :
	//Biến session sẽ được khởi tạo và lưu trữ 1 dòng thông tin của user ứng với username và password có trong Database ( xữ lý trong Model )
				//$data['data_userid']= $this->session->userdata('user_id');
				//$data['data_userpassword']= $this->session->userdata('user_password');  				
				$this->load->view('frontend/dangnhap',$data);
			}
			
			if($result_login_admin==false)
			{
				$data['message'] = 'Login failed !';
				$this->load->view('frontend/dangnhap',$data);
			}
			else
			{
				redirect('admin');
			}
			
			
		}
		
	 //public function thongbao(){
         //If the user is validated, then this function will run
        //echo 'Congratulations, you are logged in.';
    //}
    
    //function check_session_logged_in(){
        //if(!$this->session->userdata('logged_in')){
            //redirect('logged_in');//localhost:81/CIF2/home/dangnhap
        //}
    //}
	
	function do_logout(){
        $this->session->sess_destroy();
        redirect('home');//localhost:81/CIF2/home/
	}
		
	// END USER LOGIN HERE !
	
	function dangky(){ //--> Show regisration form
		
			$data['message']='';
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
	//Đường dẫn đến các trang trong thư mục views/frontend ( thông qua các action trong Home Controller ) :
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$this->load->view('frontend/dangky',$data);
	}
	
	function xulydangky(){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
	//Đường dẫn đến các trang trong thư mục views/frontend ( thông qua các action trong Home Controller ) :
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			//Call model
			$ket_qua=$this->mhome->process_signup();
			if($ket_qua==true)
			{
				$data['message']= 'Chúc mừng bạn đã đăng ký thành công';
				$this->load->view('frontend/dangky',$data);
				redirect('home/dangnhap');//localhost/CIF2/home/dangnhap
			}
			else
			{
				$data['message']= 'Vui lòng nhập đầy đủ thông tin để đăng ký thành viên !';
				$this->load->view('frontend/dangky',$data);
			}
	}
	
	function flashgame(){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			
			$data['flash_game_1']=$this->mhome->get_data_flashgame_1();
			$data['flash_game_2']=$this->mhome->get_data_flashgame_2();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$this->load->view('frontend/flash_game',$data);
	}
	
	function flashgame_detail($param){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			
			$data['title_game']=$this->mhome->get_title_gameflash_for_gameflash_detail($param);
			$data['flashgame_detail']=$this->mhome->get_game_flash_detail($param); // Variable of URLs to receive and do where to filter data !
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$this->load->view('frontend/flashgame_detail',$data);
	}
	
	function gallery(){
		
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			
			$data['data_gallery_1']=$this->mhome->get_data_gallery();
			$data['data_gallery_2']=$this->mhome->get_data_gallery_2();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$this->load->view('frontend/gallery_show',$data);
	}
	
	function gallery_detail($param){
	
			$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
			$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
				$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
			$data['title_gallery']=$this->mhome->get_title_gallery_for_gallery_detail($param);
			
			$data['other_new']=$this->mhome->get_other_new();
			
				// COMMENT FOR EACH NEW HERE ! :
			
			$result_comment = $this->mhome->process_comment();
			if($result_comment == true)
			{
				$data['comment_thong_bao'] = 'Insert comment thành công !';
			}
			else
			{
				$data['comment_thong_bao'] = 'Insert comment chưa thành công !';
			}
			
			$data['count_all_comment_each_new']=$this->mhome->count_all_comment_each_new($param); // count amount comment relative with new
			
			$data['data_comment_with_new']=$this->mhome->get_all_data_comment($param); 
			
			// COMMENT FOR EACH NEW HERE ! :
			
			
			$data['gallery_detail']=$this->mhome->get_gallary_detail($param);
			
			$this->load->view('frontend/gallery_detail',$data);
	}
	
	function search(){
		
		$data['get_result_data']='';
		$data['get_result_content']='';
		
		$data['frontend_image'] = base_url().'public/images/'; //Đường dẫn đến thư mục hình public
		$data['frontend_flash'] = base_url().'public/flash/'; //Đường dẫn đến thư mục flash
		$data['log_out']="<a href='do_logout'>Click here to Logout !</a>";
					
			$data['menu_top_home']=$this->mhome->get_menu_home();
			$data['menu_top_items']=$this->mhome->get_menu_items();
			$data['rating_board']=$this->mhome->get_rating_board();
			$data['game_life']=$this->mhome->get_data_gamelife_3(); 
			
		  	$result=$this->mhome->get_data_from_search();
			if($result!=false)
				{
					$data['get_result_data']=$this->mhome->get_data_from_search();
					$data['get_result_content']=$this->mhome->get_data_from_search_content();
					$this->load->view('frontend/search',$data);
				}
			else
			{
				$data['get_result_data']=$this->mhome->get_data_from_search();
				$data['attach']="Không có kết quả nào tìm kiếm với từ khóa :" .$this->input->get('txtTimKiem');
				$this->load->view('frontend/search',$data);
			}
	}
	
}
?>



















































