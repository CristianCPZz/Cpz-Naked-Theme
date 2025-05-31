document.addEventListener('DOMContentLoaded', function() {
  var toggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('nav[role="navigation"]');
  var menu = document.getElementById('cpz-main-menu');
  if (toggle && nav && menu) {
    toggle.addEventListener('click', function() {
      var expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', !expanded);
      nav.classList.toggle('menu-open');
      nav.setAttribute('data-menu-open', !expanded);
    });
  }
});
