<?php

namespace App\Http\Controllers\Api\User\Support;

use App\Models\Aticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminSupportController extends Controller
{
    public function getAdminTicket()
    {
        try {
            $tickets = Aticket::where('user_id', auth()->user()->id)->where('parent_id', null)->get();
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

    public function storeAdminTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $ticket = new Aticket();
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

    public function getAdminTicketDetail($ticket_id)
    {
        try {
            $tickets = Aticket::where('id', $ticket_id)
                ->where('user_id', auth()->user()->id)
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

    public function replyAdminTicket(Request $request, $ticket_id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $ticket = new Aticket();
            $ticket->user_id = auth()->user()->id;
            $ticket->parent_id = $ticket_id;
            $ticket->message = $request->message;
            $ticket->save();
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'messages' => 'Ticket send sucessfully!',
            'data' => $ticket
        ]);
    }
}
