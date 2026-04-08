<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::where('email', 'mhs@test.com')->first();
if ($user) {
    echo "User found: " . $user->name . "\n";
    echo "NIM: " . $user->nim . "\n";
    echo "Roles: " . $user->getRoleNames()->implode(', ') . "\n";
    echo "Email Verified: " . ($user->email_verified_at ? 'YES (' . $user->email_verified_at . ')' : 'NO') . "\n";
    echo "Password Match ('password'): " . (Hash::check('password', $user->password) ? 'YES' : 'NO') . "\n";
} else {
    echo "User NOT found\n";
}
