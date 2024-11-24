// A simple chatbot that responds with some predefined answers
 function chatbot(input) {
  let output = "";
  input = input.toLowerCase();
  if (input.includes("hello") || input.includes("hi")) {
    output = "Hello, how may I help you?";
  } else if (input.includes("help me to report") ||input.includes("report")) {
    output = "To report someone please go to the "+"Report".link("http://localhost/arp/report.php")
  } else if (input.includes("helpline number") ||input.includes("helpline")) {
    output = "Our helpline number is : "+"<a href='tel:9855213456'>" + "9855213456" + "</a>";
  } else if (input.includes("how to register?")||input.includes("sign up")) {
    output = "To sign up please click on "+ "Sign Up".link("http://localhost/arp/login.php");
  } else if (input.includes("how to Log In?")||input.includes("log in")) {
    output = "To log in please click on "+ "Log In".link("http://localhost/arp/login.php");
  }
  else if (input.includes("what to do when i face ragging?")) {

    output = "Please report when you are facing ragging. You can report by clicking on "+"report".link("http://localhost/arp/report.php")+". To report verbally please call on this number "+"<a href='tel:9855213456'>" + "9855213456" + "</a>";
  }
  else {
    output = "Sorry, I don't understand that. Please try something else.";
  }
  return output;
}

  // Display the user message on the chat
  function displayUserMessage(message) {
    let chat = document.getElementById("chat");
    let userMessage = document.createElement("div");
    userMessage.classList.add("message");
    userMessage.classList.add("user");
    let userAvatar = document.createElement("div");
    userAvatar.classList.add("avatar");
    let userText = document.createElement("div");
    userText.classList.add("text");
    userText.innerHTML = message;
    userMessage.appendChild(userAvatar);
    userMessage.appendChild(userText);
    chat.appendChild(userMessage);
    chat.scrollTop = chat.scrollHeight;
  }

  // Display the bot message on the chat
  function displayBotMessage(message) {
    let chat = document.getElementById("chat");
    let botMessage = document.createElement("div");
    botMessage.classList.add("message");
    botMessage.classList.add("bot");
    let botAvatar = document.createElement("div");
    botAvatar.classList.add("avatar");
    let botText = document.createElement("div");
    botText.classList.add("text");
    botText.innerHTML = message;
    botMessage.appendChild(botAvatar);
    botMessage.appendChild(botText);
    chat.appendChild(botMessage);
    chat.scrollTop = chat.scrollHeight;
  }

  // Send the user message and get the bot response
  function sendMessage() {
    let input = document.getElementById("input").value;
    if (input) {
      displayUserMessage(input);
      let output = chatbot(input);
      setTimeout(function() {
        displayBotMessage(output);
      }, 1000);
      document.getElementById("input").value = "";
    }
  }

  // Add a click event listener to the button
  document.getElementById("button").addEventListener("click", sendMessage);

  // Add a keypress event listener to the input
  document.getElementById("input").addEventListener("keypress", function(event) {
    if (event.keyCode == 13) {
      sendMessage();
    }
  });