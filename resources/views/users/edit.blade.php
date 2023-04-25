@extends("layout")
@section("content")

<div class="container mx-2 my-2 px-4">
	<h1 class="text-4xl font-bold">Modifier le nom de l'utilisateur</h1>


	<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

		<!-- Le token CSRF -->
		@csrf
		
		<p>
			<label for="name" >Nom de l'utilisateur</label><br/>

			<input type="text" name="name" value="{{ $user->name }}"  id="name" placeholder="Le Nom du de l'utilisateur" class="border">

		</p>

		<p>
			<label for="name" >Rôle</label><br/>

			<select name="roles" class="border">
				@foreach ($roles as $role)
					<option value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role) ? 'selected' : '' }}>{{ $role->name }}</option>
				@endforeach
			</select>
		</p>


		


		<input type="submit" name="valider" value="Valider" class=" transition ease-in-out rounded bg-slate-400 py-2 px-3 mt-2 hover:bg-slate-300">

	</form>
</div>
@endsection