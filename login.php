<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chào mừng
// if(isset($_SESSION['username'])){
//     header("Location: welcome.php");
//     exit;
// }
if(isset($_SESSION['username']) ){
    // Nếu không, chuyển hướng đến trang đăng nhập
    header("Location: ./update.php");
    exit;
// }
// else if(isset($_SESSION['username']) && $_SESSION['isadmin'] == 0){
//     // Nếu không, chuyển hướng đến trang đăng nhập
//     header("Location: ./update.php");
//     exit;
}



include './connect/conn.php';

// Kết nối đến cơ sở dữ liệu
// $conn = mysqli_connect("localhost", "root", "", "test");

// if(!$conn){
//     die("Kết nối không thành công: " . mysqli_connect_error());
// }

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Xác thực thông tin đăng nhập
    $stmt = $conn->prepare("SELECT id, password, isadmin FROM user WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Lưu thông tin đăng nhập vào session
            $_SESSION['username'] = $username;
            $_SESSION['isadmin'] = $row['isadmin'];
            $_SESSION['user_id'] = $row['id'];

            // Reset số lần đăng nhập sai sau khi đăng nhập thành công
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_login_attempt'] = 0;

            // Chuyển hướng người dùng sau khi đăng nhập thành công
            // if ($row['isadmin'] == 1) {
             header("Location: ./update.php");
            //     exit;
            // } else {
            //     header("Location: ./update.php");
            //     exit;
            // }
        } else {
            // Mật khẩu không đúng
            $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
        }
    } else {
        // Tên đăng nhập không tồn tại
        $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        form {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 10px 0;
    border: none;
    background: #f1f1f1;
}
input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    opacity: 0.8;
}
        </style>
</head>
<body>
    <h2 style="text-align: center;">Đăng nhập</h2>
    <form method="post">
        <label>Tên đăng nhập:</label><br>
        <input type="text" name="username"><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Đăng nhập">
    </form>
    <?php
    if(isset($error)) {
        echo '<p>'.$error.'</p>';
    }
    ?>
</body>
</html>
