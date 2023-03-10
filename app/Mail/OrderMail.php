<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    // public $data;
    protected $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = $this->pdf;
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->subject('Food Report')
        ->view('mail.invoicereportmail',compact('pdf'))
        ->attachData($this->pdf->output(), 'invoice_report.pdf');
    }
}
