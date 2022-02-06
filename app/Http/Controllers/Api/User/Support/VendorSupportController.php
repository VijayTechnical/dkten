<?php

namespace App\Http\Controllers\Api\User\Support;

use App\Models\Vticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VendorSupportController extends Controller
{
    public function getVendorTicket()
    {
        try {
            $tickets = Vticket::where('user_id', auth()->user()->id)->where('parent_id', null)->get();
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'messages' => 'Tickets found sucessfully!',
            'data' => $tickets
        ]);
    }

    public function storeVendorTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required|integer|exists:vendors,id',
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $ticket = new Vticket();
            $ticket->vendor_id = $request->vendor_id;
            $ticket->subject = $request->subject;
            $ticket->message = $request->message;
            $ticket->user_id = auth()->user()->id;
            $ticket->save();
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'messages' => 'Tickets send sucessfully!',
            'data' => $ticket
        ]);
    }

    public function getVendorTicketDetail($ticket_id, $vendor_id)
    {
        try {
            $tickets = Vticket::where('id', $ticket_id)
                ->where('user_id', auth()->user()->id)
                ->where('vendor_id', $vendor_id)
                ->orWhere('parent_id', $ticket_id)->get();
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'messages' => 'Tickets found sucessfully!',
            'data' => $tickets
        ]);
    }

    public function replyVendorTicket(Request $request, $ticket_id, $vendor_id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $ticket = new Vticket();
            $ticket->user_id = auth()->user()->id;
            $ticket->vendor_id = $vendor_id;
            $ticket->parent_id = $ticket_id;
            $ticket->message = $request->message;
            $ticket->reply_by = 'user';
            $ticket->save();
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'messages' => 'Tickets send sucessfully!',
            'data' => $ticket
        ]);
    }
}
