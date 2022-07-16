@extends('base')

@section('style')
    <style>
        .card{
            animation: fadeIn 1s;
            transition: transform 500ms ease;
        }
        .card:hover{
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
@endsection

@section('meta') homepage, list of books @endsection

@section('main')


    <div class="container">
        <form method="get">
            <div class="row">
                <div class="col-6">
                    <div class="dropdown">
                        <select name="genre" class="btn btn-dark dropdown-toggle mb-4 form-select w-50" aria-label="select genre">
                            <option value="" selected>genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6 ">
                <div class="input-group mb-3 float-end" style="width: 200px;">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="search by name" aria-label="search by name" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary bg-dark" type="submit" aria-label="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
    

    <div class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card m-auto text-light bg-dark pt-3 animate__animated animate__fadeIn" style="box-shadow: 5px 5px 20px black; width: 18rem;">
                        <img src="{{ $book->imageURL() }}" alt="" style=" height:16rem; object-fit: contain;" class="m-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <div class="row ">
                                <div class="col-6 text-muted" style="color: rgb(180, 180, 180) !important;">{{ $book->author->name }}</div>
                                <div class="col-6 text-end text-muted" style="color: rgb(180, 180, 180) !important;">{{ $book->created_at }}</div>
                            </div>
                            <p style="min-height: 149px; max-height: 149px;
                                     display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden;"
                            class="card-text mt-2"> {{ $book->description }} </p>
                            <div class="row ">
                                <div class="col-6 ">
                                <button style="border: none; background: none;" aria-label="like">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-light bi bi-hand-thumbs-up-fill review" viewBox="0 0 16 16" data-review="true" data-id="{{ $book->id }}">
                                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                </button>
                                <button style="border: none; background: none;" aria-label="dislike">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-light bi bi-hand-thumbs-down-fill review" viewBox="0 0 16 16" data-review="false" data-id="{{ $book->id }}">
                                    <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                    </svg>
                                </button>
                                </div>
                                <div class="col-6 text-end text-muted" style="color: rgb(180, 180, 180) !important;" id="b-{{ $book->id }}">
                                    {{ $book->likes }} likes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if( $books->hasPages() )
        <div class="my-3 ">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if($books->currentPage() != 1)
                        <li class="page-item"><a style="border: 1px solid rgba(255,255,255,0.2);" class="page-link text-light bg-dark" href="{{ $books->withQueryString()->previousPageUrl() }}">Previous</a></li>
                        <li class="page-item"><a style="border: 1px solid rgba(255,255,255,0.2);" class="page-link text-light bg-dark" href="{{ $books->withQueryString()->previousPageUrl() }}">{{ $books->currentPage() - 1 }}</a></li>
                    @endif
                    <li class="page-item"><a style="border: 1px solid rgba(255,255,255,0.2);" class="page-link text-white bg-secondary" href="#">{{ $books->currentPage() }}</a></li>
                    @if($books->hasMorePages())
                        <li class="page-item"><a style="border: 1px solid rgba(255,255,255,0.2);" class="page-link text-light bg-dark" href="{{ $books->withQueryString()->nextPageUrl() }}">{{ $books->currentPage() + 1 }}</a></li>
                        <li class="page-item"><a style="border: 1px solid rgba(255,255,255,0.2);" class="page-link text-light bg-dark" href="{{ $books->withQueryString()->nextPageUrl() }}">Next</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
    
@endsection

@section('scripts')
    <script>
        let reviewButtons = document.getElementsByClassName('review');
        for(let element of reviewButtons) {
            element.addEventListener('click', (e)=>{
                $.ajax({
                    method: 'GET',
                    url: '{{ route('review') }}',
                    data: { 
                        id: element.dataset.id,
                        review: element.dataset.review
                    }
                }).done(function( data ) {
                    document.getElementById(`b-${element.dataset.id}`).innerHTML = data.likes + " likes";
                });
            });
        }
    </script>
@endsection
