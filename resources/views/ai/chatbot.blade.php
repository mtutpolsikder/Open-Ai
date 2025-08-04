<!-- Simple AI Chatbot UI -->
<div id="ai-chatbot">
    <h5>AI Chatbot</h5>
    <div id="chat-window"></div>
    <input type="text" id="chat-input" placeholder="Ask something...">
    <button onclick="sendAiMessage()">Send</button>
</div>
<script>
function sendAiMessage() {
    let msg = document.getElementById('chat-input').value;
    let chatWindow = document.getElementById('chat-window');
    chatWindow.innerHTML += "<div><b>You:</b> " + msg + "</div>";
    fetch('/ai/chat', {
        method: 'POST',
        body: JSON.stringify({messages: [{role: 'user', content: msg}]}),
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
    }).then(r=>r.json()).then(res => {
        let ans = res.choices?.[0]?.message?.content || 'Error';
        chatWindow.innerHTML += "<div><b>AI:</b> " + ans + "</div>";
    });
}
</script>