<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Shield\Entities\User;

class AdminController extends BaseController
{
    public function createUser($message = null)
    {
        $data['message'] = $message;
        // Verifique si el usuario actual es un administrador
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        /* ----------- DECLARACION VARIABLES ----------- */
        $data['title'] = "Compensar | Crear Usuario";
        $data['nombre'] = auth()->user()->getIdentities()[0]->name;
        /* ----------- FIN DECLARACION VARIABLES ----------- */

        /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
        $data['content'] = "admin/users/create";

        echo view('layout/main', $data);
    }

    public function storeUser()
    {
        $data['message'] = null;

        // Verifique si el usuario actual es un administrador
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $users = model('UserModel');
        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
        ]);

        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        $group = $this->request->getPost('group');

        // Add to default group
        // $users->addGroup($user);
        $users->addUserGroup($user, $group);

        //activate user
        if ($users->activate($user)) {
            $message = 'Usuario Activado';
        } else {
            // Error al subir el archivo
            $message = 'Usuario creado';
        }

        $this->createUser($message);
    }
}
