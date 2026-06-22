<x-app-layout> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        
           <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
    @forelse($trips as $trip)
            <div class="border p-4 rounded shadow bg-white">
                      <h3 class="text-lg font-bold">{{ $trip->title }}</h3>
<p class="text-gray-600">Price: {{ $trip->price }} EGP</p>



                     <form action="{{ route('bookings.store', $trip->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">
        Book Now
    </button>
</form>



        </div>
    @empty
        <p>لا توجد رحلات متاحة حالياً.</p>
    @endforelse
</div>

        </div>
    </div>
</x-app-layout>