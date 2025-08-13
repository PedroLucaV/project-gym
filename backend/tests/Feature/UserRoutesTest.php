<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should register successfully members', function() {
    $payload = [
        'name' => 'Membro 1',
        'cpf' => '123.456.789-10',
        'phone'=> '5582912345678',
        'address'=> '12 Avenue',
        'birthdate' => '2000-01-01',
        'enrollment_date' => '2020-12-08',
        'contract_plan' => 'plus',
    ];

    $response = $this->postJson('/api/user/member/register', $payload);

    $response->assertStatus(201);
});