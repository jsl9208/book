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
				$this->db->like('name', $item);
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
				$this->db->where('owner', $item);
				break;
				default:
			}
			$data = $this->db->get('bookinfo');
			return $data;
		}
		function tradesearch($item, $type) {
			$data = '';
			switch ($type) {
				case 'bookid':
				$this->db->where('bookid', $item);
				break;
				case 'bookname':
				$this->db->like('bookname', $item);
				break;
				case 'tradeid':
				$this->db->where('tradeid', $item);
				break;
				case 'buyer':
				$this->db->where('buyer', $item);
				break;
				case 'owner':
				$this->db->where('owner', $item);
				break;
				default:
			}
			$data = $this->db->get('tradeinfo');
			return $data;
		}
		function count($item) {
			return $this->db->get($item)->num_rows();
		}
		function identify() {
			$idToName['user'] = '';
			$idToName['book'] = '';
			$this->db->select('userid');
			$data = $this->db->get('user');

		}
	}
	?>