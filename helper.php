<?php

// Hỗ trợ cho việc upload file
const PATH_ROOT = __DIR__ . '/'; 

// 
if (!function_exists('asset')) {
    function asset($path) {
        return $_ENV['BASE_URL'] . $path;
    }
}

//
if (!function_exists('url')) {
    function url($uri = null) {
        return $_ENV['BASE_URL'] . $uri;
    }
}

// Check đăng nhập
if(!function_exists('checkLogin')) {
    function checkLogin() {
        return isset($_SESSION['user']); 
    }
}

// Check đăng nhập admin
if(!function_exists('checkLoginAdmin')) {
    function checkLoginAdmin() {
        return checkLogin() && $_SESSION['user']['type'] == 'admin'; 
    }
}

// Bỏ qua trang login nếu đã đăng nhập
if(!function_exists('avoid_login')) {
    function avoid_login() {
        if(checkLogin()) {
            if($_SESSION['user']['type'] == 'admin') {
                header('Location:' . url('admin/'));
                exit();
            }
    
            header('Location:' . url(''));
            exit();
        }
    }
}