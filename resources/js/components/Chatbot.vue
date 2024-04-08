<template>
  <div>
    <!-- Floating button -->
    <button class="chatbot-button" @click="toggleChatbot">Chat</button>

    <!-- Chatbot interface -->
    <div v-if="showChatbot" class="chatbot-interface">
      <!-- Chat messages -->
      <div v-for="message in messages" :key="message.id" class="message">{{ message.text }}</div>

      <!-- Input field -->
      <input type="text" v-model="inputText" @keyup.enter="sendMessage" placeholder="Type your message...">
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showChatbot: false,
      inputText: '',
      messages: []
    };
  },
  methods: {
    toggleChatbot() {
      this.showChatbot = !this.showChatbot;
    },
    sendMessage() {
      const message = { text: this.inputText, id: this.messages.length + 1 };
      this.messages.push(message);
      // Send message to backend API and fetch response
      // Update this.messages with response from backend
      this.inputText = '';
    }
  }
};
</script>

<style scoped>
/* Styling for chatbot button, interface, and messages */
</style>
