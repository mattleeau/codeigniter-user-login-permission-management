<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
    }

    public function index()
    {
        $current = $this->session->userdata('logged_in');
        $roles = array(USER_ROLE_ADMIN=>$this->lang->line('Administrator'), USER_ROLE_NORMAL=>$this->lang->line('Normal'));
        $users = $this->User_model->get_rows();
        $this->display('user/list', array('users'=>$users, 'roles'=>$roles, 'current'=>$current));
    }

    public function add()
    {
        $user = array();

        $fields = $this->User_model->get_all_fields();
        foreach ($fields as $field)
        {
            $user[$field] = '';
        }
        $this->display('user/edit', array('user'=>$user, 'disabled'=>''));
    }

    public function edit($id)
    {
        $user = $this->User_model->get_row($id);

        $current = $this->session->userdata('logged_in');

        if ($user['username']==$current['username'])
        {
            $disabled = 'disabled';
        }
        else
        {
            $disabled = '';
        }

        $this->display('user/edit', array('user'=>$user, 'disabled'=>$disabled));
    }

    public function save()
    {
        $post = $this->input->post();
        $username = $post['username'];

        $this->form_validation->set_rules('firstname', $this->lang->line('Firstname'), 'required');
        $this->form_validation->set_rules('lastname', $this->lang->line('Lastname'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('Password'), 'required|min_length[8]|alpha_numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('msg', validation_errors());
            redirect(base_url_with_language('user/edit/'.$post['user_id']));
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username', 'callback_check_username');
            $post['password'] = md5($post['password']);
            unset($post['confirm_password']);
            if (!$post['user_id'])
            {
                $this->User_model->insert($post);
            }
            else
            {
                $this->User_model->update($post);
            }

            redirect(base_url_with_language('user'));
        }

    }

    function delete($id)
    {
        $this->User_model->delete($id);
        redirect(base_url_with_language("/user"));
    }

    // Show login page
    public function login()
    {
        $vals = array(
                'word'          => random_string(),
                'img_path'      => './captcha/',
                'img_url'       => base_url('/captcha'),
                'img_width'     => '150',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 8,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                'colors'        => array(
                        'background' => array(225, 225, 225),
                        'border' => array(150, 150, 150),
                        'text' => array(255, 0, 0),
                        'grid' => array(200, 200, 200)
                )
        );

        $captcha = create_captcha($vals);

        $this->session->set_userdata('captchaWord', $captcha['word']);

        $this->display('user/login', $captcha);
    }

    // Check for user login process
    public function do_login()
    {
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1")
        {
            $this->display('user/list');
        }
        else
        {
            // Check for validation
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('captcha', "Captcha", 'required');

            $userCaptcha = $this->input->post('captcha');

            $word = $this->session->userdata('captchaWord');

            if ($this->form_validation->run() && strcmp(strtoupper($userCaptcha),strtoupper($word)) == 0)
            {
                $this->session->unset_userdata('captchaWord');

                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($user = $this->check_user($username, $password)) {    // check username and password
                    $remember = $this->input->post('remember_me');
                    if ($remember) {
                        $cookie = array(
                            'name'   => 'remember_me',
                            'value'  => 'Random string',
                            'expire' => '1209600',  // Two weeks
                            'domain' => base_url(),
                            'path'   => '/'
                        );

                        set_cookie($cookie);
                    }
                    $sess_data = array(
                        'uid'  => $user['user_id'],
                        'username'  => $user['username'],
                        'password'  => $user['password'],
                        'role'      => $user['role'],
                    );
                    $this->session->set_userdata('logged_in', $sess_data);

                    $this->remove_all_captcha_files();

                    redirect(base_url_with_language('/'));
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $this->display('user/login', $data);
                }
            } else {
                redirect('user/login');
            }
        }
    }

    // Logout from admin page
    public function logout() {
        // Destroy session data
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        redirect('/');
    }

    private function check_user($username, $password)
    {
        $arr = $this->User_model->get_rows(array('username'=>$username, 'password'=>md5($password)));

        if (count($arr) > 0)
        {
            return $arr[0];
        }
        else
        {
            return false;
        }

    }

    public function check_username($username)
    {
        if ($this->User_model->check_username($username))
        {
            $this->form_validation->set_message('check_username', 'This %s is already used by someone!');
            return false;
        }
        else
        {
            return true;
        }
    }

    public function remove_all_captcha_files()
    {

    }

}
