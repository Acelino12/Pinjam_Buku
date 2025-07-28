<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookstore_users;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthControllerApi extends Controller
{
    public function register(Request $request)
    {

        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|max:100|email|unique:bookstore_users,email',
                'password' => 'required|min:6|confirmed',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:man,woman,other',
                'phone' => 'required|max:20',
            ]);

            // Usia
            $age = date('Y') - Carbon::parse($request->date_of_birth)->format('Y');

            // generate code user BKU-20250700001
            $codeUser = $this->generatedCode();

            $user = Bookstore_users::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'age' => $age,
                'code_user' => $codeUser,
            ]);

            // sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'User Register Success',
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $error->errors(),
            ], 422);
        } catch (\Exception $error) {
            return Response()->json([
                'message' => 'Register failed',
                'errors' => $error->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // membaut guard API yang mengarah ke 'booksrote_users_providers'
            if (! Auth::guard('api')->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'message' => 'Invaild login cardentials',
                ], 401);
            }

            // mendapat user untuk autentikasi dari guard API
            $user = Auth::guard('api')->user();

            // Jika user tidak ditemukan setelah attempt (meskipun attempt berhasil, ini untuk jaga-jaga)
            if (! $user) {
                throw new ModelNotFoundException('User not found after authentication.');
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login Success!',
                'user' => $user,
                'token' => $token,
            ]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Validation Error',
                'error' => $error->errors(),
            ], 422);
        } catch (ModelNotFoundException $e) { // Tangani jika user tidak ditemukan
            return response()->json([
                'message' => 'Authentication failed: User not found.',
                'error' => $e->getMessage(),
            ], 401);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Login Failed',
                'error' => $error->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            // Pastikan user terautentikasi dari guard 'api'
            $user = $request->user('api');

            if (! $user) {
                return response()->json([
                    'message' => 'Unauthorized: No authenticated user.',
                ], 401);
            }

            $user->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logged out successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Logout failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function user(Request $request)
    {
        try {
            // Pastikan user terautentikasi dari guard 'api'
            $user = $request->user('api');

            if (! $user) {
                return response()->json([
                    'message' => 'Unauthorized: No authenticated user.',
                ], 401);
            }

            return response()->json([
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch user data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function generatedCode()
    {
        $prefix = 'BKU-';
        $currentYearMonth = Carbon::now()->format('Ym'); // Contoh: 202507
        $searchPattern = $prefix.$currentYearMonth.'%'; // Misal: BKU-202507%

        // Ambil kode pengguna terakhir untuk bulan ini, diurutkan berdasarkan code_user (numeric) atau id (jika id selalu naik)
        // Pastikan 'code_user' di-cast ke integer jika ingin sorting numerik, atau string jika sorting alfabetik.
        // Jika formatnya 'BKU-YYYYMM-NNNNN', lebih baik ambil 5 digit terakhir untuk diincrement.
        $lastCodeUser = Bookstore_users::where('code_user', 'like', $searchPattern)
            ->orderBy('code_user', 'desc') // Urutkan berdasarkan code_user secara menurun
            ->first();

        $newNumber = 1;

        if ($lastCodeUser) {
            // Ambil 5 digit terakhir dari code_user
            $lastSequence = (int) substr($lastCodeUser->code_user, -5);
            $newNumber = $lastSequence + 1;
        }

        // Format nomor urut menjadi 5 digit dengan leading zeros
        $newSequence = str_pad((string) $newNumber, 5, '0', STR_PAD_LEFT);

        // Gabungkan semua bagian
        $finalCode = $prefix.$currentYearMonth.$newSequence;

        return $finalCode;
    }
}
