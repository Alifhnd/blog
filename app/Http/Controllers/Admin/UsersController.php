<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserCreateRequest;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users=User::get();
        return view('admin.users.list' , compact('users'));
    }

    /**
     *  get user role from user model and return view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $userRoles = User::getUserRole();
        return view('admin.users.create' , compact('userRoles'));
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {

        $user = new User();
        $user = $user->createUser($request);

        if ($user && $user instanceof User){

            return back()->with('status' , trans('message.user_success_created'));
        }
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request , $user_id)
    {
        $user = User::find($user_id);
        $deleteResult = $user->delete();
        if ($deleteResult){
            return back()->with('status' , trans('message.user_success_deleted'));
        }
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $userRoles = User::getUserRole();
        return view('admin.users.edit' , compact('user', 'userRoles'));
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request , $user_id)
    {
        $user = User::find($user_id);
        if ($user && $user instanceof User){
            $userInfo=[
                'name' => $request ->input('userFullName'),
                'email' => $request ->input('userEmail'),
                'role' => $request ->input('userRole'),
            ];
            if ($request -> filled('password')){
                $userInfo['password'] = $request ->input('password');
            }

            $updateResult = $user -> update($userInfo);

            if ($updateResult){
                return redirect()->route('admin.users')->with('status' , trans('message.user_success_updated'));
            }
        }


    }
}
