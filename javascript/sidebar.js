const textsToType = ['. --. --- .. ... - --..--', '-... . - .-. .- -.-- . .-.', '.--. .. --- -. . . .-.'];
const typingSpeed = 150;

function typeAndBackspace(textArray, element, speed) {
    let currentIndex = 0;
    let currentText = textArray[currentIndex];
    let i = 0;

    function type() {
      if (i < currentText.length) {
        element.textContent += currentText.charAt(i);
        i++;
        setTimeout(type, speed);
      } else {
        setTimeout(backspace, speed * 2);
      }
    }

    function backspace() {
      if (i > 0) {
        element.textContent = currentText.substring(0, i - 1);
        i--;
        setTimeout(backspace, speed);
      } else {
        currentIndex = (currentIndex + 1) % textArray.length;
        currentText = textArray[currentIndex];
        setTimeout(type, speed);
      }
    }
    type();
  }
  const typingSpan = document.getElementById('typingSpan');
  typeAndBackspace(textsToType, typingSpan, typingSpeed);