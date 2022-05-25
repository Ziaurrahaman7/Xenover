@props(['link','name', 'title'])
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{$title}}</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a target="_blank" class="btn btn-info" href="{{$link}}">{{$name}}</a>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    
                        {{$slot}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>