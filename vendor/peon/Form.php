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
    public static function open($uri, $parameters, $method = 'post')
    {
        $uri .= '/' . implode('/', $parameters);
        echo '<form action="' . $uri . '" method="' . $method .'">';
    }

    /**
     * Text Input
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  array  $errors
     * @return void
     */
    public static function text($label, $name, $value, $errors)
    {
        $old_input = App::getInstance()->make('session')->get('old_input');

        $value = isset($errors[$name]) ? $old_input[$name] : $value;
        $hasError = isset($errors[$name]) ? ' has-error' : '';
        $id = 'text-' . $name;
        $help = 'help-' . $id;
        $error = isset($errors[$name]) ? $errors[$name] : '';

        echo '<div class="form-group' . $hasError . '">' .
             '    <label class="control-label" for="' . $id . '">' . $label . '</label>' .
             '    <input type="text" name="' . $name . '" value="' . $value . '" class="form-control" id="' . $id . '" aria-describedby="' . $help . '">' .
             '    <span id="' . $help . '" class="help-block">' . $error . '</span>' .
             '</div>';
    }

    /**
     * Select
     *
     * @param  string  $label
     * @param  string  $name
     * @param  mixed  $value
     * @param  array  $options
     * @param  array  errors
     * @return void
     */
    public static function select($label, $name, $value, $options, $errors)
    {
        $hasError = isset($errors[$name]) ? ' has-error' : '';
        $id = 'text-' . $name;
        $help = 'help-' . $id;

        echo '<div class="form-group' . $hasError . '">' . PHP_EOL .
             '    <label class="control-label" for="' . $id . '">' . $label . '</label>' . PHP_EOL .
             '    <select name="rating" class="form-control" id="' . $id . '" aria-describedby="' . $help . '">' . PHP_EOL;

        foreach ($options as $key => $option) {
            $selected = $value == $option ? ' selected' : '';
            echo '        <option value="'. $option . '"' . $selected . '>' . $key . '</option>' . PHP_EOL;
        }

        echo '    </select>' . PHP_EOL .
             '    <span id="' . $help . '" class="help-block">' . $error . '</span>' . PHP_EOL .
             '</div>' . PHP_EOL;
    }
}
