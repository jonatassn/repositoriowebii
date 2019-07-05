<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmail extends Mailable {

    use Queueable, SerializesModels;
    public $view;
    public $dados;
    public $titulo;
    public $anexo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $dados, $titulo, $anexo = null) {
        $this->view = $view;
        $this->dados = $dados;
        $this->titulo = $titulo;
        $this->anexo = $anexo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        if($this->anexo != null) {
            return $this->view($this->view)
                ->from("contato.silveiraj@gmail.com", "SAMM")
                // ->cc($address, $name)
                // ->bcc($address, $name)
                // ->replyTo($address, $name)
                ->subject($this->titulo)
                ->with('dados', $this->dados)
                ->attachData($this->anexo, 'Relatorio Registros.pdf');
        }

    }
}
