document.querySelector('.dropdown-button').addEventListener('click', toggleDropdownMenu);
document.querySelector('.login-button').addEventListener('click', toggleLoginMenu);


function toggleDropdownMenu() {
    document.querySelector('.dropdown-menu').classList.toggle('show');
  }


function toggleLoginMenu() {
  document.querySelector('.login').classList.toggle('show');
}



