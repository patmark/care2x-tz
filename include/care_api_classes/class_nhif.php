<?php

$root_path = '../../';
include_once($root_path . 'include/inc_environment_global.php');
include_once($root_path . 'include/care_api_classes/class_core.php');
//include_once($root_path . 'include/inc_init_main.php');

/**
 *  NHIF integration methods.
 *  Note this class should be instantiated only after a "$db" adodb
  connector object  has been established by an adodb instance
 * @author 
 * @version beta 3.5
 * @copyright 2002,2003,2004,2005,2005 Elpidio Latorilla 2011-2018 LUICo
 * @package care_api
 * 
 * This class must be instantiated by passing URL to a constructor
 */
class Nhif extends Core {
    /*
     * Variable $url to holf the nhif base url
     */

    var $url = '';
    var $token_url = '';
    var $service_url = '';

    /*
     * variable $nhif_username holds username for 
     * nhif authentication
     */
    var $nhif_username = '';

    /*
     * Variable nhif_pass holds password for authentication
     * 
     */
    var $nhif_pass = '';

    /**
     * Constructor
     * @param url
     */
    function Nhif($token_url = '', $service_url = '', $nhif_username = '', $nhif_pass = '') {
        if (!empty($token_url)) {
            $this->token_url = $token_url;
        }
        if (!empty($service_url)) {
            $this->service_url = $service_url;
        }

        if (!empty($nhif_username)) {
            $this->nhif_username = $nhif_username;
        }

        if (!empty($nhif_pass)) {
            $this->nhif_pass = $nhif_pass;
        }

        //Check if facility code isset in session
//        if (!isset($_SESSION['facility_code']) || $_SESSION['facility_code'] = '') {
//            $_SESSION['facility_code'] = $this->getConfigValue($type = 'main_info_facility_code');
//        }
    }

    /*
     * The nhif_login function makes a http post request to
     * NHIF server with credentials, username and password
     * if the request is successful, an access token is provided that
     * will be used in the subsequent requests to NHIF web services
     */

    function nhif_login($source = '') {

//        $curl = curl_init($this->token_url);
        $curl_post_data = 'grant_type=password' .
                "&username=$this->nhif_username" .
                "&password=$this->nhif_pass";
        
         // Construct the body for the STS request
        $authenticationRequestBody = 'grant_type=password&username='.$username.'&password='.$password;
        
        //Using curl to post the information to STS and get back the authentication response    
        $curl = curl_init();
        // set url 
     
        curl_setopt($curl, CURLOPT_URL, $this->token_url); 
        // Get the response back as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
        // Mark as Post request
        curl_setopt($curl, CURLOPT_POST, 1);
        // Set the parameters for the request
        curl_setopt($curl, CURLOPT_POSTFIELDS,  $curl_post_data);
        
        // By default, HTTPS does not work with curl.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // read the output from the post request
        $output = curl_exec($curl);  
           
        // decode the response from sts using json decoder
        $decoded = json_decode($output);
         $status = curl_getinfo($curl);
        // close curl resource to free up system resources
        curl_close($curl); 
        
        if ($status['http_code'] === 200) {
            //Update session variable $_SESSION['nhif_access_token']
            $header_data = 'Authorization:' . $decoded->token_type . ' ' . $decoded->access_token;
            if (isset($source) && $source == 'claims') {
                $_SESSION['nhif_claims_token'] = $header_data;
            } else {
                $_SESSION['nhif_access_token'] = $header_data;
            }
            return array('success' => TRUE, 'token' => $header_data);
        }
        if ($status['http_code'] === 400) {
            //Login failed
            if (isset($decoded->error) && $decoded->error == 'invalid_grant') {
//            die('error occured: ' . $decoded->error_description);
                return array('success' => FALSE, 'error' => $decoded->error_description);
            }
        } else if ($status['http_code'] === 0 || curl_errno($curl) === 7) {
            //Cant reach server
            return array('success' => FALSE, 'error' => "Can't reach server. Please check your network connection!");
        } else {
            return array('success' => FALSE, 'error' => "Please check your network connection or contact administrator!");
        }
    }

    /*
     * Function check_token()
     * checks the session variable $_SESSION['nhif_access_token']
     * if contains token, if not, calls the login function to get
     * access token and return true, if fails returns false
     */

    function check_token() {
        if (!isset($_SESSION['nhif_access_token']) || $_SESSION['nhif_access_token'] == '') {
            $logindata = $this->nhif_login();
            if ($logindata['success']) {
//                $new_token = $logindata['token'];
                $_SESSION['nhif_access_token'] = $logindata['token'];
//                return $logindata['token'];
                return TRUE;
            } else {
//                print_r($logindata);
//                echo 'no token-----------------------' . $this->nhif_username;
                return false;
            }
        } else {
            return TRUE;
        }
    }

    function check_claims_token() {
        $_SESSION['nhif_claims_token']='';
        if (!isset($_SESSION['nhif_claims_token']) || $_SESSION['nhif_claims_token'] == '') {
            $logindata = $this->nhif_login('claims');
            if ($logindata['success']) {
                
//                echo $logindata['token'];
//                $new_token = $logindata['token'];
                $_SESSION['nhif_claims_token'] = $logindata['token'];
//                return $logindata['token'];
                return TRUE;
            } else {
//                print_r($logindata);
//                echo 'no token-----------------------' . $this->nhif_username;
                return false;
            }
        } else {
            return TRUE;
        }
    }

