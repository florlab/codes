<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isMobile(){
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)
            ||preg_match('/iP(od|hone|ad)/i',$useragent)
            ||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            return true;
        }
        return false;
    }

    public function uploadFile(Request $request){

        $this->validate($request, [
            'file' => 'required|max:1000|mimes:png,doc,docx,xls,xlsx,ppt,pptx,pdf',
        ],[
            'mimes' => 'Invalid File Format',
            'max' => 'File size must not be greater than 1MB',
        ]);

        if($request->file('file')->isValid()){

            try {
                $path = public_path(). '/uploads/';
                $path = str_replace("\\","/",$path);
                $extension = $request->file('file')->getClientOriginalExtension();
                $new_filename = strtotime(date('Y-m-d H:i:s')).'.' .$extension;
                $request->file('file')->move($path,$new_filename);

            } catch (\Exception $ex) {

                $path = public_path() . '\\uploads\\';
                $extension = Input::file('file')->getClientOriginalExtension();
                $new_filename = strtotime(date('Y-m-d H:i:s')).'.' .$extension;
                $request->file('file')->move($path,$new_filename);

            }

        }
    }

    public static function aesEncrypt($data,$userid) {
        error_reporting(0);
        $getEncryptKey = 'qwe';

        $getUserIV =$userid;
        $encryption_key = $getEncryptKey->setting_fieldvalue;
        $iv = $getUserIV->user_key;
        $aesEncrypted = openssl_encrypt($data, AES_128_CBC, $encryption_key, 0, $iv);
        return $aesEncrypted;
    }

    public static function aesDecrypt($data,$userid) {
        error_reporting(0);
        $getEncryptKey = 'qwe';
        $getUserIV =$userid;

        $encryption_key = $getEncryptKey->setting_fieldvalue;
        $iv = $getUserIV->user_key;
        $aesDecrypted = openssl_decrypt($data, AES_128_CBC, $encryption_key, 0, $iv);
        return $aesDecrypted;
    }

    function sampleCurl($token,$data,$id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://link",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "app_secret=".urlencode($data->app_secret)."&id=".$id,
            CURLOPT_HTTPHEADER => array(
                "authorization: " . $token,
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: 775f9ee2-f0af-f2f1-afa3-7383b7e80710"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    public static function call_api($url , $action)
    {
        $header[] = "Accept: application/json";
        $header[] = "Accept-Encoding: gzip";

        $ch = curl_init();

        $curl_config = array( CURLOPT_HTTPHEADER => $header,
            CURLOPT_ENCODING => "gzip",
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $action,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT => 180,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_RETURNTRANSFER => true);
        curl_setopt_array($ch, $curl_config);

        $curl_result = curl_exec($ch);
        curl_close($ch);
        return json_decode( $curl_result );
    }

    //$url_params = 'https://www.expedia.com:443/m/api/lx/trip/create';
    /**
     * Handles the creation of trip and checkout of Activity Only
     * @trip_url Swagger API url of trip creation
     * @trip_params Swagger API parameter of trip creation
     * @checkout_url Swagger API checkout URL
     * @user_details Information needed to checkout the trip
     */
    public static function get_auth_response($url_params, $params, $method){


        $username = get_option("r8_expedia_username");
        //The password of the account.
        $password = get_option("r8_expedia_password");

        //Set a user agent. This basically tells the server that we are using Chrome ;)
        $user_agent = 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36';

        //Where our cookie information will be stored (needed for authentication).
        $cookie_file = 'cookie.txt';

        //URL of the login form.
        $url = 'https://www.expedia.com.au/api/user/sign-in';

        //Login action URL. Sometimes, this is the same URL as the login form.
        $url_action = 'https://www.expedia.com.au/api/user/sign-in';

        //An associative array that represents the required form fields.
        //You will need to change the keys / index names to match the name of the form
        //fields.
        $postValues = array(
            'email' => $username,
            'password' => $password,
            'staySignedIn' => true
        );
        //Initiate cURL.

        $curl = curl_init();

        //Set the URL that we want to send our POST request to. In this
        //case, it's the action URL of the login form.
        curl_setopt($curl, CURLOPT_URL, $url_action);

        //Tell cURL that we want to carry out a POST request.
        curl_setopt($curl, CURLOPT_POST, true);

        //Set our post fields / date (from the array above).
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

        //We don't want any HTTPS errors.
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //Where our cookie details are saved. This is typically required
        //for authentication, as the session ID is usually saved in the cookie file.
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file);

        //Sets the user agent. Some websites will attempt to block bot user agents.
        //Hence the reason I gave it a Chrome user agent.
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);

        //Tells cURL to return the output once the request has been executed.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //Allows us to set the referer header. In this particular case, we are
        //fooling the server into thinking that we were referred by the login form.
        curl_setopt($curl, CURLOPT_REFERER, $url);

        //Do we want to follow any redirects?
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        //Execute the login request.
        $result = curl_exec($curl);
        //var_dump("SIGN IN: ".$result);

        //Check for errors!
        if (curl_errno($curl)) {
            throw new Exception(curl_error($curl));
        }
        /**POST METHOD
         */
        switch ($method){
            case "POST":
                curl_setopt_array($curl, array(
                    CURLOPT_URL =>      $url_params,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLINFO_HEADER_OUT => true,
                    CURLOPT_COOKIEJAR => $cookie_file,
                    CURLOPT_USERAGENT => $user_agent,
                    CURLOPT_HTTPHEADER => array(
                        'Content-type: application/x-www-form-urlencoded'
                    ),
                    CURLOPT_POST => TRUE,
                    CURLOPT_POSTFIELDS => $params
                ));
                break;
            case "GET":
                curl_setopt($curl, CURLOPT_URL, $url_params);
                curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file);
                curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
                //We don't want any HTTPS / SSL errors.
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLINFO_HEADER_OUT, true);
                curl_setopt($curl, CURLOPT_POST, 0);
                break;

            case "JSON":
                curl_setopt_array($curl, array(
                    CURLOPT_URL =>      $url_params,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLINFO_HEADER_OUT => true,
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                    CURLOPT_POST => TRUE,
                    CURLOPT_POSTFIELDS => $params
                ));
                break;
        }

        $response = curl_exec($curl);

        if($response === FALSE){
            die(curl_error($curl));
        }
