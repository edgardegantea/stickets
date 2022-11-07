<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserInfoController extends ResourceController
{

    private $userInfo;
    private $db;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->db = db_connect();
        $this->userInfo = new UserModel;
        $this->session = \Config\Services::session();
    }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $users = model(UserModel::class);

        $data = [
            'title' => 'Usuarios',
            'usuarios'  => $users->findAll(),
        ];

        return view('userinfo/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return false;
        // Pendiente
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $area = model('Area');

        $data = [
            'title' => 'Nuevo registro de usuario',
            'areas' => $area->findAll()
        ];

        return view('usuarios/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);

        $rules = [
            'name'      => 'required|min_length[3]|max_length[80]',
            'email'     => 'required|min_length[6]|max_length[80]|valid_email|is_unique[users.user_email]',
            'phone_no'  => 'required|min_length[6]|max_length[200]',
            'password'  => 'required|min_length[6]|max_length[200]',
            'role'      => 'required'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'name'      => $this->request->getPost('name'),
                'email'     => $this->request->getPost('email'),
                'phone_no'  => $this->request->getPost('phone_no'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'      => $this->request->getPost('role')
            ];
            $userModel->save($data);
            return redirect()->to('admin/userinfo');
        } else {
            $data['validation'] = $this->validator;
            // echo view('usuarios/create', $data);
            return view('usuarios/create', $data);
        }


    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
