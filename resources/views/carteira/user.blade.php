@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> PERFIL </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="name">Nome</label>
		        <input type="text" class="form-control" name="name"  id="name" required>
		    </div>
		    <div class="form-group">
		        <label for="login">Login</label>
		        <input type="text" class="form-control" name="login" id="login">
		    </div>
		    <div class="form-group">
		        <label for="email">E-mail</label>
		        <input type="text" class="form-control" name="email" id="descricao">
		    </div>
		    <div class="form-group">
		        <label for="email">Senha</label>
		        <input type="text" class="form-control" name="email" id="descricao">
		    </div>
		   <div class="col-md-6">
                <input type="submit" value="Editar" class="btn btn-info btn-block">
            </div>
        	
		</div>
	</form>
</div>


		<script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>

@endsection