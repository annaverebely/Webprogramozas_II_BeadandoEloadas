<?php

// A Laravel beépített validációs szabályainak magyar üzenetei (a bejelentkezéshez és a regisztrációhoz).
// Ahol a Controller saját üzenetet ad meg (pl. CRUD, Kapcsolat), az felülírja ezeket.
return [
    'required' => 'A(z) :attribute megadása kötelező.',
    'string' => 'A(z) :attribute szöveg legyen.',
    'email' => 'Érvényes e-mail címet adjon meg.',
    'lowercase' => 'A(z) :attribute csak kisbetűket tartalmazhat.',
    'unique' => 'Ezzel a(z) :attribute címmel már regisztráltak.',
    'confirmed' => 'A két jelszó nem egyezik.',
    'integer' => 'A(z) :attribute egész szám legyen.',
    'exists' => 'A kiválasztott :attribute nem létezik.',
    'max' => [
        'string' => 'A(z) :attribute legfeljebb :max karakter lehet.',
        'numeric' => 'A(z) :attribute legfeljebb :max lehet.',
    ],
    'min' => [
        'string' => 'A(z) :attribute legalább :min karakter legyen.',
        'numeric' => 'A(z) :attribute legalább :min legyen.',
    ],

    'attributes' => [
        'name' => 'név',
        'email' => 'e-mail',
        'password' => 'jelszó',
    ],
];