    function authorize_card($card_no = '', $VisitTypeID = 1, $ReferralNo = '') {
        $token = '';
        if ($this->check_token()) {
            $token = $_SESSION['nhif_access_token'];
        }
//        echo $token;
//        $facility_code = '';
//        //Check if facility code isset
//        if (!isset($_SESSION['facility_code'])) {
//            $facility_code = $this->getConfigValue($type = 'main_info_facility_code');
//        } else {
//            $facility_code = $_SESSION['facility_code'];
//        }
        //Check if session login id is present
        $username = '';
        if (!isset($_SESSION['sess_login_userid']) || $_SESSION['sess_login_userid'] == '') {
            return FALSE;
        } else {
            $username = $_SESSION['sess_login_userid'];
        }

        $curl = curl_init($this->service_url . "verification/AuthorizeCard?CardNo=$card_no&VisitTypeID='.$VisitTypeID.'ReferralNo='.$ReferralNo");

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            $token,
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8')
        );

        $curl_response = curl_exec($curl);

        $status = curl_getinfo($curl);
        curl_close($curl);


        if ($status['http_code'] === 200) {
            $decoded = json_decode($curl_response);
            return $decoded;
        } else if ($status['http_code'] === 401) { //Access denied, may be invalid token
            //Call login again to get the code then call authorization again, once with a new token
            if ($this->nhif_login()['success']) {
                $new_token = $this->nhif_login()['token'];
                //Update session variable $_SESSION['nhif_access_token']
                $_SESSION['nhif_access_token'] = $new_token;
                return $this->authorize_card($card_no);
            } else {
//                return $this->nhif_login()['error'];
                return FALSE;
            }
//            $this->authorize_card($card_no);
        } else if ($status['http_code'] === 404) { //Card Not found
            return FALSE;
        } else {
            return FALSE;
        }
    }

    /*
     * A function nhif_prices() returns the price package for the
     * facility
     */

    function nhif_prices() {
        $token = '';
        if ($this->check_token()) {
            $token = $_SESSION['nhif_access_token'];
        }
        $facility_code = '';
        //Check if facility code isset
        if (!isset($_SESSION['facility_code']) || $_SESSION['facility_code'] == '') {
            $facility_code = $this->getConfigValue($type = 'main_info_facility_code');
        } else {
            $facility_code = $_SESSION['facility_code'];
        }

        //Initialize curl
//        $curl = curl_init($this->url . "/breeze/Packages/GetPricePackage?FacilityCode=$facility_code");
        $curl = curl_init("http://verification.nhif.or.tz/apiserver/api/v1/Packages/GetPricePackage?FacilityCode=$facility_code");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            $token)
        );

        $curl_response = curl_exec($curl);
        print_r($curl_response);

        $decoded = json_decode($curl_response);
//        print_r($decoded);
        $status = curl_getinfo($curl);
        curl_close($curl);
//        print_r($status);
        echo '<br>';
        echo '<br>';

        if ($status['http_code'] === 401) { //Access denied, may be invalid token
            //Call login again to get the code then call authorization again, once with a new token
            if ($this->nhif_login()['success']) {
                $new_token = $this->nhif_login()['token'];
                //Update session variable $_SESSION['nhif_access_token']
                $_SESSION['nhif_access_token'] = $new_token;
            } else {
                return $this->nhif_login()['error'];
//                return FALSE;
            }
//      echo 'New access token: ' . $new_token;
            $this->nhif_prices();
        } else if ($status['http_code'] === 404) { //Card Not found
            return $decoded;
            return FALSE;
        } else {
            if ($status['http_code'] === 200) {
                return $decoded;
            } else {
//                return $decoded;
                return FALSE;
            }
        }
    }

    /*
     * A function to get card verification details after authorization
     * function nhif_verification_details($cardno=''){}
     * The function takes card number as a parameter
     */

    function nhifVerificationDetails($card_no = '') {

        $token = '';
        if ($this->check_token()) {
            $token = $_SESSION['nhif_access_token'];
        }
//        echo $token.' -------Tokennnn';
        //Initialize curl
        $curl = curl_init($this->service_url . "verification/GetVerificationDetails?CardNo=$card_no");

//        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, FALSE);

//        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//            "Authorization: Bearer " . $token,
//            "Content-Length: 0")
//        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            $token,
            "Content-Type: application/json")
        );

        $curl_response = curl_exec($curl);

        $decoded = json_decode($curl_response);

        $status = curl_getinfo($curl);
        curl_close($curl);
        print_r($status);
        echo '<br>';
        echo '<br>';

        if ($status['http_code'] === 401) { //Access denied, may be invalid token
            var_dump($decoded);
            echo '<br>';
            echo '<br>';
            //Call login again to get the code then call authorization again, once with a new token
            if ($this->nhif_login()['success']) {
                $new_token = $this->nhif_login()['token'];
                //Update session variable $_SESSION['nhif_access_token']
                $_SESSION['nhif_access_token'] = $new_token;
            } else {
                return $this->nhif_login()['error'];
//                return FALSE;
            }
            $this->nhifVerificationDetails($card_no);
        } else if ($status['http_code'] === 404) { //Card Not found
            return $decoded;
//            return FALSE;
        } else {
            if ($status['http_code'] === 200) {
                return $decoded;
            } else {
                return $decoded;
//                return FALSE;
            }
        }
    }

    function nhif_logout() {

        $token = '';
        if (check_token()) {
            $token = $_SESSION['nhif_access_token'];
            $curl = curl_init($this->url . '/api/Account/Logout');

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer " . $token,
                "Content-Length: 0")
            );
            $status = curl_getinfo($curl);
            curl_close($curl);

            if ($status['http_code'] === 200) {
                return TRUE;
            } else {
                return false;
            }
        } else {
            return TRUE;
        }
    }

}

?>