<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->titre }}</title>
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
</head>
<body>
    <div class="container">
        <div class="article-header">
            <h1> {{ $article->titre }}</h1>
            <div class="meta-info">
                 Publié le {{ $article->created_at->format('d/m/Y à H:i') }}
                @if($article->updated_at != $article->created_at)
                    • ✏️ Modifié le {{ $article->updated_at->format('d/m/Y à H:i') }}
                @endif
            </div>
        </div>

        <div class="article-content">
            {{ $article->contenu }}
        </div>

        <div class="button-group">
            <a href="{{ route('articles.index') }}" class="btn btn-primary"> Retour à la liste</a>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">✏️ Modifier</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️  Supprimer</button>
            </form>
        </div>
    </div>
</body>
</html>