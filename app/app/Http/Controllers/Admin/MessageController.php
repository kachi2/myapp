<?php
/**
 * Created by PhpStorm.
 * User: billi
 * Date: 6/3/19
 * Time: 11:24 PM
 */

namespace App\Http\Controllers\Admin;

use Notifiable;
use App\Mail\MessageUsers;
use App\User;
use App\Notifications\MessageUser;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    /**
     * Show the admin home page.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $breadcrumb = [
            [
                'link' => route('admin.message_users'),
                'title' => 'Massage Users'
            ]
        ];

        return view('admin.send-message', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Do messgae User.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function doMessageUsers(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
            'recipients' => 'required'
        ]);

        $subject = $request->input('subject');
        $text = $request->input('message');
        $recipients = $request->input('recipients');
        switch ($recipients) {
            case 'deposited':
                $users = User::leftJoin('deposits', 'users.id', '=', 'deposits.user_id')
                    ->select('users.*')
                    ->where('deposits.id', '!=', null);
                break;
            case 'non-deposited':
                $users = User::leftJoin('deposits', 'users.id', '=', 'deposits.user_id')
                    ->select('users.*')
                    ->where('deposits.id', null);
                break;
            case 'admins':
                $users = User::where('is_admin', '=', true)->get();
                break;            
            default:
                $users = User::all();
        }

        
        foreach ($users as $user) {
            try {
                $user->notify(new MessageUser($user, $text, $subject));
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
        

        return redirect()->back()->with('success', 'Users messaged successfully');
    }
}
