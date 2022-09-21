<div class="container mx-auto py-16 px-8">
    <div class="">
        <div class="mb-4">
            <input class="float-right mb-4 w-3/12" type="text" wire:model.lazy="search" placeholder="Search for products">
        </div>

        <table class="table-auto w-full mb-4">
            <thead>
                <tr>
                   <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">ID</th>
                   <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Image</th>
                   <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Title</th>
                   <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                       <td class="py-2 px-3 border-b">{{$product->id}}</td>
                       <td class="py-2 px-3 border-b"><img class="w-6" src="{{$product->image}}"></td>
                       <td class="py-2 px-3 border-b">{{$product->title}}</td>
                       <td class="py-2 px-3 border-b">{{$product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}

    </div>

</div>
