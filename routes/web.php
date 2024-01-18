<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Inertia\Inertia;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login', [LoginController::class, 'create'])->name('login');

Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function (){
Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {
    // sleep(2);
    return Inertia::render('Users/Index', [
        'users' => User::query()->where('id','!=', Auth::user()->id)
        ->when(Request::input('search'), function ($query, $search){
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(5)
        ->withQueryString()
        ->through(fn($user) => [
            'id'=>$user->id,
            'name'=>$user->name,
            'can'=>[
                'edit'=>Auth::user()->can('edit',$user)
            ]
        ]),
        'filters'=> Request::only(['search']),
        'can'=> [
            'createUser' => Auth::user()->can('create', User::class)
        ]

        ]);
});


Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
})->middleware('can:create,App\Models\User'); //lower version of laravel: middleware('can:create,App\Models\User') ->can('can:create,App\Models\User')

Route::get('/users/edit/{id}', function ($id) {
    return Inertia::render('Users/Update',[
        'userdata'=> User::find($id)
    ]);
});

Route::post('/profile/saveChanges/{id}', function($id){
    $hashedPassword = User::find($id)->password;
    if (Hash::check(Request::input('old_password'), $hashedPassword)) {
        $attributes = [
            'password'=> Hash::make(Request::input('new_password'))
        ];
        $notification = array(
            'message' => 'Successfully Done password',
            'type' => 'success'
        );
        User::query()->where('id', $id)->update($attributes);
        return redirect()->intended('/')->with('toast', $notification);
        }
        $notification = array(
            'message' => 'Old password does not match',
            'type' => 'warning'
        );

        return redirect('/profile')->with('toast', $notification);
});

Route::post('/users/saveChanges/{id}', function($id){
    $attributes = Request::validate([
        'name'=>'required',
        'email'=> ['required','email'],
    ]);
    $notification = array(
        'message' => 'Successfully Done',
        'type' => 'success'
    );

    User::query()->where('id', $id)->update($attributes);
    return redirect('/users')->with('toast', $notification);
});

Route::post('/users', function () {
    $attributes = Request::validate([
        'name'=>'required',
        'email'=> ['required','email'],
        'password'=>'required'
    ]);
    

    User::create($attributes);
    $notification = array(
        'message' => 'Successfully Done',
        'type' => 'success'
    );
    return redirect('/users')->with('toast', $notification);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::get('/profile', function () {
    return Inertia::render('Profile', [
        'userID'=> Auth::user()->id
    ]);
});





});