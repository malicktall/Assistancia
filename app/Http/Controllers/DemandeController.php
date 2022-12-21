<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Mail\SendNewDemandeMail;
use App\Notifications\EnvoieEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignerAdminDemandeMail;

use function PHPUnit\Framework\isNull;
use App\Mail\SendTraitementDemandeMail;
use Illuminate\Support\Facades\Notification;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $identifiant = Auth::user()->id;
        $demandes = Demande::where('user_id',$identifiant)->paginate(3);
        return view('demande.list', compact('demandes'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demande.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'objet'=>'required',
            'contenu'=>'required',

        ]);
        $demande = new Demande($request->all());
        $demande->user_id = Auth::user()->id;
        $demande->save();
        Mail::to($demande->user)->send(new SendNewDemandeMail($demande));
        $admin = User::where('role', 'admin')->get();
        Mail::to($admin)->send(new AssignerAdminDemandeMail($demande));
        return redirect()->route('demande.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $demande)
    {
        return view('demande.show', compact('demande'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        return view('demande.update', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'objet'=>'required',
            'contenu'=>'required',

        ]);

        $demande->user_id = 1;
        $demande->update($request->all());
        return redirect()->route('demande.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->deleteOrFail();
        return redirect()->route('demande.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param string $statut
     */
    public function listedemande($statut)
    {

        $identifiant = Auth::user()->id;
        $demandes = Demande::where([
            ['admin_id','=',$identifiant],
            ['statut','=',$statut],
        ])->paginate(3);

        return view('admin.list', compact('demandes'));
    }


    public function traitement(Demande $demande)
    {
        return view('demande.traitement', compact('demande'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param string $resultat
     */

     public function operation(Request $request, Demande $demande, $resultat)
    {
        $demande->statut = $resultat;
        $demande->update($request->all());
        Mail::to($demande->user)->send(new SendTraitementDemandeMail($demande));
        return redirect()->route('demande.show', compact('demande'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function assigner(Request $request, Demande $demande)
    {
        if ( empty($demande->admin_id)) {
            $demande->admin_id = Auth::user()->id;
            $demande->statut = 'En cours de traitement';
            $demande->update($request->all());
            $admin = User::where('role', 'admin')->get();
            return view('demande.traitement', compact('demande'));
        }else {
            return redirect()->route('demande.info', compact('demande'));
        }

    }

    public function alldemandes(){
        $demandes = Demande::paginate(5);
        return view('admin.alldemandes', compact('demandes'));
    }




}
