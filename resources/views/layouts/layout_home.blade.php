<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-..." crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('head')

</head>

<body>
    @auth
        <header>

            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">

                        <img src="{{ asset('images/logobadr.png') }}" alt="BADR BANQUE">

                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <ul>
                                <li class="badr-nav-link nav-link"> <a href="{{ route('home') }}">Home </a></li>
                                <li class="badr-nav-link nav-link"> <a href="{{ route('compte.info_client') }}">Information</a>
                                </li>

                                <li class="badr-nav-link nav-link">
                                    <form action="/logout" method="GET">
                                        @csrf
                                        <a href="/logout">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

        </header>
    @else
    <header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logobadr.png') }}" alt="BADR BANQUE">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <ul>
                            <li class="badr-nav-link nav-link"><a href="{{ route('home') }}">Home</a></li>
                            <li class="badr-nav-link nav-link"><a href="{{ route('qui-sommes-nous') }}">About us</a></li>

                            <!-- Menu déroulant sur "Individuals" -->
                            <li class="badr-nav-link nav-link dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Individuals
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('particuliers_compte') }}">Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('particuliers_carte') }}">Card</a></li>
                                </ul>
                            </li>
                            <!-- Autres éléments de menu -->
                            <li class="badr-nav-link nav-link dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Businesses
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('entreprises_compte') }}">Account</a></li>
                                    <li><a class="dropdown-item" href="{{ route('entreprises_carte') }}">Card</a></li>
                                </ul>
                            </li>
                            <li class="badr-nav-link nav-link">
                                <form action="/login" method="POST">
                                    @csrf
                                    <a href="/login">Log in</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    @endauth

    <div class='acceuil'>
        @auth
            @yield('content')
        @else
            @yield('content-public')
        @endauth

        <button id="open-chat-button">Open Chat</button>
        <div id="chat-window" class="chat-window">
            <div class="chat-header">
                <h3>Chatbot</h3>
                <button onclick="toggleChat()" class="close-chat-button">×</button>
            </div>
            <div id="chat-container" class="chat-container"></div>
            <div class="chat-footer">
                <input type="text" id="user-input" placeholder="Type your message...">
                <button id="send-button">Send</button>
            </div>
        </div>



    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Banque de l'agriculture et du développement rural</h3>
                <p>
                    بنط الفلاحة و التنمية الريفية<br>
                    Abonnez-vous pour recevoir nos nouvelles<br>
                    <br>

                </p>
            </div>
            <div class="footer-section">
                <h3>Conditions de banque</h3>
                <ul>
                    <li><a href="#">Pour particuliers</a></li>
                    <li><a href="#">Pour entreprises</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <ul>
                    <li><a href="mailto:contact@badr.dz">E-Mail: contact@badr.dz</a></li>
                    <li>Adresse: Siège social 17, Bd Colonel Amirouche, B.P 484, Alger.</li>
                    <li>Call centrer: +213 (0)21 989 323</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Copyrights BADR BANK by Digital Ways</p>
        </div>
    </footer>

    <input type="hidden" id="auth-token" value="{{ session('token') }}">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var openChatButton = document.getElementById("open-chat-button");
            var chatWindow = document.getElementById("chat-window");
            var chatContainer = document.getElementById("chat-container");
            var userInput = document.getElementById("user-input");
            var sendButton = document.getElementById("send-button");
            var closeChatButton = document.querySelector(".close-chat-button");
            var welcomeMessageDisplayed = false;

            openChatButton.addEventListener("click", function() {
                toggleChatWindow();
            });

            closeChatButton.addEventListener("click", function() {
                toggleChatWindow();
            });

            sendButton.addEventListener("click", function() {
                sendMessage();
            });

            function toggleChatWindow() {
                if (chatWindow.style.display === "none" || chatWindow.style.display === "") {
                    chatWindow.style.display = "flex";
                    if (!welcomeMessageDisplayed) {
                        displayBotMessage("Hello, I am the BADR Bank assistant. How can I help you today?");
                        welcomeMessageDisplayed = true;
                    }
                } else {
                    chatWindow.style.display = "none";
                }
            }

            function displayBotMessage(message) {
                var messageElement = document.createElement("div");
                messageElement.classList.add("message", "bot-message");

                var icon = document.createElement("img");
                icon.src = "{{ asset('images/bot.png') }}"; // Replace with the path to your bot icon
                icon.classList.add("message-icon");

                var text = document.createElement("span");
                text.textContent = message;

                messageElement.appendChild(icon);
                messageElement.appendChild(text);

                chatContainer.appendChild(messageElement);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            function sendMessage() {
                var message = userInput.value;
                if (message.trim() === "") return;
                userInput.value = "";

                var userMessageElement = document.createElement("div");
                userMessageElement.classList.add("message", "user-message");

                var icon = document.createElement("img");
                icon.src = "{{ asset('images/user.png') }}"; // Replace with the path to your user icon
                icon.classList.add("message-icon");

                var text = document.createElement("span");
                text.textContent = message;

                userMessageElement.appendChild(icon);
                userMessageElement.appendChild(text);

                chatContainer.appendChild(userMessageElement);
                chatContainer.scrollTop = chatContainer.scrollHeight;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            var botMessage = response.length > 0 && response[0].text ? response[0].text : "Sorry, I didn't understand that.";
                            displayBotMessage(botMessage);
                        } else {
                            displayBotMessage("Error: " + xhr.status);
                        }
                    }
                };

                var token = "{{ $token }}";

                xhr.open("POST", "http://localhost:5005/webhooks/rest/webhook", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader("Authorization", "Bearer " + token);
                xhr.send(JSON.stringify({
                    message: message,
                    metadata: {
                        authorization: token
                    }
                }));
            }
        });
    </script>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz2FnmKTE8rHmK9l1Y6GoD5CW5vg5oF2FIaB9ZtKZX5WWVk5yTOeFfI6U3" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-bs8y4MefMRD3XJ6BKUTYjjl0pfTdbef/I5OfK0I13kL/TCwIp4j/iCb51PxlIjF7" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>

        @yield('scripts')
</body>

</html>
