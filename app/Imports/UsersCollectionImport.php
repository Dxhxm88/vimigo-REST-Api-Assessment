<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersCollectionImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row[3] == 1) {
                $user = User::firstWhere('email', $row[1]);
                $user != null ?? $user->delete();
            } else {
                User::updateOrCreate([
                    'email' => $row[1]
                ], [
                    'name' => $row[0],
                    'password' => Hash::make($row[2])
                ]);
            }
        }
    }
}
