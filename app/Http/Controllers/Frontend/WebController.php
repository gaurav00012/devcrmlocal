<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientForm;
use App\Traits\StoreImageTrait;
use App\Traits\Email;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class WebController extends Controller
{
    use StoreImageTrait;
    use Email;

    private $adminEmail = 'diwakarmishra1.0@gmail.com';
    // private $adminEmail = 'aggarwal.gaurav611@gmail.com';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('frontend.web.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
           // dd($request->post());
             $this->validate($request,[
                'company_name' => 'required',
                'contact_person' => 'required',
                'email' => 'required|email',
               // 'company_logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
                // 'mailing_address' => 'required',
                // 'business' => 'required',
                // 'access' => 'required',
                // 'hosting' => 'required',
             ]);
           

             $post = $request->post();

             $form['company_name'] = $post['company_name'];
             $form['contact_person'] = $post['contact_person'];
             $form['email'] = $post['email'];
             $form['mailing_address'] = $post['mailing_address'];
             $form['about_business'] = $post['business'];
             $form['domain_name'] = $post['access'];
             $form['hosting_access'] = $post['hosting'];
             $form['hosting_email'] = $post['youremails'];
             $form['content'] = $post['content'];
             $form['copy'] = $post['copy'];
             $form['primary_goal'] = $post['primary'];
             $form['target_geographic'] = $post['geographic'];
             $form['target_audience'] = $post['audience'];
             $form['describe_word_1'] = isset($post['q3']) ? $post['q3'] : '';
             $form['describe_word_2'] = isset($post['q4']) ? $post['q4'] : '';
             $form['describe_word_3'] = isset($post['q5']) ? $post['q5'] : '';
             $form['company_colors'] = $post['colours'];
             $form['navigation'] = $post['navigation'];
             $form['competitors'] = $post['competitors'];
             $form['reference'] = $post['reference'];
             $form['additional_notes'] = $post['additional'];
             $form['ip'] = $request->ip();

             if($request->hasFile('company_logo'))
            {
                $image = $request->file('company_logo');
                $logoName = 'company_logo_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = 'company_logo/';
                $image->move($destinationPath, $logoName);
                $form['company_logo'] = $logoName;
             }

          //  return view('frontend.web.registermail',['form'=>$form]);
               
             if(ClientForm::create($form))
             {
                 $name = 'Gaurav';
                 $subject = 'New Registertration - '.$form['company_name'];
                 $body = view('frontend.web.registermail',['form'=>$form]);;
                 $this->sendMail($this->adminEmail,$name,$subject,$body);
                return redirect()->back()->with('success', 'Your data has been submitted. Team will reach out you soon.');      
             }
         }
         catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testZoho()
    {
         $mail = new PHPMailer(true);

          try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            //$mail->Mailer = "smtp";
            $mail->SMTPDebug = 1;
            $mail->Host       = 'smtp.zoho.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

            $mail->Username   = 'actfirst@proxcel.in';                     // SMTP username
            $mail->Password   = 'Act@2021';                               // SMTP password
           // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
           // $mail->ssl = true;
           // $mail->SMTPSecure = 'tsl';

            //Recipients
            $actFirst = "ACTfirst";
            $mail->setFrom('actfirst@proxcel.in', $actFirst);
            $mail->addAddress('gaurav.aggarwal@proxcel.in', 'Gaurav');     // Add a recipient
            //$mail->addAddress('aggarwal.gaurav611@gmail.com', 'Gaurav');     // Add a recipient
           // $mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            if(!empty($cc))
                foreach($cc as $ccemail)$mail->addCC($ccemail);
             
            
              //$mail->addBCC('aggarwal.gaurav611@gmail.com');
            

            // Attachments
          //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'test zoho seven subject';
            $mail->Body    = 'This is seven  html';
           // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //return true;
        } 
        catch (Exception $e) 
        {
          dd($e);
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
