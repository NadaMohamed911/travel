<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <h2 class="text-xl font-bold mb-4">Edit Trip</h2>
                
                <form action="{{ route('trips.update', $trip->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block mb-1">Trip Name</label>
                        <input type="text" name="name" value="{{ $trip->name }}" class="border p-2 w-full rounded">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block mb-1">Price</label>
                        <input type="number" name="price" value="{{ $trip->price }}" class="border p-2 w-full rounded">
                    </div>
                    
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>