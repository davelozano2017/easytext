<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExecuteCreateAccount extends CI_Controller {

// Save user information from registration page
 function __construct() {
    parent::__construct();
    $this->load->library('phpmailer');
    $this->fullname  = 'required|trim|min_length[4]|max_length[50]|xss_clean';
    $this->contact   = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){10,}$/]|min_length[10]|max_length[10]';
    $this->securityc = 'required|trim|xss_clean|regex_match[/^(.*?[0-9]){6,}$/]|min_length[6]|max_length[6]';
    $this->email     = 'required|trim|is_unique[et_accounts_tbl.email]|valid_email|xss_clean';
    $this->emailv    = 'required|trim|valid_email|regex_match[/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/]|xss_clean';
    $this->eusername = 'required|trim|is_unique[et_accounts_tbl.username]|min_length[6]|max_length[30]|xss_clean';
    $this->username  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->password  = 'required|trim|min_length[6]|max_length[30]|xss_clean';
    $this->cpassword = 'required|trim|min_length[6]|max_length[30]|matches[password]|xss_clean';
}

public function createuser() {
    $validator = array('success' => false, 'messages'=> array());
    $this->validate('fullname','Fullname',$this->fullname);
    $this->validate('email','Email',$this->email);
    $this->validate('contact','contact',$this->contact);
    $this->validate('username','Username',$this->eusername);
    $this->validate('password','password',$this->password);
    $this->validate('cpassword','Confirm password',$this->cpassword);
    $this->form_validation->set_message('is_unique', '{field} already exist');
    $this->form_validation->set_error_delimiters('<label class="label label-danger">','</label>');
    if($this->form_validation->run() == TRUE) {

        $data = array(
            'fullname' 	    => $this->post('fullname'),
            'email'         => $this->post('email'),
            'contact' 	    => $this->post('contact'),
            'username' 	    => $this->post('username'),
            'password'      => password_hash($this->post('password'),PASSWORD_DEFAULT),
            'security_code' => rand(111111,999999),
            'status'      	=> 1,
            'role'          => 1,
            'date'          => date('F j, \ Y h:i A')
          );
    $send = $this->sendactivationemail($data);
   
    } else {
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
        $validator['success'] = false;
      }
    echo json_encode($validator);
    }
  }


public function sendactivationemail($data) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "skidmhorecomputerworld@gmail.com";  // user email address
        $mail->Password   = "computerworld";            // password in GMail
        $mail->Subject    = "Easytext - Activate your account";
        $mail->FromName   = "Administrator";
        $mail->Body       = '
        <!DOCTYPE html>
        <html>
          <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Simple Transactional Email</title>
            <style type="text/css">
            @media only screen and (max-width: 620px) {
              table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
              table[class=body] p,
              table[class=body] ul,
              table[class=body] ol,
              table[class=body] td,
              table[class=body] span,
              table[class=body] a {
                font-size: 16px !important; }
              table[class=body] .wrapper,
              table[class=body] .article {
                padding: 10px !important; }
              table[class=body] .content {
                padding: 0 !important; }
              table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
              table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
              table[class=body] .btn table {
                width: 100% !important; }
              table[class=body] .btn a {
                width: 100% !important; }
              table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }}
            /* -------------------------------------
                PRESERVE THESE STYLES IN THE HEAD
            ------------------------------------- */
            @media all {
              .ExternalClass {
                width: 100%; }
              .ExternalClass,
              .ExternalClass p,
              .ExternalClass span,
              .ExternalClass font,
              .ExternalClass td,
              .ExternalClass div {
                line-height: 100%; }
              .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }
              .btn-primary table td:hover {
                background-color: #34495e !important; }
              .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important; } }
            </style>
          </head>
          <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
            <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
              <tr>
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto !important;">
                  <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px;">
                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">This is preheader text. Some clients will show this text as a preview.</span>
                    <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
                      <!-- START MAIN CONTENT AREA -->
                      <tr>
                        <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                            <tr>
                              <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Hi '.$data['fullname'].',</p>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Congratulations, your account has been created and it requires to verify your account first before you can able to login. Please click the button below to verify your account.</p>
                                <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;box-sizing:border-box;width:100%;">
                                  <tbody>
                                    <tr>
                                      <td align="left" style="font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:15px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;width:auto;">
                                          <tbody>
                                            <tr>
                                              <td style="font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#3498db;"> <a href="http://localhost/easytext/activate/'.$data['security_code'].'" target="_blank" style="text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:0px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize;background-color:#3498db;border-color:#3498db;color:#ffffff;">Verify Now</a> </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">or copy and paste this URL to your internet browser:<br>
                                http://localhost/easytext/activate/'.$data['security_code'].'</p>

                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">This is an automated email from Easytext Website. Replies to this message will neither be read nor recieve a response</p>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Thank you and best regards.</p>

                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- START FOOTER -->
                    <div class="footer" style="clear:both;padding-top:10px;text-align:center;width:100%;">
                      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                        <tr>
                          <td class="content-block" style="font-family:sans-serif;font-size:14px;vertical-align:top;color:#999999;font-size:12px;text-align:center;">
                            <span class="apple-link" style="color:#999999;font-size:12px;text-align:center;">Easytext - Online free text to all network</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <!-- END FOOTER -->
                    <!-- END CENTERED WHITE CONTAINER -->
                  </div>
                </td>
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
              </tr>
            </table>
          </body>
        </html>';
        $mail->IsHTML(true);
        $mail->AddAddress($data['email'],$data['fullname']);
        if(!$mail->Send()) {
            echo json_encode(array('success' => false, 'message' => 'Opps! please check your internet connection.'));
        } else {
            $result = $this->model->CreateUser($data);
              if($result) { 
            echo json_encode(array('success' => true, 'message' => 'An email has been sent to '.$data['email']));
            };
        }
}


