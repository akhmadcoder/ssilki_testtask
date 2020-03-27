<html>
<head>
	<meta charset="UTF-8">
	<title>Crud App using vue.js</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.8.1/css/all.css">
	<style type="text/css">
		#overlay{
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: rgba(0,0,0,0.6);
		}
	</style>

</head>
<body>
		
		<div class="container">
				
			<div class="row mt-3">
				<div class="col-lg-6">
					<h3 class="text-info">ссылки</h3>
				</div>
			</div>
			<hr class="bg-info">
			@if(Session::has('success'))
				    <div class="alert alert-success">
				        {{Session::get('success')}}
				    </div>
			@endif
			@if(Session::has('fail'))
			    <div class="alert alert-danger">
			       {{Session::get('fail')}}
			    </div>
			@endif

			<!-- Displaying records -->
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr class="text-center bg-info text-light">
								<td>#</td>
								<td>ссылки</td>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach ($links as $link)
							<tr class="text-center" v-for="user in users">
								<td>{{$i}}</td>
								<td>
								<a href="{{ route('shorten.url', $link->link) }}" target="_blank">
									http://go.gl/{{ $link->link }}
								</a>

								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>

			<hr class="bg-info">
			<div class="row mt-3">
				<div class="col-lg-6">
					<h3 class="text-info">Добавить новую ссылку</h3>
				</div>
			</div>
			

			<div class="row">
				<div class="col-lg-6">
					<form method="post" action="{{ route('links.store') }}">
					  <div class="form-group">
					    @error('url')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					    <input placeholder="ссылка" type="url" class="@error('url') is-invalid @enderror form-control" name="url">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
					  </div>
					  
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	
</body>
</html>