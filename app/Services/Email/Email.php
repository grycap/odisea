<?php namespace App\Services\Email;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class Email {

    private $entorno;

    /**
     * EnviarEmail constructor.
     * @param $entorno
     */
    public function __construct()
    {
        $this->entorno  = App::environment();
    }

    public function welcomeMessage($name,$email,$url,$messageUser)
    {
        $from = env('MAIL_USERNAME');
        $emailTo = $email;
        try {
            Mail::send('emails.welcome',
                array(
                    'nombre' => $name,
                    'email' => $email,
                    'url' => $url,
                    'messageUser' => $messageUser
                ), function ($message) use ($emailTo,$from) {
                    $message->from($from);
                    $message->to($emailTo, 'Entorno Virtual')->subject('Bienvenido Entornos Virtuales Educativos!');
                });
        }catch (\Exception $e) {
            Log::error("Error: " . $e);
        }
    }

    public function finishMessage($name,$email,$url,$messageUser)
    {
        $from = env('MAIL_USERNAME');
        $emailTo = $email;
        try {
            Mail::send('emails.finish',
                array(
                    'nombre' => $name,
                    'email' => $email,
                    'url' => $url,
                    'messageUser' => $messageUser
                ), function ($message) use ($emailTo,$from) {
                    $message->from($from);
                    $message->to($emailTo, 'Entorno Virtual')->subject('Finalizo el despliegue de tu infraestructura');
                });
        }catch (\Exception $e) {
            Log::error("Error: " . $e);
        }
    }

}