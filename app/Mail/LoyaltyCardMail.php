<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoyaltyCardMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;

    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->view('loyalty_card')
                    ->attachData($this->pdfContent, 'carte_de_fidelite.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->subject('Votre Carte de Fidélité');
    }
}
