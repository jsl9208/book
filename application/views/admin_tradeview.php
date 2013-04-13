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
						<form action="<?php echo site_url('admin/tradesearch') ?>" method="POST">
							搜索<input type="text" id="search" name="search">
							<select name="type" id="type">
								<option value="bookname">书名</option>
								<option value="tradeid">交易编号</option>
								<option value="bookid">图书编号</option>
								<option value="owner">卖家ID</option>
								<option value="buyer">买家ID</option>
							</select>
							<input type="submit" value="查询">
						</form>
					</td>
					<td>　　</td>
					<td>
						<form action="<?php echo site_url('admin/tradeview') ?>" method="POST">
							排序：按
							<select name="order" id="order">
								<option value="tradeid">交易编号</option>
								<option value="bookid">图书编号</option>
								<option value="price">成交价格</option>
								<option value="createdate">添加时间</option>
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
		<div class="tradelist">
			<table border="1">
				<thead>
					<tr>
						<th>交易编号</th>
						<th>图书编号</th>
						<th>书名</th>
						<th>卖家ID</th>
						<th>买家ID</th>
						<th>成交价格</th>
						<th>添加时间</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row ) {?>
					<tr>
						<td><?php echo $row->tradeid?></td>
						<td><?php echo $row->bookid?></td>
						<td><?php echo $idToNameB[$row->bookid]?></td>
						<td><?php echo $idToNameU[$row->ownerid]?></td>
						<td><?php echo $idToNameU[$row->buyerid]?></td>
						<td><?php echo $row->price?></td>
						<td><?php echo date("Y-m-d", $row->createdate)?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>