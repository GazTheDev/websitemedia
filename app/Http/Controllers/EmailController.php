<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid;

class EmailController extends Controller
{

    public function emailView() {
        return view('send-email');
    }

    public function sendEmail(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $emails = $request->email;
        $subject = $request->subject;
        $body = $request->body;

        $senderEmail = "daviesg77@gmail.com";
        $senderName = "GDM - Contact";

        /** An array to store the status codes for all emails to have a record of all successful emails */
        $emailReports = [];

        /** Exploding the string to get the email addresses individually */
        $addressesArray = explode(',', $emails);

        for ($i = 0; $i < count($addressesArray); $i++) {
            $email = new SendGrid\Mail\Mail();
            $email->setFrom($senderEmail, $senderName);
            $email->setSubject($subject);
            $email->addTo($addressesArray[$i]);
            $email->addContent("text/plain", $body);
            $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
            try {
                $response = $sendgrid->send($email);
                /** Push the email address and status code into the $emailReports array */
                array_push($emailReports, $addressesArray[$i] . " => " . $response->statusCode());
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        return $emailReports;
    }
}