public function sendemail() {
     $fullname = $this->session->userdata('fullname');
     $email = $this->session->userdata('email');
     $securitycode = $this->session->userdata('securitycode');
     $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "skidmhorecomputerworld@gmail.com";  // user email address
        $mail->Password   = "computerworld";            // password in GMail
        $mail->Subject    = "Easytext - Requesting for security code";
        $mail->FromName   = "Administrator";
        $mail->Body       = '
        <!DOCTYPE html>
        <html>
          <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Simple Transactional Email</title>
            <style type="text/css">
            @media only screen and (max-width: 620px) {
              table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
              table[class=body] p,
              table[class=body] ul,
              table[class=body] ol,
              table[class=body] td,
              table[class=body] span,
              table[class=body] a {
                font-size: 16px !important; }
              table[class=body] .wrapper,
              table[class=body] .article {
                padding: 10px !important; }
              table[class=body] .content {
                padding: 0 !important; }
              table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
              table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
              table[class=body] .btn table {
                width: 100% !important; }
              table[class=body] .btn a {
                width: 100% !important; }
              table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }}
            /* -------------------------------------
                PRESERVE THESE STYLES IN THE HEAD
            ------------------------------------- */
            @media all {
              .ExternalClass {
                width: 100%; }
              .ExternalClass,
              .ExternalClass p,
              .ExternalClass span,
              .ExternalClass font,
              .ExternalClass td,
              .ExternalClass div {
                line-height: 100%; }
              .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }
              .btn-primary table td:hover {
                background-color: #34495e !important; }
              .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important; } }
            </style>
          </head>
          <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
            <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
              <tr>
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto !important;">
                  <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px;">
                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">This is preheader text. Some clients will show this text as a preview.</span>
                    <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
                      <!-- START MAIN CONTENT AREA -->
                      <tr>
                        <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                            <tr>
                              <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Hi '.$fullname.',</p>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">We heared that you have lost your password. If you want to request for a new password then just click the button below and insert this security code: '.$securitycode.'</p>
                                <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;box-sizing:border-box;width:100%;">
                                  <tbody>
                                    <tr>
                                      <td align="left" style="font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:15px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;width:auto;">
                                          <tbody>
                                            <tr>
                                              <td style="font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#3498db;"> <a href="http://localhost/easytext/email-security-code" target="_blank" style="text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:0px;box-sizing:border-box;color:#3498db;cursor:pointer;display:inline-block;font-size:14px;font-weight:bold;margin:0;padding:12px 25px;text-decoration:none;text-transform:capitalize;background-color:#3498db;border-color:#3498db;color:#ffffff;">Verify Now</a> </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">If you didn\'t request a new password then just ignore this system generated email but we assure you that your account is still safe.</p>
                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:15px;">Good luck! Hope it helps.</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- START FOOTER -->
                    <div class="footer" style="clear:both;padding-top:10px;text-align:center;width:100%;">
                      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                        <tr>
                          <td class="content-block" style="font-family:sans-serif;font-size:14px;vertical-align:top;color:#999999;font-size:12px;text-align:center;">
                            <span class="apple-link" style="color:#999999;font-size:12px;text-align:center;">Easytext - Online free text to all network</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <!-- END FOOTER -->
                    <!-- END CENTERED WHITE CONTAINER -->
                  </div>
                </td>
                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
              </tr>
            </table>
          </body>
        </html>';
        $mail->IsHTML(true);
        $mail->AddAddress($email,$fullname);
        if(!$mail->Send()) {
            echo json_encode(array('success' => false, 'message' => 'Opps! please check your internet connection.'));
        } else {
            echo json_encode(array('success' => true, 'message' => 'An email has been sent to '.$email));
        }
}


// costum method for $this->input->post();
public function post($value) {
  return $this->input->post($value);
}

// costum method for $this->form_validation->set_rules();
public function validate($param1,$param2,$param3) {
  return $this->form_validation->set_rules($param1,$param2,$param3);
}

}
