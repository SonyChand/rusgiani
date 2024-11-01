<?php

namespace App\Http\Controllers\Letters;

use PDF;
use Illuminate\View\View;
use App\Traits\LogsActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Models\Letters\IncomingLetter;
use Illuminate\Support\Facades\Storage;
use App\Mail\IncomingLetterNotification;
use Illuminate\Foundation\Validation\ValidatesRequests;

class IncomingLetterController extends Controller
{
    use ValidatesRequests;
    use LogsActivity;

    function __construct()
    {
        $this->middleware('permission:incoming_letter-list|incoming_letter-create|incoming_letter-edit|incoming_letter-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:incoming_letter-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:incoming_letter-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:incoming_letter-delete', ['only' => ['destroy', 'bulkDestroy']]);
        $this->middleware('permission:incoming_letter-download', ['only' => ['download', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $title = 'Surat Masuk';
        $letters = IncomingLetter::orderBy('id', 'DESC')->get();

        return view('dashboard.letters.incoming_letters.index', compact('letters', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $title = 'Tambah Surat Masuk';

        return view('dashboard.letters.incoming_letters.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'source_json' => 'required|json',
            'addressed_to_json' => 'required|json',
            'letter_number' => 'required|string',
            'letter_date' => 'required|date',
            'subject' => 'required|string',
            'attachment' => 'nullable|string',
            'forwarded_disposition_json' => 'nullable|json',
            'file_path' => 'nullable|mimes:pdf,image|max:1024',
            'operator_name' => 'required|string',
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filePath = $file->store('surat/surat_masuk', 'public');
            $validatedData['file_path'] = $filePath;
        }

        // Convert JSON fields back to JSON strings
        $validatedData['source_letter'] = $validatedData['source_json'];
        $validatedData['addressed_to'] = $validatedData['addressed_to_json'];
        $validatedData['forwarded_disposition'] = $validatedData['forwarded_disposition_json'];

        // Remove the temporary JSON fields
        unset($validatedData['source_json']);
        unset($validatedData['addressed_to_json']);
        unset($validatedData['forwarded_disposition_json']);

        $letter = IncomingLetter::create($validatedData);

        $description = 'Pengguna ' . $request->user()->name . ' menambahkan surat masuk dengan nomor surat: ' . $letter->letter_number;
        $this->logActivity('incoming_letters', $request->user(), $letter->id, $description);


        // Generate PDF
        $data = [
            'title' => 'Surat Masuk',
            'letter' => $letter
        ];

        Mail::to('sonychandmaulana@gmail.com')->send(new IncomingLetterNotification($request->user(), 'penambahan', $letter->id, null));

        return redirect()->route('incoming-letters.index')
            ->with('success', 'Surat Masuk dan PDF berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = IncomingLetter::find($id);

        return view('dashboard.letters.incoming_letters.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($letterId): View
    {
        $title = 'Edit Surat Masuk';
        $letter = IncomingLetter::find($letterId);

        return view('dashboard.letters.incoming_letters.edit', compact('title', 'letter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'source_json' => 'required|json',
            'addressed_to_json' => 'required|json',
            'letter_number' => 'required|string',
            'letter_date' => 'required|date',
            'subject' => 'required|string',
            'attachment' => 'nullable|string',
            'forwarded_disposition_json' => 'nullable|json',
            'file_path' => 'nullable|mimes:pdf,image|max:1024',
            'operator_name' => 'required|string',
        ]);



        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filePath = $file->store('surat/surat_masuk', 'public');
            $validatedData['file_path'] = $filePath;
        }

        // Convert JSON fields back to JSON strings
        $validatedData['source_letter'] = $validatedData['source_json'];
        $validatedData['addressed_to'] = $validatedData['addressed_to_json'];
        $validatedData['forwarded_disposition'] = $validatedData['forwarded_disposition_json'];

        // Remove the temporary JSON fields
        unset($validatedData['source_json']);
        unset($validatedData['addressed_to_json']);
        unset($validatedData['forwarded_disposition_json']);

        $letter = IncomingLetter::findOrFail($id);

        // Track changes
        $changes = [];

        // Decode JSON fields for comparison
        $originalData = $letter->toArray();
        $originalData['source_letter'] = json_decode($originalData['source_letter'], true);
        $originalData['addressed_to'] = json_decode($originalData['addressed_to'], true);
        $originalData['forwarded_disposition'] = json_decode($originalData['forwarded_disposition'], true);

        foreach ($validatedData as $key => $value) {
            // Decode JSON fields in validated data for comparison
            if (in_array($key, ['source_letter', 'addressed_to', 'forwarded_disposition'])) {
                $value = json_decode($value, true);
            }

            if ($originalData[$key] != $value) {
                $changes[] = $key;
            }
        }

        if (empty($changes)) {
            return redirect()->route('incoming-letters.edit', $id)
                ->with('info', 'Tidak ada perubahan yang dilakukan.');
        }

        // Update the letter
        $letter->update($validatedData);


        // Create activity description
        $description = 'Pengguna ' . $request->user()->name . ' mengubah kolom: ' . implode(', ', $changes) . ' pada surat masuk dengan nomor surat: ' . $letter->letter_number;
        $this->logActivity('incoming_letters', $request->user(), $letter->id, $description);
        // Regenerate PDF
        $data = [
            'title' => 'Letter Details',
            'letter' => $letter
        ];

        Mail::to('sonychandmaulana@gmail.com')->send(new IncomingLetterNotification($request->user(), 'perubahan', $letter->id, $originalData));

        return redirect()->route('incoming-letters.index')
            ->with('success', 'Surat Masuk dan PDF berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $letter = IncomingLetter::findOrFail($id);
        if ($letter) {
            $filePath =  $letter->file_path;
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $description = 'Pengguna ' . Auth::user()->name  . ' menghapus surat masuk dengan nomor surat: ' . $letter->letter_number;
            $this->logActivity('incoming_letters', Auth::user(), $letter->id, $description);
            $letter->delete();
            return redirect()->route('incoming-letters.index')
                ->with('success', 'Surat masuk berhasil dihapus');
        } else {
            return redirect()->route('incoming-letters.index')
                ->with('error', 'Surat masuk tidak ditemukan.');
        }
    }
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $letterIds = explode(',', $request->input('letterIds', ''));
        if (!empty($letterIds)) {
            foreach ($letterIds as $letterId) {
                $data = IncomingLetter::find($letterId);
                if ($data) {
                    $filePath = $data->file_path;
                    if ($filePath && Storage::disk('public')->exists($filePath)) {
                        Storage::disk('public')->delete($filePath);
                    }
                    $description = 'Pengguna ' . Auth::user()->name  . ' menghapus surat masuk dengan nomor surat: ' . $data->letter_number;
                    $this->logActivity('incoming_letters', Auth::user(), $data->id, $description);
                }
            }
            IncomingLetter::whereIn('id', $letterIds)->delete();
            return redirect()->route('incoming-letters.index')->with('success', 'Surat-surat masuk berhasil dihapus');
        }
        return redirect()->route('incoming-letters.index')->with('error', 'Surat masuk tidak ditemukan.');
    }

    public function download($id)
    {
        $letter = IncomingLetter::find($id);
        $description = 'Pengguna ' . Auth::user()->name  . ' mengunduh surat masuk dengan nomor surat: ' . $letter->letter_number;
        $this->logActivity('incoming_letters', Auth::user(), $letter->id, $description);
        return Storage::disk('public')->download($letter->file_path);
    }
}
