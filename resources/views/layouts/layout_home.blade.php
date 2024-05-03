<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

</head>
<body>
    @auth
        <header>
            <nav class="nav">
                <ul>
                    <li class="nav-list-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="nav-list-item"><a href="{{ route('products') }}">Products</a></li>
                    <li class="nav-list-item"><a href="{{ route('services') }}">Services</a></li>
                    <li class="nav-list-item"><a href="{{ route('compte.info_client') }}">My Information</a></li>
                    <li class="nav-list-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button >Log out</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    @else
        <header>
            <nav class="nav">
                <ul>
                    <li class="nav-list-item" > <a href="{{ route('home') }}">Accueil</a></li>
                    <li class="nav-list-item" > <a href="{{ route('qui-sommes-nous') }}">Qui sommes nous ?</a></li>
                    <li class="nav-list-item" > <a href="{{ route('particuliers') }}">Particuliers</a></li>
                    <li class="nav-list-item" > <a href="{{ route('services') }}">Services</a></li>
                    <li class="nav-list-item" >
                        <form action="/login" method="POST">
                            @csrf
                            <button><a href="/login">Log in</a></button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    @endauth
    
    <div class="container">
        @yield('content')

        <button id="open-chat-button">Open Chat</button>
        <div id="chat-window">
            <h3>Rasa Chatbot</h3>
            <div id="chat-container"></div>
            <input type="text" id="user-input" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>


    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Banque de l'agriculture et du développement rural</h3>
                <p>
                    بنط الفلاحة و التنمية الريفية<br>
                    Abonnez-vous pour recevoir nos nouvelles<br>
                    Votre Mail<br>
                    OK
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
            xhr.onreadystatechange = function () {
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
            xhr.send(JSON.stringify({ message: message }));
        }
    </script>
    
    @yield('scripts')
    
</body>
</html>
