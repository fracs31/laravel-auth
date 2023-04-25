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
            {{-- Bottoni --}}
            <div class="d-flex gap-2">
                {{-- Nuovo progetto --}}
                <a class="btn btn-primary" href="{{ route("projects.create") }}">Nuovo progetto</a>
                {{-- Se è presente il parametro "trashed" nella query string --}}
                @if (request("trashed"))
                    {{-- Index --}}
                    <a class="btn btn-secondary" href="{{ route("projects.index") }}">Tutti i progetti</a>    
                    {{-- Altrimenti --}}
                    @else
                    {{-- Cestino --}}
                    <a class="btn btn-secondary" href="{{ route("projects.index", ["trashed" => true]) }}">Cestino ({{ $num_of_trashed }})</a>
                @endif
            </div>
        </div>
        {{-- Tabella --}}
        <table class="table">
            {{-- Testa --}}
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">URL</th>
                    <th scope="col">Data di cancellazione</th>
                    <th scope="col">Data di creazione</th>
                    <th scope="col">Data di aggiornamento</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            {{-- Corpo --}}
            <tbody>
                {{-- Ciclo --}}
                @foreach ($projects as $project)
                    <tr>
                        {{-- ID --}}
                        <td>{{ $project->id }}</td>
                        {{-- Titolo --}}
                        <td>{{ $project->title }}</td>
                        {{-- Cliente --}}
                        <td>{{ $project->client }}</td>
                        {{-- Descrizione --}}
                        <td>{{ $project->description }}</td>
                        {{-- URL --}}
                        <td><a href="{{ route("projects.show", $project) }}">{{ $project->url }}</a></td>
                        {{-- Data di cancellazione --}}
                        <td>{{ $project->deleted_at }}</td>
                        {{-- Data di creazione --}}
                        <td>{{ $project->created_at }}</td>
                        {{-- Data di aggiornamento --}}
                        <td>{{ $project->updated_at }}</td>
                        {{-- Opzioni --}}
                        <td>
                            {{-- Mostra --}}
                            <a class="btn btn-primary mb-2 w-100" href="{{ route("projects.show", $project) }}">Mostra</a>
                            {{-- Modifica --}}
                            <a class="btn btn-warning mb-2 w-100" href="{{ route("projects.edit", $project) }}">Modifica</a>
                            {{-- Cancella --}}
                            <form class="mb-2" action="{{ route("projects.destroy", $project) }}" method="POST">
                                {{-- Cross-Site Request Forgery --}}
                                @csrf
                                {{-- Metodo --}}
                                @method("DELETE")
                                {{-- Bottone --}}
                                <button class="btn btn-danger w-100" type="submit">Cancella</button>
                            </form>
                            {{-- Se il progetto è stato cancellato --}}
                            @if ($project->trashed())
                                {{-- Ripristina --}}
                                <form action="{{ route("projects.restore", $project) }}" method="POST">
                                    {{-- Cross-Site Request Forgery --}}
                                    @csrf
                                    {{-- Bottone --}}
                                    <button class="btn btn-success w-100" type="submit">Ripristina</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection