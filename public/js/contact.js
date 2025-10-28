$(function() {
  var form = $('#ajax_form');
  var formMessages = $('#form-messages');

  function validateEmail(v){ return /[^\s@]+@[^\s@]+\.[^\s@]+/.test(v); }

  $(form).on('submit', function(event) {
    event.preventDefault();

    var name = $('#name').val().trim();
    var email = $('#email').val().trim();
    var message = $('#message').val().trim();

    $(formMessages).removeClass('alert-success alert-danger');

    if (!name || !email || !message) {
      $(formMessages).addClass('alert-danger').text('Please fill name, email, and message.');
      return;
    }
    if (!validateEmail(email)) {
      $(formMessages).addClass('alert-danger').text('Please enter a valid email.');
      return;
    }

    try {
      var existing = [];
      try { existing = JSON.parse(localStorage.getItem('customers')) || []; } catch(e) { existing = []; }
      var item = { id: (crypto && crypto.randomUUID ? crypto.randomUUID() : String(Date.now())), name: name, email: email, message: message, createdAt: Date.now() };
      existing.unshift(item);
      localStorage.setItem('customers', JSON.stringify(existing));

      $(formMessages).addClass('alert-success').text('Thank you! Your message has been received.');
      $('#name').val('');
      $('#email').val('');
      $('#message').val('');
    } catch (e) {
      $(formMessages).addClass('alert-danger').text('Oops! Could not save your message locally.');
    }
  });
});