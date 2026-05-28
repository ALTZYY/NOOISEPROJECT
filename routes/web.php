<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});



// Dynamic product description route consolidation below

// Dynamic payment route defined below

Route::get('/keranjang', [\App\Http\Controllers\CartController::class, 'index'])->name('halaman.about');

Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update-quantity', [\App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.update');


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('halaman.home');

Route::get('/login', function () {
    return view('login'); // Ini akan memanggil file about.blade.php
})->name('halaman.login');

Route::get('/register', function () {
    return view('register'); // Ini akan memanggil file about.blade.php
})->name('halaman.register');

Route::get('/pay', function (\Illuminate\Http\Request $request) {
    $userEmail = $request->session()->get('user_email');
    if (!$userEmail) {
        return redirect('/login');
    }

    $user = \App\Models\User::where('email', $userEmail)->firstOrFail();

    $carts = \App\Models\Cart::with('product')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'asc')
        ->get();

    return view('payment', compact('carts'));
})->name('halaman.payment');

Route::get('/des/{id}', function (\Illuminate\Http\Request $request, $id) {
    $userEmail = $request->session()->get('user_email');
    $cartCount = 0;
    if ($userEmail) {
        $user = \App\Models\User::where('email', $userEmail)->first();
        if ($user) {
            $cartCount = \App\Models\Cart::where('user_id', $user->id)->sum('quantity');
        }
    }
    $product = \App\Models\Product::findOrFail($id);
    return view('deskripsi', compact('product', 'cartCount'));
})->name('halaman.deskripsi');




Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register.post');

Route::post('/pay/checkout', [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('payment.checkout');
Route::post('/pay/success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
Route::post('/api/midtrans/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])->name('payment.callback');


// ==========================================
// RUTE KHUSUS ADMIN (Dilindungi Middleware 'is_admin')
// ==========================================
Route::middleware(['is_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin'); // Memanggil view admin.blade.php Anda
    })->name('admin.dashboard');
});

// Temporary route to seed the admin account easily via browser
Route::get('/seed-admin', function () {
    $admin = \App\Models\User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Administrator Nooise',
            'phone_number' => '+628123456789',
            'password' => \Illuminate\Support\Facades\Hash::make('admin1234'),
            'role' => 'admin',
        ]
    );

    return 'Akun Admin berhasil dibuat!<br>Email: <b>admin@gmail.com</b><br>Password: <b>admin1234</b><br><br><a href="/login">Kembali ke halaman Login</a>';
});




