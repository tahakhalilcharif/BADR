<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                                <li class="badr-nav-link nav-link"> <a href="{{ route('home') }}">home </a></li>

                                <li class="badr-nav-link nav-link"> <a href="{{ route('products') }}">Products</a>
                                </li>
                                <li class="badr-nav-link nav-link"> <a href="{{ route('services') }}">services</a></li>
                                <li class="badr-nav-link nav-link">
                                    <form action="/logout" method="POST">
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

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <ul>
                                <li class="badr-nav-link nav-link"> <a href="{{ route('home') }}">home </a></li>

                                <li class="badr-nav-link nav-link"> <a href="{{ route('particuliers') }}">Individuals</a>
                                </li>
                                <li class="badr-nav-link nav-link"> <a href="{{ route('services') }}">
                                    Businesses</a></li>
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

    < <div class='acceuil'>
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
            <div id="chat-container" class="chat-container">
            </div>
            <div class="chat-footer">
                <input type="text" id="user-input" placeholder="Type your message...">
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

    <h1>AAAAAAAAAAAAAAAaa</h1>




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

    <script>
        var openChatButton = document.getElementById("open-chat-button");
        var chatWindow = document.getElementById("chat-window");
        var chatContainer = document.getElementById("chat-container");
        var userInput = document.getElementById("user-input");

        function toggleChat() {
            const chatWindow = document.getElementById('chat-window');
            const isDisplayed = chatWindow.style.display === 'block';

            // Alternance de l'affichage de la fenêtre de discussion
            chatWindow.style.display = isDisplayed ? 'none' : 'block';
        }

        openChatButton.addEventListener("click", function() {
            if (chatWindow.style.display === "none" || chatWindow.style.display === "") {
                chatWindow.style.display = "block";
                displayBotMessage("Hello, I am the BADR Bank assistant. How can I help you today?");
            } else {
                chatWindow.style.display = "none";
            }
        });

        function displayBotMessage(message) {
            var messageElement = document.createElement("div");
            messageElement.classList.add("message");
            messageElement.classList.add("bot-message");
            messageElement.textContent = message;

            chatContainer.appendChild(messageElement);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }   

        function sendMessage() {
            var message = userInput.value;
            userInput.value = "";

            var messageElement = document.createElement("div");
            messageElement.classList.add("message");
            messageElement.classList.add("user-message");
            messageElement.textContent = message;

            chatContainer.appendChild(messageElement);

            chatContainer.scrollTop = chatContainer.scrollHeight;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.length > 0 && response[0].text) {
                            var messageElement = document.createElement("div");
                            messageElement.classList.add("message");
                            messageElement.classList.add("bot-message");
                            messageElement.textContent = response[0].text;

                            chatContainer.appendChild(messageElement);

                            chatContainer.scrollTop = chatContainer.scrollHeight;
                        } else {
                            var messageElement = document.createElement("div");
                            messageElement.classList.add("message");
                            messageElement.classList.add("bot-message");
                            messageElement.textContent = "Sorry, I didn't understand that.";

                            chatContainer.appendChild(messageElement);

                            chatContainer.scrollTop = chatContainer.scrollHeight;
                        }
                    } else {
                        var messageElement = document.createElement("div");
                        messageElement.classList.add("message");
                        messageElement.classList.add("bot-message");
                        messageElement.textContent = "Error: " + xhr.status;

                        chatContainer.appendChild(messageElement);

                        chatContainer.scrollTop = chatContainer.scrollHeight;
                    }
                }
            };

            xhr.open("POST", "http://localhost:5005/webhooks/rest/webhook", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify({
                message: message
            }));
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>
</body>

</html>
