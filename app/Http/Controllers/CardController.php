<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function cardAddView()
    {
        return View('dashboard.cardAdd');
    }

    public function cardAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'value' => 'required',
            'avatar' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();


        $filename = null;
        if ($request->hasFile('avatar') && $request->file('avatar') != null) {
            $filename = str_random(20) . ".png";
            $request->file('avatar')->move('images', $filename);
        }

        $card = new Card;
        $card->name = $request->name;
        $card->type = $request->type;
        $card->value = $request->value;
        $card->description = $request->description;
        $card->image = $filename;
        $card->save();

        return redirect()->back()->with('message', 'The cart has been added');
    }

    public function cardDelete($id)
    {
        $card = Card::find($id);
        if ($card->image != null) {
            $image_path = public_path() . '/images/' . $card->image;
            try {
                unlink($image_path);
            } catch (\Exception $e) {
            };
        }
        $card->delete();
        return redirect()->back();
    }

    public function cardEditView($id)
    {
        $card = Card::find($id);

        return View('dashboard.cardEdit', compact('card'));
    }

    public function cardEdit(Request $request, $id)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();


        $filename = null;
        if ($request->hasFile('avatar') && $request->file('avatar') != null) {
            $filename = str_random(20) . ".png";
            $request->file('avatar')->move('images', $filename);
        }

        $card = Card::find($id);
        $card->name = $request->name;
        $card->value = $request->value;
        $card->description = $request->description;
        if ($request->type == 'FTTH' || $request->type == 'Wireless'){
            $card->type = $request->type;
        }
        if ($filename){
            $card->image = $filename;
        }
        $card->update();

        return redirect()->back()->with('message', 'The cart has been Edited');
    }
}
