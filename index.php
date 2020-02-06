<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
	<title>Список Пользователь + Сделка, Контакт</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
	<script src="index.js?time=<?=time()?>"></script>
</head>
<body>

	<div class="container">
		<div class="row my-3">
			<div class="col-12 col-md-8 py-1">
				<h4 class="mx-1">Список Пользователь + Сделка, Контакт</h4>
			</div>
			<div class="col-12 col-md-4 py-1">
				<button type="button" class="btn btn-secondary float-right mx-1" onclick="rowLoad('next')">
					<i class="fas fa-arrow-right"></i>
				</button>
				<button type="button" class="btn btn-secondary float-right mx-1" onclick="rowLoad('prev')">
					<i class="fas fa-arrow-left"></i>
				</button>
				<label id="list-page" class="col-form-label float-right mx-1">Страница: ---</label>
			</div>
		</div>
		<table class="table table-bordered table-sm mt-3">
			<thead>
				<tr>
					<th>ID</th>
					<th>NAME</th>
					<th>User_ID</th>
					<th>CRM_ID</th>
				</tr>
			</thead>
			<tbody id="list-tbody">
				<tr>
					<td>-</td>
					<td>нет данных</td>
					<td>-</td>
					<td>-</td>
				</tr>
			</tbody>
		</table>
	</div>

</body>
</html>
