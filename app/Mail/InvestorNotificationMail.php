<?php

namespace App\Mail;

use App\Models\Entrepreneur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvestorNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $entrepreneur;

    public function __construct(Entrepreneur $entrepreneur)
    {
        $this->entrepreneur = $entrepreneur;
    }

    public function build()
    {
        return $this->subject('New Entrepreneur Approved')
            ->view('emails.investor_notification')
            ->with([
                'business_name' => $this->entrepreneur->business_name,
                'brand_name' => $this->entrepreneur->brand_name,
                'fund_asked' => $this->entrepreneur->market_capital,
                'equity_offered' => $this->entrepreneur->your_stake,
                'company_valuation' => $this->entrepreneur->stake_funding,
            ]);
    }
}