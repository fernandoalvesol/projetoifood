@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
<input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $profile->description ?? old('description') }}">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-dark"><i class="far fa-share-square"></i></button>
    <a class="btn btn-success" href="{{ route('plans.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
</div>

