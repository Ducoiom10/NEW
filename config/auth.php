<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này điều khiển "guard" và "passwords" mặc định cho ứng dụng
    | của bạn. Bạn có thể thay đổi những giá trị này nếu cần, nhưng đây
    | là các thiết lập hoàn hảo cho hầu hết các ứng dụng.
    |
    */

    'defaults' => [
        'guard' => 'web',  // Sử dụng guard "web" cho cả người dùng và admin.
        'passwords' => 'users',  // Cấu hình reset mật khẩu mặc định là cho bảng "users".
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Bạn có thể định nghĩa mọi "guard" xác thực cho ứng dụng của mình. Guard
    | mặc định đã được định nghĩa ở đây với việc sử dụng session và provider
    | của mô hình Eloquent.
    |
    | Mỗi "guard" sẽ có một "provider" tương ứng để lấy dữ liệu người dùng.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', // or 'users' if you don't have a separate admin provider
        ],
    ],



    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Tất cả các guard đều có một provider xác định cách lấy thông tin người dùng
    | từ cơ sở dữ liệu hoặc các nguồn lưu trữ khác.
    |
    | Bạn có thể cấu hình nhiều provider khác nhau nếu bạn có nhiều bảng người dùng.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // hoặc một model khác nếu bạn có model riêng cho admin
        ],
    ],



    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Bạn có thể cấu hình nhiều thiết lập reset mật khẩu nếu có nhiều bảng người dùng
    | khác nhau. Mỗi thiết lập có thể được sử dụng cho một bảng/model riêng biệt.
    |
    | 'expire' là số phút mà token reset mật khẩu có hiệu lực, sau thời gian này token
    | sẽ hết hạn, giúp tăng bảo mật. 'throttle' ngăn người dùng tạo nhiều token liên tục.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',  // Reset mật khẩu cho người dùng từ provider "users".
            'table' => 'password_reset_tokens',  // Bảng lưu trữ token reset mật khẩu.
            'expire' => 60,  // Token có hiệu lực trong 60 phút.
            'throttle' => 60,  // Người dùng chỉ được tạo token mới sau 60 giây.
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Đây là thời gian (tính bằng giây) mà người dùng phải xác nhận lại mật khẩu
    | khi thực hiện các hành động bảo mật nhạy cảm. Mặc định là 3 giờ.
    |
    */

    'password_timeout' => 10800,  // Thời gian xác nhận lại mật khẩu là 3 giờ (10800 giây).

];