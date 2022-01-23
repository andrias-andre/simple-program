<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {

    public function getDataProduct(){

        $this->db->select('id_product, code, name, selling_price, buying_price, date_created, date_edited');
        $this->db->from('products');
        $this->db->order_by('code','asc');
        $get  = $this->db->get()->result();
        $data = array();
        $no   = 0;

            foreach($get as $row){

                $selling = number_format($row->selling_price,0);
                $buying  = number_format($row->buying_price,0);

                $no++;
                $option = "
                <div class='row  mx-auto'>
                    <div class='col'>
                        <button type='button' onclick=\"javascript:formEditProduct('$row->name','$row->id_product','$row->code','$selling','$buying');\" class='btn btn-sm btn-primary'><i class='fas fa-edit'></i> &nbsp; EDIT</button>
                    </div>
                    <div class='col'>
                        <button type='button' class='btn btn-sm btn-danger' onclick=\"javascript:formDeleteProduct('$row->id_product','$row->code');\"><i class='fas fa-trash-alt'></i> &nbsp; DELETE</button>
                    </div>
                </div> ";

                $data[] = array('id'=>$row->id_product,'name'=>$row->name,'no'=>$no,'option'=>$option,'code'=>$row->code,'sellingPrice'=>$selling,"buyingPrice"=>$buying,"dateCreated"=>$row->date_created,"dateEdited"=>$row->date_edited);

            }

        return $data;

    }


    public function saveDataProduct($code,$name,$buying,$selling,$user){

        $buying  = str_replace(',','',$buying);
        $selling = str_replace(',','',$selling);
        

        $data = array(
            'name'          => $name,
            'code'          => $code,
            'buying_price'  => $buying,
            'selling_price' => $selling,
            'date_created'  => date('Y-m-d H:i:s'),
            'user_created'  => $user
        );

        
        $this->db->insert('products',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $save = true;
        }else{
            $save = false;
        }

        return $save;

    }


    function checkDuplicateData($table,$field,$value){

        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($field,$value);

        $row = $this->db->get()->num_rows();

        return $row;
    }


    public function editDataProduct($code,$name,$buying,$selling,$user,$id){

        $buying  = str_replace(',','',$buying);
        $selling = str_replace(',','',$selling);
        

        $data = array(
            'name'          => $name,
            'code'          => $code,
            'buying_price'  => $buying,
            'selling_price' => $selling,
            'date_edited'   => date('Y-m-d H:i:s'),
            'user_edited'   => $user
        );

        $this->db->where('id_product',$id);
        $this->db->update('products',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $save = true;
        }else{
            $save = false;
        }

        return $save;

    }


    public function deleteData($table,$field,$value){

        $this->db->where($field,$value);
        $this->db->delete($table);
        $result = $this->db->affected_rows();

        if($result > 0){
            $delete = true;
        }else{
            $delete = false;
        }

        return $delete;

    }


    public function getDataCompany(){

        $this->db->select('id_company, code, name, address, telp, mobile, email, contact, date_created, date_edited');
        $this->db->from('companys');
        $this->db->order_by('code','asc');
        $get  = $this->db->get()->result();
        $data = array();
        $no   = 0;

            foreach($get as $row){

                $no++;
                $option = "
                <div class='row  mx-auto'>
                    <div class='col'>
                        <button type='button' onclick=\"javascript:formEditCompany('$row->name','$row->id_company','$row->code','$row->address','$row->telp','$row->mobile','$row->email','$row->contact');\" class='btn btn-sm btn-primary'><i class='fas fa-edit'></i> &nbsp; EDIT</button>
                    </div>
                    <div class='col'>
                        <button type='button' class='btn btn-sm btn-danger' onclick=\"javascript:formDeleteCompany('$row->id_company','$row->code');\"><i class='fas fa-trash-alt'></i> &nbsp; DELETE</button>
                    </div>
                </div> ";

                $data[] = array('id'=>$row->id_company,'name'=>$row->name,'no'=>$no,'option'=>$option,'code'=>$row->code,'address'=>$row->address,'telp'=>$row->telp,'mobile'=>$row->mobile,'email'=>$row->email,'contact'=>$row->contact,'dateCreated'=>$row->date_created,'dateEdited'=>$row->date_edited);

            }

        return $data;

    }


    public function getDataTransaction(){

        $this->db->select('transactions.id_transaction, transactions.docno_transaction, convert(transactions.date_transaction,char) as date_transaction, transactions.id_product, transactions.id_company, abs(transactions.qty) as qty, transactions.rate, transactions.gross, transactions.type_transaction,products.code as code_product, products.name as name_product, companys.code as code_company, companys.name as name_company, transactions.date_created, transactions.date_edited');
        $this->db->from('transactions');
        $this->db->join('products','products.id_product = transactions.id_product','inner');
        $this->db->join('companys','companys.id_company = transactions.id_company','inner');
        $this->db->order_by('transactions.docno_transaction','asc');
        $get  = $this->db->get()->result();
        $data = array();
        $no   = 0;

            foreach($get as $row){

                $rate  = number_format($row->rate,0);
                $gross = number_format($row->gross,0);

                //$date1        = date_create($row->date_transaction);
                //$dateFormat   = date_format($date1,'d-m-Y');

                $dateFormat   = date('d-m-Y',strtotime($row->date_transaction));

                $no++;
                $option = "
                <div class='row  mx-auto'>
                    <div class='col'>
                        <button type='button' onclick=\"javascript:formEditTransaction('$row->id_transaction','$row->docno_transaction','$dateFormat','$row->id_product','$row->id_company','$row->qty','$row->rate','$row->gross','$row->type_transaction');\" class='btn btn-sm btn-primary'><i class='fas fa-edit'></i> &nbsp; EDIT</button>
                    </div>
                    <div class='col'>
                        <button type='button' class='btn btn-sm btn-danger' onclick=\"javascript:formDeleteTransaction('$row->id_transaction','$row->docno_transaction');\"><i class='fas fa-trash-alt'></i> &nbsp; DELETE</button>
                    </div>
                </div> ";

                $data[] = array('id'=>$row->id_transaction,'docno'=>$row->docno_transaction,'no'=>$no,'option'=>$option,'qty'=>$row->qty,'rate'=>$rate,'gross'=>$gross,'type'=>$row->type_transaction,'codeProduct'=>$row->code_product,'nameProduct'=>$row->name_product,'codeCompany'=>$row->code_company,'nameCompany'=>$row->name_company,'date'=>$dateFormat,'dateCreated'=>$row->date_created,'dateEdited'=>$row->date_edited);

            }

        return $data;

    }


    public function saveDataCompany($code,$name,$telp,$mobile,$address,$email,$contact,$user){


        $data = array(
            'name'          => $name,
            'code'          => $code,
            'telp'          => $telp,
            'mobile'        => $mobile,
            'address'       => $address,
            'email'         => $email,
            'contact'       => $contact,
            'date_created'  => date('Y-m-d H:i:s'),
            'user_created'  => $user
        );

        
        $this->db->insert('companys',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $save = true;
        }else{
            $save = false;
        }

        return $save;

    }


    public function editDataCompany($code,$name,$telp, $mobile, $email, $contact, $address,$user,$id){

        $data = array(
            'name'          => $name,
            'code'          => $code,
            'telp'          => $telp,
            'mobile'        => $mobile,
            'email'         => $email,
            'contact'       => $contact,
            'address'       => $address,
            'date_edited'   => date('Y-m-d H:i:s'),
            'user_edited'   => $user
        );

        $this->db->where('id_company',$id);
        $this->db->update('companys',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $save = true;
        }else{
            $save = false;
        }

        return $save;

    }


    public function getListCompany(){

        $this->db->select('id_company, code, name');
        $this->db->from('companys');
        $this->db->order_by('code','asc');

        $query = $this->db->get()->result();

        return $query;

    }


    public function getListProduct(){

        $this->db->select('id_product, code, name');
        $this->db->from('products');
        $this->db->order_by('code','asc');

        $query = $this->db->get()->result();

        return $query;

    }

    public function getPriceProduct($id,$type){

        $this->db->select('selling_price, buying_price')->from('products');
        $this->db->where('id_product',$id);
        $get = $this->db->get()->row_array();

        if($type == 'purchase order' or $type == 'return purchase order'){

            $price = $get['buying_price'];
            $typePrice = "Buying Rate";
            
        }else{

            $price = $get['selling_price'];
            $typePrice = "Selling Rate";
        }

        return array("price"=>$price,"typePrice"=>$typePrice);

    }

    public function getLastDocumentNoTransaction(){

        $sql = " SELECT AUTO_INCREMENT FROM information_schema.TABLES
        WHERE TABLE_SCHEMA = 'db_program' AND TABLE_NAME = 'transactions' ";
        $query = $this->db->query($sql);
        $array = $query->row_array();

        return 'TRANS-'.$array['AUTO_INCREMENT'];

    }


    public function saveDataTransaction($docno,$company,$type,$product,$qty,$rate,$gross,$date,$user){

        $docno = $this->getLastDocumentNoTransaction();
        $date1        = date_create($date);
        $dateFormat   = date_format($date1,'Y-m-d');

        if($type == 'purchase order' or $type == 'return sales order'){
            $qty = -1*$qty;   
        }

        $data = array(
            'docno_transaction' => $docno,
            'date_transaction'  => $dateFormat,
            'id_product'        => $product,
            'id_company'        => $company,
            'qty'               => $qty,
            'rate'              => $rate,
            'gross'             => $gross,
            'type_transaction'  => $type,
            'date_created'      => date('Y-m-d H:i:s'),
            'user_created'      => $user
        );

        
        $this->db->insert('transactions',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $save = true;
        }else{
            $save = false;
        }

        return $save;

    }
    
    public function editDataTransaction($docno,$company,$type,$product,$qty,$rate,$gross,$date,$user,$id){

        
        $date1        = date_create($date);
        $dateFormat   = date_format($date1,'Y-m-d');

        if($type == 'purchase order' or $type == 'return sales order'){
            $qty = -1*$qty;   
        }

        $data = array(
            'docno_transaction' => $docno,
            'date_transaction'  => $dateFormat,
            'id_product'        => $product,
            'id_company'        => $company,
            'qty'               => $qty,
            'rate'              => $rate,
            'gross'             => $gross,
            'type_transaction'  => $type,
            'date_created'      => date('Y-m-d H:i:s'),
            'user_created'      => $user
        );

        $this->db->where('id_transaction',$id);
        $this->db->update('transactions',$data);
        $result = $this->db->affected_rows();

        if($result > 0){
            $update = true;
        }else{
            $update = false;
        }

        return $update;

    }


    public function totalTransactionDay($csrf){

        $now = date('Y-m-d');

        $sql   = " select 'Purchase Order' as type, (select count(id_transaction) from transactions
        where date_transaction = '$now' and type_transaction = 'Purchase Order'  group by type_transaction) as total";

        $sql .= " union all ";

        $sql .= " select 'Return Purchase Order' as type, (select count(id_transaction) from transactions
        where date_transaction = '$now' and type_transaction = 'Return Purchase Order'  group by type_transaction) as total";

        $sql .= " union all ";

        $sql .= " select 'Sales Order' as type, (select count(id_transaction) from transactions
        where date_transaction = '$now' and type_transaction = 'Sales Order'  group by type_transaction) as total";

        $sql .= " union all ";

        $sql .= " select 'Return Sales Order' as type, (select count(id_transaction) from transactions
        where date_transaction = '$now' and type_transaction = 'Return Sales Order'  group by type_transaction) as total ";



        $query = $this->db->query($sql);
        
        $result = array();
        $label = '';
        $total = '';
        foreach($query->result() as $row){

            if($row->total > 0){
            $total = $row->total;
            }else{
                $total = '';
            }

            $result[] = array("type"=>$row->type,"total"=>$total,"csrf"=>$csrf);
        }

        return $result;

    }

}

?>