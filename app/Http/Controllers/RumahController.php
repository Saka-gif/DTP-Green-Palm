<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\TipeRumah;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;

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

            if ($request->hasFile('foto')) {
                $upload = $this->uploadImage($request->file('foto'));

                if ($upload === null) {
                    throw new \RuntimeException('Upload foto ke Cloudinary gagal. Periksa CLOUDINARY_URL dan log aplikasi.');
                }

                $data['foto'] = $upload['url'];
                $data['foto_public_id'] = $upload['public_id'];
            }

            if ($request->hasFile('denah')) {
                $upload = $this->uploadImage($request->file('denah'));

                if ($upload === null) {
                    throw new \RuntimeException('Upload denah ke Cloudinary gagal. Periksa CLOUDINARY_URL dan log aplikasi.');
                }

                $data['denah'] = $upload['url'];
                $data['denah_public_id'] = $upload['public_id'];
            }

            Rumah::create($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil ditambahkan');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
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

            if ($request->hasFile('foto')) {
                $upload = $this->uploadImage($request->file('foto'));

                if ($upload === null) {
                    throw new \RuntimeException('Upload foto ke Cloudinary gagal. Periksa CLOUDINARY_URL dan log aplikasi.');
                }

                $this->deleteImage($rumah->foto_public_id);
                $data['foto'] = $upload['url'];
                $data['foto_public_id'] = $upload['public_id'];
            }

            if ($request->hasFile('denah')) {
                $upload = $this->uploadImage($request->file('denah'));

                if ($upload === null) {
                    throw new \RuntimeException('Upload denah ke Cloudinary gagal. Periksa CLOUDINARY_URL dan log aplikasi.');
                }

                $this->deleteImage($rumah->denah_public_id);
                $data['denah'] = $upload['url'];
                $data['denah_public_id'] = $upload['public_id'];
            }

            $rumah->update($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil diupdate');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function uploadImage($file): ?array
    {
        try {
            $response = Cloudinary::uploadApi()->upload($file->getRealPath(), [
                'folder' => 'rumah',
                'resource_type' => 'image',
            ]);

            if (! is_array($response) && ! $response instanceof \ArrayAccess) {
                Log::error('Cloudinary upload returned invalid response', [
                    'response_type' => gettype($response),
                ]);

                return null;
            }

            $responseData = $response instanceof \ArrayAccess
                ? $response->getArrayCopy()
                : $response;

            if (empty($responseData['secure_url']) || empty($responseData['public_id'])) {
                Log::error('Cloudinary upload missing expected keys', [
                    'response' => $responseData,
                ]);

                return null;
            }

            return [
                'url' => $responseData['secure_url'],
                'public_id' => $responseData['public_id'],
            ];
        } catch (\Exception $e) {
            Log::error('Cloudinary upload error', [
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }

     public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);

        try {
            $this->deleteImage($rumah->foto_public_id);
            $this->deleteImage($rumah->denah_public_id);
            $rumah->delete();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data berhasil dihapus');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

     public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('rumah.show', compact('rumah'));
    }

    private function deleteImage($publicId)
    {
        if ($publicId) {
            try {
                Cloudinary::uploadApi()->destroy($publicId);
            } catch (\Exception $e) {
                Log::error('Delete error', [
                    'error' => $e->getMessage()
                ]);
            }
        }
    }

    public function detailUser($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('detail', compact('rumah'));
    }
}