<div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6">
    <h2 class="mb-4 text-xl font-bold text-gray-900">Detail Volunteer</h2>
    @if($volunteer)
        @if($volunteer->image)
            <img src="{{ asset('storage/' . $volunteer->image) }}" alt="Volunteer Image" class="w-full h-auto mb-4 rounded">
        @endif
        <p><strong>Nama:</strong> {{ $volunteer->name }}</p>
        <p><strong>Tanggal:</strong> 
            {{ \Carbon\Carbon::parse($volunteer->start_date)->format('d M Y') }} - 
            {{ \Carbon\Carbon::parse($volunteer->end_date)->format('d M Y') }}
        </p>
        <p><strong>Deskripsi:</strong> {{ $volunteer->description }}</p>
        <p><strong>Kategori:</strong> {{ $volunteer->category }}</p>
        <p><strong>Crystal Reward:</strong> {{ $volunteer->crystal_reward }}</p>
        <p><strong>Leaflets Reward:</strong> {{ $volunteer->leaflets_reward }}</p>
        <p><strong>Created By:</strong> {{ $volunteer->created_by }}</p>
        <p><strong>Created At:</strong> {{ $volunteer->created_at->format('d M Y') }}</p>
        <p><strong>Updated At:</strong> {{ $volunteer->updated_at->format('d M Y') }}</p>
        
        <button wire:click="back" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Kembali</button>
    @else
        <p>Volunteer tidak ditemukan.</p>
    @endif
</div>