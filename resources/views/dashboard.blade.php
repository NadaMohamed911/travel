<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips Management') }}
        </h2>
    </x-slot>

    <div class="py-12">





    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    

        <div class="bg-white p-6 mb-6 shadow-sm sm:rounded-lg">
             <h3 class="text-lg font-bold mb-4">Add New Trip</h3>
         <form action="{{ route('trips.store') }}" method="POST" class="flex gap-4">
        @csrf
          <input type="text" name="name" placeholder="Trip Name" class="border p-2 rounded w-full" required>
          <input type="number" name="price" placeholder="Price" class="border p-2 rounded w-full" required>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add</button>
         </form>
          </div>



                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b p-4">Trip Name</th>
                                <th class="border-b p-4">Price</th>
                                <th class="border-b p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($trips as $trip)

          

                            <tr>
                                <td class="border-b p-4">{{ $trip->name }}</td>
                                <td class="border-b p-4">{{ $trip->price }}</td>
                            <td class="border-b p-4 flex gap-4">

  
                                     <a href="{{ route('trips.edit', $trip->id) }}" class="text-blue-600 hover:text-blue-900 ">Edit</a>


                                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                           @csrf
                                           @method('DELETE')
                                         <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                   </form>

                        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>