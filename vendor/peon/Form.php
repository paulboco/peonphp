<?php

namespace Peon;

class Form
{
    /**
     * Open A Form
     *
     * @param  string  $uri
     * @param  array  $parameters
     * @param  string  $method
     * @return void
     */
    public static function open($uri, $parameters = array(), $method = 'post')
    {
        $uri .= $parameters ? '/' . implode('/', $parameters) : '';

        echo '<form action="' . $uri . '" method="' . $method . '">';
    }

    /**
     * Select
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  array  $options
     * @return void
     */
    public static function select($label, $name, $value, $options)
    {
        $session = App::getInstance()->make('session');
        $errors = $session->getFlash('errors');
        $hasError = isset($errors[$name]) ? ' has-error' : '';
        $id = 'text-' . $name;
        $help = 'help-' . $id;
        $error = isset($errors[$name]) ? $errors[$name] : '';

        echo '<div class="form-group' . $hasError . '">' . PHP_EOL .
            '    <label class="control-label" for="' . $id . '">' . $label . '</label>' . PHP_EOL .
            '    <select name="rating" class="form-control input-lg" id="' . $id . '" aria-describedby="' . $help . '">' . PHP_EOL;

        foreach ($options as $key => $option) {
            $selected = $value == $option ? ' selected' : '';
            echo '        <option value="' . $option . '"' . $selected . '>' . $key . '</option>' . PHP_EOL;
        }

        echo '    </select>' . PHP_EOL .
            '    <span id="' . $help . '" class="help-block">' . $error . '</span>' . PHP_EOL .
            '</div>' . PHP_EOL;
    }

    /**
     * Text Input
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  boolean  $autofocus
     * @return void
     */
    public static function text($label, $name, $value = null, $autofocus = false, $type = 'text')
    {
        $session = App::getInstance()->make('session');
        $old_input = $session->getFlash('old_input');
        $errors = $session->getFlash('errors');

        $value = isset($old_input[$name]) ? $old_input[$name] : $value;
        $hasError = isset($errors[$name]) ? ' has-error' : '';
        $id = $type . '-' . $name;
        $help = 'help-' . $id;
        $error = isset($errors[$name]) ? $errors[$name] : '';
        $autofocus = $autofocus ? 'autofocus' : '';

        echo '<div class="form-group' . $hasError . '">' . PHP_EOL .
            '    <label class="control-label" for="' . $id . '">' . $label . '</label>' . PHP_EOL .
            '    <input type="' . $type . '" name="' . $name . '" value="' . $value . '" class="form-control input-lg" id="' . $id . '" aria-describedby="' . $help . '"' . $autofocus . '>' . PHP_EOL .
            '    <span id="' . $help . '" class="help-block">' . $error . '</span>' . PHP_EOL .
            '</div>';
    }

    /**
     * Password Input
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  boolean  $autofocus
     * @return void
     */
    public static function password($label, $name, $value = null, $autofocus = false)
    {
        Form::text($label, $name, $value, $autofocus, 'password');
    }

    /**
     * Radio
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  array  $options
     * @return void
     */
    public static function radio($label, $name, $value = null, $options)
    {
        $session = App::getInstance()->make('session');
        $errors = $session->getFlash('errors');

        $hasError = isset($errors[$name]) ? ' has-error' : '';
        $error = isset($errors[$name]) ? $errors[$name] : '';
        $id = 'radio-' . $name;
        $help = 'help-' . $id;

        echo '<div class="form-group' . $hasError . '">' . PHP_EOL .
            '    <label>' . $label . '</label>' . PHP_EOL .
            '    <div class="radio">' . PHP_EOL;

        foreach ($options as $key => $option) {
            $checked = $value == $option ? ' checked' : '';
            echo '        <label>' . PHP_EOL .
                '            <input type="radio" name="' . $name . '" value="' . $option . '"' . $checked . '>' . PHP_EOL .
                '            ' . $key . PHP_EOL .
                '        </label>' . PHP_EOL;
        }

        echo '    </div>' . PHP_EOL .
            '    <span id="' . $help . '" class="help-block">' . $error . '</span>' . PHP_EOL .
            '</div>' . PHP_EOL;
    }
}
