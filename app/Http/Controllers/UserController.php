<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

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
        $this->validateRequest($request, 'store');

        $user = User::create($request->all());

        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return an specific user
     * @return Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

        return $this->successResponse($user);
    }

    public function update($user, Request $request)
    {

        $this->validateRequest($request, 'update');

        $user = User::findOrFail($user);

        $user->fill($request->all());

        //Verify if exists $author Request
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->successResponse($user);
    }

    /**
     * Delete an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->successResponse($user);
    }

    //

    public function validateRequest(Request $request, $typeRequest)
    {
        if ($typeRequest == 'store') {
            $rules = [
                'name' => 'required|max:100',
                'email' => 'required|max:20|mail|unique:users,email',
                'password' => 'required|max:8',
            ];
        } elseif ($typeRequest == 'update')
            $rules = [
                'name' => 'max:100',
                'email' => 'max:20',
                'password' => 'max:8',
            ];

        $messages = [
            'name.max' => 'The name have more then 100 caracters',
            'name.required' => 'The name is required',
            'email.required' => 'The email has required',
            'email.email' => 'The email informed dont has been valid!',
            'email.unique' => 'The email to need unique field!',
            'email.max' => 'The email have more than 20 caracters',
            'password.required' => 'The price has required',
            'password.max' => 'The password have more than 8 caracters',
        ];
        return $this->validate($request, $rules, $messages);
    }
}
