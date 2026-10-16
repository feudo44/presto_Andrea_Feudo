<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->title");
    }

    public function becomeRevisor()
    {
        try {
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        } catch (\Exception $e) {
            return redirect()->route('homepage')->with('errorMessage', 'Non siamo riusciti a inviare la richiesta. Riprova più tardi.');
        }

        return redirect()->route('homepage')->with('message', 'Richiesta inviata! Il nostro team la esaminerà e ti contatterà via email.');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('homepage')->with('message', 'L\'utente ' . $user->name . ' è stato reso revisore.');
    }
}