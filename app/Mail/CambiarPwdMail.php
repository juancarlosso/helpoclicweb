<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CambiarPwdMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
        public $datos;
    
        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($datos)
        {
            $this->datos = $datos;
        }
    
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->view('mails.cambiar_password')->subject( env('APP_NAME') . " | Cambiar password");
        }
}
