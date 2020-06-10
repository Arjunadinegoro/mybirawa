<?php

class M_api extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
  }

public function login(){
     
    //proses api   
     $username = $this->input->POST('username');
     $password = $this->input->POST('password');

        if (strlen($password)>=5) {
            //deskripsi
        $value = array( 
        "application_id"=>"1",
        "username"=>$username, 
        "password"=>$password,
        "platform"=>"1",
        "device_id"=>"123456789",
        "device_token"=>"asdfghjkrtyuio");
        $json = json_encode($value); 

        //proses api    
      $curl = curl_init();
    
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/auth/login",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$json,
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Content-Type: application/json"
       ),
      ));
     //respon api
     $response = curl_exec($curl);
    
      //var_dump($response);die;
      $err = curl_error($curl);
    
      curl_close($curl);
    
        if ($err) {
            echo "cURL Error #:" . $err;
         } else {
            $jsonTes = json_decode($response);
           //var_dump($jsonTes[0]->status);die;
            //kondisi cek data
             if($jsonTes[0]->status)  {
            //Mengmabil data tertentu
              $data_session = array(
        
                'access_token' => $jsonTes[0]->access_token,
                    );
                $this->session->set_userdata($data_session);
                //var_dump($jsonTes->access_token);die;
                redirect("admin/user");

                //echo "bener";
                //var_dump($jsonTes);
             } else {
                $this->session->set_flashdata('message','Password Salah!');
                redirect("auth");
            }
        }
    } else {
        $this->session->set_flashdata('message','Password Harus Lebih Dari 5!');
        // echo "Password Salah!";
        redirect("auth");
    }
}

public function listuser() {

    
    $this->session->userdata('access_token');
    $token = $this->session->userdata('access_token');
    
    $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/user",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $token"
        ),
        ));

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response);
//var_dump($data);die;
return $data;
    }

    // public function deleteUser($username)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('username', ['username' => $username]);
    // }

    public function adduser(){
     
        //proses api   
         $email = $this->input->POST('email');
		 $phone_number = $this->input->POST('phone_number');
		 $name = $this->input->POST('name');
		 $unit_id = $this->input->POST('unit_id');
	     $subunit_id = $this->input->POST('subunit_id');
		 $city = $this->input->POST('city');
		 $address = $this->input->POST('address');
		 $password = $this->input->POST('password');
		
                //deskripsi
            $value = array( 
            "email"=>$email,
            "phone_number"=>$phone_number, 
            "name"=>$name,
            "unit_id"=>"1",
            "subunit_id"=>"1",
            "city"=>"12321312",
            "address"=>$address,
            "password"=>$password,
        );
            $json = json_encode($value); 
            //var_dump($json);die;
            //proses api    
          $curl = curl_init();
        
          curl_setopt_array($curl, array(
          CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/auth/register",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>$json,
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json"
           ),
          ));
         //respon api
         $response = curl_exec($curl);
        //var_dump($response);die;
          //var_dump($response);die;
          $err = curl_error($curl);
        
          curl_close($curl);
            redirect("admin/user");
        }

        public function city() {

    
            $this->session->userdata('access_token');
            $token = $this->session->userdata('access_token');
            // var_dump($token);die;
            $curl = curl_init();
            
                curl_setopt_array($curl, array(
                CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/unitdata?object_type[]=city",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token"
                ),
                ));
        
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response);
            return $data;
                }
            
        public function gedung() {

    
                $this->session->userdata('access_token');
                $token = $this->session->userdata('access_token');
                    // var_dump($token);die;
                $curl = curl_init();
                    
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/unitdata?object_type[]=gedung",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: Bearer $token"
                        ),
                        ));
                
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $data = json_decode($response);
                    return $data;
                     }

        public function fmbm() {

    
                $this->session->userdata('access_token');
                $token = $this->session->userdata('access_token');
                                // var_dump($token);die;
                $curl = curl_init();
                                
                                    curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://dev-api-birawa.digitalevent.id/api/unitdata?object_type[]=fmbm",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                        "Authorization: Bearer $token"
                                    ),
                                    ));
                            
                                $response = curl_exec($curl);
                                curl_close($curl);
                                $data = json_decode($response);
                                return $data;
                                    }          

    public function getDataPaginationTesPagination($limit, $offset)
{
     $this->db->select('*');
     $this->db->from('user');
     $this->db->order_by('created_date', 'ASC');
     $this->db->limit($limit, $offset);
     return $this->db->get();
}
public function getAllUser()
{
     $this->db->select('*');
     $this->db->from('user');
     $this->db->order_by('created_date', 'ASC');

     return $this->db->get();
}
    }
