<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        protected Request $request
    )
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('abedini14010@gmail.com','هنرستان شهید عابدینی')
            ->subject('تماس با ما')
            ->view('website.contact.mail',[
                'name' => $this->request->get('name'),
                'subject' => $this->request->get('subject'),
                'email' => $this->request->get('email'),
                'content' => $this->request->get('content')
            ]);
    }
}
