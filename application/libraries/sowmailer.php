<?php

class SowMailer {

  public static function send($template_name, $vars) {

    $transport = Config::get('mailer.transport');
    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance();
    $message->setFrom(array('sowcomposer@gmail.com'=>'SOW Composer'));

    if ($template_name == "SOW_COMPLETED") {

      $sow = Sow::find($vars["sow_id"]);

      $attachment = Swift_Attachment::newInstance()
                              ->setFilename($sow->title.'.doc')
                              ->setContentType('application/msword')
                              ->setBody(View::make('partials.doc')->with('sow', $sow));

      $message->setSubject("Here's your completed SOW, \"$sow->title\"")
              ->setTo(array($sow->author_email))
              ->addPart(View::make('mailer.sow_completed_text')->with('sow', $sow),'text/plain')
              ->setBody(View::make('mailer.sow_completed_html')->with('sow', $sow),'text/html')
              ->attach($attachment);

    } else {
      throw new Exception("Couldn't find the SowMailer template that you requested.");
    }

    $mailer->send($message);

  }

}