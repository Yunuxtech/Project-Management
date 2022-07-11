<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','common_helper'));
	    $this->load->model('crud_model');
    }
	public function website_home()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$data['banner_offer'] = $this->db->query('SELECT * FROM `tbl_products` where pro_off_percentage > 499  ORDER BY `update_date` DESC limit 9')->result();
		$this->load->view('website/website_home',$data);
	}
	public function product_v()
	{
		$product_id = $this->uri->segment('2');
		$data['category'] = $this->db->get('tbl_category')->result();
		$data['product_data'] = $this->crud_model->selectquery('tbl_products','product_id',$product_id);
		if(count($data['product_data']) > 0)
		{
			$query = $this->db->limit(7)->get_where("tbl_products",array('product_id !=' => $product_id , 'cat_id ' => $data['product_data'][0]->cat_id));
			$data['related_products'] = $query->result();
			$query = $this->db->get_where("tbl_product_qes_ans",array('product_id' => $product_id , 'answer !=' => ''));
			$data['product_qes_ans'] = $query->result();
			$query = $this->db->get_where("tbl_product_qes_ans",array('product_id' => $product_id));
			$data['review_vote'] = $query->result();
			$this->load->view('website/product_view',$data);
		}
		else
		{
			redirect(base_url('website_home'));
		}
	}
	public function qestion_pass()
	{
		$product_id = $this->input->post("product_id");
		$question = $this->input->post("question");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'question' => $question,'customer_id' => $customer_id,'date_of_question' => date('Y-m-d H:i:s'));
		$data = $this->crud_model->insert('tbl_product_qes_ans',$datavalues1);
		echo $data;
	}
	public function qestion_vote()
	{
		$product_id = $this->input->post("product_id");
		$pro_qes_ans_id = $this->input->post("pro_qes_ans_id");
		$vote_type = $this->input->post("vote_type");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'pro_qes_ans_id' => $pro_qes_ans_id,'customer_id' => $customer_id);
		$query = $this->db->get_where("tbl_qes_ans_votes", $datavalues1);
		$data['question_vote_data'] = $query->result();
		if(count($data['question_vote_data']) > 0)
		{
			$datavalues = array('product_id' => $product_id ,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_updated' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->update('tbl_qes_ans_votes',$datavalues,'qes_ans_vote_id',$data['question_vote_data'][0]->qes_ans_vote_id);
			echo"update";
		}
		else{
			$datavalues1 = array('product_id' => $product_id , 'pro_qes_ans_id' => $pro_qes_ans_id,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_voted' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->insert('tbl_qes_ans_votes',$datavalues1);
			echo"insert";
		}
	}
	public function review_vote()
	{
		$product_id = $this->input->post("product_id");
		$order_id = $this->input->post("order_id");
		$vote_type = $this->input->post("vote_type");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id , 'order_id' => $order_id,'customer_id' => $customer_id);
		$query = $this->db->get_where("tbl_review_votes", $datavalues1);
		$data['question_vote_data'] = $query->result();
		if(count($data['question_vote_data']) > 0)
		{
			$datavalues = array('product_id' => $product_id ,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_updated' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->update('tbl_review_votes',$datavalues,'review_vote_id',$data['question_vote_data'][0]->review_vote_id);
			echo"update";
		}
		else{
			$datavalues1 = array('product_id' => $product_id , 'order_id' => $order_id,'customer_id' => $customer_id,'vote_type' => $vote_type,'date_of_voted' => date('Y-m-d H:i:s'));
			$data = $this->crud_model->insert('tbl_review_votes',$datavalues1);
			echo"insert";
		}
	}
	public function cat_v()
	{
		$cat_id = $this->uri->segment('2');
		$datavalues1 = array('cat_id' => $cat_id);
		$query = $this->db->get_where("tbl_products", $datavalues1);
		$data['product_data'] = $query->result();
		//
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('cat_id' => $cat_id);
		$query = $this->db->get_where("tbl_sub_category", $datavalues1);
		$data['sub_category_data'] = $query->result();
		$data['brand_data'] = $this->db->query('SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where cat_id in('.$cat_id.'))')->result();
		$data['low_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where cat_id in('.$cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1')->result();
		$data['high_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where cat_id in('.$cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1')->result();
		$this->load->view('website/cat_v',$data);
	}
	public function add_to_cart()
	{
		if(!empty($this->input->post("pro_size")))
		{
			$pro_size = $this->input->post("pro_size");
		}
		else
		{
			$pro_size ="";
		}
		
		$product_id = $this->input->post("product_id");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING');
		$query = $this->db->get_where("tbl_cart",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{

		}
		else
		{
			$datavalues2 = array('pro_size' => $pro_size,'product_id' => $product_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING','quantity' => '1');
			$data = $this->crud_model->insert('tbl_cart',$datavalues2);
			echo"insert";
		}
	}
	public function add_to_wishlist()
	{
		$product_id = $this->input->post("product_id");
		$customer_id = $this->session->userdata('customer_id');
		$datavalues1 = array('product_id' => $product_id ,'customer_id' => $customer_id );
		$query = $this->db->get_where("tbl_wishlist",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{

		}
		else
		{
			$data = $this->crud_model->insert('tbl_wishlist',$datavalues1);
			echo"insert";
		}
	}
	public function customer_cart()
	{
		$customer_id = $this->session->userdata('customer_id');
		$query = $this->db->get_where("tbl_cart",array('customer_id' => $customer_id , 'order_status' => 'PENDING'));
			$data['cart_data'] = $query->result();
		
			$data['category'] = $this->db->get('tbl_category')->result();
			$this->load->view('website/customer_cart',$data);
		
	}
	public function cart_inc_dec()
	{
		$a=0;
		$customer_id = $this->session->userdata('customer_id');
		$cart_id = $this->input->post("cart_id");
		$inc_dec_status = $this->input->post("inc_dec_status");
		$datavalues1 = array('cart_id' => $cart_id ,'customer_id' => $customer_id ,'order_status' => 'PENDING');
		$query = $this->db->get_where("tbl_cart",$datavalues1);
		$data['cart_data'] = $query->result();
		if(!empty($data['cart_data']))
		{
			if($inc_dec_status == 1)
			{
				$a = --$data['cart_data'][0]->quantity;
				echo"dec";
			}
			else
			{
				$a = ++$data['cart_data'][0]->quantity;
				echo"inc";
			}
			$datavalues1 = array('quantity' => $a);
			$data = $this->crud_model->update('tbl_cart',$datavalues1,'cart_id',$data['cart_data'][0]->cart_id);

		}
	}
	public function cart_pro_remove()
	{
		$cart_id = $this->input->post("cart_id");
		$query = $this->db->query("DELETE from `tbl_cart` where cart_id ='".$cart_id."'");
		echo"removed";
	}
	public function order_placed() 
	{
		$payment_type = $this->input->post("payment_method");
		$card_type = $this->input->post("card_type");
		$card_number = $this->input->post("card_number");
		$expiry_month = $this->input->post("expiry_month");
		$cvcode = $this->input->post("cvcode");
		$data['category'] = $this->db->get('tbl_category')->result();
		$customer_id = $this->session->userdata('customer_id');
		$role = $this->session->userdata('role');
		if($role =='customer')
		{
			$datavalues1 = array('customer_id' => $customer_id ,'order_status' => 'PENDING');
			$query = $this->db->get_where("tbl_cart",$datavalues1);
			$data['cart_data'] = $query->result();
			if(!empty($data['cart_data']))
			{
				foreach ($data['cart_data'] as $key => $value)
				{

					$datavalues123 = array('product_id' => $value->product_id);
					$query1 = $this->db->get_where("tbl_products",$datavalues123);
					$data1['product_data'] = $query1->result();
					if(!empty($data1['product_data']))
					{

						$datavalues1 = array('customer_id' => $customer_id ,'tracking_id' => rand(10000,999999),'product_id' => $value->product_id,'seller_id' => $data1['product_data'][0]->customer_id,'amount' => $data1['product_data'][0]->pro_final_amount,'offer_amount' => $data1['product_data'][0]->pro_off_percentage,'quantity_in_no' => $value->quantity,'card_type' => $card_type,'card_number' => $card_number,'expiry_month' => $expiry_month,'cvcode' => $cvcode,'payment_type' => $payment_type,'date_of_order' => date('Y-m-d H:i:s'),'seller_status' => 'PENDING','cutomer_status' => 'PENDING');
						$data = $this->crud_model->insert('tbl_orders',$datavalues1);
					}
					else
					{
						$data['var'] = "Product Missing";
						$this->load->view('website/error',$data);
					}
					//stock reduce
					//$datavalues21 = array('product_id' => $value->product_id);
					//print_r($datavalues21);
					$data1['stock_list1'] = $this->db->query("SELECT * FROM `tbl_stock_list` WHERE `product_id` = '".$value->product_id."'")->result();
					
					// echo "only ".count($data1['stock_list1']);
					// echo $value->product_id;
					// print_r($data1['stock_list1']);
						
					if(!empty($data1['stock_list1']))
					{

						$balance = $data1['stock_list1'][0]->current_available - $value->quantity;
						$datavalues22 = array('current_available' => $balance);
						$this->crud_model->update('tbl_stock_list', $datavalues22, 'stock_id', $data1['stock_list1'][0]->stock_id);
					}
					//stock reduce end


				}
				$datavalues = array('order_status' => 'success');
				$data = $this->crud_model->update('tbl_cart',$datavalues,'customer_id',$customer_id);
				$this->session->set_tempdata('success', 'Order Placed Successfully', 5);
				// redirect(base_url('customer_cart'));
				redirect(base_url('orders_customer'));
			}
			else
			{
				$data['var'] = "Cart Empty Please Add some product";
				$this->load->view('website/error',$data);
			}
		}
		else
		{
			$data['var'] = "Somthing wrong please login agian";
			$this->load->view('website/error',$data);
		}
	}
	public function sub_cat_v()
	{
		$sub_cat_id = $this->uri->segment('2');
		$datavalues1 = array('sub_cat_id' => $sub_cat_id);
		$query = $this->db->get_where("tbl_products", $datavalues1);
		$data['product_data'] = $query->result();
		//
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('sub_cat_id' => $sub_cat_id);
		$query = $this->db->get_where("tbl_sub_category", $datavalues1);
		$data['sub_category_data'] = $query->result();
		$data['brand_data'] = $this->db->query('SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where sub_cat_id in('.$sub_cat_id.'))')->result();
		$data['low_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where sub_cat_id in('.$sub_cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1')->result();
		$data['high_value'] = $this->db->query('SELECT pro_final_amount FROM `tbl_products` where sub_cat_id in('.$sub_cat_id.') ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1')->result();
		if(!empty($data['product_data']))
		{
			$this->load->view('website/sub_cat_v',$data);
		}
		else
		{
			$data['var'] = "No Product in this Category";
			$this->load->view('website/error',$data);
		}
	}
	public function product_search()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$search_keywords = $this->input->post("search_keywords");
		$search_options = $this->input->post("search_options");
		if($search_keywords !=''){
			$data['search_keyword'] = $search_keywords;
			if($search_options == 'all')
			{
				$data['product_data'] = $this->db->query("SELECT * FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%'")->result();
			}
			else
			{
				$data['product_data'] = $this->db->query("SELECT * FROM `tbl_products` where (pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%') and sub_cat_id in(".$search_options.")")->result();
			}
			if(count($data['product_data']) > 0)
			{
				$data['sub_category_data'] = $this->db->query("SELECT * FROM `tbl_sub_category` where sub_cat_id in(SELECT sub_cat_id from tbl_products where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%')")->result();

				$data['brand_data'] = $this->db->query("SELECT * FROM `tbl_brand` where brand_id in(SELECT brand_id from tbl_products where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%')")->result();
				$data['low_value'] = $this->db->query("SELECT pro_final_amount FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%' ORDER BY `tbl_products`.`pro_final_amount`  + 0 asc limit 1")->result();
				$data['high_value'] = $this->db->query("SELECT pro_final_amount FROM `tbl_products` where pro_name like '%".$search_keywords."%' or pro_keywords like '%".$search_keywords."%' ORDER BY `tbl_products`.`pro_final_amount`  + 0 DESC limit 1")->result();
				$this->load->view('website/search_v',$data);
			}else
			{
				$data['var'] = "Sorry No Prudct Found";
				$this->load->view('website/error',$data);
				
			}
		}
		else
		{
			$data['var'] = "Please Search Again";
			$this->load->view('website/error',$data);
		}
	}
	public function contact()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$datavalues1 = array('customer_id' => 1);
		$query = $this->db->get_where("tbl_login", $datavalues1);
		$data['admin_data'] = $query->result();
		$this->load->view('website/contact',$data);
	}
	public function send_feedback()
	{
		$sender_name = $this->input->post("sender_name");
		$email = $this->input->post("email");
		$sender_comment = $this->input->post("sender_comment");
		$datavalues1 = array('sender_name' => $sender_name ,'email' => $email ,'sender_comment' => $sender_comment ,'date_of_feedback' => date('Y-m-d H:i:s'));
		$data = $this->crud_model->insert('tbl_public_feedback',$datavalues1);
		$this->session->set_tempdata('success', 'Thank you for valuable feedback !', 5);
		redirect(base_url('contact'));
	}
	//
	// how-it-works and Faq
	public function how_it_works()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$this->load->view('website/t_home',$data);
	}
	public function faq()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$this->load->view('website/t_home',$data);
	}

	//
	public function t_home()
	{
		$data['category'] = $this->db->get('tbl_category')->result();
		$this->load->view('website/t_home',$data);
	}
	public function t_product()
	{
		$product_id = $this->uri->segment('2');
		$data['product'] = $this->db->get_where('tbl_product',array('pro_id' => $product_id))->result();
		if(!empty($data['product']))
		{
			$this->load->view('website/t_product',$data);
		}
		else
		{
			redirect(base_url('t_home'));
		}
	}
	public function t_product_update()
	{
		$customer_id = $this->session->userdata('customer_id');
		$pro_id = $this->input->post("pro_id_hidden");
		// adding pro_price
		$pro_price = $this->input->post("pro_price");
		// end
		$design_ids = $this->input->post("design_id_hidden");
		$d_rate_total = $this->input->post("design_rate_hidden");
		$cust_desc = $this->input->post("cust_desc");
		$Length = $this->input->post("Length");
		$Shoulder = $this->input->post("Shoulder");
		$Waist_Length = $this->input->post("Waist_Length");
		$Hip_Length = $this->input->post("Hip_Length");
		$Sleeve_Length = $this->input->post("Sleeve_Length");
		$Chest_Round = $this->input->post("Chest_Round");
		$Waist_Round = $this->input->post("Waist_Round");
		$Hip_Round = $this->input->post("Hip_Round");
		$Bicep_Round = $this->input->post("Bicep_Round");
		$Elbow_Round = $this->input->post("Elbow_Round");
		$Wrist_Round = $this->input->post("Wrist_Round");
		$Collar = $this->input->post("Collar");
		$Armhole = $this->input->post("Armhole");
		$Bottom = $this->input->post("Bottom");
		$Bottom_Length = $this->input->post("Bottom_Length");
		$Knee_Length = $this->input->post("Knee_Length");
		$Bottom_Waist_Round = $this->input->post("Bottom_Waist_Round");
		$Bottom_Hip_Round = $this->input->post("Bottom_Hip_Round");
		$Thigh_Round = $this->input->post("Thigh_Round");
		$Knee_Round = $this->input->post("Knee_Round");
		$Calf_Round = $this->input->post("Calf_Round");
		$Bottom_Hern = $this->input->post("Bottom_Hern");
		$sizes = "Length=>".$Length."=>Shoulder=>".$Shoulder."=>Waist_Length=>".$Waist_Length."=>Hip_Length=>".$Hip_Length."=>Sleeve_Length=>".$Sleeve_Length."=>Chest_Round=>".$Chest_Round."=>Waist_Round=>".$Waist_Round."=>Hip_Round=>".$Hip_Round."=>Bicep_Round=>".$Bicep_Round."=>Elbow_Round=>".$Elbow_Round."=>Wrist_Round=>".$Wrist_Round."=>Collar=>".$Collar."=>Armhole=>".$Armhole."=>Bottom=>".$Bottom."=>Bottom_Length=>".$Bottom_Length."=>Knee_Length=>".$Knee_Length."=>Bottom_Waist_Round=>".$Bottom_Waist_Round."=>Bottom_Hip_Round=>".$Bottom_Hip_Round."=>Thigh_Round=>".$Thigh_Round."=>Knee_Round=>".$Knee_Round."=>Calf_Round=>".$Calf_Round."=>Bottom_Hern=>".$Bottom_Hern;
		$own_design_img = empty($_FILES['own_design_img']['name']) ? '' : $_FILES['own_design_img']['name'];
     		if(!empty($own_design_img)) $own_design_img1 = file_upload_img($own_design_img, 'own_design_img');

		$datavalues1 = array('qty' => 1 , 'customer_id' => $customer_id,'total_rate' => $d_rate_total,'pro_price' => $pro_price,'design_ids' => $design_ids,'pro_id' => $pro_id,'own_design_img' => $own_design_img1,'cust_desc' => $cust_desc,'sizes' => $sizes);
		$this->session->set_tempdata('success', 'Product Added into the cart!', 5);
		$data = $this->crud_model->insert('tbl_cart',$datavalues1);
		redirect(base_url('t_cart'));
	}
	public function t_cart()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['cart'] = $this->db->get_where('tbl_cart',array('customer_id' => $customer_id))->result();
		$this->load->view('website/t_cart',$data);
	}
	public function t_cart_qty_update()
	{
		$product_id = $this->input->post("product_id");
		$qty = $this->input->post("qty");
		$customer_id = $this->input->post("customer_id");
		$cart_id = $this->input->post("cart_id");
		$pro_price = $this->input->post("pro_price");
		$datavalues = array('pro_id' => $product_id ,'customer_id' => $customer_id,'qty' => $qty,'total_price' => $pro_price);
		$data = $this->crud_model->update('tbl_cart',$datavalues,'cart_id',$cart_id);
		echo"insert";
	}
	public function t_product_delete()
	{
		$cart_id = $this->uri->segment('2');
		$query = $this->db->query("DELETE from `tbl_cart` where cart_id ='".$cart_id."'");
		redirect(base_url('t_cart'));
	}
	public function t_product_edit()
	{
		$product_id = $this->uri->segment('2');
		$cart_id = $this->uri->segment('3');
		$customer_id = $this->session->userdata('customer_id');
		$data['product'] = $this->db->get_where('tbl_product',array('pro_id' => $product_id))->result();
		$data['cart_data'] = $this->db->get_where('tbl_cart',array('pro_id' => $product_id,'customer_id' => $customer_id,'cart_id' => $cart_id))->result();
		if(!empty($data['product']) && !empty($data['cart_data']))
		{
			$this->load->view('website/t_product',$data);
		}
		else
		{
			redirect(base_url('t_cart'));
		}
	}
	public function t_product_update1()
	{
		// adding pro_price
		$pro_price = $this->input->post("pro_price");
		// end
		$customer_id = $this->session->userdata('customer_id');
		$cart_id = $this->input->post("cart_id_hidden");
		$pro_id = $this->input->post("pro_id_hidden");
		$design_ids = $this->input->post("design_id_hidden");
		$d_rate_total = $this->input->post("design_rate_hidden");
		$cust_desc = $this->input->post("cust_desc");
		$Length = $this->input->post("Length");
		$Shoulder = $this->input->post("Shoulder");
		$Waist_Length = $this->input->post("Waist_Length");
		$Hip_Length = $this->input->post("Hip_Length");
		$Sleeve_Length = $this->input->post("Sleeve_Length");
		$Chest_Round = $this->input->post("Chest_Round");
		$Waist_Round = $this->input->post("Waist_Round");
		$Hip_Round = $this->input->post("Hip_Round");
		$Bicep_Round = $this->input->post("Bicep_Round");
		$Elbow_Round = $this->input->post("Elbow_Round");
		$Wrist_Round = $this->input->post("Wrist_Round");
		$Collar = $this->input->post("Collar");
		$Armhole = $this->input->post("Armhole");
		$Bottom = $this->input->post("Bottom");
		$Bottom_Length = $this->input->post("Bottom_Length");
		$Knee_Length = $this->input->post("Knee_Length");
		$Bottom_Waist_Round = $this->input->post("Bottom_Waist_Round");
		$Bottom_Hip_Round = $this->input->post("Bottom_Hip_Round");
		$Thigh_Round = $this->input->post("Thigh_Round");
		$Knee_Round = $this->input->post("Knee_Round");
		$Calf_Round = $this->input->post("Calf_Round");
		$Bottom_Hern = $this->input->post("Bottom_Hern");
		$sizes = "Length=>".$Length."=>Shoulder=>".$Shoulder."=>Waist_Length=>".$Waist_Length."=>Hip_Length=>".$Hip_Length."=>Sleeve_Length=>".$Sleeve_Length."=>Chest_Round=>".$Chest_Round."=>Waist_Round=>".$Waist_Round."=>Hip_Round=>".$Hip_Round."=>Bicep_Round=>".$Bicep_Round."=>Elbow_Round=>".$Elbow_Round."=>Wrist_Round=>".$Wrist_Round."=>Collar=>".$Collar."=>Armhole=>".$Armhole."=>Bottom=>".$Bottom."=>Bottom_Length=>".$Bottom_Length."=>Knee_Length=>".$Knee_Length."=>Bottom_Waist_Round=>".$Bottom_Waist_Round."=>Bottom_Hip_Round=>".$Bottom_Hip_Round."=>Thigh_Round=>".$Thigh_Round."=>Knee_Round=>".$Knee_Round."=>Calf_Round=>".$Calf_Round."=>Bottom_Hern=>".$Bottom_Hern;
		$query = $this->db->get_where("tbl_cart",array('cart_id' => $cart_id));
     		$data['attachment_data'] = $query->result();
     		$own_design_img = empty($_FILES['own_design_img']['name']) ? '' : $_FILES['own_design_img']['name'];
     		if(!empty($own_design_img)) $own_design_img1 = file_upload_img($own_design_img, 'own_design_img'); else $own_design_img1 = empty($data['attachment_data']) ? '' : $data['attachment_data'][0]->own_design_img;

		$datavalues1 = array('customer_id' => $customer_id,'total_rate' => $d_rate_total,'pro_price' => $pro_price,'design_ids' => $design_ids,'pro_id' => $pro_id,'own_design_img' => $own_design_img1,'cust_desc' => $cust_desc,'sizes' => $sizes);
		$this->session->set_tempdata('success', 'Product Updated into the cart!', 5);
		$data = $this->crud_model->update('tbl_cart',$datavalues1,'cart_id',$cart_id);
		// echo $this->db->last_query();
		redirect(base_url('t_cart'));
	}
	public function t_order_placed()
	{
		$total_cost = $this->input->get("total");
		$data["payment"] = $total_cost;
		$this->load->view('website/payment', $data);
		// $customer_id = $this->session->userdata('customer_id');
		// $this->db->query("INSERT INTO tbl_orders(pro_id,design_ids,total_rate,customer_id,qty,own_design_img,cust_desc,sizes) SELECT pro_id,design_ids,total_rate,customer_id,qty,own_design_img,cust_desc,sizes FROM tbl_cart where tbl_cart.customer_id in($customer_id)");
		// $this->db->query("DELETE FROM `tbl_cart` where customer_id in($customer_id)");
		// redirect(base_url('t_orders'));
	}
	// creating function for handling payment
	public function payment(){
		$customer_id = $this->session->userdata('customer_id');
		$this->db->query("INSERT INTO tbl_orders(pro_id,design_ids,total_rate,customer_id,qty,pro_price,own_design_img,cust_desc,sizes) SELECT pro_id,design_ids,total_rate,customer_id,qty,pro_price,own_design_img,cust_desc,sizes FROM tbl_cart where tbl_cart.customer_id in($customer_id)");
		$this->db->query("DELETE FROM `tbl_cart` where customer_id in($customer_id)");

		// die("all of us are dead");
		redirect(base_url('t_home'));
		// header("location: https://google.com");
	}
	// end
	public function t_orders()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['fetch_data'] = $this->db->get_where('tbl_orders',array('customer_id' => $customer_id))->result();
		$this->load->view('website/t_orders',$data);
	}
	public function t_order_view()
	{
		$order_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$data['fetch_data'] = $this->db->get_where('tbl_orders',array('customer_id' => $customer_id,'order_id' => $order_id))->result();
		if(!empty($data['fetch_data']))
		{
			$this->load->view('website/t_order_view',$data);
		}
		else
		{
			redirect(base_url('t_orders'));
		}
		
	}
	public function t_order_view_admin()
	{
		$order_id = $this->uri->segment('2');
		$customer_id = $this->session->userdata('customer_id');
		$data['fetch_data'] = $this->db->get_where('tbl_orders',array('order_id' => $order_id))->result();
		if(!empty($data['fetch_data']))
		{
			$this->load->view('website/t_order_view',$data);
		}
		else
		{
			redirect(base_url('t_orders_admin'));
		}
		
	}
	public function t_order_approve()
	{
		$order_id = $this->uri->segment('2');
		//$customer_id = $this->session->userdata('customer_id');
		$this->db->query("update tbl_orders set order_status='COMPLETED' where order_id =".$order_id."");
		$this->session->set_tempdata('success', 'Order Approved !', 5);
			redirect(base_url('t_orders_admin'));
		
	}
	public function t_orders_admin()
	{
		$customer_id = $this->session->userdata('customer_id');
		$data['fetch_data'] = $this->db->get('tbl_orders')->result();
		$this->load->view('website/t_orders_admin',$data);
	}
}
