<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
</head>
<body>
	<div class="main" align="center">
		<div class="header">
			<h1><?php echo $heading ?></h1>
		</div>
		<div class="result">
			<?php 
			if($blank) echo "请输入查询内容！";
			else if($post->num_rows() > 0 ) {
				?>
				<div class="tradelist">
					<table border='1'>
						<thead>
							<tr>
								<th>编号</th>
								<th>书名</th>
								<th>作者</th>
								<th>出版社</th>
								<th>价格</th>
								<th>ISBN</th>
								<th>发布人</th>
								<th>添加时间</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($post->result() as $row ) {?>
							<tr>
								<td><?php echo $row->bookid?></td>
								<td><?php echo $row->name?></td>
								<td><?php echo $row->author?></td>
								<td><?php echo $row->press?></td>
								<td><?php echo $row->price?></td>
								<td><?php echo $row->ISBN?></td>
								<td><?php echo $row->owner?></td>
								<td><?php echo date('Y-m-d', $row->createdate)?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php }
				else echo "没有匹配的条目！";
				?>
				<a href="<?php echo site_url('admin') ?>">返回</a>
			</div>
		</div>
	</body>
	</html>