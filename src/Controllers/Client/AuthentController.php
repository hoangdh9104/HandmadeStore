<?php

namespace Dell\Asmphp2\Controllers\Client;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Commons\Helper;
use Dell\Asmphp2\Models\User;
use Rakit\Validation\Validator;

class AuthentController extends Controller
{
    private User $user;

    public function __construct(){
        $this->user = new User();
    }

    // Chuyển đến trang đăng nhập
    public function showFormLogin()
    {
        avoid_login();

        $this->renderViewClient('authents.login');
    }

    // Xử lý đăng nhập, nếu đăng nhập thì xóa $_SESSION['cart']
    public function login()
    {
        avoid_login();

        try{
            $user = $this->user->findByEmail($_POST['email']);

            if(empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if($flag){
                $_SESSION['user'] = $user;

                unset($_SESSION['cart']);

                if($_SESSION['user']['type'] == 'admin') {
                    header('Location: ' . url('admin/'));
                    exit();
                }

                header('Location: ' . url(''));
                exit();
            } else {
                $_SESSION['errors'] = 'Mật khẩu vừa nhập không chính xác.';
                header('Location: ' . url('login'));
                exit();
            }
        }catch(\Exception $e){
            $_SESSION['errors'] = $e->getMessage();
            header('Location: ' . url('login'));
            exit();
        }
    }

    // Chuyển đến trang đăng ký
    public function showFormRegister()
    {
        avoid_login();
        
        $this->renderViewClient('authents.register');
    }

    // Xử lý đăng ký (Muốn khi tạo tài khoản sẽ chuyển thẳng đến trang home vs tk vừa đăng ký nhưng chưa làm được)
    public function store()
    {
        avoid_login();

        // Kiểm tra dữ liệu
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'confirm_password'      => 'same:password',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('/register'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ];

            $this->user->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Tạo tài khoản thành công';

            $user = $this->user;
            $_SESSION['user'] = $user;

            header('Location: ' . url('login'));
            exit;
        }
    }

    // Đăng xuất và xóa $_SESSION['cart']
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);

        header('Location: ' . url('login'));
        exit();
    }
}