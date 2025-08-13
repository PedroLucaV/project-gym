<?php

use Illuminate\Support\Facades\Validator;
use App\Rules\Cpf;

uses(\Tests\TestCase::class);

test('invalid CPF fails', function () {
    $validator = Validator::make(
        ['cpf' => '123.456.789-10'],
        ['cpf' => [new Cpf()]]
    );

    expect($validator->passes())->toBeFalse();
});