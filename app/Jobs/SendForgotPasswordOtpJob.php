<?php

namespace App\Jobs;

use App\Mail\ForgotPasswordOtpMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $name;
    public $otp;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param string $name
     * @param string $otp
     */
    public function __construct($email, $name, $otp)
    {
        $this->email = $email;
        $this->name = $name;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $email = new ForgotPasswordOtpMail($this->name, $this->otp); //$this->name, $this->otp
        Mail::to($this->email)->send($email);
    }
}
