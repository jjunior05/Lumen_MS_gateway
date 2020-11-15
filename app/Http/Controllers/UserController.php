<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index()
    {
        $user = User::all();
        //Send $author for ApiResponse
        return $this->successResponse($user);
    }

    /**
     * Create an instance of user
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request, 'store', '');

        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return an specific user
     * @return Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

        return $this->validResponse($user);
    }

    public function update($user, Request $request)
    {

        $this->validateRequest($request, 'update', $user);

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        //Verify if exists $author Request
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /**
     * Delete an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }

    //

    public function validateRequest(Request $request, $typeRequest, $user)
    {
        if ($typeRequest == 'store') {
            $rules = [
                'name' => 'required|max:100',
                'email' => 'required|max:50|email|unique:users' . $user,
                'password' => 'required|min:8|confirmed',
            ];
        } elseif ($typeRequest == 'update')
            $rules = [
                'name' => 'max:100',
                'email' => 'max:50|email|unique:users' . $user,
                'password' => 'min:8|confirmed',
            ];

        $messages = [
            'name.max' => 'The name have more then 100 caracters',
            'name.required' => 'The name is required',
            'email.required' => 'The email has required',
            'email.email' => 'The email informed dont has been valid!',
            'email.unique' => 'The email to need unique field!',
            'email.max' => 'The email have more than 50 caracters',
            'password.required' => 'The price has required',
            'password.max' => 'The password have more than 8 caracters',
        ];
        return $this->validate($request, $rules, $messages);
    }
}
