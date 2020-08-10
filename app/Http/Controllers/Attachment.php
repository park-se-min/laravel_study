<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Attachment extends Controller
{
    public function store(Request $request)
    {
        $attachments = [];

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach($files as $file) {
                $filename = str_random().filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);

                $payload = [
                    'filename' => $filename,
                    'bytes' => $file->getClientSize(),
                    'mime' => $file->getClientSize()
                ];

                $file->move(attachments_path(), $filename);

                // $attachments[] = ($id = $request->input('article_id'))
                //     ? \App\Article::findOrFail($id)->attachments()->create($payload)
                //     : Attachment::create($payload);
            }
        }

        return response()->json($attachments, 200, [], JSON_PRETTY_PRINT);
    }

}
