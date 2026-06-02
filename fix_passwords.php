<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;

foreach (User::all() as $user) {
    $user->password = 'password';
    $user->save();
}

echo "Comptes de test: mot de passe = password\n";
