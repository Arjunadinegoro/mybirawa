<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class M_api_login extends CI_Model {

	public 	function __construct() {
			parent::__construct ();
	}

	/**
	 * Otentikasi user yang login

	 * @param 	string $username username user
	 * @param 	string $password password user
	 * @return 	array 
	 */
	function get_login($username, $password) {

		$return = array(
				'id'=> null,
				'username'=> null,
				'password'=> null,
			);

			$sql = 'SELECT a.*, b.nama_unit, c.role_name, d.name FROM t_user a
				INNER JOIN t_unit b ON a.unit_id = b.unit_id
				INNER JOIN t_role c ON a.role_id = c.role_id
				INNER JOIN t_area d ON b.area_id = d.id
                WHERE a.user_name = \''.$username.'\' AND a.password = \''.md5($password).'\' AND status = 1';
                
            $query = $this->db->query($sql);
		    $result = $query->result_array();
		//var_dump($result);

		//log_message('info', 'hasil: ' . $result, TRUE);

		// jika user ditemukan,
		if ( ! empty($result) ) {

			$return['id'] = $result[0]['user_id'];
				$return['username'] = $result[0]['username'];
				$return['password'] = $result[0]['password'];
				$return['success'] = 1;

			$query = $this->db->query('UPDATE t_user SET last_login=now() WHERE user_id='.$result[0]['user_id'].'');
			$query2 = $this->db->query('UPDATE t_user SET  gadget_id=\''.$device_id.'\' WHERE user_id='.$result[0]['user_id'].'');
			$query3 = $this->db->query('UPDATE t_user SET  firebase_id=\''.$version_apk.'\' WHERE user_id='.$result[0]['user_id'].'');
			$namafile = $this->create_qrcode($result[0]['user_id']);
			$query4 = $this->db->query('UPDATE t_user SET qrcode=\''.$namafile.'\' WHERE user_id='.$result[0]['user_id'].'');
		} else {	// jika user tidak ditemukan, tulis pesan
			$return['login'] =  "Failed => Authentication Failed";
		};

		return $return;
	}

	/**
	 * cek session user apakah sesuai dengan passcode (api key)
	 *
	 * @param string $user_id User ID
	 * @param string $passcode Passcode/api key yang dikirim dari mobile app, yang digenerate ketika user login
	 */
	function cek_session($user_id, $passcode) {
		$sql = 'SELECT COUNT("ID") as found FROM "USER" WHERE "ID" = ? AND "PASSCODE" = ? ';
		$r = $this->db->query($sql, array($user_id, $passcode))->row_array();

		if ($r['found'] > 0) {
			$return = true;
		} else {
			$return = false;
		}
		return $return;
	}

	public function create_qrcode($user) {
		    //set it to writable location, a place for temp generated PNG files
		    // $PNG_TEMP_DIR = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
		    $PNG_TEMP_DIR = $_SERVER['DOCUMENT_ROOT'].'/temp/';

		    //html PNG location prefix
		    $PNG_WEB_DIR = 'temp/';

		    include $_SERVER['DOCUMENT_ROOT'].'/phpqrcode/qrlib.php';

		    //ofcourse we need rights to create temp dir
		    if (!file_exists($PNG_TEMP_DIR))
		        mkdir($PNG_TEMP_DIR);

		    $filename = $PNG_TEMP_DIR.'test.png';

		    $errorCorrectionLevel = 'L';
		    $matrixPointSize = 7;

		    if (isset($user)) {

		        //it's very important!
		        if (trim($user) == '')
		            die('data cannot be empty! <a href="?">back</a>');
		        $user = site_url('presensi?id='.$user);
		        // user data
		        $namafile = 'rapim'.md5($user.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
		        $filename = $PNG_TEMP_DIR.$namafile;
		        QRcode::png($user, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		        // $query = $this->db->query('UPDATE t_user SET  qrcode=\''.$namafile.'\' WHERE user_id='.$result[0]['user_id'].'');

		    } else {

		        //default data
		        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
		        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

		    }

		    return $namafile;
	}
}

// END Model Class

/* End of file login_model.php */
/* Location: ./application/modules/rest/login_model.php */
