<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::where('email', $row[1])->first();

        if ($user) {
            // Si el usuario existe, actualizamos sus datos
            $user->update([
                'name'     => $row[0],
                'password' => Hash::make($row[2]),
            ]);
        } else {
            // Si el usuario no existe, lo creamos
            $user = User::create([
                'name'     => $row[0],
                'email'    => $row[1],
                'password' => Hash::make($row[2]),
            ]);
        }

        return $user;
    }
}
