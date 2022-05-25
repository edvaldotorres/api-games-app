<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        Gate::authorize('admin');

        $users = User::simplePaginate(5);

        if ($users->isEmpty()) {
            return $this->notFound('No users found.');
        }

        return $this->successWithArgs($users);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function me(): JsonResponse
    {
        return $this->successWithArgs(auth('api')->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        Gate::authorize('admin');

        User::create($request->validated());

        return $this->created('User created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('admin');

        $user = User::find($id);

        if (!$user) {
            return $this->notFound('User not found.');
        }

        return $this->successWithArgs($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if (!auth('api')->user()->is_admin && auth('api')->id() !== $id) {
            return $this->unauthorized('You are not authorized to update this user.');
        }

        $user = User::find($id);

        if (!$user) {
            return $this->notFound('User not found.');
        }

        $user->update($request->validated());

        return $this->successWithArgs($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('admin');

        $user = User::find($id);

        if (!$user) {
            return $this->notFound('User not found.');
        }

        $user->delete();

        return $this->success('User deleted.');
    }
}
