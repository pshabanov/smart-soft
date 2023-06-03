<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use App\Providers\Api\ResponseProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileEntryController extends Controller
{
    public function index()
    {
        $responseProvider = new ResponseProvider();

        $fileEntries = FileEntry::all();

        $responseProvider->SUCCESS($fileEntries, 'Получен список всех файлов!');
    }

    public function show($id)
    {
        $responseProvider = new ResponseProvider();

        $fileEntry = FileEntry::findOrFail($id);

        $responseProvider->SUCCESS($fileEntry, 'Файл получен!');
    }

    public function store(Request $request)
    {
        $responseProvider = new ResponseProvider();

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('public/files');

        $fileEntry = new FileEntry();
        $fileEntry->name = $fileName;
        $fileEntry->path = $filePath;
        $fileEntry->type = $file->getClientOriginalExtension();
        $fileEntry->save();

        $responseProvider->SUCCESS($fileEntry, 'Файл создан!');
    }

    public function destroy($id)
    {
        $fileEntry = FileEntry::findOrFail($id);

        // Удаление файла
        $filePath = $fileEntry->path;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $fileEntry->delete();

        return response()->json(['message' => 'FileEntry deleted']);
    }
}
