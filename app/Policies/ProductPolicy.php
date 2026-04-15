<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // Voir la liste
    public function viewAny(User $user): bool
    {
        return true;
    }

    // Voir un produit
    public function view(?User $user, Product $product): bool
    {
        return $product->is_public || ($user && $product->user_id === $user->id);
    }

    // Créer
    public function create(User $user): bool
    {
        return true;
    }

    // Modifier
    public function update(User $user, Product $product): bool
    {
        return $product->user_id === $user->id;
    }

    // Supprimer
    public function delete(User $user, Product $product): bool
    {
        return $product->user_id === $user->id;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
