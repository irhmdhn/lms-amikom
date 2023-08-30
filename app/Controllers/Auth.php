<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Students;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Config\Services;

class Auth extends BaseController
{
    protected $AdminModel, $StudentModel, $TeacherModel, $UserModel, $validation;
    public function __construct()
    {
        $this->StudentModel = new StudentModel();
        $this->TeacherModel = new TeacherModel();
        $this->AdminModel = new AdminModel();
        $this->UserModel = new UserModel();
        $this->validation = Services::validation();
    }
    public function rules()
    {
        $rules = [
            'userid' => 'required|min_length[8]',
            'password' => 'required',
        ];
        return $rules;
    }
    public function index()
    {
        return view('login');
    }
    public function login()
    {
        // GET INPUT
        $userInput = $this->request->getVar('userid');
        $password = $this->request->getVar('password');
        // VALIDATION
        $validation = $this->validation;
        $validation->setRules($this->rules());
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/login')->withInput()->with('inputs', $validation->getErrors());
        }

        // $mahasiswa = $this->UserModel->getMahasiswa($userInput);
        // $dosen = $this->UserModel->getDosen($userInput);
        $admin = $this->UserModel->getAdmin($userInput);
        $dosen = $this->UserModel->getDosen($userInput);
        $mahasiswa = $this->UserModel->getMahasiswa($userInput);

        $checkEmail = strpos($userInput, '@amikom.ac.id');
        $checkEmailMhs = strpos($userInput,  '@students.amikom.ac.id');

        if (!($checkEmail || $checkEmailMhs)) {
            $userid = str_replace('.', '', $userInput);
            $isMahasiswa = $this->StudentModel->where('nim', $userid)->first();
            $isDosen = $this->TeacherModel->where('nik', $userid)->first();
            // dd($isMahasiswa, $isDosen->id);
            if ($isMahasiswa) {
                $mahasiswa = $this->UserModel->getEmailById($isMahasiswa->id);
            } elseif ($isDosen) {
                $dosen = $this->UserModel->getEmailById($isDosen->id);
            } else {
                return redirect()->to('/login')->with('error', 'Masukan no induk/email dengan benar');
            }
        }


        $redirectError = redirect()->to('/login')->withInput()->with('error', 'Email/Password Salah');

        if ($admin) {
            // Cek Password
            if (password_verify($password, $admin->password)) {
                session()->set([
                    'email' => $admin->email,
                    'role' => $admin->role,
                    'logged_in' => true,
                ]);
                // Jika Password Benar Arahkan Ke Halaman Admin
                return redirect()->to('/admin/dashboard');
            } else {
                return $redirectError;
            }
        }
        if ($dosen) {
            // Cek Password
            if (password_verify($password, $dosen->password)) {
                session()->set([
                    'id' => $dosen->user_id,
                    'email' => $dosen->email,
                    'role' => $dosen->role,
                    'logged_in' => true,
                ]);
                // Jika Password Benar Arahkan Ke Halaman Dosen
                return redirect()->to('/d/classes');
            } else {
                return $redirectError;
            }
        }

        if ($mahasiswa) {
            // Cek Password
            if (password_verify($password, $mahasiswa->password)) {
                session()->set([
                    'id' => $mahasiswa->user_id,
                    'email' => $mahasiswa->email,
                    'role' => $mahasiswa->role,
                    'logged_in' => true,
                ]);
                // Jika Password Benar Arahkan Ke Halaman mahasiswa
                return redirect()->to('/m/classes');
            } else {
                return $redirectError;
            }
        }



        //CHECK INPUT
        // $checkEmail = strpos($userInput, '@amikom.ac.id');
        // if (!$checkEmail) {
        //     $userid = str_replace('.', '', $userInput);
        //     $student = $this->StudentModel->where('nim', $userid)->first();
        //     $teacher = $this->TeacherModel->where('nik', $userid)->first();
        //     if ($student) {
        //         $userLogin = $this->UserModel->where('user_id', $student->id)->first();
        //     } elseif ($teacher) {
        //         $userLogin = $this->UserModel->where('user_id', $teacher->id)->first();
        //     } else {
        //         return redirect()->to('/login')->with('error', 'Masukan no induk/email dengan benar');
        //     }
        // } elseif ($checkEmail) {
        //     $userLogin = $this->UserModel->where('email', $userInput)->first();
        // } else {
        //     return redirect()->to('/login')->with('error', 'Anda belum terdaftar, silahkan daftar terlebih dahulu');
        // }

        // CHECK PASSWORD
        // if ($userLogin && password_verify($password, $userLogin->password)) {
        //     session()->set([
        //         'user_id' => $userLogin->id,
        //         'email' => $userLogin->email,
        //         'role' => $userLogin->role,
        //         'logged_in' => true,
        //     ]);
        //     return redirect()->to('/dashboard');
        // } else {
        //     return redirect()->to('/login')->with('error', 'No induk/Email atau password salah!');
        // }
        dd($userInput, $password);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
