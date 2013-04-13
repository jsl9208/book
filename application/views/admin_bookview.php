<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
</head>
<body>
	<div class="head">
		<span><a href="<?php echo site_url('admin/bookview')?>">图书管理</a></span>
		<span><a href="<?php echo site_url('admin/tradeview')?>">交易管理</a></span>
	</div>
	<div class="main" align="center">
		<div class="header">
			<h1><?php echo $heading ?></h1>
		</div>
		<div class="tools">
			<table>
				<tr>
					<td>
						<form action="<?php echo site_url('admin/booksearch') ?>" method="POST">
							搜索<input type="text" id="search" name="search">
							<select name="type" id="type">
								<option value="name">书名</option>
								<option value="author">作者</option>
								<option value="press">出版社</option>
								<option value="ISBN">ISBN</option>
								<option value="owner">卖家ID</option>
								<option value="ID">编号</option>
							</select>
							<input type="submit" value="查询">
						</form>
					</td>
					<td>　　</td>
					<td>
						<form action="<?php echo site_url('admin/bookview') ?>" method="POST">
							排序：按
							<select name="order" id="order">
								<option value="bookid">编号</option>
								<option value="bookname">书名</option>
								<option value="author">作者</option>
								<option value="press">出版社</option>
								<option value="ISBN">ISBN</option>
								<option value="createdate">添加时间</option>
								<option value="state">状态</option>
							</select>
							<select name="ordertype" id="ordertype">
								<option value="asc">升序</option>
								<option value="desc">降序</option>
							</select>
							<input type="submit" value="提交">
						</form>
					</td>
				</tr>
			</table>
		</div>
		<div class="booklist">
			<table border="1">
				<thead>
					<tr>
						<th>编号</th>
						<th>书名</th>
						<th>作者</th>
						<th>出版社</th>
						<th>价格</th>
						<th>ISBN</th>
						<th>卖家ID</th>
						<th>添加时间</th>
						<th>状态</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row ) {?>
					<tr>
						<td><?php echo $row->bookid?></td>
						<td><?php echo $row->bookname?></td>
						<td><?php echo $row->author?></td>
						<td><?php echo $row->press?></td>
						<td><?php echo $row->price?></td>
						<td><?php echo $row->ISBN?></td>
						<td><?php echo $idToNameU[$row->ownerid]?></td>
						<td><?php echo date("Y-m-d", $row->createdate)?></td>
						<td><?php if ($row->state) echo "卖出"; else echo "待售";?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>