<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoneyValidationFormRequest;
use App\Models\User;
use App\Models\Historic;

class BalanceController extends Controller
{
    private $totalPage = 10;

    public function index()
    {
        // dd(auth()->user());

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if($response['success']){
            return redirect()
                        ->route('balance')
                        ->with('success', $response['message']);
        }else{
            return redirect()
                        ->back()
                        ->with('error', $response['message']);
        }
    }

    public function withdraw()
    {
        return view('admin.balance.withdrawn');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if($response['success']){
            return redirect()
                        ->route('balance')
                        ->with('success', $response['message']);
        }else{
            return redirect()
                        ->back()
                        ->with('error', $response['message']);
        }
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        if(!$sender = $user->getSender($request->sender))
        {
            return redirect()
                        ->back()
                        ->with('error', 'Usu??rio informado n??o foi encontrado!');
        }if($sender->id === auth()->user()->id){

            return redirect()
                        ->back()
                        ->with('error', 'N??o pode transferir para voc?? mesmo!');

        }else{
            $balance = auth()->user()->balance;

            return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
        }
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    {
        if(!$sender = $user->find($request->sender_id))
        {
            return redirect()
                        ->route('balance.transfer')
                        ->with('success', 'Recebedor n??o encontrado!');
        }

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if($response['success']){
            return redirect()
                        ->route('balance')
                        ->with('success', $response['message']);
        }else{
            return redirect()
                        ->back()
                        ->with('error', $response['message']);
        }
    }

    public function historic(Historic $historic)
    {
        $historics = auth()->user()
                            ->historics()
                            ->with(['userSender'])
                            ->simplePaginate($this->totalPage);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historic)
    {
        $dataForm = $request->except('_token');

        $historics = $historic->search($dataForm, $this->totalPage);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types', 'dataForm'));
    }

    public function userStore(Request $request)
    {

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'cpf'   => $request->cpf,
            'password' => bcrypt($request->password),
        ])->save();

        $msg = 'Cadastro realizado com sucesso';

        return redirect()
                    ->route('home')
                    ->with('success', $msg);
    }
}
