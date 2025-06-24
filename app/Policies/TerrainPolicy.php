<?php

namespace App\Policies;

use App\Models\Terrain;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TerrainPolicy
{
    public function update(User $user, Terrain $terrain)
    {
        return $user->id === $terrain->owner_id;
    }

    public function delete(User $user, Terrain $terrain)
    {
        return $user->id === $terrain->owner_id;
    }
    public function viewAny(User $user) { }
public function view(User $user, Terrain $terrain) { }
public function create(User $user) { }

public function restore(User $user, Terrain $terrain) { }
public function forceDelete(User $user, Terrain $terrain) { }

}
