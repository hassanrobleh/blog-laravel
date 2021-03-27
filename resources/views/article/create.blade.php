@extends('base')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Poster un nouvel article</h1>

        <form action="{{ route('articles.store') }}" method="post">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titre de votre article">
                    @error('title')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="subtitle">Sous titre</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Sous titre de votre article">
                    <small class="form-text text-muted">Décrivez le contenu de votre article, le thème traité</small>
                    @error('subtitle')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea id="tinymce-editeur" name="content" id="" class="form-control w-100 @error('content') is-invalid @enderror"></textarea>
                    @error('content')
                        <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <script>
                    tinymce.init({
                        selector: "#tinymce-editeur"
                    });
                </script>

                
            </div>
            <div class="d-flex justify-centent-center mb-5">
                <button type="submit" class="btn btn-primary">Poster l'article</button>
            </div>
        </form>
    </div>
@endsection