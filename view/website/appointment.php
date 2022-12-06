<h1>Make an appointment</h1>
<form method="post">
    <?php
    if (has_success()) {
        show_success_message();
    }
    email_input('email', 'Enter your email');
    password_input('password', 'Enter your password');
    password_input('confirm-password', 'Confirm your password');
    text_input('name', 'Enter your name');
    date_input('date-of-birth', 'Enter your date of birth');
    radio_input('gender', 'Select your gender', ['male', 'female']);
    tel_input('phone', 'Enter your phone number');
    textarea_input('address', 'Enter your address');
    text_input('city', 'Enter your city');
    text_input('division', 'Enter your state/district');
    text_input('division', 'Enter your division');
    date_time_input('appointment-date', 'Select your appointment date');
    textarea_input('appointment-reason', 'Why do you need this appointment');
    ?>
    <input type="submit" value="Save">
</form>