<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moive - Best movie collections</title>
  <link rel="preconnect" href="https:
<link rel="preconnect" href="https:
<link href="https:
  <!-- 
    - favicon
  -->
  <script src="https:

  <link rel="shortcut icon" href="assets/images/logo.svg" type="image/svg+xml">
  <link rel="stylesheet" href="https:

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https:
  <link rel="preconnect" href="https:
  <link href="https:
</head>
<div id="chatbot-container">
  <div id="chatbot-header">
    <span>Chatbot</span>
    <button id="chatbot-close">&times;</button>
  </div>
  <div id="chatbot-messages"></div>
  <div id="chatbot-input-container">
    <input type="text" id="chatbot-input" placeholder="Nhập tin nhắn..." />
    <button id="chatbot-send">Gửi</button>
  </div>
</div>
<button id="chatbot-toggle">💬</button>

<style>

  #chatbot-container {
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 300px;
    height: 400px;
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    display: none;
    flex-direction: column;
    z-index: 1000;
  }

  #chatbot-header {
    background: #007bff;
    color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px 10px 0 0;
  }

  #chatbot-messages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    max-height: 300px;
  }

  #chatbot-input-container {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ccc;
  }

  #chatbot-input {
    flex: 1;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  #chatbot-send {
    margin-left: 5px;
    padding: 5px 10px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  #chatbot-toggle {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    z-index: 1001;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const chatbotContainer = document.getElementById("chatbot-container");
    const chatbotToggle = document.getElementById("chatbot-toggle");
    const chatbotClose = document.getElementById("chatbot-close");
    const chatbotMessages = document.getElementById("chatbot-messages");
    const chatbotInput = document.getElementById("chatbot-input");
    const chatbotSend = document.getElementById("chatbot-send");

    const OPENAI_API_KEY = ""

    chatbotToggle.addEventListener("click", () => {
      chatbotContainer.style.display = chatbotContainer.style.display === "flex" ? "none" : "flex";
    });

    chatbotClose.addEventListener("click", () => {
      chatbotContainer.style.display = "none";
    });


    chatbotSend.addEventListener("click", sendMessage);
    chatbotInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") sendMessage();
    });

    function sendMessage() {
      const userMessage = chatbotInput.value.trim();
      if (!userMessage) return;


      displayMessage(userMessage, "user");
      chatbotInput.value = "";


      fetch("https:
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${OPENAI_API_KEY}`
        },
        body: JSON.stringify({
          model: "gpt-3.5-turbo",
          messages: [{ role: "user", content: userMessage }]
        })
      })
        .then(response => response.json())
        .then(data => {
          const botMessage = data.choices[0].message.content;
          displayMessage(botMessage, "bot");
        })
        .catch(error => {
          console.error("Lỗi:", error);
          displayMessage("Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau!", "bot");
        });
    }

    function displayMessage(message, sender) {
      const messageElement = document.createElement("div");
      messageElement.textContent = message;
      messageElement.style.padding = "5px 10px";
      messageElement.style.margin = "5px";
      messageElement.style.borderRadius = "5px";
      messageElement.style.maxWidth = "80%";
      messageElement.style.wordWrap = "break-word";

      if (sender === "user") {
        messageElement.style.alignSelf = "flex-end";
        messageElement.style.background = "#007bff";
        messageElement.style.color = "white";
      } else {
        messageElement.style.alignSelf = "flex-start";
        messageElement.style.background = "#f1f1f1";
        messageElement.style.color = "black";
      }

      chatbotMessages.appendChild(messageElement);
      chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
  });
</script>



<body id="top"> 


  <!-- 
    - #HEADER
  -->

  <?php 
include"pages/header.php";
include"pages/main.php";
include"pages/footer.php";

?>












  <!-- 
    - #FOOTER
  -->







  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https:
  <script nomodule src="https:

</body>

</html>
