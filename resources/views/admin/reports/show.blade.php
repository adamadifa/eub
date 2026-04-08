<x-admin-premium-layout>
    <x-slot name="title">Laporan Evaluasi - {{ $lecturer->user->name }}</x-slot>

    <div class="mb-8 flex justify-between items-center print:hidden">
        <a href="{{ route('admin.reports.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-orange-500 transition font-bold text-sm">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
        </a>
        <button onclick="window.print()" class="px-6 py-2.5 bg-gray-900 text-white rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg hover:bg-gray-800 transition">
            <i data-lucide="printer" class="w-4 h-4"></i> Cetak Laporan
        </button>
    </div>

    <!-- Report Paper -->
    <div class="bg-white p-12 md:p-16 rounded-[2rem] border border-gray-100 card-shadow max-w-5xl mx-auto print:shadow-none print:border-none print:p-0 font-serif text-gray-900">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-lg font-bold uppercase leading-tight tracking-widest">SURVEY TINGKAT KEPUASAN MAHASISWA</h1>
            <h2 class="text-lg font-bold uppercase leading-tight tracking-widest">TERHADAP LAYANAN PROSES PEMBELAJARAN</h2>
            <h3 class="text-lg font-bold uppercase leading-tight tracking-widest">SEMESTER {{ strtoupper($semester->name) }}</h3>
            <h4 class="text-lg font-bold uppercase leading-tight tracking-widest">PROGRAM STUDI AKUNTANSI</h4>
        </div>

        <!-- Info Table -->
        <div class="mb-8 text-sm">
            <table class="w-full max-w-sm">
                <tr>
                    <td class="py-1 w-32 border-none">Nama Dosen</td>
                    <td class="py-1 w-4 border-none">:</td>
                    <td class="py-1 border-none font-bold">{{ $lecturer->user->name }}, {{ $lecturer->title }}</td>
                </tr>
                <tr>
                    <td class="py-1 border-none">Jumlah Responden</td>
                    <td class="py-1 border-none">:</td>
                    <td class="py-1 border-none font-bold">{{ $respondentCount }}</td>
                </tr>
            </table>
        </div>

        <!-- Main Table -->
        <div class="overflow-x-auto mb-8">
            <table class="w-full border-collapse border border-gray-800 text-sm">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="border border-gray-800 px-4 py-3 text-center font-bold w-12">No</th>
                        <th class="border border-gray-800 px-4 py-3 text-center font-bold">Indikator Penilaian</th>
                        <th class="border border-gray-800 px-4 py-3 text-center font-bold w-20">Skala</th>
                        <th class="border border-gray-800 px-4 py-3 text-center font-bold w-32">Rata - Rata Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportData as $index => $item)
                        <tr>
                            <td class="border border-gray-800 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-800 px-4 py-2">{{ $item['question'] }}</td>
                            <td class="border border-gray-800 px-4 py-2 text-center">5,00</td>
                            <td class="border border-gray-800 px-4 py-2 text-center">{{ number_format($item['average'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="border border-gray-800 px-4 py-3 text-center font-bold uppercase">Total Rata - Rata Nilai</td>
                        <td class="border border-gray-800 px-4 py-3 text-center font-bold">{{ number_format($totalAverage, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border border-gray-800 px-4 py-3 text-center font-bold uppercase">Konversi Skala 100</td>
                        <td class="border border-gray-800 px-4 py-3 text-center font-bold">{{ number_format($conversion100, 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Footer / Signatures -->
        <div class="mt-16 text-sm grid grid-cols-2 gap-10">
            <div>
                <p>Tasikmalaya, {{ now()->format('d F Y') }}</p>
                <p class="mt-1 mb-20 font-medium italic">Dibuat Oleh,</p>
                <div class="mt-4">
                    <p class="font-bold underline">Nisa Noor Wahid, S.E., M.M</p>
                    <p class="text-xs text-gray-500 italic mt-1">Unit Penjamin Mutu</p>
                </div>
            </div>
            <div class="text-left md:pl-20">
                <p class="invisible">Tasikmalaya, {{ now()->format('d F Y') }}</p>
                <p class="mt-1 mb-20 font-medium italic">Mengetahui,</p>
                <div class="mt-4">
                    <p class="font-bold underline">R. Neneng Rina Andriani, S.E., M.M., Ak., CA.</p>
                    <p class="text-xs text-gray-500 italic mt-1">Ketua Program Studi Akuntansi</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body { background: white !important; }
            aside, header, footer { display: none !important; }
            main { margin-left: 0 !important; }
            .card-shadow { box-shadow: none !important; }
            @page { margin: 2cm; }
        }
    </style>
</x-admin-premium-layout>
