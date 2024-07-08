<?php
  session_start();
  include './connect/conn.php';
  if(!isset($_SESSION['user_id']) ){
    // Nếu không, chuyển hướng đến trang đăng nhập
    header("Location: ./login.php");
    die();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $profilePicture = $user['profile_picture']; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bank</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="vncslogo.png" alt="" class="logo-img" style="margin-left: 30px ;"> 
        <h1 class="sitename">Hung_NP Bank</h1>
        
       
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="update.php">Update</a></li>
          <li><a href="#menu">Giải pháp</a></li>
          <li><a href="#events">Dịch vụ</a></li>
          <li><a href="#chefs">Chương trình khuyến mãi</a></li>
          <li><a href="#gallery">Hỗ trợ khách hàng</a></li>
          <li class="dropdown"><a href="#"><span>Bảo hiểm</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="update.php">   
        <img src="<?php echo $profilePicture ?>" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
      </a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Enjoy Your Life<br>Smart money</h1>
            <p data-aos="fade-up" data-aos-delay="100">Chúng tôi cung cấp giải pháp tài chính thông minh đến tay khách hàng </p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Vay tiền</a>
              <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Xem Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="https://www.moneydigest.com/img/gallery/heres-how-much-money-really-exists-in-the-world/intro-1704559079.jpg" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More</span> <span class="description-title">About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtYbEyqNjev9QUR9o0ERfSjO6WMW9nuKhMYw&s" class="img-fluid mb-4" alt="">
            <div class="book-a-table">
              <h3>Book a Service</h3>
              <p>+84 978825469</p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Chào mừng bạn đến với Ngân hàng Hung_NP - Đối tác tài chính tin cậy của bạn. Chúng tôi tự hào là một trong những ngân hàng hàng đầu, cung cấp các dịch vụ tài chính toàn diện và chất lượng cao cho khách hàng cá nhân và doanh nghiệp
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Tài khoản ngân hàng đa dạng.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Cho vay và tài trợ.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Dịch vụ thẻ.</span></li>
              </ul>
              <p>
                Với sứ mệnh "Đồng hành cùng thành công của bạn", Ngân hàng Hung_NP không ngừng nỗ lực nâng cao chất lượng dịch vụ và phát triển các sản phẩm tài chính sáng tạo, nhằm đáp ứng tốt nhất nhu cầu của khách hàng. Hãy để chúng tôi trở thành người bạn đồng hành đáng tin cậy trên con đường xây dựng tương lai tài chính vững mạnh.
              </p>

              <div class="position-relative mt-4">
                <img src="https://youthtimemag.com/wp-content/uploads/2022/08/shutterstock_1900200964.png" class="img-fluid" alt="">
                <a href="https://youtu.be/YFtaS3kTMqM?si=-aBNKgoAdQnNvv12" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Tại sao chọn Hung_NP Bank</h3>
              <p>
                Khi nghĩ đến việc chọn một ngân hàng, chúng ta luôn
                 muốn tìm một nơi có thể tin cậy và mang lại sự an tâm. Ngân hàng Hung_NP Bank
                  không chỉ là nơi bạn có thể gửi gắm tài sản mà còn là đối tác tài chính luôn sẵn sàng hỗ trợ bạn.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Dịch vụ khách hàng tuyệt vời</h4>
                  <p>Nhân viên tận tâm, chuyên nghiệp luôn sẵn sàng hỗ trợ và lắng nghe nhu cầu của bạn.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4> Sản phẩm tài chính đa dạng</h4>
                  <p>Cung cấp các tài khoản tiết kiệm, gói vay linh hoạt và dịch vụ thẻ tín dụng với nhiều ưu đãi</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Uy tín và an toàn</h4>
                  <p>Áp dụng công nghệ bảo mật tiên tiến, đảm bảo an toàn tuyệt đối cho thông tin và tài sản của bạn</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">

      <img src="https://img.freepik.com/premium-vector/data-analyst-pattern-background-design_260839-64.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Dịch vụ của chúng tôi</h2>
        <p><span>Check Our</span> <span class="description-title">Hung_NP Service</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Vay vốn</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Ngân hàng số</h4>
            </a><!-- End tab nav item -->

          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Bảo hiểm</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Thẻ</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Services</p>
              <h3>Vay vốn</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                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
                gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="glightbox"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                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
                gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="menu-img img-fluid" alt=""></a>
                <h4>Lãi xuất canh tranh</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $5.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="glightbox"><img src="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Thủ tục nhanh chóng và đơn giản</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $14.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="glightbox"><img src="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Đa dạng gói vay</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $8.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="glightbox"><img src="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Tư vấn tài chính chuyên nghiệp</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $12.95 -->
                </p>
              </div><!-- Menu Item -->

             <div class="col-lg-4 menu-item">
                <a href="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="glightbox"><img src="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Linh hoạt trong việc trả nợ</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $12.95 -->
                </p>
              </div> <!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="glightbox"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="menu-img img-fluid" alt=""></a>
                <h4>Hỗ trợ trực tuyến 24/7</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $9.95 -->
                </p>
              </div><!-- Menu Item -->

            </div> 
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <div class="tab-header text-center">
                <p>Services</p>
                <h3>Vay vốn</h3>
              </div>
  
              <div class="row gy-5">
  
                <div class="col-lg-4 menu-item">
                  <a href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                  Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                  wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                  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
                  gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="glightbox"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                  Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                  wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                  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
                  gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="menu-img img-fluid" alt=""></a>
                  <h4>Lãi xuất canh tranh</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $5.95 -->
                  </p>
                </div><!-- Menu Item -->
  
                <div class="col-lg-4 menu-item">
                  <a href="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="glightbox"><img src="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="menu-img img-fluid" alt=""></a>
                  <h4>Thủ tục nhanh chóng và đơn giản</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $14.95 -->
                  </p>
                </div><!-- Menu Item -->
  
                <div class="col-lg-4 menu-item">
                  <a href="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="glightbox"><img src="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="menu-img img-fluid" alt=""></a>
                  <h4>Đa dạng gói vay</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $8.95 -->
                  </p>
                </div><!-- Menu Item -->
  
                <div class="col-lg-4 menu-item">
                  <a href="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="glightbox"><img src="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="menu-img img-fluid" alt=""></a>
                  <h4>Tư vấn tài chính chuyên nghiệp</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $12.95 -->
                  </p>
                </div><!-- Menu Item -->
  
               <div class="col-lg-4 menu-item">
                  <a href="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="glightbox"><img src="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="menu-img img-fluid" alt=""></a>
                  <h4>Linh hoạt trong việc trả nợ</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $12.95 -->
                  </p>
                </div> <!-- Menu Item -->
  
                <div class="col-lg-4 menu-item">
                  <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="glightbox"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="menu-img img-fluid" alt=""></a>
                  <h4>Hỗ trợ trực tuyến 24/7</h4>
                  <p class="ingredients">
                    <!-- Lorem, deren, trataro, filede, nerada -->
                  </p>
                  <p class="price">
                    <!-- $9.95 -->
                  </p>
                </div><!-- Menu Item -->
  
              </div> 
            </div><!-- End Starter Menu Content -->
  

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Services</p>
              <h3>Vay vốn</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                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
                gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="glightbox"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PEBAPEBAQEA8PDhAWEBAVDxUQDw8QFRUWFxUVFhUYHSggGBolGxUVIjEhJSkrLi4w
                Fx8zODMtNygtLisBCgoKDg0OGxAQGi0iHyItLS8tLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALIBGwMBEQACEQEDEQH/xAAcAAEAAQUBAQAAAAAAAAAAAAAAAQIEBQYHA
                wj/xABCEAABAwIDBAcFBwIFAwUAAAABAAIDBBEFEiEGMUFREyJhcYGRoQcyUrHRFCNCYnKCwUOSM1OisuEk8PEVY3OTwv/EABoBAQACAwEAAAAAAAAAAAAAAAABBAIDBQb/xAAwEQEAAgIBAwQAAwg
                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
                gBAQSgkoJQSgIJCCUEIJQQgICAEBAQEBAQEBAQEEoIQEH/9k=" class="menu-img img-fluid" alt=""></a>
                <h4>Lãi xuất canh tranh</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $5.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="glightbox"><img src="https://thietbixaydungsg.com/wp-content/uploads/2023/09/thu-tuc-phap-ly-xay-nha-1.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Thủ tục nhanh chóng và đơn giản</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $14.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="glightbox"><img src="https://tonikbank.com/themes/tonikbankv1/images/og-tags/pag-ibig-og.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Đa dạng gói vay</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $8.95 -->
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="glightbox"><img src="https://storage.timviec365.vn/timviec365/pictures/images/tu-van.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Tư vấn tài chính chuyên nghiệp</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $12.95 -->
                </p>
              </div><!-- Menu Item -->

             <div class="col-lg-4 menu-item">
                <a href="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="glightbox"><img src="https://jobsgo.vn/blog/wp-content/uploads/2022/03/linh-hoat-la-gi-3.jpg" class="menu-img img-fluid" alt=""></a>
                <h4>Linh hoạt trong việc trả nợ</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $12.95 -->
                </p>
              </div> <!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="glightbox"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpr__v9p_jaqFTJwo17wuzW8QMt35q5nIFJQ&s" class="menu-img img-fluid" alt=""></a>
                <h4>Hỗ trợ trực tuyến 24/7</h4>
                <p class="ingredients">
                  <!-- Lorem, deren, trataro, filede, nerada -->
                </p>
                <p class="price">
                  <!-- $9.95 -->
                </p>
              </div><!-- Menu Item -->

            </div> 
          </div><!-- End Starter Menu Content -->


          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                <h4>Aut Luia</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $14.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                <h4>Est Eligendi</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $8.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                <h4>Eos Luibusdam</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $12.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                <h4>Eos Luibusdam</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $12.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
                <h4>Laboriosam Direva</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $9.95
                </p>
              </div><!-- Menu Item -->

            </div>
          </div>End Dinner Menu Content

        </div>

      </div>

    </section><!-- /Menu Section -->

    <!-- Testimonials Section -->

   <!-- /Testimonials Section -->

    <!-- Events Section -->
    <!-- /Events Section -->

    <!-- Chefs Section -->
    <!-- /Chefs Section -->

    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Vay tiền</h2>
        <p><span>Để được tư vấn</span> <span class="description-title">vui lòng để lại thông tin cho chúng tôi<br></span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 reservation-img" style="background-image: url(https://5.imimg.com/data5/SELLER/Default/2023/12/366136999/OD/ZJ/UD/111053973/enterprise-it-consulting-service.jpg);"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
                </div>
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              </div>

              <div class="text-center mt-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                <button type="submit">Tư vấn </button>
              </div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>

    </section><!-- /Book A Table Section -->

    <!-- Gallery Section -->
    <!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14897.354528539345!2d105.82368381841266!3d21.019132321336645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab82925ab2c5%3A0xd785e4ada5350b30!2sVNCS%20Global!5e0!3m2!1svi!2s!4v1720323391547!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>195 Khâm Thiên, Đống Đa, Hà Nội</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+84 0978825469</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>hung@vncs.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Opening Hours<br></h3>
                <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form><!-- End Contact Form -->

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>195 Phố Khâm Thiên</p>
            <p>Đống Đa, Hà Nội</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+84 978825469</span><br>
              <strong>Email:</strong> <span>hung@vncs.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>Love <span>NT</span> <strong class="px-1 sitename"></strong><span>NP</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">HungPk</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>