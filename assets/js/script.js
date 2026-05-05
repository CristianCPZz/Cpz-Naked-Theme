document.addEventListener('DOMContentLoaded', function() {
  var toggle = document.querySelector('.menu-toggle');
  var menu = document.getElementById('cpz-main-menu');
  var nav = menu ? menu.closest('.main-navigation') : null;
  if (toggle && nav && menu) {
    toggle.addEventListener('click', function() {
      var expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', !expanded);
      nav.classList.toggle('menu-open');
      nav.setAttribute('data-menu-open', !expanded);
    });
  }
});
