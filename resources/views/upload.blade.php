@extends('layouts.app')

@section('content')

<div class="bg-white p-4 w-2/3 mx-auto">
    <body>
    <h2 class="text-center text-2xl">Upload your dog!</h2>
    <form 
        action="/pictures/create" 
        method="post" 
        enctype="multipart/form-data">
            <input
                type="file"
                name="image"
                > 
            <input
                type="text"
                name="name"
                placeholder="e.g. Rex"
                >
            <button type="submit">
                Submit
            </button>
    </form>
    </body>
</div>

@endsection