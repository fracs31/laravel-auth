{{-- Layout --}}
@extends("layouts.app")
{{-- Content --}}
@section('content')
    {{-- Container --}}
    <div class="container">
        {{-- Div --}}
        <div class="mt-5 d-flex justify-content-between align-items-center">
            {{-- Titolo --}}
            <h1>
                Progetti
            </h1>
            {{-- Nuovo progetto --}}
            <form action="{{ route("projects.create") }}" method="GET">
                @csrf
                <button class="btn btn-primary" type="submit">Nuovo progetto</button>
            </form>
        </div>
        {{-- Tabella --}}
        <table class="table">
            {{-- Testa --}}
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">URL</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            {{-- Corpo --}}
            <tbody>
                {{-- Ciclo --}}
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->description }}</td>
                        <td><a href="{{ route("projects.show", $project) }}">{{ $project->url }}</a></td>
                        <td class="d-flex flex-column gap-2">
                            <a class="btn btn-primary" href="">Modifica</a>
                            <form action="" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection