document.querySelector('.dropdown-button').addEventListener('click', toggleDropdownMenu);
document.getElementById('loginButton').addEventListener('click', toggleLoginMenu);

function toggleDropdownMenu() {
    document.querySelector('.dropdown-menu').classList.toggle('show');
  }


function toggleLoginMenu() {
  document.querySelector('.login').classList.toggle('show');
}


