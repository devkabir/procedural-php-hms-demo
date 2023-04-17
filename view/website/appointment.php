<h1>Make an appointment</h1>
<form method="post">
    <?php
    if (has_success()) {
        show_success_message();
    }
    text_input('name', 'Enter your name');
    tel_input('phone', 'Enter your phone number');
    password_input('password', 'Enter your password');
    password_input('confirm-password', 'Confirm your password');
    date_time_input('appointment-date', 'Select your appointment date');
    textarea_input('appointment-reason', 'Why do you need this appointment');
    ?>
    <input type="submit" value="Save">
</form>
