<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorPackages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $packages = VendorPackages::all();
        return view('admin-dashboard.settings.vendor-packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('admin-dashboard.settings.vendor-packages.create');
    }

    public function getPackageData($uid)
    {
        $result = checkIdsAvailable($uid);
        if(!$result)
        {
            return response()->json([
                'status' => false,
                'message' => 'Məlumat tapılmadı.',
                'data' => [],
            ]);
        }

        $decryptedUid = decrypt($uid);

        return response()->json([
            'status' => true,
            'message' => 'Məlumat tapıldı.',
            'data' => VendorPackages::find($decryptedUid)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'package_name' => 'required|array',
                'package_description' => 'nullable|array',
                'amount' => 'required|numeric|min:0',
                'commission' => 'required|numeric|min:0',
                'duration' => 'required|numeric|min:0',
                'status' => 'required|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '-' . $logo->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/logo');
                $logo->move($destinationPath, $logoName);
                $validated['logo'] = $logoName;
            }

            $package = VendorPackages::create([
                'package_name' => $request->input('package_name'),
                'package_description' => $request->input('package_description'),
                'amount' => $request->input('amount'),
                'commission' => $request->input('commission'),
                'duration' => $request->input('duration'),
                'logo' => $validated['logo'] ?? NULL,
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Paket müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.vendor-packages.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $result = checkIdsAvailable($id);
        if(!$result)
        {
            flasher('Meydança özəlliyi tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $package = VendorPackages::find($decryptedUid);
        return view('admin-dashboard.settings.vendor-packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {

            $result = checkIdsAvailable($id);
            if(!$result)
            {
                flash('Məlumat tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'danger');
                return redirect()->route('admin.vendor-packages.index');
            }

            $decryptedUid = decrypt($id);

            DB::beginTransaction();
            $validated = $request->validate([
                'package_name' => 'required|array',
                'package_description' => 'nullable|array',
                'amount' => 'required|numeric|min:0',
                'commission' => 'required|numeric|min:0',
                'duration' => 'required|numeric|min:0',
                'status' => 'required|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $package = VendorPackages::find($decryptedUid);

            if ($request->hasFile('logo')) {
                if ($package->logo && file_exists(public_path('dashboard/images/logo/' . $package->logo))) {
                    unlink(public_path('dashboard/images/logo/' . $package->logo));
                }

                $logo = $request->file('logo');
                $logoName = time() . '-' . $logo->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/logo');
                $logo->move($destinationPath, $logoName);
                $validated['logo'] = $logoName;
            }

            $package->update([
                'package_name' => $request->input('package_name'),
                'package_description' => $request->input('package_description'),
                'amount' => $request->input('amount'),
                'commission' => $request->input('commission'),
                'duration' => $request->input('duration'),
                'logo' => $validated['logo'] ?? $package->logo,
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Paket müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.vendor-packages.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
