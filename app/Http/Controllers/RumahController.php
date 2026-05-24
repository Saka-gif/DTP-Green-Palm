<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Rumah;
use App\Models\TipeRumah;

class RumahController extends Controller
{
    public function home()
    {
        $rumah = Rumah::all();
        return view('index', compact('rumah'));
    }

    public function index()
    {
        $data = Rumah::all();
        return view('rumah.index', compact('data'));
    }

    public function create()
    {
        $tipe = TipeRumah::all();
        return view('rumah.create', compact('tipe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'status' => 'required',
            'tipe_id' => 'required|exists:tipe_rumah,id',
            'foto' => 'nullable|image|max:2048',
            'denah' => 'nullable|image|max:2048'
        ]);

        try {

            $data = $request->except('foto', 'denah');

            // pilih folder upload: jika ada folder public_html di luar project, gunakan itu
            $publicHtmlBase = base_path('../public_html');
            if (file_exists($publicHtmlBase)) {
                $destination = rtrim($publicHtmlBase, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'images';
            } else {
                $destination = public_path('images');
            }

            Log::info('Upload store start', ['hasFoto' => $request->hasFile('foto'), 'hasDenah' => $request->hasFile('denah'), 'destination' => $destination]);

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            // Upload Foto
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');

                $fotoName = time() . '_foto.' . $foto->getClientOriginalExtension();

                Log::info('Moving foto', ['destination' => $destination, 'fileName' => $fotoName]);

                $foto->move($destination, $fotoName);

                $data['foto'] = 'images/' . $fotoName;

                Log::info('Foto moved', ['stored' => $data['foto']]);
            }

            // Upload Denah
            if ($request->hasFile('denah')) {
                $denah = $request->file('denah');

                $denahName = time() . '_denah.' . $denah->getClientOriginalExtension();

                Log::info('Moving denah', ['destination' => $destination, 'fileName' => $denahName]);

                $denah->move($destination, $denahName);

                $data['denah'] = 'images/' . $denahName;

                Log::info('Denah moved', ['stored' => $data['denah']]);
            }

            Rumah::create($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil ditambahkan');

        } catch (\Exception $e) {
            Log::error('Store error', ['message' => $e->getMessage()]);

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $rumah = Rumah::findOrFail($id);
        $tipe = TipeRumah::all();

        return view('rumah.edit', compact('rumah', 'tipe'));
    }

    public function update(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $request->validate([
            'nama_rumah' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'status' => 'required',
            'tipe_id' => 'required|exists:tipe_rumah,id',
            'foto' => 'nullable|image|max:2048',
            'denah' => 'nullable|image|max:2048'
        ]);

        try {

            $data = $request->except('foto', 'denah');

            // pilih folder upload: jika ada folder public_html di luar project, gunakan itu
            $publicHtmlBase = base_path('../public_html');
            if (file_exists($publicHtmlBase)) {
                $destination = rtrim($publicHtmlBase, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'images';
            } else {
                $destination = public_path('images');
            }

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            Log::info('Upload update start', ['id' => $id, 'hasFoto' => $request->hasFile('foto'), 'hasDenah' => $request->hasFile('denah'), 'destination' => $destination]);

            // Update Foto
            if ($request->hasFile('foto')) {
                // Hapus foto lama
                if ($rumah->foto) {
                    $oldPublic = public_path(ltrim($rumah->foto, '/'));
                    $oldPublicHtml = rtrim(base_path('../public_html'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($rumah->foto, '/');
                    if (file_exists($oldPublicHtml)) {
                        Log::info('Deleting old foto (public_html)', ['old' => $oldPublicHtml]);
                        @unlink($oldPublicHtml);
                    } elseif (file_exists($oldPublic)) {
                        Log::info('Deleting old foto (public)', ['old' => $oldPublic]);
                        @unlink($oldPublic);
                    }
                }

                $foto = $request->file('foto');

                $fotoName = time() . '_foto.' . $foto->getClientOriginalExtension();

                Log::info('Moving foto (update)', ['destination' => $destination, 'fileName' => $fotoName]);

                $foto->move($destination, $fotoName);

                $data['foto'] = 'images/' . $fotoName;

                Log::info('Foto moved (update)', ['stored' => $data['foto']]);
            }

            // Update Denah
            if ($request->hasFile('denah')) {
                // Hapus denah lama
                if ($rumah->denah) {
                    $oldPublic = public_path(ltrim($rumah->denah, '/'));
                    $oldPublicHtml = rtrim(base_path('../public_html'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($rumah->denah, '/');
                    if (file_exists($oldPublicHtml)) {
                        Log::info('Deleting old denah (public_html)', ['old' => $oldPublicHtml]);
                        @unlink($oldPublicHtml);
                    } elseif (file_exists($oldPublic)) {
                        Log::info('Deleting old denah (public)', ['old' => $oldPublic]);
                        @unlink($oldPublic);
                    }
                }

                $denah = $request->file('denah');

                $denahName = time() . '_denah.' . $denah->getClientOriginalExtension();

                Log::info('Moving denah (update)', ['destination' => $destination, 'fileName' => $denahName]);

                $denah->move($destination, $denahName);

                $data['denah'] = 'images/' . $denahName;

                Log::info('Denah moved (update)', ['stored' => $data['denah']]);
            }

            $rumah->update($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil diupdate');

        } catch (\Exception $e) {
            Log::error('Update error', ['id' => $id, 'message' => $e->getMessage()]);

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);

        try {

            // Hapus foto
            if ($rumah->foto) {
                $oldPublic = public_path(ltrim($rumah->foto, '/'));
                $oldPublicHtml = rtrim(base_path('../public_html'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($rumah->foto, '/');
                if (file_exists($oldPublicHtml)) {
                    Log::info('Deleting foto (destroy) in public_html', ['file' => $oldPublicHtml]);
                    @unlink($oldPublicHtml);
                } elseif (file_exists($oldPublic)) {
                    Log::info('Deleting foto (destroy) in public', ['file' => $oldPublic]);
                    @unlink($oldPublic);
                }
            }

            // Hapus denah
            if ($rumah->denah) {
                $oldPublic = public_path(ltrim($rumah->denah, '/'));
                $oldPublicHtml = rtrim(base_path('../public_html'), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($rumah->denah, '/');
                if (file_exists($oldPublicHtml)) {
                    Log::info('Deleting denah (destroy) in public_html', ['file' => $oldPublicHtml]);
                    @unlink($oldPublicHtml);
                } elseif (file_exists($oldPublic)) {
                    Log::info('Deleting denah (destroy) in public', ['file' => $oldPublic]);
                    @unlink($oldPublic);
                }
            }

            $rumah->delete();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil dihapus');

        } catch (\Exception $e) {
            Log::error('Destroy error', ['id' => $id, 'message' => $e->getMessage()]);

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);

        return view('rumah.show', compact('rumah'));
    }

    public function detailUser($id)
    {
        $rumah = Rumah::findOrFail($id);

        return view('detail', compact('rumah'));
    }
}