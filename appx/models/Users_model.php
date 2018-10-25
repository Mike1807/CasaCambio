<?php
class Users_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_users($slug = FALSE)
        {
        if ($slug === FALSE)
        {
                $query = $this->db->get('users');
                return $query->result_array();
        }

        $query = $this->db->get_where('users', array('slug' => $slug));
        return $query->row_array();
        }

        public function set_users()
        {
            $this->load->helper('url');
        
            $slug = url_title($this->input->post('nombre_completo'), 'dash', TRUE);
        
            $data = array(
               /* 'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')*/
                'nombre_completo' =>$this->input->post('nombre_completo'),
                'slug' => $slug,
                'email' =>$this->input->post('email'),
                'password' =>$password,

            );
        
            return $this->db->insert('users', $data);
        }
}