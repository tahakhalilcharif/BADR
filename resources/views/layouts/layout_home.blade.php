<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
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
                    <li class="nav-list-item" > <a href="{{ route('home') }}"></a>Accueil</li>
                    <li class="nav-list-item" > <a href="{{ route('qui-sommes-nous') }}"></a>Qui sommes nous ?</li>
                    <li class="nav-list-item" > <a href="{{ route('particuliers') }}"></a>Particuliers</li>
                    <li class="nav-list-item" > <a href="{{ route('services') }}"></a>Services</li>
                    <li class="nav-list-item" > <a href="{{ route('banque-en-ligne') }}"></a>Banque en ligne</li>
                </ul>
            </nav>
        </header>
    @endauth
    
    <div class="container">
        @yield('content')
        <button id="chat-button" class="floating-button">
            <img src="{{ asset('images/chat.png') }}" alt="Chat" width="60px" height="60px">
        </button>
        
        <div id="chat-window" class="chat-window">
            <div class="chat-header">
                <h3>Chat</h3>
                <p>Powered by GPT-2</p>
                <button id="chat-close-button" class="chat-close-button">
                    <img src="{{ asset('images/close.png') }}" alt="Close" width="20px" height="20px">
                </button>
            </div>
            <div class="chat-messages">
                <!-- Chat messages will be added here -->
            </div>
            <div class="chat-input">
                <input type="text" id="chat-input-field" placeholder="Type your message here...">
                <button id="chat-send-button" class="chat-send-button">Send</button>
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
        document.getElementById('chat-button').addEventListener('click', function() {
            document.getElementById('chat-window').style.display = 'block';
        });
    
        document.getElementById('chat-close-button').addEventListener('click', function() {
            document.getElementById('chat-window').style.display = 'none';
        });
    </script>
    <script>
        const chatWindow = document.querySelector('#chat-window');
        const chatMessages = document.querySelector('.chat-messages');
        const chatInputField = document.querySelector('#chat-input-field');
        const chatSendButton = document.querySelector('.chat-send-button');
    
        chatSendButton.addEventListener('click', async function() {
            const message = chatInputField.value.trim();
    
            if (message) {
                addChatMessage('user', message);
                const token = document.querySelector('#chat-token').value;
                const formData = new FormData();
                formData.append('message', message);
                
                const response = await fetch({{route('send_message')}}, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ message })
                });
    
                if (response.ok) {
                    // Get the chatbot's response from the backend
                    const responseData = await response.json();
                    const responseText = responseData.response;
    
                    addChatMessage('bot', responseText);
                } else {
                    addChatMessage('bot', 'An error occurred. Please try again later.');
                }
    
                chatInputField.value = '';
            }
        });
    
        function addChatMessage(sender, message) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('chat-message');
            messageDiv.classList.add(sender);
    
            const messageSpan = document.createElement('span');
            messageSpan.textContent = message;
    
            messageDiv.appendChild(messageSpan);
            chatMessages.appendChild(messageDiv);
    
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    
        // Show/hide the chat window
        const chatButton = document.querySelector('#chat-button');
        const chatCloseButton = document.querySelector('#chat-close-button');
    
        chatButton.addEventListener('click', function() {
            chatWindow.style.display = 'block';
        });
    
        chatCloseButton.addEventListener('click', function() {
            chatWindow.style.display = 'none';
        });
    </script>
    
</body>
</html>
