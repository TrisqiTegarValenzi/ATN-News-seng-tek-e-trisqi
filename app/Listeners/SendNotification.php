<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CommentReplied;
use App\Models\Notification;

class SendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentReplied $event)
    {
        $komentar = $event->komentar;

        // proses pengiriman notifikasi

        $notification = new Notification([
            'user_id' => $komentar->user_id,
            'komentar' => $komentar->komentar,
        ]);

        // simpan data notifikasi ke dalam database
        if (!$notification->save()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data'
            ], 500);
        }
    }
}
