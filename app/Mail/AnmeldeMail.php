<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Veranstaltung;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnmeldeMail extends Mailable
{
    use Queueable, SerializesModels;

    public Veranstaltung $veranstaltung;
    public $nachname, $vorname, $drkserver, $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Veranstaltung $veranstaltung, $nachname, $vorname, $drkserver, $email)
    {
        $this->veranstaltung = $veranstaltung;
        $this->nachname = $nachname;
        $this->vorname = $vorname;
        $this->drkserver = $drkserver;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('anmeldung.mail')->subject('Neue Anmeldung für Veranstaltung "' . $this->veranstaltung->titel . '"');
    }
}
