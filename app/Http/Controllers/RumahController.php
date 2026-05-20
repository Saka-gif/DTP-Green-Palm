<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\TipeRumah;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;

class RumahController extends Controller
{
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
            'deskripsi' => 'nullable',
            'luas_tanah' => 'nullable',
            'luas_bangunan' => 'nullable',
            'kamar_tidur' => 'nullable|numeric',
            'kamar_mandi' => 'nullable|numeric',
            'lantai' => 'nullable|numeric',
            'carport' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'denah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $data = $request->except('foto', 'denah');

            if ($request->hasFile('foto')) {
                $uploadedFoto = $this->uploadImageToCloudinary($request->file('foto'), 'green-palm/rumah');
                $data['foto'] = $uploadedFoto['url'];
                $data['foto_public_id'] = $uploadedFoto['public_id'];
            }

            if ($request->hasFile('denah')) {
                $uploadedDenah = $this->uploadImageToCloudinary($request->file('denah'), 'green-palm/rumah');
                $data['denah'] = $uploadedDenah['url'];
                $data['denah_public_id'] = $uploadedDenah['public_id'];
            }

            Rumah::create($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data rumah berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in RumahController@store', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['upload_error' => 'Gagal upload gambar ke Cloudinary: ' . $e->getMessage()]);
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

            'deskripsi' => 'nullable',
            'luas_tanah' => 'nullable',
            'luas_bangunan' => 'nullable',
            'kamar_tidur' => 'nullable|numeric',
            'kamar_mandi' => 'nullable|numeric',
            'lantai' => 'nullable|numeric',
            'carport' => 'nullable|numeric',

            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'denah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $data = $request->except('foto', 'denah');

            if ($request->hasFile('foto')) {
                $uploadedFoto = $this->uploadImageToCloudinary($request->file('foto'), 'green-palm/rumah');
                $this->deleteImageAsset($rumah->foto, $rumah->foto_public_id);
                $data['foto'] = $uploadedFoto['url'];
                $data['foto_public_id'] = $uploadedFoto['public_id'];
            }

            if ($request->hasFile('denah')) {
                $uploadedDenah = $this->uploadImageToCloudinary($request->file('denah'), 'green-palm/rumah');
                $this->deleteImageAsset($rumah->denah, $rumah->denah_public_id);
                $data['denah'] = $uploadedDenah['url'];
                $data['denah_public_id'] = $uploadedDenah['public_id'];
            }

            $rumah->update($data);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Data rumah berhasil diupdate');
        } catch (\Exception $e) {
            Log::error('Error in RumahController@update', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['upload_error' => 'Gagal upload gambar ke Cloudinary: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);

        $this->deleteImageAsset($rumah->foto, $rumah->foto_public_id);
        $this->deleteImageAsset($rumah->denah, $rumah->denah_public_id);

        $rumah->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data rumah berhasil dihapus');
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('rumah.detail', compact('rumah'));
    }

    // ================= USER =================

    public function home()
    {
        $rumah = Rumah::all();
        return view('index', compact('rumah'));
    }

    public function detailUser($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('detail', compact('rumah'));
    }

    private function uploadImageToCloudinary($file, string $folder): array
    {
        try {
            Log::info('Starting Cloudinary upload', [
                'filename' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'folder' => $folder
            ]);

            $uploaded = Cloudinary::uploadApi()->upload($file->getRealPath(), [
                'folder' => $folder,
                'resource_type' => 'auto',
            ]);

            Log::info('Cloudinary upload successful', [
                'public_id' => $uploaded['public_id'] ?? null,
                'secure_url' => $uploaded['secure_url'] ?? null,
            ]);

            if (!isset($uploaded['public_id']) || !isset($uploaded['secure_url'])) {
                Log::error('Cloudinary response missing required fields', $uploaded);
                throw new \Exception('Upload response tidak lengkap dari Cloudinary');
            }

            return [
                'url' => $uploaded['secure_url'],
                'public_id' => $uploaded['public_id'],
            ];
        } catch (\Exception $e) {
            Log::error('Cloudinary upload failed', [
                'error' => $e->getMessage(),
                'file' => $file->getClientOriginalName(),
            ]);
            throw $e;
        }
    }

    private function deleteImageAsset(?string $url, ?string $publicId): void
    {
        if ($publicId) {
            try {
                Cloudinary::uploadApi()->destroy($publicId, ['invalidate' => true]);
                return;
            } catch (\Throwable $exception) {
            }
        }

        if ($url && ! str_starts_with($url, 'http://') && ! str_starts_with($url, 'https://')) {
            $localPath = public_path('images/' . $url);

            if (file_exists($localPath)) {
                unlink($localPath);
            }
        }
    }
}