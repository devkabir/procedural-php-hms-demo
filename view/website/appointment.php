<style type="text/css">
    h1 {
        background-color: antiquewhite;
        margin-bottom: 0.5em;
        padding: 0.5em;
        border-radius: 10px;
    }

    .form-group {
        display: grid;
    }

    label {
        font-weight: bold;
        margin-bottom: 0.5em;
        margin-top: 0.5em;
    }

    input, textarea {
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 0.5em;
    }

    input[type="submit"] {
        background-color: antiquewhite;
        margin-top: 0.5em;
        width: 100%;
        cursor: pointer;
        border: none;
        font-weight: bold;
        font-size: large;
    }
    li{
        color: red;
        list-style: none;
    }
</style>

<h1>Make an appointment</h1>
<?php
if (has_error()){
    foreach ($errors as $error){
        echo '<li>'. implode("\n", $error) . '</li>';
    }
}

?>
<form method="post" >
    <div class="form-group">
        <label for="email">Enter your email</label>

        <input type="email" name="email" id="email" value="<?php echo old('email') ?>">
    </div>
    <div class="form-group">
        <label for="password">Enter your password</label>

        <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="name">Enter your name</label>

        <input type="text" name="name" id="name" value="<?php echo old('name') ?>">
    </div>
    <div class="form-group">
        <label for="date-of-birth">Enter your date of birth </label>

        <input type="date" name="date-of-birth" id="date-of-birth" value="<?php echo old('date-of-birth') ?>">
    </div>
    <div class="form-group">
        <label for="gender">Select your gender</label>
        <label for="male"><input type="radio" name="gender" id="male" value="male" <?php echo old('gender') === 'male' ?  'checked' : null ?>> Male</label>
        <label for="female"><input type="radio" name="gender" id="female" value="female" <?php echo old('gender') === 'female' ?  'checked' : null ?>> Female</label>
    </div>
    <div class="form-group">
        <label for="phone">Enter your phone number</label>

        <input type="tel" name="phone" id="phone" value="<?php echo old('phone') ?>">
    </div>
    <div class="form-group">
        <label for="address">Enter your address</label>

        <textarea name="address"><?php echo old('address') ?></textarea>
    </div>
    <div class="form-group">
        <label for="city">Enter your city</label>

        <input type="text" name="city" id="city" value="<?php echo old('city') ?>"/>
    </div>
    <div class="form-group">
        <label for="state">Enter your state/district</label>

        <input type="text" name="state" id="state" value="<?php echo old('state') ?>"/>
    </div>
    <div class="form-group">
        <label for="division">Enter your division</label>

        <input type="text" name="division" id="division" value="<?php echo old('division') ?>"/>
    </div>
    <div class="form-group">
        <label for="appointment-date">Select your appointment date</label>
        <input type="datetime-local" name="appointment-date" value="<?php echo old('appointment-date') ?>" />
    </div>
    <div class="form-group">
        <label for="appointment-reason">Why you need to see doctor ?</label>
        <textarea name="appointment-reason" id="appointment-reason"><?php echo old('appointment-reason') ?></textarea>
    </div>
    <input type="submit" value="Save">
</form>