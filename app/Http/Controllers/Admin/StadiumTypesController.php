<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StadiumTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StadiumTypesController extends Controller
{
    public function index()
    {
        $types = StadiumTypes::all();
        return view('admin-dashboard.settings.stadium-types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.settings.stadium-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'name' => 'required|array',
                'description' => 'nullable|array',
                'status' => 'required|string',
            ]);

            $feature = StadiumTypes::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Meydança növü müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.stadium-types.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = checkIdsAvailable($id);
        if(!$result)
        {
            flasher('Meydança növü tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $type = StadiumTypes::find($decryptedUid);
        return view('admin-dashboard.settings.stadium-types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $result = checkIdsAvailable($id);
            if(!$result)
            {
                flasher('Meydança növü tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|array',
                'description' => 'nullable|array',
                'status' => 'required|string',
            ]);

            $type = StadiumTypes::findOrFail($decryptedUid);
            $type->name = $request->input('name');
            $type->description = $request->input('description');
            $type->status = $request->input('status');
            $type->save();

            DB::commit();

            flash('Meydança növü müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.stadium-types.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
