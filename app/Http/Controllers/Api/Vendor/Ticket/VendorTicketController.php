<?php

namespace App\Http\Controllers\Api\Vendor\Ticket;

use App\Models\Vticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VendorTicketController extends Controller
{
    public function getTicket()
    {
        try {
            $tickets = Vticket::with('User')->where('vendor_id', auth()->user()->id)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Tickets found sucessfully!',
            'data' => $tickets
        ]);
    }

    public function getTicketDetail($ticket_id, $user_id)
    {
        try {
            $tickets = Vticket::query()
                ->where('vendor_id', auth()->user()->id)
                ->where('id', $ticket_id)
                ->where('user_id', $user_id)
                ->orWhere('parent_id', $ticket_id)->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Tickets detail found sucessfully!',
            'data' => $tickets
        ]);
    }
    public function replyToTicket(Request $request, $ticket_id, $user_id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $ticket = new Vticket();
            $ticket->parent_id = $ticket_id;
            $ticket->message = $request->message;
            $ticket->user_id = $user_id;
            $ticket->vendor_id = auth()->user()->id;
            $ticket->reply_by = 'vendor';
            $ticket->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Reply to ticket done sucessfully!',
            'data' => $ticket
        ]);
    }

    public function deleteTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required|integer|exists:vtickets,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $ticket = Vticket::where(['id' => $request->ticket_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$ticket) {
                return response()->json([
                    'message' => 'Ticket now found!!!',
                ], 403);
            }
            $tickets = Vticket::where('parent_id', $ticket->id)->get();
            if ($tickets->count() > 0) {
                foreach ($tickets as $c_ticket) {
                    $c_ticket->delete();
                }
            }
            $ticket->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Ticket deleted sucessfully!',
            'data' => $ticket
        ]);
    }
}
