<?php


namespace App\Http\Controllers\Api\V1;

use App\Enums\HttpStatusCodeEnum;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\V1
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [
                'login',
            ]
        ]);
    }

    /**
     * Method responsible for generate a JWT token.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \App\Exceptions\Api\LockedException
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }


        return $this->respondWithToken($token);
    }

    /**
     * Invalidate JWT token from a user.
     * (Add to the blacklist because the JWT is stateless).
     *
     * @param AuthManager $auth
     * @return JsonResponse
     */
    public function logout(AuthManager $auth)
    {
        $auth->logout();

        return response()->json(['success' => true]);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @param string $refreshToken
     * @return JsonResponse
     */
    protected function respondWithToken($token, $refreshToken = '')
    {
        $response = response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);

        return $response;
    }
}
