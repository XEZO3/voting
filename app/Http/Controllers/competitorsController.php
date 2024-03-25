<?php

namespace App\Http\Controllers;

use App\Models\Competitors;
use App\Models\Votelogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class competitorsController extends Controller
{
    public function index(){
        $data = Competitors::all();
        return view("home",['items'=>$data]);
    }
    public function vote(Request $req){
        $data = $req->validate([
            "vote_id"=>"required|numeric",
        ]);
        $data['fingerprint'] = $this->generateFingerPrint($req);

        if(Votelogs::where("fingerprint", $data['fingerprint'])->exists()){
            $id = Votelogs::where("fingerprint", $data['fingerprint'])->first()->competitors_id;
            return response()->json(['success' => false, 'message' => 'you already vote','voteid'=>$id]); 
        }
        $compet = Competitors::findOrFail($data['vote_id']);
        $compet->votes++;
        Votelogs::create(['fingerprint'=>$data['fingerprint'],'competitors_id'=>$data['vote_id']]);
        $compet->save();

        return response()->json(['success' => true, 'message' => 'Vote increased successfully']); 
    }
    public function unvote(Request $req){
        $data = $req->validate([
            "vote_id"=>"required|numeric",       
        ]);
        $data['fingerprint'] = $this->generateFingerPrint($req);
        $log = Votelogs::where("fingerprint",$data['fingerprint'])->where("competitors_id",$data['vote_id'])->first();
        if($this->checkVoteExists($data['fingerprint'],$data['vote_id'])){    
        $compet = Competitors::findOrFail($data['vote_id']);
        $compet->votes--;
        $log->delete();
        $compet->save();
        return response()->json(['success' => true, 'message' => 'you can vote again']); 
        }
        return response()->json(['success' => false, 'message' => 'you did not vote yet']); 
    }
    private function checkVoteExists($fingerprint, $vote_id)
    {
        return Votelogs::where("fingerprint", $fingerprint)->where("competitors_id", $vote_id)->exists();
    }
    public function generateFingerPrint(Request $request){
        $userAgent = $request->header('User-Agent');
        $acceptLanguage = $request->header('Accept-Language');
        $acceptEncoding = $request->header('Accept-Encoding');
        $acceptCharset = $request->header('Accept-Charset');
        $connection = $request->header('Connection');

        // Create a consistent fingerprint using relevant attributes
        $fingerprintData = [
            'user_agent' => $userAgent,
            'accept_language' => $acceptLanguage,
            'accept_encoding' => $acceptEncoding,
            'accept_charset' => $acceptCharset,
            'connection' => $connection,
            // Add more attributes as needed
        ];
        // Hash the fingerprint data to create a unique identifier
        $hashedFingerprint = md5(serialize($fingerprintData));
        return $hashedFingerprint;
    }
}
