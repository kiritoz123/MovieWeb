<?php

if (isset($_POST['message'])) {
    $userMessage = strtolower(trim($_POST['message']));


    $responses = [
        "xin chào" => "Chào bạn! Tôi có thể giúp gì cho bạn?",
        "bạn tên gì" => "Tôi là chatbot hỗ trợ khách hàng!",
        "giờ làm việc" => "Chúng tôi làm việc từ 8:00 sáng đến 10:00 tối.",
        "cảm ơn" => "Không có gì! Nếu bạn cần giúp đỡ, hãy nhắn tin cho tôi."
    ];


    $response = "Xin lỗi, tôi chưa hiểu câu hỏi của bạn.";
    foreach ($responses as $key => $reply) {
        if (strpos($userMessage, $key) !== false) {
            $response = $reply;
            break;
        }
    }


    echo json_encode(["response" => $response]);
    exit();
}
?>
