<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;


class NewsletterController extends Controller
{
    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ]);

        NewsletterSubscriber::create([
            'email' => $request->input('email')
        ]);

        // Ajoutez ici le code pour rediriger l'utilisateur ou afficher un message de succès.
    }
}
