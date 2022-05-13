<?php
    include("PHPMailer/src/Exception.php");
    include("PHPMailer/src/OAuth.php");
    include("PHPMailer/src/PHPMailer.php");
    include("PHPMailer/src/POP3.php");
    include("PHPMailer/src/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class Send{
        public function sendMails($email,$username, $fullname, $phone, $user_add){
            $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='batoi1271.lch@gmail.com';
                $mail->Password='Toi@123456789';
                $mail->SMTPSecure='tls';
                $mail->Port=587;
                $mail->CharSet='UTF-8';
                $mail->setFrom('batoi1271.lch@gmail.com');
                $mail->addAddress($email,$username, $fullname, $phone, $user_add);
                $mail->isHTML(true);
                $mail->Subject='Routine đã nhận đơn hàng của bạn !';
                $content= '<h2 style="color: black;">Cám ơn bạn đã đặt hàng tại Routine!</h2>'.'<h3 style="color: red;">Xin chào '.$fullname.',</h3>'.
                "<p style='color: black; font-size: 16px;'>Routine đã nhận được yêu cầu đặt hàng của bạn và đang xử lý nhé. Bạn sẽ nhận được thông báo tiếp theo khi đơn hàng đã sẵn sàng được giao.</p>".
                "<br/><p style='color: black;'><b>*Lưu ý nhỏ cho bạn:</b> Bạn chỉ nên nhận hàng khi trạng thái đơn hàng là <b>“Đang giao hàng”</b> và nhớ kiểm tra Mã đơn hàng, Thông tin người gửi và Mã vận đơn để nhận đúng kiện hàng nhé.</p>".
                "<br/><h4 style='color: black;'>Đơn hàng được giao đến</h4>".
                "<p style='color: black;'><b>Tên: </b>".$fullname.",</p>".
                "<p style='color: black;'><b>Địa chỉ nhà: </b>".$user_add.",</p>".
                "<p style='color: black;'><b>Điện thoại: </b>".$phone.",</p>".
                "<p style='color: black;'><b>Email: </b>".$email.",</p>".
                "<br/><p style='color: black;'>Truy cập hotro.routine.vn, hoặc gọi số điện thoại 1900 6000 (8-21h cả T7,CN) để gặp nhân viên chăm sóc khách hàng khi quý khách cần hỗ trợ.</p>".
                "<br/><b style='color: red;'>Routine.com cảm ơn quý khách,</b>".
                "<br/><b style='color: red;'>Routine from with love <3</b>".
                "<br/><br/><p style = 'text-align: center;'>Đây là thư tự động được tạo từ danh sách đăng ký của chúng tôi. Do đó, xin đừng trả lời thư này.</p>";

                $mail->Body = $content;
                $mail->send();
                echo '<script>window.history.back();</script>';
                
                // header("Location: ../front-end/checkout.php");
                exit();
                
        }

        public function sendMailsRegister($email,$username){
            $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='batoi1271.lch@gmail.com';
                $mail->Password='Toi@123456789';
                $mail->SMTPSecure='tls';
                $mail->Port=587;
                $mail->CharSet='UTF-8';
                $mail->setFrom('batoi1271.lch@gmail.com');
                $mail->addAddress($email,$username);
                $mail->isHTML(true);
                $mail->Subject='Routine đã nhận thư đăng kí của bạn !';
                $content= '<h2 style="color: red;">Cám ơn bạn đã đặt hàng tại Routine!</h2> <br/>'.'<h3 style="color: red;">Xin chào @'.$username.',</h3>'.
                '<p style="color: black; font-size: 16px;">Routine đã nhận được yêu cầu của bạn. Bạn sẽ nhận được thông báo về các sản phẩm mới nhất.</p>'.
                '<br/><p style="color: black; font-size: 16px;">Truy cập hotro.routine.vn, hoặc gọi số điện thoại 1900 6000 (8-21h cả T7,CN) để gặp nhân viên chăm sóc khách hàng khi quý khách cần hỗ trợ.</p>'.
                "<br/><b style='color: red;'>Routine.com cảm ơn quý khách,</b>";
                $mail->Body = $content;
                $mail->send();
                echo '<script>window.history.back();</script>';
                // header("Location: ../front-end/index.php");
                exit();
                
        }
    }

    
?>
