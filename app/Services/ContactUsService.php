<?php
namespace App\Services;


use App\ContactUs;
class ContactUsService
{
    protected $contactUs;
    protected $mailService;

    public function __construct()
    {
        $this->contactUs        =   new ContactUs();
        $this->mailService      =   new MailService();
    }

    public function create($data){
        $contactUs = $this->contactUs->create(['email' => $data['email'], 'name' => $data['name'], 'subject' => $data['subject'], 'message' => $data['message']]);
        $this->mailService->sendContactUsEmail($contactUs);
        return $contactUs;
    }

}