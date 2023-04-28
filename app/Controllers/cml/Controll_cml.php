<?php

namespace App\Controllers\cml;

use App\Controllers\BaseController;

use App\Models\cml\Model_cml;

class Controll_cml extends BaseController
{

    public $cml;
    public $isLogged;

    public function __construct()
    {
        $Peticion_CLI = \Config\Services::request();

        if (!$Peticion_CLI->isCLI()) {
            $this->isLogged = auth()->loggedIn();
            $this->cml = new Model_cml();
        }
    }

    public function index($num_report = 'main')
    {
        if ($this->isLogged) {
            $data['num_report'] = $num_report;
            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Reportes";
            // $data['usuarios'] = $this->cml->pruebaModelo();
            $data['nombre'] = auth()->user()->getIdentities()[0]->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "cml/view_cml_menu_principal";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }

    public function createUser()
    {
        if ($this->isLogged) {
            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Crear Usuario";
            $data['nombre'] = auth()->user()->getIdentities()[0]->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "admin/users/create";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }

    public function uploadExcel()
    {
        if ($this->isLogged) {
            $data['message'] = null;

            if ($_FILES) {
                $uploadPath = './excels/';
                $allowedTypes = array('xlsx', 'xls');
                $maxSize = 1024; // Tamaño máximo en KB

                $fileName = $_FILES['file']['name'];
                $fileType = $_FILES['file']['type'];
                $fileSize = $_FILES['file']['size'];
                $fileTempName = $_FILES['file']['tmp_name'];

                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                if (in_array($fileExtension, $allowedTypes) && ($fileSize / 1024) <= $maxSize) {
                    $destination = $uploadPath . $fileName;
                    move_uploaded_file($fileTempName, $destination);
                    // El archivo se subió exitosamente
                    $data['message'] = 'Archivo subido exitosamente';
                } else {
                    // Error al subir el archivo
                    $data['message'] = 'Error al subir el archivo';
                }
            }

            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Subir Excel";
            // $data['nombre'] = auth()->user()->getIdentities()[0]->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "cml/view_cml_subir_excel";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }
}
