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
<<<<<<< HEAD
    <button type="submit" class="btn btn-dark">Enviar</button>
=======
    <button type="submit" class="btn btn-dark"><i class="far fa-share-square"></i></button>
    <a class="btn btn-success" href="{{ route('categories.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
</div>
