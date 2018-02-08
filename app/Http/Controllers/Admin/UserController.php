<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    //Управление пользователями
    public function viewUsersList()
    {
        $users = User::all();
        return view('admin.user.usersView', ['users' => $users]);
    }

    //View page редактирование пользователя
    public function viewUserUpdate($id)
    {
        $user = User::find($id);
        return view('admin.user.userUpdate', ['user' => $user]);
    }

    // Action сохранить редактироование пользователя
    public function actionSaveUserUpdate()
    {
        $data = $_POST;
        $userData = User::find($data['id']);
        $userData->update($data);

        return \redirect(route('viewUsers'));
    }

    //посмотреть профиль пользователя
    public function adminViewUserPage($id)
    {
        $user = User::find($id);
        return view('admin.user.userPage', ['user' => $user]);
    }

}
