<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::guard('customer')->attempt($credentials))
        {
            return response(['message' => 'Invalid credentials']);
        }

        $customer = Customer::where('email', $request->email)->first();
        $customer['auth_token'] = $customer->createToken('auth_token')->plainTextToken;

        return new CustomerResource($customer);
    }
}
