<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ParametrosGlobais;
use Illuminate\Support\Facades\Log;

class ValidaParametroGlobalUnico implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parametrosGlobais = new ParametrosGlobais();

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
        return ParametrosGlobais::verificaSeExisteCodigo($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este código já existe no sistema.';
    }
}
