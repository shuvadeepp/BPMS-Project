<?php 
use Illuminate\Support\Facades\Mail;


/* ::::::::::: This method used for send to your Email ID when register ::::::::::: */
function sendMail($mailContent,$ccmailAddress,$bccmailAddress,$subject,$attachment,$sendTo){

    $mailsendStatus = 1;
    if (!empty($attachment)) {
        $fileurl    = $attachment[0]->url;
        $as         = $attachment[0]->as;
        $mimeType   = $attachment[0]->mime;
    }

    if (!empty($sendTo) && !empty($mailContent)) {

        $maildata['messsage']   = $mailContent;
        $maildata['receiverMail'] = explode(',', $sendTo);
       
        $maildata['subject']    = $subject;

        $maildata['fileurl']    = (!empty($fileurl)) ? $fileurl : '';
        $maildata['as']         = (!empty($as)) ? $as : '';
        $maildata['mimeType']   = (!empty($mimeType)) ? $mimeType : '';
        $ccAddress="";
        $bccAddress="";
        if (!empty($ccAddress)){
          $maildata['ccAddress']  = explode(',', $ccAddress);
        }
        if (!empty($bccAddress)){
          $maildata['bccAddress'] = explode(',', $bccAddress);
        }

        $mail_template = 'say_foundation_email_template';

        \Mail::send('mailer.'.$mail_template, $maildata, function ($message) use($maildata) {
            $message->from(SAY_FND_EMAIL, 'SAY FOUNDATION');
            $message->to($maildata['receiverMail'], '')->subject($maildata['subject']);

            if (!empty($maildata['ccAddress']))
                $message->cc($maildata['ccAddress'], null);
            if (!empty($maildata['bccAddress']))
                $message->bcc($maildata['bccAddress'], null);

            if (!empty($maildata['fileurl'])) {

                $message->attach($maildata['fileurl'], [
                    'as'    => $maildata['as'],
                    'mime'  => $maildata['mimeType'],
                ]);
            }
        });
        // check for failures
        if (\Mail::failures()) {
            // return response showing failed emails
            $mailsendStatus = 0;
        }
    }

    return $mailsendStatus;
}