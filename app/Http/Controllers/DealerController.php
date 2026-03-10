<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\AjaxResponse;

class DealerController extends Controller
{
    use AjaxResponse;

    public function list(Request $request)
    {
        $dealers = User::where('role', 'dealer')
            ->when($request->name, fn($q) =>
                $q->where('name', 'like', "%{$request->name}%")
            )
            ->when($request->email, fn($q) =>
                $q->where('email', 'like', "%{$request->email}%")
            )
            ->when($request->zipcode, fn($q) =>
                $q->where('zipcode',$request->zipcode)
            )
            ->paginate(10);

        return $this->success(
            data: [
                'rows' => $dealers->items(),
                'pagination' => $dealers->links()->render()
            ],
            message: 'Dealers fetched successfully'
        );
    }

    public function updateAddress(Request $request, User $dealer)
    {
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required|min:5'
        ]);

        $dealer->update([
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode
        ]);

        return $this->success(
            message: 'Dealer address updated successfully'
        );
    }
}