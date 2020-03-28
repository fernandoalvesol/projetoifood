@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" ols="30" rows="5" class="form-control">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="far fa-share-square"></i></button>
    <a class="btn btn-success" href="{{ route('categories.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
</div>
