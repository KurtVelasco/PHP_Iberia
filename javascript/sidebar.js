
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
        setTimeout(backspace, speed / 2);
      }
    }

    function backspace() {
      if (i > 0) {
        element.textContent = currentText.substring(0, i - 1);
        i--;
        setTimeout(backspace, speed / 2);
      } else {
        currentIndex = (currentIndex + 1) % textArray.length;
        currentText = textArray[currentIndex];
        setTimeout(type, speed);
      }
    }
    type();
  }

  const MORSE_CODE = ['. --. --- .. ... - --..--', '-... . - .-. .- -.-- . .-.', '.--. .. --- -. . . .-.'];
  const MESSAGE_DAY = ['JUST USE SURTR', 'PLEASE DONT USE THE PARTICLE ACCELERATOR FOR LAUNCHING ORANGES', 'ORIGINIUM BATTERIES CAUSES ROCK CANCER MORE AT 12'];
  const typingSpeed = 100;

  const typingSpan1 = document.getElementById('messageDay');
  const typingSpan2 = document.getElementById('sideText');
  typeAndBackspace(MESSAGE_DAY, typingSpan1, typingSpeed);
  typeAndBackspace(MORSE_CODE, typingSpan2, typingSpeed);