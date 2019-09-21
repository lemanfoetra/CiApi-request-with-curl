<?php 

class Curl extends CI_Controller{

	public function index(){
		echo "berfungsi";
	}

	public function curl_post()
	{
		$url = "http://localhost/restapi/index.php/person/add";
		$data = array(
			'name' =>	"Aspi Almuzaki",
			'address'	=> "Citambur",
			'phone'		=> "085793647568"
		);

		$ch = curl_init($url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_FAILONERROR, true);                                                                    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: multipart/form-data')    // fokus                                                               
		);                                                                                                                   
		 
		$result = curl_exec($ch);
		print_r(json_decode($result));
	}



	public function curl_get()
	{
		$url = "http://localhost/restapi/index.php/person/get";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		print_r(json_decode($result));

	}


	public function curl_put()
	{
		$url = "http://localhost/restapi/index.php/person/update";
		$data = array(
			'id'	=> 8,
			'name'	=> 'Ardyn Sulaeman',
			'address'	=> 'Panaruban',
			'phone'		=> '085793647568'
		);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));  // fokus
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'api-key: your-key')                                                                       
		);  
		$result = curl_exec($ch);
		print_r(json_decode($result));

	}


	public function curl_delete()
	{
		$url = "http://localhost/restapi/index.php/person/delete";
		$data = array(
			'id'	=> 7
		);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // fokus
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'api-key: your-key')                                                                       
		);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$result = curl_exec($ch);
		print_r(json_decode($result));


	}

	
}



 ?>