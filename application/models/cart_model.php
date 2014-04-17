<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cart_model extends CI_Model
{
	
	public function validate_add_cart_item($id,$qty,$size)
	{
		$query = $this->db->query("Select Ten, HinhDaiDien, Gia from tbl_sanpham as a Where a.Id = ?",array($id));
		if($query->num_rows > 0){
			foreach ($query->result() as $row)
			{
					$data = array(
						'id'      => $id,
						'qty'     => $qty,
						'price'   => $row->Gia,
						'name'    => $this->unicode->change($row->Ten),
						'options' => array('size' => $size, 'hinhanh' => $row->HinhDaiDien)
					);
					 return $this->cart->insert($data);
			}
		}
		return FALSE;
	}
	public function validate_update_cart($total,$item,$qty)
	{	
			$data = array(
               'rowid' => $item,
               'qty'   => $qty
            );
			if($this->cart->update($data))
			{
				return TRUE;
			}
			return FALSE;
	}
	public function delete_item($del)
	{
			$data = array(
			   'rowid' => $del,
			   'qty'   => 0
			);
		 if($this->cart->update($data)){return TRUE;
		}
		else return FALSE;
	}
	public function cart_content()
	{
		return $this->cart->total();
	}
	
}


/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */