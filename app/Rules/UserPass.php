<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserPass implements Rule
{
    private $usuario;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($usuario)
    {
        $this->usuario = $usuario;
        echo $this->usuario;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $password = $value;
        $user = $this->usuario;
        $pattern = "/$user/i";
        return preg_match($pattern, $password, $matches, PREG_OFFSET_CAPTURE);
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La :attribute no debe contener el nombre de usuario';
    }
}
