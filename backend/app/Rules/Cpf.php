<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    private function calculateDigit($prim, $j)
    {
        $valid = 0;
        for ($i = 0; $i < count($prim); $i++) {
            $prim[$i] = intval($prim[$i]) * $j;
            $j--;
            $valid += $prim[$i];
        }
        return $valid = $valid % 11 < 2 ? 0 : 11 - $valid % 11;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = preg_replace('/\D/', '', $value);

        if (strlen($cpf) !== 11) {
            $fail("The field $attribute isn't a valid cpf");
            return;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $fail("The field $attribute isn't a valid cpf");
            return;
        }
        
        $fir = substr($cpf, 0, 9);
        $fir = str_split($fir);
        $pen = $cpf[9];
        $las = $cpf[10];

        if ($pen != $this->calculateDigit($fir, 10)) {
            $fail("The field $attribute isn't a valid cpf");
            return;
        }

        array_push($fir, $pen);

        if ($las != $this->calculateDigit($fir, 11)) {
            $fail("The field $attribute isn't a valid cpf");
            return;
        }
    }
}
