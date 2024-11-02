<?php

namespace App\Policies;

use App\Models\T_admin;
use App\Models\T_anggota;
use Illuminate\Auth\Access\Response;

class TAdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(T_anggota $tAnggota): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(T_anggota $tAnggota, T_admin $tAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(T_anggota $tAnggota): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(T_anggota $tAnggota, T_admin $tAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(T_anggota $tAnggota, T_admin $tAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(T_anggota $tAnggota, T_admin $tAdmin): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(T_anggota $tAnggota, T_admin $tAdmin): bool
    {
        //
    }
}