//            curl_close($curl);
        $headers =  curl_getinfo($curl, CURLINFO_HEADER_OUT );
        return $response;
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,})/',
            'password_confirmation' => 'required|same:password',
        ],[
            'old_password' => 'The old password did not match.',
            'regex' => 'Must include a combination on alphanumeric and special characters.',
            'same' => 'The password did not match.',
            'required' => 'This field is required'
        ]);

        $user = User::find(Input::get('user_id_settings'));
        $bcryptPassword = bcrypt($request->password);
        $user->password = $bcryptPassword;
        $user->password = $bcryptPassword;
        $user->save();

        return array(
            'status' => 'success',
            'module' => 'Password',
        );
    }

    public function transLogger($Module, $Description)
    {

        if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
        }

        $ip = filter_var($ip, FILTER_VALIDATE_IP);
        $ip = ($ip === false) ? '0.0.0.0' : $ip;
    }

    public function sendEmail(){
        try {
            $emailData = Input::get("emailData");
            Mail::send($emailData['emailFile'], $emailData, function($message) use ($emailData){
                $message->from($emailData['emailFrom'], 'emailFromTest');
                $message->to($emailData['email'])->subject($emailData['emailSubjectTest']);

                if (array_key_exists('emailSendCopy', $emailData)) {
                    if ($emailData['emailSendCopy'] != '') {
                        $message->cc($emailData['emailSendCopy'], $emailData['emailSendCopy']);
                    }
                }
            });
        } catch(Exception $ex) {

        }
    }

    public function sendEmailWithAttachment(){
        try {
            $emailData = Input::get("emailData");

            Mail::send($emailData['emailFile'], $emailData, function($message) use ($emailData){
                $message->from($emailData['emailFrom'], 'emailFromTest');
                $message->to($emailData['email'])->attach($emailData['attachment'])->subject($emailData['emailSubjectTest']);
            });
        } catch(Exception $ex) {

        }
    }

}
