<?php

namespace App\Http\Controllers;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;

class LoyaltyCardController extends Controller
{
    public function sendCardEmail()
    {
       /*  // Générer le QR Code
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('https://example.com')
            ->encoding(new Encoding('UTF-8'))
            ->size(160)
            ->margin(10)
            ->labelText('My label')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->backgroundColor(new Color(255, 255, 255))
            ->build();

        $qrCodePath = storage_path('app/public/qr_code.png');
        $result->saveToFile($qrCodePath);

        // Sauvegarder le PDF
        $pdf = PDF::loadView('loyalty_card', ['qrCodePath' => $qrCodePath]);
        $pdfContent = $pdf->output();

        // Envoyer l'email
        Mail::to('example@example.com')->send(new LoyaltyCardMail($pdfContent));

        return 'Carte de fidélité envoyée !'; */
    }
}
