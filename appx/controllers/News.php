<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
        $data['news'] = $this->news_model->get_news();
        $data['nombre_completo'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
        }

        public function login()
        {
            $this->load->view('news/login');
        }

        public function register()
        {
            $this->load->view('news/register');
        }

        public function lista()
        {
            $this->load->view('templates/header');
            $this->load->view('news/lista');
            $this->load->view('templates/footer');
        }

        public function history()
        {
            $this->load->view('templates/header');
            $this->load->view('news/history');

        }

        public function view($slug = NULL)
        {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
        
            $data['title'] = 'Create news item';
        
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('nombre_completo', 'Nombre_Completo', 'required');
            $this->form_validation->set_rules('pais', 'Pais', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('extranjero', 'Extranjero');
            $this->form_validation->set_rules('mexicano', 'Mexicano');
            $this->form_validation->set_rules('moneda_origen', 'Moneda_Origen');
            $this->form_validation->set_rules('moneda_cambio', 'Moneda_Cambio');
            $this->form_validation->set_rules('cantidad', 'Cantidad');
            $this->form_validation->set_rules('total', 'Total');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('news/create');
            }
            else
            {
                $this->news_model->set_news();
                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
            }
        }

      
        
        public function clientespdf()
            {
                $this->load->view('news/clientespdf');
            }

        public function clientesexcel()
            {
                $this->load->view('news/clientesexcel');
            }

        public function cambiospdf()
            {
                $this->load->view('news/cambiospdf');
            }
            
        public function cambiosexcel()
            {
                $this->load->view('news/cambiosexcel');
            }

}