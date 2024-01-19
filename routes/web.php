<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Announcements;
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
    $total = User::query()->select(User::raw('COUNT(*) as cnt'))->where('id','!=', Auth::user()->id)->whereYear('created_at', '2024')->get();
    $total2 = Announcements::query()->select(Announcements::raw('COUNT(*) as cnt'))->whereYear('created_at', '2024')->get();
    $temp = [];
    $temp2 = [];
    $temp3 = [];
    $allBar = [];

    $totalGender1 = User::query()->select(User::raw('COUNT(*) as cnt'))->where('gender','male')->get();
    array_push($temp2, $totalGender1[0]['cnt']);
    $totalGender2 = User::query()->select(User::raw('COUNT(*) as cnt'))->where('gender','female')->get();
    array_push($temp2, $totalGender2[0]['cnt']);
    

    for($i = 1; $i <= 12; $i++){
        $my = User::query()->select(User::raw('COUNT(*) as cnt'))->where('id','!=', Auth::user()->id)->whereMonth('created_at', $i)->whereYear('created_at', '2024')->get();
        // $per = ((int)$my[0]['cnt'] / (int)$total[0]['cnt']) * 100;
        array_push($temp, $my[0]['cnt']);
    }
    for($x = 1; $x <= 12; $x++){
        $my = Announcements::query()->select(Announcements::raw('COUNT(*) as cnt'))->whereMonth('created_at', $x)->whereYear('created_at', '2024')->get();
        // $per = ((int)$my[0]['cnt'] / (int)$total[0]['cnt']) * 100;
        array_push($temp3, $my[0]['cnt']);
    }
    $allBar = ['usd'=> $temp, 'and'=>$temp3];
    return Inertia::render('Home', [
        'barGraphTotal'=> $allBar,
        'genderTotal'=> $temp2
    ]);
});



Route::get('/users', function () {
    // sleep(2);
    return Inertia::render('Users/Index', [
        'users' => User::query()->where('id','!=', Auth::user()->id)
        ->when(Request::input('search'), function ($query, $search){
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
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
        'gender'=> 'required'
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
        'password'=>'required',
        'gender'=>'required'
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

Route::get('/announcements', function () {
    return Inertia::render('Announcements/Index', [
        'ann' => Announcements::query()
        ->when(Request::input('search'), function ($query, $search){
            $query->where('title', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn($announcements) => [
            'id'=>$announcements->id,
            'title'=>$announcements->title,
            'description'=>$announcements->description,
            'can'=>[
                'edit'=>Auth::user()->can('edit',$announcements)
            ]
        ]),
        'filters'=> Request::only(['search']),
        'can'=> [
            'createUser' => Auth::user()->can('create', User::class)
        ]

        ]);
});

Route::get('/announcements/create', function () {
    return Inertia::render('Announcements/Create');
})->middleware('can:create, App\Models\User');

Route::get('/announcements/edit/{id}', function ($id) {
    return Inertia::render('Announcements/Update',[
        'annData'=> Announcements::find($id)
    ]);
});

Route::post('/announcements', function () {
    $attributes = Request::validate([
        'title'=>'required',
        'description'=>'required'
    ]);
    

    Announcements::create($attributes);
    $notification = array(
        'message' => 'Successfully Done',
        'type' => 'success'
    );
    return redirect('/announcements')->with('toast', $notification);
});

Route::post('/announcements/saveChanges/{id}', function($id){
    $attributes = Request::validate([
        'title'=>'required',
        'description'=>'required'
    ]);
    $notification = array(
        'message' => 'Successfully Done',
        'type' => 'success'
    );

    Announcements::query()->where('id', $id)->update($attributes);
    return redirect('/announcements')->with('toast', $notification);
});

Route::get('/profile', function () {
    return Inertia::render('Profile', [
        'userID'=> Auth::user()->id
    ]);
});





});