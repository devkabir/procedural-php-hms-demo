<?php

/**
 * This function outputs a text input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function text_input(string $name, string $label)
{
    echo input('text', $name, $label);
}

/**
 * This function outputs a email input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function email_input(string $name, string $label)
{
    echo input('email', $name, $label);
}

/**
 * This function outputs a password input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function password_input(string $name, string $label)
{
    echo input('password', $name, $label);
}


/**
 * This function outputs a date input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function date_input(string $name, string $label)
{
    echo input('date', $name, $label);
}

/**
 * This function outputs a radio input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function radio_input(string $name, string $label, array $options = array())
{
    echo sprintf('<div class="form-group"> <label for="%s">%s</label>', $name, $label);
    foreach ($options as $option) {
        $checked = old($name) === $option ? 'checked' : null;
        echo '<label for="' . $option . '"><input type="radio" name="' . $name . '" id="' . $option . '" value="' . $option . '" ' . $checked . ' /> ' . ucfirst($option) . '</label>';
    }
    echo show_form_error_message($name);
    echo '</div>';
}

/**
 * This function outputs a date time input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function date_time_input(string $name, string $label)
{
    echo input('datetime-local', $name, $label);
}

/**
 * This function outputs a telephone input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function tel_input(string $name, string $label)
{
    echo input('tel', $name, $label);
}

/**
 * This function outputs a textarea input with the given name and label.
 *
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function textarea_input(string $name, string $label)
{
    echo '<div class="form-group"><label for="' . $name . '">' . $label . '</label><textarea name="' . $name . '">' . old('address') . '</textarea>' . show_form_error_message($name) . '</div>';

}

/**
 * It returns a string containing a form input element
 *
 * @param string $type  The type of input you want to create.
 * @param string $name  The name of the input field.
 * @param string $label The label for the input
 *
 * @return string A string of a new input field
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function input(string $type, string $name, string $label): string
{
    return sprintf('<div class="form-group"><label for="%s">%s</label><input type="%s" name="%s" id="%s" value="%s" />%s</div>', $name, $label, $type, $name, $name, old($name), show_form_error_message($name));
}

