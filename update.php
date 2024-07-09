<?php
    session_start();
    include './connect/conn.php';
    if(!isset($_SESSION['user_id']) ){
        // Nếu không, chuyển hướng đến trang đăng nhập
        header("Location: ./login.php");
        die();
    }

    $user_id = $_SESSION['user_id'];

    // Sử dụng Prepared Statement để truy vấn cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if (!$user) {
        die("Không tìm thấy thông tin người dùng.");
    }

    $username = $user['user_name'];
    $email = $user['email'];
    $address = $user['address'];
    $telephone = $user['telephone'];
    $profilePicture = $user['profile_picture'];
    $fullName = $user['full_name'];
    $telephone = $user['telephone'];
    $address = $user['address'];
    $profilePicture = $user['profile_picture'];
?>

<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-image: linear-gradient(to right, #908486, #e01125);
            background-color: #e8921a;
            color: white;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 121px;
    height: 54px;
    margin-right: 49px;
    margin-left: auto;
}
        

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #f0f2f5;
        }

        .user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 20px;
        }

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
            display: flex;
        }

        .form-container {
            flex: 1;
            padding-right: 20px;
        }

        .image-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1557b0;
        }

        .image-preview {
            width: 200px;
            height: 200px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            margin-bottom: 15px;
            background-size: cover;
            background-position: center;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1;
        }

        .footer-section h3 {
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 5px;
        }

        .footer-section ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #fff;
        }

        .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #555;
            padding-top: 10px;
            font-size: 0.9em;
        }
        .image-preview img {
    max-width: 100%; /* Hoặc kích thước cụ thể, ví dụ: 200px */
    max-height: 100%; /* Hoặc kích thước cụ thể, ví dụ: 200px */
    width: auto;
    height: auto;
}
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
             <a href="index.php">   <img src="vncslogo.png" alt="Company Logo" class="logo"> </a>
                <h1>Hung_NP Bank</h1>
            </div>
            <nav>
                <a href="#">Trang chủ</a>
                <a href="#">Tin tức</a>
                <a href="#">Tuyển dụng</a>
                <a href="#">Đầu tư</a>
                 <a href="#">  <img src="<?php echo $profilePicture ?>" alt="User Image" class="user-image"> </a>
                 <a href="logout.php" style="height: auto; color: cadetblue;">Đăng xuất</a>
            </nav>
        </div>
    </header>
    
    <main>
        <div class="container">
            <div class="form-container">
                <h2>Edit User Information</h2>
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Full name:</label>
                        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullName)?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>"required>
                    </div>
                    <div class="form-group">
                        <label for="password">Địa chỉ</label>
                        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Số điện thoại</label>
                        <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($telephone) ?>"required>
                    </div>
                    
                    <button type="submit">Cập nhật</button>
                
            </div>
            <div class="image-container">
                <div class="image-preview" id="image-preview">
                    <?php if ($profilePicture): ?>
                        <img class="" src="<?php echo $profilePicture ?>" alt="Profile Picture">
                    <?php else: ?>
                        <span>Profile Picture</span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="file-upload">Upload Profile Picture:</label>
                    <input type="file" id="file-upload" name="file-upload" accept="" >
                </div>
            </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>We are dedicated to providing the best user experience.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Tuyển dụng</a></li>
                    <li><a href="#">Đầu tư</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: hungpk@vncs.com</p>
                <p>Phone: 0978825469</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Hưng company . All rights reserved.</p>
        </div>
    </footer>

    <!-- <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                imagePreview.style.backgroundImage = `url(${reader.result})`;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.backgroundImage = '';
            }
        } -->
    </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars( $_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $telephone = htmlspecialchars($_POST['telephone']);

    $target_dir = "uploads/";
    $user_session = $_SESSION['user_id'];
    $profilePicture = $user['profile_picture']; // lấy ảnh hiện tại từ cơ sở dữ liệu

    $uploadOk = 1;
   
    if (isset($_FILES['file-upload']) && $_FILES['file-upload']['size'] > 0) {
        $target_file = $target_dir . $user_session . '_' . basename($_FILES["file-upload"]["name"]);
        move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file);
       // sleep(30);
            if (checkmime($target_file) && checkFileType($target_file)) {
                echo "The file " . htmlspecialchars($target_file) . " has been uploaded.<br>";
                echo "The file is stored in " . $target_file . "<br>";
                $profilePicture = $target_file;
            } else {
                unlink($target_file);
                echo "Sorry, there was an error uploading your file.<br>";
                http_response_code(403);
                $uploadOk = 0;
            }
        
    }

    if ($uploadOk) {
        $sql = "UPDATE user SET full_name = ?, email = ?, address = ?, telephone = ?, profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $fullName, $email, $address, $telephone, $profilePicture, $user_session);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Cập nhật thông tin người dùng thành công.";
        } else {
            echo "Cập nhật thông tin người dùng thất bại.";
        }
    } else {
        // Cập nhật các thông tin khác nếu ảnh không được tải lên thành công
        $sql = "UPDATE user SET full_name = ?, email = ?, address = ?, telephone = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $fullName, $email, $address, $telephone, $user_session);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Cập nhật thông tin người dùng thành công (không bao gồm ảnh).";
        } else {
            echo "Cập nhật thông tin người dùng thất bại (không bao gồm ảnh).";
        }
    }
}

function checkmime($fileName) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $fileName);
    $whitelist = array("image/jpeg", "image/png", "image/gif");
    finfo_close($finfo);
    return in_array($mime_type, $whitelist, true);
}

function checkFileType($fileName) {
    $imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    return in_array($imageFileType, array("jpg", "jpeg", "png", "gif"), true);
}
?>
