
<?php
	class Mhome extends CI_Model{
		
	//Get data of menu top :
		function get_menu_home(){ //-->for the item ' Home ' in menu top
			$this->db->select("menu_id, menu_name, menu_link");
			$this->db->where("menu_id =", 1);
			$this->db->where("menu_active =",1);
			$query = $this->db->get("menus");
			return $query->result_array();
		}
	
		function get_menu_items(){ //-->for items except ' Home ' in menu top
			$this->db->select("menu_id, menu_name, menu_link");
			$this->db->where("menu_id !=", 1);
			$this->db->where("menu_active =",1);
			$query = $this->db->get("menus");
			return $query->result_array();
		}
		
		function get_menu_all(){ //-->for items except ' Home ' in menu top
			$this->db->select("menu_id, menu_name, menu_link, menu_active");
			//$this->db->where("menu_id !=", 1);
			//$this->db->where("menu_active =",1);
			$query = $this->db->get("menus");
			return $query->result_array();
		}
		
		
	//Get data of slider in home page :
		function get_data_slider_1()
		{
			$this->db->select("*");
			$this->db->where("slider_id =",1); // lấy duy nhất 1 slide-show đầu tiên ra
			$query=$this->db->get("sliders");
			return $query->result_array();
		}
		
		function get_data_slider_2()
		{
			$this->db->select("*");
			$this->db->where("slider_id !=",1); // lấy duy nhất 1 slide-show đầu tiên ra
			$this->db->where("slider_active =",1);
			$query=$this->db->get("sliders");
			return $query->result_array();
		}
		
		function get_data_slider()
		{
			$this->db->select("*");
			//$this->db->where("slide_id !=",1); // lấy duy nhất 1 slide-show đầu tiên ra
			$query=$this->db->get("sliders");
			return $query->result_array();
		}
		
	//Get data news in home page :
		function get_data_new()
		{
			$this->db->select("new_id, new_title, new_quote, new_content, new_image, new_day, type_name, new_type");
			$this->db->join("types","news.new_type_id = types.type_id");//JOIN( <table have PK, condition to join table > )
			//$this->db->where("new_id <=",3);
			$this->db->order_by("new_day","ASC");
			$this->db->limit(3);// LIMIT record (total record number want to take ,index record start  )
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
	//Get recent news in home page :	
		function get_recent_new()
		{
			$this->db->select("new_id, new_title, new_image");
			$this->db->limit(4,3);// LIMIT record (total record number want to take ,index record start  )
			$query=$this->db->get("news");
			return $query->result_array();
		}		
		function get_recent_update_new()
		{
			$this->db->select("new_id, new_title, new_quote, new_content, new_image, new_day");
			//$this->db->where("new_id",1);
			$query=$this->db->get("news");
			return $query->result_array();
		}
		  
		  // lấy dữ liệu theo từng phần 
        function list_all($number, $offset)
		{
			$this->db->where("new_id !=",1);
			$this->db->where("new_type =","news"); 
            $query =  $this->db->get('news',$number,$offset); 
            return $query->result_array(); 
        }
		
		function list_all_where()
		{
			$this->db->where('new_id =',1); 
            $query =  $this->db->get('news'); 
            return $query->result_array(); 
		}
         
        // Count all number Record in Table news
        function count_all()
		{ 
			$this->db->where('new_type','news');
			$query = $this->db->get('news');
			return $query->num_rows();
        } 
	
	//Get data news other
		function get_other_new()
		{
			$id_tin_dang_xem=$this->uri->segment(3);
			$this->db->select("new_id, new_title, new_day");
			$this->db->where("new_id !=",$id_tin_dang_xem);
			$this->db->limit(7);
			//$this->db->where("new_id <=",7);
			$this->db->order_by("new_day","DESC");
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
	//Get data of gamelife news
		function get_data_gamelife()
		{
			$this->db->where("new_type =","gamelifes");
			$this->db->limit(1);
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
		function get_data_gamelife_2()
		{
			$this->db->where("new_type =","gamelifes");
			$this->db->where("new_id !=",13);
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
		function get_data_gamelife_3()
		{
			$this->db->where("new_type =","gamelifes");
			$this->db->limit(3);
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
		
		
	//Get data of Flash Game in Table games	
		function get_data_flashgame_1()
		{
			$this->db->select("*");
			$this->db->limit(1);
			$query=$this->db->get("games");
			return $query->result_array();
		}
		
		function get_data_flashgame_2()
		{
			$this->db->select("*");
			$this->db->where("game_id !=",1);
			$query=$this->db->get("games");
			return $query->result_array();
		}
		
		function get_data_flashgame_3()
		{
			$this->db->select("*");
			$query=$this->db->get("games");
			return $query->result_array();
		}
		
	//Get data of gallery in Table gallerys
		function get_data_gallery()
		{
			$this->db->select("*");
			$this->db->limit(1);
			$query=$this->db->get("gallerys");
			return $query->result_array();
		}
		
		function get_data_gallery_2()
		{
			$this->db->select("*");
			$this->db->where("gallery_id !=",1);
			$query=$this->db->get("gallerys");
			return $query->result_array();
		}
		
		function get_data_gallery_3()
		{
			$this->db->select("*");
			$query=$this->db->get("gallerys");
			return $query->result_array();
		}
				
		
	//Get title new for each detail new with every new types
		function get_title_news_for_new_detail($param)
		{
			$this->db->select("new_quote, new_content, new_day");
			//$this->db->join("news","news.new_id = new_details.new_id_detail");
			$this->db->where("new_id =",$param);
			//$this->db->where("new_type =","news");
			//$this->db->where("new_detail_type =","news");
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
	//Get title new for each detail new with every new types
		function get_title_gamelife_for_gamelife_detail($param)
		{
			$this->db->select("new_quote, new_content, new_day");
			//$this->db->join("news","news.new_id = new_details.new_id_detail");
			$this->db->where("new_id =",$param);
			$this->db->where("new_type =","gamelifes");
			//$this->db->where("new_detail_type =","news");
			$query=$this->db->get("news");
			return $query->result_array();
		}
		
	//Get title new for each detail new with every new types
		function get_title_slider_for_slider_detail($param)
		{
			$this->db->select("slider_title, slider_content");
			//$this->db->join("sliders","sliders.slide_id = new_details.new_id_detail");
			$this->db->where("slider_id =",$param);
			//$this->db->where("slider_type =","sliders");
			//$this->db->where("new_detail_type =","news");
			$query=$this->db->get("sliders");
			return $query->result_array();
		}
		
	//Get title new for each detail new with every new types
		function get_title_gameflash_for_gameflash_detail($param)
		{
			$this->db->select("game_name, game_intro");
			//$this->db->join("news","news.new_id = new_details.new_id_detail");
			$this->db->where("game_id =",$param);
			//$this->db->where("new_type =","flashgames");
			//$this->db->where("new_detail_type =","news");
			$query=$this->db->get("games");
			return $query->result_array();
		}	
		
				
		
	//Get data of detail_news with parameter in URLs appropriate from Home Controller
		function get_detail_new($param)
		{
			$this->db->select("new_id, new_content_detail_2");
			//$this->db->join("news","news.new_id = new_details.new_id_detail");
			$this->db->where("new_id =",$param);
			//$this->db->where("news.new_type = new_details.new_detail_type");
			$query=$this->db->get("news");
			return $query->result_array();	
		}
		
	//Get data of detail_news & sliders 
		function get_detail_slide($param)
		{
			$this->db->select("new_id_detail, new_content_detail");
			$this->db->join("sliders","sliders.slider_id = new_details.new_id_detail");
			$this->db->where("new_id_detail =",$param);
			$this->db->where("new_detail_type =","sliders");
			//$this->db->where("sliders.slide_type = new_details.new_detail_type");
			$query=$this->db->get("new_details");
			return $query->result_array();	
		}
		
	//Get data of detail_news & games
		function get_game_flash_detail($param)
		{
			$this->db->select("new_id_detail, new_content_detail");
			//$this->db->join("sliders","sliders.slide_id = new_details.new_id_detail");
			$this->db->where("new_id_detail =",$param);
			$this->db->where("new_detail_type =","flashgames");
			//$this->db->where("sliders.slide_type = new_details.new_detail_type");
			$query=$this->db->get("new_details");
			return $query->result_array();	
		}
		
	//Get data of detail_news & gallery
		function get_gallary_detail($param)
		{
			$this->db->select("new_id_detail, new_content_detail");
			//$this->db->join("","sliders.slide_id = new_details.new_id_detail");
			$this->db->where("new_id_detail =",$param);
			$this->db->where("new_detail_type =","gallerys");
			//$this->db->where("sliders.slide_type = new_details.new_detail_type");
			$query=$this->db->get("new_details");
			return $query->result_array();	
		}
		
	//Get title new for each detail new with every new types
		function get_title_gallery_for_gallery_detail($param)
		{
			$this->db->select("gallery_name, gallery_quote");
			//$this->db->join("sliders","sliders.slide_id = new_details.new_id_detail");
			$this->db->where("gallery_id =",$param);
			//$this->db->where("slider_type =","sliders");
			//$this->db->where("new_detail_type =","news");
			$query=$this->db->get("gallerys");
			return $query->result_array();
		}			
				 	
		
	//Get data of rating board in Home page
		function get_rating_board()
		{
			$this->db->select("rating_id, new_title, new_image, new_content");
			$this->db->join("news", "news.new_id = ratings.new_id_rating");
			$this->db->limit(5); // lấy ra duy nhất 5 tin
			$this->db->order_by('rating_view','DESC'); // sắp xếp giảm  dần theo số View
			$query=$this->db->get("ratings");
			return $query->result_array();
		}
		
	//Get data of rating board & detail new
		function get_rating_item_detail($param)
		{
			$this->db->select("new_id_detail, new_content_detail");
			$this->db->join("ratings","ratings.rating_id = new_details.new_id_detail");
			$this->db->where("new_id_detail =",$param);
			$this->db->where("ratings.rating_type = new_details.new_detail_type");
			$query=$this->db->get("new_details");
			return $query->result_array();	
		}
		
	//Get data to login & validate data of Table users :
		function process_login()
		{
			//Grab input data from Login control :
			$username_data_form = $this->security->xss_clean($this->input->post('username')); // Textbox username ( Method : POST )
			$password_data_form = $this->security->xss_clean($this->input->post('password')); // Textbox password ( Method : POST )
			
			//Query the data in Database :
			$this->db->where('user_name =',$username_data_form);
			$this->db->where('user_password',md5($password_data_form)); // check lại mật khẩu mã hóa được lưu trong Database bằng hàm md5()
			$this->db->where('user_level =',0); // role
			
			//Run the query :
			$query = $this->db->get('users');
			
			//Check data input with data in Database :
			if($query->num_rows() == 1){ //--> Check success
				
				//User exist, let's create Session data :
					$row = $query->row(); // get 1 row data of user in Database .
					$data_user = array(
										'user_name' => $row->user_name,
										'logged_in' => true, // đã đăng nhập hay chưa ?
										'user_level' => $row->user_level
									   );
// KHỞI TẠO SESSION class để lưu trữ dữ liệu của user khi họ đăng nhập, bên trái là 'tên biến truy xuất', còn bên phải là ứng với 1 cột trong 1 dòng của Database  	 				   
								$this->session->set_userdata($data_user); // Khởi tạo session để lưu thông tin của user vào array.							
									 return true;
				}//end if
				//Check failed
					return false;
		}
		
		
	function process_login_admin()
		{
			//Grab input data from Login control :
			$username_data_form = $this->security->xss_clean($this->input->post('username')); // Textbox username ( Method : POST )
			$password_data_form = $this->security->xss_clean($this->input->post('password')); // Textbox password ( Method : POST )
			
			//Query the data in Database :
			$this->db->where('user_name =', $username_data_form);
			$this->db->where('user_password', md5($password_data_form));
			$this->db->where('user_level =', 1); // role
			
			//Run the query :
			$query = $this->db->get('users');
			
			//Check data input with data in Database :
			if($query->num_rows() == 1){ //--> Check success
				
				//User exist, let's create Session data :
					$row = $query->row(); // get 1 row data of user in Database .
					$data_admin = array('user_name' => $row->user_name,
										'logged_in' => true, // đã đăng nhập hay chưa ?
										'user_level' => $row->user_level
									   );
// KHỞI TẠO SESSION class để lưu trữ dữ liệu của user khi họ đăng nhập, bên trái là 'tên biến truy xuất', còn bên phải là ứng với 1 cột trong 1 dòng của Database  	 				   
								$this->session->set_userdata($data_admin); // Khởi tạo session để lưu thông tin của user vào array.							
									 return true;
				}//end if
				//Check failed
					return false;
		}
		//Get data to user registration
		function process_signup()
		{
			$userid='';
			$username = $this->input->post('f1');
			$userpassword = md5($this->input->post('f2')); // Mã hóa password khi đăng ký => lưu xuống Database 
			$userfullname = $this->input->post('f3'); 
			$usersex = $this->input->post('f4'); 
			$userbirthday = $this->input->post('f5'); 
			$userphone = $this->input->post('f6'); 
			$useraddress = $this->input->post('f7');
			$useremail = $this->input->post('f8');
			//$userlevel=0; //Default
		
			/*
			$data = array('user_id'=>'',
						  'user_name'=>$this->input->post('f1'),
						  'user_password'=>$this->input->post('f2'),
						  'user_full_name'=>$this->input->post('f3'),
						  'user_sex'=>$this->input->post('f4'),
						  'user_birthday'=>$this->input->post('f5'),
						  'user_phone'=>$this->insssput->post('f6'),
						  'user_address'=>$this->input->post('f7'),
						  'user_avatar'=>''
						);
			$this->db->insert('users',$data);
			*/
			$query=$this->db->query("INSERT INTO users VALUES('$userid','$username','$userpassword','$userfullname','$usersex','$userbirthday','$userphone','$useraddress','$useremail','0')");
			if($query)
				return true;
			else
				return false;
		}
		
		//Get data for comment in Table comments
		
			function process_comment()
			{
				//Grab data from Comment form :
				//But you have to checked that user have logged in and grab their ID
				
				$comment_ID ='';
				$comment_Content=$this->input->post('txtcomment');
				
				//Thiết lập vùng giờ mặc định:
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				//Thiết lập định dạng ngày, giờ :
				$comment_day=date("F j, Y, g:i a");
				$new_detail_id=$this->uri->segment(3);//localhost:81/CIF2/index.php/home/newdetail/<3>
				 
				if($this->session->userdata('logged_in')==true && $this->input->post('submit') && $comment_Content!='') // kiểm tra người dùng có đăng nhập và nhấn nút comment và phải có nội dung comment
				{
					$user_ID = $this->session->userdata('user_id'); // lấy user_id của người dùng khi họ đăng nhập
				//Insert data :
					$query = $this->db->query("INSERT INTO comments VALUES('$comment_ID','$comment_Content','$user_ID','$comment_day','$new_detail_id')");
				if($query)
					return true; // insert thành công
				else
					return false; //insert bị lỗi
				}
				else{
					return -1;
				}
			}
		//Count all of comment amount in table comments 
		function count_all_comment_each_new($param)
		{
			$this->db->select('new_detail_id');
			$this->db->where('new_detail_id =',$param);
			$query=$this->db->get('comments');
			return $query->num_rows(); // đếm số dòng truy vấn trã về
		}
		
		//Get all data in Table comments for comment quote each detail new appropriate :
		function get_all_data_comment($param)
		{
			$this->db->select("comment_content, comment_day, user_name");
			$this->db->join("users","comments.user_id_comment = users.user_id");
			$this->db->where("new_detail_id =",$param);
			$query=$this->db->get("comments");
			return $query->result_array();
		}
		
		//Get all data of rating board show :
		function get_rating_board_show()
		{
			$this->db->select("rating_id, rating_number, new_id_rating, type_name, new_content, new_image,new_quote");
			$this->db->join("types","types.type_id = ratings.game_type_id");
			$this->db->join("news","news.new_id = ratings.rating_id");
			$this->db->limit(5);
			$this->db->order_by("rating_number","DESC");
			$query=$this->db->get("ratings");
			return $query->result_array();
		}
		
		function get_data_from_search()
		{
			$key_word=$this->input->get('txtTimKiem');
			
			$query=$this->db->query("SELECT * FROM news WHERE new_quote LIKE '%$key_word%' OR new_content LIKE '%$key_word%'");
			if($query)
				return $query->result_array();//ket qua tim kiem se la 1 array
			else
				return false;
		}
		
		
		
		function get_data_from_search_content()
		{
			$key_word=$this->input->get('txtTimKiem');
			
			$query=$this->db->query("SELECT new_content_detail FROM new_details WHERE new_content_detail LIKE '%$key_word%'");
			if($query)
				return $query->result_array();//ket qua tim kiem se la 1 array
			else
				return false;
		}
		
		
		
		
}
?>
