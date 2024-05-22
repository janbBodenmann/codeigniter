<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Exception;

class EmailController extends CI_Controller {

    public function sendEmail() {
        $this->load->model('Todo_model');
        $todos = $this->Todo_model->getOpenTodos();

        $emailContent = "Hier ist der Informationstext.\n\nOffene TODO-Aufgaben:\n";
        foreach ($todos as $todo) {
            $emailContent .= "- " . $todo['task'] . "\n";
        }

        $this->load->library('email');
        $this->email->from(config_item('from_address'));
        $this->email->to(config_item('to_address'));
        $this->email->subject('Offene TODO-Aufgaben');
        $this->email->message($emailContent);

        try {
            $this->email->send();
            log_message('info', 'E-Mail erfolgreich versendet an: ' . config_item('to_address'));
        } catch (Exception $e) {
            log_message('error', 'Fehler beim Versenden der E-Mail an: ' . config_item('to_address') . '. Fehler: ' . $e->getMessage());
        }

        $this->output->set_content_type('application/json')->set_output(json_encode(['message' => 'E-Mail versendet']));
    }
}
