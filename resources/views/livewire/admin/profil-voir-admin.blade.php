<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md">
    <div class="flex items-center space-x-6 mb-6">
        <img src="{{ asset('storage/' . $admin->photo_admin) }}"
             alt="Photo Admin"
             class="w-24 h-24 rounded-full object-cover border-4 border-blue-500 shadow">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $admin->nom_admin }}</h2>
            <p class="text-sm text-gray-500">{{ $admin->email }}</p>
            <p class="text-sm text-gray-500">{{ $admin->tel_admin }}</p>
        </div>
    </div>

    <div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">À propos</h3>
        <p class="text-gray-600 leading-relaxed">{{ $admin->description_admin }}</p>
    </div>
</div>

