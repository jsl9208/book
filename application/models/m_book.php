<?php 
	class M_book extends CI_Model {
		function get($type, $order, $ordertype) {
			$this->db->order_by($order, $ordertype);
			return $this->db->get($type);
		}
		function booksearch($item, $type) {
			$data = '';
			switch ($type) {
				case 'ID':
				$this->db->where('bookid', $item);
				break;
				case 'name':
				$this->db->like('bookname', $item);
				break;
				case 'author':
				$this->db->like('author', $item);
				break;
				case 'press':
				$this->db->like('press', $item);
				break;
				case 'ISBN':
				$this->db->where('ISBN', $item);
				break;
				case 'owner':
				$this->db->where('ownerid', $item);
				break;
				default:
			}
			$data = $this->db->get('bookinfo');
			return $data;
		}
		function tradesearch($item, $type) {
			$data = '';
			if ($type == 'bookname') 
				$data = $this->db->query("select * from tradeinfo where bookid in (select bookid from bookinfo where bookname like '%$item%')");
			else{
				switch ($type) {
					case 'tradeid':
					$this->db->where('tradeid', $item);
					break;
					case 'bookid':
					$this->db->where('bookid', $item);
					break;
					case 'buyer':
					$this->db->where('buyerid', $item);
					break;
					case 'owner':
					$this->db->where('ownerid', $item);
					break;
					default:
				}
				$data = $this->db->get('tradeinfo');
			}
			return $data;
		}
		function count($item) {
			return $this->db->get($item)->num_rows();
		}
		function idToName($type) {
			switch($type) {
				case 'user':
				$data = $this->db->get('user');
				foreach ($data->result() as $row) {
					$idToNameU[$row->userid] = $row->username;
					$idToNameU[$row->username] = $row->userid;
				}
				return $idToNameU;
				case 'book':
				$data = $this->db->get('bookinfo');
				foreach ($data->result() as $row) {
					$idToNameB[$row->bookid] = $row->bookname;
					$idToNameB[$row->bookname] = $row->bookid;
				}
				return $idToNameB;
				default:
				return '';
			}

		}
	}
	?>