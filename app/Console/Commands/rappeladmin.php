<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Console\Command;
use App\Mail\SendNewDemandeMail;
use App\Mail\SendRappelMailAllAdmis;
use Illuminate\Support\Facades\Mail;

class rappeladmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demande:rappeladmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jour = Carbon::now()->subDay(2);
        $demandes = Demande::all()->where('statut', 'en attente')->where('created_at','>',$jour);
        $admins = User::where('role', 'admin')->get();
        foreach ($demandes as $demande) {
            Mail::to($admins)->send(new SendRappelMailAllAdmis($demande));
        }
    }
}
