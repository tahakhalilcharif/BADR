<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use App\Models\Compte;
use App\Models\Demande;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create($id)
    {
        $demand = Demande::findOrFail($id);
        
        // Check if a product is already assigned to this demand
        if (Produit::where('id_demande', $demand->id_demande)->exists()) {
            return redirect()->route('employee.demands')->with('error', 'Product already assigned to this demand.');
        }
    
        // Create the product if not already assigned
        $product = new Produit();
        $product->id_carte = $demand->carte->id_carte;
        $product->id_compte = $demand->compte->id_cmpt;
        $product->date_expiration = now()->addYear();
        $product->id_demande = $demand->id_demande;
        $product->numero_carte = $this->generateUniqueCardNumber();
        $product->cvv2 = $this->generateCVV2();
        $product->code_pin = $this->generatePIN();
        $product->statut = 'valide';
        $product->save();
    
        // Update the demand status
        $demand->statut = 'construite';
        $demand->save();
    
        return redirect()->route('employee.demands')->with('success', 'Product created successfully.');
    }
    
    private function generateUniqueCardNumber()
    {
        do {
            $number = $this->generateRandomNumber(16);
        } while (Produit::where('numero_carte', $number)->exists());
    
        return $number;
    }
    
    private function generateRandomNumber($length)
    {
        $number = '';
        for ($i = 0; $i < $length; $i++) {
            $number .= mt_rand(0, 9);
        }
        return $number;
    }
    
    private function generateCVV2()
    {
        return str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    }
    
    private function generatePIN()
    {
        return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }
    
}
