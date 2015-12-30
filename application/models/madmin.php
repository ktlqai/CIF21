<?php
	class Madmin extends CI_Model{
		
		//Get data from Table sliders to pagination
	 function list_all_slider($number, $offset)
		{
			//$this->db->where("slider_active =",1); 
            $query =  $this->db->get('sliders',$number,$offset); 
            return $query->result_array(); 
        }
	  function count_all_slider()
	  {
		  return $this->db->count_all('sliders');
	  }
	  
	  
	  	//Delete slider item
	  function delete_sliders($param)
	  {
		 $query = $this->db->query("DELETE FROM sliders WHERE slider_id =".$param);
		 if($query)
		 	return true;
		 else
		 	return false;
	  }
	  
	  	//Get data of slider item with parament
		function get_data_slider_with_param($param)
		{
			$this->db->select("*");
			$this->db->where('slider_id',$param);
			$query = $this->db->get("sliders");
			return $query->result_array();
		}
		
		//Update data of slider item
		function update_sliders($param)
		{
			
			$path_upload = base_url()."public/images/image-slider/";
			if($this->input->post('submit'))
			{
				$data = array('slider_title' => $this->input->post('txtTieuDeSlide'),
					  	  'slider_content' =>$this->input->post('txtTrichDan'),
					      'slider_image' => $this->upload_image_slider(),
					      'slider_active' => $this->input->post('radActive'));
						  
					$this->db->where('slider_id',$param);
					return $this->db->update('sliders',$data);
			}
			return false;
		}
	  
	  
	 //IMAGE UPLOAD FILE OF SLIDER =======================================================
		
		function insert_slider()		
		{
				
			if($this->input->post('submit'))
			{
				$data = array('slider_id' =>'',
				 	 		  'slider_title' => $this->input->post('txtTieuDeSlide'),
					  		  'slider_content' => $this->input->post('txtTrichDan'),
					          'slider_image' => $this->upload_image_slider(),
					  		  'slider_active' => $this->input->post('radKichHoatSlide'));
			
				return $this->db->insert('sliders',$data);		  
			}
			return false;
		}
		
	function upload_image_slider(){
		
		//'upload_path' => './public/images/image-slider/': đường dẫn upload đến thư mục slider
		//( Nơi sẽ lưu hình ảnh được upload )
		
		$config = array(
						'upload_path' => './public/images/image-slider/',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'overwrite' => false, // ghi đè lên file hình đã có ?
					   );
					
				$this->load->library('upload', $config);
				$this->upload->initialize($config); // chuyển các thông tin của $config thành 1 array
				
				if ($this->upload->do_upload('img')) //Tên của input type = file là img
				{
					$image_data = $this->upload->data();
					//print_r($image_data);
					//echo "Tên hình vừa upload :".$image_data['file_name'];
					//die;
					return $image_data['file_name'];
				}
				else
				{
					print_r($this->upload->display_errors());
					die;
				}
		}
		
		
		function upload_image_slider_update(){ //--> cho việc update hình ảnh ( ko hiện lỗi khi chưa upload hình ảnh thay thế hình ảnh ban đầu của slide )
		
		//'upload_path' => './public/images/image-slider/': đường dẫn upload đến thư mục slider
		//( Nơi sẽ lưu hình ảnh được upload )
		
		$config = array(
						'upload_path' => './public/images/image-slider/',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'overwrite' => false, // ghi đè lên file hình đã có ?
						);	
					
				$this->load->library('upload', $config);
				//$this->upload->overwrite = TRUE; // Nạp chồng hình đã có 
				$this->upload->initialize($config); // chuyển các thông tin của $config thành 1 array
				
				if ($this->upload->do_upload('img_2')) //Tên của input type = file là img
				{
					$image_data = $this->upload->data();
					//print_r($image_data);
					//echo "Tên hình vừa upload :".$image_data['file_name'];
					//die;
					return $image_data['file_name'];
				}
				//else
				//{
					//print_r($this->upload->display_errors());
					//die;
				//}
		}	
		
			
		
		
		
	 //IMAGE UPLOAD FILE OF SLIDER =======================================================
	  
	  
	  
	  	//Get all data of menu with parament :
		function get_data_menu_with_param($param)
		{
			$this->db->select("menu_id, menu_name, menu_link, menu_active");
			$this->db->where("menu_id",$param);
			$query=$this->db->get("menus");
			return $query->result_array();
		}
	  	
	  
	  	//Insert data from Table menus
	  function insert_menu()
	  {
		  //Grab data from menu data form
		  	$TenMenu=$this->input->post('txtTenMenu');
			$TenController=$this->input->post('txtTenController');
			$KichHoat=$this->input->post('radKichHoat');
			$Menu_ID='';
			
			//Insert process :
			
			if(strlen($TenMenu)==0 || strlen($TenController)==0)
				return false;
				
			else
			{
				$query=$this->db->query("INSERT INTO menus VALUES('$Menu_ID','$TenMenu','$TenController','$KichHoat')");
			}
			
			if($query)
				return true;
			else
				return false;
	  }
	  
	 //Delete menu item  
	  function delete_menu($param)
	  {
		$query=$this->db->query("DELETE FROM menus WHERE menu_id=".$param);
		if($query)
			return true;
		else
			return false;
	  }
	  
	 //Update menu item
	 	function update_menu($param)
		{
			 $TenMenu = $this->input->post('txtTieuDeMenu');
			 $Controller = $this->input->post('txtTenController');
			 $Acitve = $this->input->post('radActive');
			 
			 $query=$this->db->query("UPDATE menus SET menu_name='$TenMenu',menu_link='$Controller',menu_active='$Acitve' WHERE menu_id =".$param);
			 if($query)
			 	return true;
			 else
			 	return false;	
		}
	  
	 function insert_new_details()
	 {
		 $Index_new = $this->input->post('stt');
		 $NoiDung = $this->input->post('editor');
		 $LoaiTin= $this->input->post('loaitin');
		 
		 if($Index_new =='' || $NoiDung == '' || $LoaiTin == '')
		 	return false;
		 else
		 {
			 $query=$this->db->query("INSERT INTO new_details VALUES('$Index_new','$NoiDung','$LoaiTin')");
		 }
		 
		 if($query)
		 	return true;
		else
			return false;
	 }
	 
	 
	 //Get data user from Table users
	 	function get_data_user()
		{
			$query=$this->db->get("users");
			return $query->result_array();
		}
		
		//Get data from user_id
		function get_data_user_with_param($param)
		{
			$this->db->select("user_id, user_name, user_password, user_level");
			$this->db->where("user_id",$param);
			$query=$this->db->get("users");
			return $query->result_array();
		}
	//Update data user	
		function update_user($param)
		{
			$TenDN=$this->input->post('txtTenDN');
			$MatKhau=md5($this->input->post('txtMatKhau'));
			$PhanQuyen=$this->input->post('radLevel');
			
	$query=$this->db->query("UPDATE users SET user_name ='$TenDN', user_password='$MatKhau',user_level='$PhanQuyen' WHERE user_id=".$param);
		if($query)
			return true;
		else
			return false;
		}
		
	 //Delete user
	 	function delete_user($param)
		{
			$query=$this->db->query("DELETE FROM users WHERE user_id=".$param);
		if($query)
			return true;
		else
			return false;
		}
		
	//Upload file image for gallery :
	function upload_image_gallery()
	{
		$config = array(
					'upload_path' => './public/images/image-gallery/',//thư mục để upload vào
					'allowed_types' => 'gif|jpg|png|jpeg',
					'overwrite' => false // không ghi đè lên hình đã upload 
					);
			//Thư viện upload của C_I
			$this->load->library('upload', $config);
			//lấy giá trị $config định nghĩa về file được upload
			$this->upload->initialize($config);
			//Kiểm tra upload có thành công hay ko ?
			
			if($this->input->post('submit'))
			{
			
			if ($this->upload->do_upload('img')) //Tên của input type = file là 'img'(add_gallery.php)
				{
					$image_data = $this->upload->data();
					//print_r($image_data);
					//echo "Tên hình vừa upload :".$image_data['file_name'];
					//die;
					return $image_data['file_name'];
				}
			else
				{
					print_r($this->upload->display_errors());
					die;
				}
			}//end if()
	}
	
	function add_gallery()
	{
		if($this->input->post('submit'))
		{
		$data = array('gallery_id' =>'',
					  'gallery_name' => $this->input->post('txtTieuDeGallery'),
					  'gallery_image' => $this->upload_image_gallery(),
					  'gallery_quote' => $this->input->post('txtGioiThieuGallery')			
					 );
				return $this->db->insert('gallerys',$data);	 
		}
		return false;			
	}
	
	function delete_gallerys($param)
	{
		$query = $this->db->query("DELETE FROM gallerys WHERE gallery_id =".$param);
		if($query)
			return true;
		else
			return false;
	}
	
	function get_detail_data_gallery($param)
	{
		$this->db->select("new_id_detail, new_content_detail, new_detail_type, gallery_name, gallery_quote");
		$this->db->join("gallerys","gallery_id = new_details.new_id_detail");
		$this->db->where("new_detail_type =","gallerys");
		$this->db->where("new_id_detail",$param);
		$query = $this->db->get('new_details');
		return $query->result_array();
	}
	//Insert detail data of gallery to new_details table while load new detail of gallery
	function insert_detail_gallery($param)
	{
		$new_id_detail = $param;
		$new_detail_content ='';
		$new_detail_type ='gallerys';
		
		$query = $this->db->query("INSERT INTO new_details VALUES('$new_id_detail','$new_detail_content','$new_detail_type')");
		if($query)
			return true;
		else
			return false;	
	}
	
	function update_gallery($param)
	{
		$tham_so = $param;
		if($this->input->post('submit'))
		{
		$content = $this->input->post('editor');
		$query = $this->db->query("UPDATE new_details SET new_content_detail ='$content' WHERE new_id_detail ='$tham_so' AND new_detail_type = 'gallerys'");
		
		if($query)
			return true;
		else
			return false;
		}
	return false;
	}
	
	//Get all data of news
	 function list_all_new($number, $offset)
		{
			$this->db->select("new_id, new_title, new_quote, new_content, new_image, new_day, type_name, new_type");
			$this->db->join("types","news.new_type_id = types.type_id");
            $query =  $this->db->get('news',$number,$offset); 
            return $query->result_array(); 
        }
	  function count_all_new()
	  {
		  return $this->db->count_all('news');
	  }
	
	//Delete new item
		function delete_news($param)
		{
			$query = $this->db->query("DELETE FROM news WHERE new_id =".$param);
			if($query)
				return true;
			else
				return false;
		}
		
		
		//Upload file image for new :
	function upload_image_news()
	{
		$config = array(
					'upload_path' => './public/images/image-new/',//thư mục để upload vào
					'allowed_types' => 'gif|jpg|png|jpeg',
					'overwrite' => true // ghi đè lên hình đã upload 
					);
			//Thư viện upload của C_I
			$this->load->library('upload', $config);
			//lấy giá trị $config định nghĩa về file được upload
			$this->upload->initialize($config);
			//Kiểm tra upload có thành công hay ko ?
			
			if($this->input->post('submit'))
			{
			
			if ($this->upload->do_upload('img')) //Tên của input type = file là 'img'(add_gallery.php)
				{
					$image_data = $this->upload->data();
					//print_r($image_data);
					//echo "Tên hình vừa upload :".$image_data['file_name'];
					//die;
					return $image_data['file_name'];
				}
			else
				{
					print_r($this->upload->display_errors());
					die;
				}
			}//end if()
	}
		
		function add_news()
		{
			if($this->input->post('submit'))
			{
				
			$content = $this->input->post('editor');
			
			$data = array('new_id' => '',
						  'new_title' => $this->input->post('txtTieuDeTin'),
						 'new_quote' => $this->input->post('txtTrichDan'),
						 'new_content' => $this->input->post('txtNoiDungNgan'),
						 'new_image' => $this->upload_image_news(),
						 'new_day' => $this->input->post('txtNgayDangTin'),
						 'new_type_id' => $this->input->post('radTypeNew'),
						 'new_type' => $this->input->post('txtChuyenMuc'),
						 'new_content_detail_2' => $content
						 );
					$this->db->insert('news',$data);
					return true;
			}
			return false;
		}
		
		
		function get_detail_data_new($param)
		{
		$this->db->select("*");
		//$this->db->join("news","news.new_id = new_details.new_id_detail");
		$this->db->join("types","types.type_id = news.new_type_id");
		$this->db->where("new_type =","news");
		$this->db->where("new_id",$param);
		$query = $this->db->get('news');
		return $query->result_array();
		}
		
		function get_detail_data_new_gamelife($param)
		{
		$this->db->select("*");
		//$this->db->join("news","news.new_id = new_details.new_id_detail");
		$this->db->join("types","types.type_id = news.new_type_id");
		$this->db->where("new_type =","gamelifes");
		$this->db->where("new_id",$param);
		$query = $this->db->get('news');
		return $query->result_array();
		}
		
		
		function update_news($param)
		{
			$tham_so = $param;
			if($this->input->post('submit'))
			{
		$content = $this->input->post('editor');
		$query = $this->db->query("UPDATE news SET new_content_detail_2 ='$content' WHERE new_id ='$tham_so' AND new_type='news'");
		
		if($query)
			return true;
		else
			return false;
			}
		}
		
		
	function update_news_gamelife($param)
		{
			$tham_so = $param;
			if($this->input->post('submit'))
			{
		$content = $this->input->post('editor');
		$query = $this->db->query("UPDATE news SET new_content_detail_2 ='$content' WHERE new_id='$tham_so' AND new_type = 'gamelifes'");
		
		if($query)
			return true;
		else
			return false;
			}
		}
				
		
		//Upload file image for flash game :
	function upload_image_flashgame()
	{
		$config = array(
					'upload_path' => './public/images/image-flash-game/',//thư mục để upload vào
					'allowed_types' => 'gif|jpg|png|jpeg',
					'overwrite' => false // không ghi đè lên hình đã upload 
					);
			//Thư viện upload của C_I
			$this->load->library('upload', $config);
			//lấy giá trị $config định nghĩa về file được upload
			$this->upload->initialize($config);
			//Kiểm tra upload có thành công hay ko ?
			
			if($this->input->post('submit'))
			{
			
			if ($this->upload->do_upload('img')) //Tên của input type = file là 'img'(add_gallery.php)
				{
					$image_data = $this->upload->data();
					//print_r($image_data);
					//echo "Tên hình vừa upload :".$image_data['file_name'];
					//die;
					return $image_data['file_name'];
				}
			else
				{
					print_r($this->upload->display_errors());
					die;
				}
			}//end if()
	}
	
	//Add new flash game
		function add_flashgames()
		{
			if($this->input->post('submit'))
			{
				$data = array('game_id' => '',
							  'game_name' => $this->input->post('txtTenGame'),
							  'game_image' => $this->upload_image_flashgame(),
							  'game_intro' => $this->input->post('txtGioiThieu')
							 );
					$this->db->insert('games',$data);
			}
			return false;
		}
		
		//Delete flashgame item
		function delete_games($param){
			
			$query = $this->db->query("DELETE FROM games WHERE game_id =".$param);
			if($query)
				return true;
			else
				return false;
		}
		
		//Update date of flash game
		
		function get_detail_data_game($param)
		{
		$this->db->select("new_id_detail, new_content_detail, game_name, game_image, game_intro");
		$this->db->join("games","games.game_id = new_details.new_id_detail");
		$this->db->where("new_detail_type =","flashgames");
		$this->db->where("new_id_detail",$param);
		$query = $this->db->get('new_details');
		return $query->result_array();
		}
		
		function update_games($param)
		{
		if($this->input->post('submit'))
		{
			$tham_so = $param;
			if($this->input->post('submit'))
			{
		$content = $this->input->post('editor');
		$query = $this->db->query("UPDATE new_details SET new_content_detail ='$content' WHERE new_id_detail ='$tham_so' AND new_detail_type = 'flashgames'");
		
		if($query)
			return true;
		else
			return false;
			}
		 }
		}	
}
?>

