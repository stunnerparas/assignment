<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Simple Form</h2>
        <form method="POST" action="{{ route('store') }}" id="myForm" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <span class="error" id="nameError"></span>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span class="error" id="emailError"></span>
    </div>

    <div class="form-group">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea>
        <span class="error" id="messageError"></span>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
    </div>

    <button type="submit" class="submit-btn">Submit</button>
</form>
    </div>

    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(event) {
                event.preventDefault();

                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var message = $('#message').val().trim();

                var nameError = $('#nameError');
                var emailError = $('#emailError');
                var messageError = $('#messageError');

                // Clear any previous error messages
                nameError.text('');
                emailError.text('');
                messageError.text('');

                // Validate name field
                if (name === '') {
                    nameError.text('Please enter your name.');
                    return;
                }

                // Validate email field
                if (email === '') {
                    emailError.text('Please enter your email address.');
                    return;
                } else if (!validateEmail(email)) {
                    emailError.text('Please enter a valid email address.');
                    return;
                }

                // Validate message field
                if (message === '') {
                    messageError.text('Please enter a message.');
                    return;
                }

                // If all validations pass, submit the form
                this.submit();
            });

            // Email validation helper function
            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }
        });
    </script>
</body>
</html>