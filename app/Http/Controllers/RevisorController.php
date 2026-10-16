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
        return redirect()->back()->with('message', __('ui.article_accepted', ['title' => $article->title]));
    }

    public function reject(Article $article)
{
    $article->setAccepted(false);
    return redirect()->back()->with('errorMessage', __('ui.article_rejected', ['title' => $article->title]));
}

    public function becomeRevisor()
    {
        try {
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        } catch (\Exception $e) {
            return redirect()->route('homepage')->with('errorMessage', __('ui.request_error'));
        }

        return redirect()->route('homepage')->with('message', __('ui.request_sent'));
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('homepage')->with('message', __('ui.user_is_revisor', ['name' => $user->name]));
    }
}