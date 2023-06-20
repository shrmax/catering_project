$(document).ready(function() {
    // Attach an AJAX event listener to the change event of the radio button group.
    $('#color').on('change', function() {
      // Get the value of the selected radio button.
      var color = this.value;
      // Send the value of the selected radio button to the server.
      $.ajax({
        url: 'items.php',
        type: 'POST',
        data: { color: color },
        success: function(response) {
          // Do something with the response from the server.
        }
      });
    });
  });
