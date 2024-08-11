<?php

namespace App\Http\Controllers;

use App\Models\average;
use Illuminate\Http\Request;

class averageController extends Controller
{
    public function index()
    {
        $averages = Average::all();

        // Calculate averages for each record
        $chartData = [];
        foreach ($averages as $average) {
            $average->totalAverage = $average->calculateAverage();
            $chartData[] = [
                'tahun_ajaran' => $average->tahun_ajaran,
                'kelas' => $average->kelas,
                'semester' => $average->semester,
                'average' => $average->totalAverage,
            ];
        }

        return view('page.rapor.rerata.rerata', compact('averages', 'chartData'));
    }
    public function create()
    {
        return view('page.rapor.rerata.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'pai' => 'nullable|numeric|min:0|max:100',
            'pkn' => 'nullable|numeric|min:0|max:100',
            'indo' => 'nullable|numeric|min:0|max:100',
            'mtk' => 'nullable|numeric|min:0|max:100',
            'sejindo' => 'nullable|numeric|min:0|max:100',
            'bhs_asing' => 'nullable|numeric|min:0|max:100',
            'sbd' => 'nullable|numeric|min:0|max:100',
            'pjok' => 'nullable|numeric|min:0|max:100',
            'simdig' => 'nullable|numeric|min:0|max:100',
            'fis' => 'nullable|numeric|min:0|max:100',
            'kim' => 'nullable|numeric|min:0|max:100',
            'sis_kom' => 'nullable|numeric|min:0|max:100',
            'komjar' => 'nullable|numeric|min:0|max:100',
            'progdas' => 'nullable|numeric|min:0|max:100',
            'ddg' => 'nullable|numeric|min:0|max:100',
            'iaas' => 'nullable|numeric|min:0|max:100',
            'paas' => 'nullable|numeric|min:0|max:100',
            'saas' => 'nullable|numeric|min:0|max:100',
            'siot' => 'nullable|numeric|min:0|max:100',
            'skj' => 'nullable|numeric|min:0|max:100',
            'pkk' => 'nullable|numeric|min:0|max:100',
        ]);

        average::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'pai' => $request->pai,
            'pkn' => $request->pkn,
            'indo' => $request->indo,
            'mtk' => $request->mtk,
            'sejindo' => $request->sejindo,
            'bhs_asing' => $request->bhs_asing,
            'sbd' => $request->sbd,
            'pjok' => $request->pjok,
            'simdig' => $request->simdig,
            'fis' => $request->fis,
            'kim' => $request->kim,
            'sis_kom' => $request->sis_kom,
            'komjar' => $request->komjar,
            'progdas' => $request->progdas,
            'ddg' => $request->ddg,
            'iaas' => $request->iaas,
            'paas' => $request->paas,
            'saas' => $request->saas,
            'siot' => $request->siot,
            'skj' => $request->skj,
            'pkk' => $request->pkk,
        ]);
        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil ditambahkan");
    }

    public function edit($id)
    {
        $average = average::find($id);
        return view('page.rapor.rerata.edit', compact('average'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
        ], [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        average::find($id)->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
            'pai' => $request->pai,
            'pkn' => $request->pkn,
            'indo' => $request->indo,
            'mtk' => $request->mtk,
            'sejindo' => $request->sejindo,
            'bhs_asing' => $request->bhs_asing,
            'sbd' => $request->sbd,
            'pjok' => $request->pjok,
            'simdig' => $request->simdig,
            'fis' => $request->fis,
            'kim' => $request->kim,
            'sis_kom' => $request->sis_kom,
            'komjar' => $request->komjar,
            'progdas' => $request->progdas,
            'ddg' => $request->ddg,
            'iaas' => $request->iaas,
            'paas' => $request->paas,
            'saas' => $request->saas,
            'siot' => $request->siot,
            'skj' => $request->skj,
            'pkk' => $request->pkk,
        ]);

        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil diPerbaharui");
    }

    // public function chartData(Request $request)
    // {
    //     $tahunAjaran = $request->get('tahun_ajaran');
    //     $kelas = $request->get('kelas');

    //     $query = Average::query();

    //     if ($tahunAjaran) {
    //         $query->where('tahun_ajaran', $tahunAjaran);
    //     }

    //     if ($kelas) {
    //         $query->where('kelas', $kelas);
    //     }

    //     $averages = $query->get();

    //     if ($averages->isEmpty()) {
    //         return response()->json([]);
    //     }

    //     $chartData = $averages->map(function ($average) {
    //         // Ensure that $average is a valid instance of the Average model
    //         if (!is_object($average)) {
    //             return null;
    //         }

    //         // Calculate the average
    //         $totalAverage = (
    //             $average->pai + $average->pkn + $average->indo + $average->mtk +
    //             $average->sejindo + $average->bhs_asing + $average->sbd + $average->pjok +
    //             $average->simdig + $average->fis + $average->kim + $average->sis_kom +
    //             $average->komjar + $average->progdas + $average->ddg + $average->iaas +
    //             $average->paas + $average->saas + $average->siot + $average->skj + $average->pkk
    //         ) / 21; // 21 subjects

    //         return [
    //             'tahun_ajaran' => $average->tahun_ajaran,
    //             'kelas' => $average->kelas,
    //             'average' => $totalAverage,
    //         ];
    //     })->filter(); // Filter out any null values

    //     return response()->json($chartData);
    // }
}
