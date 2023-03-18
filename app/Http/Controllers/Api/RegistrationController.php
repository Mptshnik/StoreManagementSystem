<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\RegistrationRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);

        $customer = Customer::create($data);

        event(new Registered($customer));

        $customer['auth_token'] = $customer->createToken('auth_token')->plainTextToken;

        return new CustomerResource($customer);
    }
}
